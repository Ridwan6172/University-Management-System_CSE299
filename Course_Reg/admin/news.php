<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {   
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $ntitle = $_POST['newstitle'];
        $ndescription = $_POST['description'];
        $ret = mysqli_query($con, "INSERT INTO news(newstitle, newsDescription) VALUES ('$ntitle', '$ndescription')");
        if ($ret) {
            echo '<script>alert("News added successfully")</script>';
            echo "<script>window.location.href='news.php'</script>";
        } else {
            echo '<script>alert("Something went wrong. Please try again.")</script>';
            echo "<script>window.location.href='news.php'</script>";
        }
    }

    if (isset($_GET['del'])) {
        $nid = $_GET['id'];    
        mysqli_query($con, "DELETE FROM news WHERE id ='$nid'");
        echo '<script>alert("News deleted successfully.")</script>';
        echo '<script>window.location.href=news.php</script>';
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
    <title>Admin | News</title>
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
                <h3>Admin</h3>
              


                
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
                        <h1 class="page-head-line"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i>News  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           News 
                        </div>



                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="department"><font color=#000000>News Title </label>
    <input type="text" class="form-control" id="newstitle" name="newstitle" placeholder="News Title" required />
  </div>

     <div class="form-group">
    <label for="department"><font color=#000000>News description </label>
    <textarea class="form-control" id="description" name="description" placeholder="News Description" required></textarea>
  </div>
 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <div class="col-md-12">
              
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
<span class="sr-only">Loading...</span></i>Manage News
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><font color=#000000>#</th>
                                            <th><font color=#000000>News Title</th>
                                            <th><font color=#000000>News Description</th>
                                            <th><font color=#000000>Creation Date</th>
                                            <th><font color=#000000>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from news");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><font color=#000000><?php echo $cnt;?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['newstitle']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['newsDescription']);?></td>
                                            <td><font color=#000000><?php echo htmlentities($row['postingDate']);?></td>
                                            <td>
  <a href="news.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
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
