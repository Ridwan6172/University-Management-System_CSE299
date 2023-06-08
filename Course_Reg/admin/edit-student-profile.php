<?php
session_start();
include('includes/config.php');
error_reporting(0);

function updateStudentRecord($regid, $studentname, $photo, $cgpa, $con) {
    $studentname = mysqli_real_escape_string($con, $studentname);
    $photo = mysqli_real_escape_string($con, $photo);
    $cgpa = mysqli_real_escape_string($con, $cgpa);

    $ret = mysqli_query($con, "UPDATE students SET studentName='$studentname', studentPhoto='$photo', cgpa='$cgpa' WHERE StudentRegno='$regid'");

    return $ret;
}

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $regid = intval($_GET['id']);
        $studentname = $_POST['studentname'];
        $photo = $_FILES["photo"]["name"];
        $cgpa = $_POST['cgpa'];

        move_uploaded_file($_FILES["photo"]["tmp_name"], "studentphoto/" . $_FILES["photo"]["name"]);

        $ret = updateStudentRecord($regid, $studentname, $photo, $cgpa, $con);

        if ($ret) {
            echo '<script>alert("Student Record updated Successfully !!")</script>';
            echo '<script>window.location.href="manage-students.php"</script>';
            exit;
        } else {
            echo '<script>alert("Error: Student Record not updated")</script>';
            echo '<script>window.location.href="manage-students.php"</script>';
            exit;
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
    <title>Student Profile</title>
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
  <img src="../assets/img/cc.png" width="1600px" height="150px">
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
        <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
                <h1>Admin</h1>
                

                
                    <div class="col-md-5 text-center">
                        
                    </div>
<?php include('includes/header.php');?>
  
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Student Registration  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Student Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php 
$regid=intval($_GET['id']);

$sql=mysqli_query($con,"select * from students where StudentRegno='$regid'");
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
    <label for="CGPA"><font color=#000000>CGPA  </label>
    <input type="text" class="form-control" id="cgpa" name="cgpa"  value="<?php echo htmlentities($row['cgpa']);?>" required />
  </div>  





  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  
    


</body>
</html>
<?php  ?>
