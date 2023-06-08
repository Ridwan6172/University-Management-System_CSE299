<?php
session_start();
include('includes/config.php');
error_reporting(0);

function enrollCourse($studentregno, $pincode, $session, $dept, $level, $course, $sem, $con) {
    $studentregno = mysqli_real_escape_string($con, $studentregno);
    $pincode = mysqli_real_escape_string($con, $pincode);
    $session = mysqli_real_escape_string($con, $session);
    $dept = mysqli_real_escape_string($con, $dept);
    $level = mysqli_real_escape_string($con, $level);
    $course = mysqli_real_escape_string($con, $course);
    $sem = mysqli_real_escape_string($con, $sem);

    $ret = mysqli_query($con, "INSERT INTO courseenrolls(studentRegno, pincode, session, department, level, course, semester) VALUES ('$studentregno', '$pincode', '$session', '$dept', '$level', '$course', '$sem')");

    return $ret;
}

if (strlen($_SESSION['login']) == 0 || strlen($_SESSION['pcode']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $studentregno = $_POST['studentregno'];
        $pincode = $_POST['Pincode'];
        $session = $_POST['session'];
        $dept = $_POST['department'];
        $level = $_POST['level'];
        $course = $_POST['course'];
        $sem = $_POST['sem'];

        $ret = enrollCourse($studentregno, $pincode, $session, $dept, $level, $course, $sem, $con);

        if ($ret) {
            echo '<script>alert("Enroll Successfully !!")</script>';
            echo '<script>window.location.href="enroll.php"</script>';
        } else {
            echo '<script>alert("Error : Not Enroll")</script>';
            echo '<script>window.location.href="enroll.php"</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Enroll</title>
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>
</head>

<body>
   <img src="assets/img/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h3>Course Enrollment</h3>
              


                
                    <div class="col-md-5 text-center">
                        
                    </div>
<?php include('includes/header.php');?>

<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>

    <div class="content-wrapper">
        <div class="container">
              <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 class="page-head-line">Course Enroll </h1>
                    </div>
                </div>
              <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($con,"select * from students where StudentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname"><font color=#000000>Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>"  />
  </div>

 <div class="form-group">
    <label for="studentregno"><font color=#000000>Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div>



<div class="form-group">
    <label for="Pincode"><font color=#000000>Pincode  </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>   

<div class="form-group">
    <label for="Pincode">Student Photo  </label>
   <?php if($row['studentPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="300" height="300"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" width="300" height="300">
   <?php } ?>
  </div>
 <?php } ?>

<div class="form-group">
    <label for="Session"><font color=#000000>Year  </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select Year</option>   
   <?php 
$sql=mysqli_query($con,"select * from session");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['session']);?></option>
<?php } ?>

    </select> 
  </div> 



<div class="form-group">
    <label for="Department"><font color=#000000>Department  </label>
    <select class="form-control" name="department" required="required">
   <option value="">Select Depertment</option>   
   <?php 
$sql=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['department']);?></option>
<?php } ?>

    </select> 
  </div> 




<div class="form-group">
    <label for="Semester"><font color=#000000>Semester  </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Semester</option>   
   <?php 
$sql=mysqli_query($con,"select * from semester");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['semester']);?></option>
<?php } ?>

    </select> 
  </div>


<div class="form-group">
    <label for="Course"><font color=#000000>Course  </label>
    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
   <option value="">Select Course</option>   
   <?php 
$sql=mysqli_query($con,"select * from course");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['courseName']);?></option>
<?php } ?>
    </select> 
    <span id="course-availability-status1" style="font-size:12px;">
  </div>

<div class="form-group">
    <label for="Level"><font color=#000000>Section</label>
    <select class="form-control" name="level" required="required">
   <option value="">Select Section</option>   
   <?php 
$sql=mysqli_query($con,"select * from level");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['level']);?></option>
<?php } ?>

    </select> 
  </div>  

 <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
<script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'cid='+$("#course").val(),
type: "POST",
success:function(data){
$("#course-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


</body>
</html>
<?php  ?>
