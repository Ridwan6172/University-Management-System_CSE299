<?php 
error_reporting(0);
include '../Includes/dbcon.php';
include '../Includes/session.php';

$statusMsg = '';

//------------------------SAVE--------------------------------------------------

if(isset($_POST['save'])){
    $sessionName = $_POST['sessionName'];
    $termId = $_POST['termId'];
    $dateCreated = date("Y-m-d");
   
    $query = mysqli_query($conn, "SELECT * FROM tblsessionterm WHERE sessionName ='$sessionName' AND termId = '$termId'");
    $ret = mysqli_fetch_array($query);

    if($ret > 0){ 
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>This Session and Term Already Exists!</div>";
    }
    else{
        $query = mysqli_query($conn, "INSERT INTO tblsessionterm(sessionName, termId, isActive, dateCreated) VALUES ('$sessionName', '$termId', '0', '$dateCreated')");

        if ($query) {
            $statusMsg = "<div class='alert alert-success' style='margin-right:700px;'>Created Successfully!</div>";
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

//---------------------------------------EDIT-------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit"){
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "SELECT * FROM tblsessionterm WHERE Id ='$Id'");
    $row = mysqli_fetch_array($query);

    //------------UPDATE-----------------------------

    if(isset($_POST['update'])){
        $sessionName = $_POST['sessionName'];
        $termId = $_POST['termId'];
        $dateCreated = date("Y-m-d");
        
        $query = mysqli_query($conn, "UPDATE tblsessionterm SET sessionName='$sessionName', termId='$termId', isActive='0' WHERE Id='$Id'");

        if ($query) {
            echo "<script type=\"text/javascript\">
            window.location = (\"createSessionTerm.php\")
            </script>"; 
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "DELETE FROM tblsessionterm WHERE Id='$Id'");

    if ($query == TRUE) {
        echo "<script type=\"text/javascript\">
        window.location = (\"createSessionTerm.php\")
        </script>";  
    }
    else{
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>"; 
    }
}

//--------------------------------ACTIVATE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "activate"){
    $Id = $_GET['Id'];

    $query = mysqli_query($conn, "UPDATE tblsessionterm SET isActive='0' WHERE isActive='1'");

    if ($query) {
        $que = mysqli_query($conn, "UPDATE tblsessionterm SET isActive='1' WHERE Id='$Id'");

        if ($que) {
            echo "<script type = \"text/javascript\">
            window.location = (\"createSessionTerm.php\")
            </script>";  
        }
        else {
            $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
    }
    else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
  
<?php include 'includes/title.php';?>
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 
  <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://rds3.northsouth.edu/assets/css/login-style.css">
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://rds3.northsouth.edu/assets/js/login.js"></script>
    <script type="text/javascript">
        var ctoday = 1675170960000;
    </script>

</head>

<body >
  <div class="row">
   <div class="col-lg-12 col-lg-offset-0">
            <div class="login-form">
               <h1><div class="row" >
                  <div class="col-md-2"></div>
                    <div class="col-md-5">
  <div id="wrapper">
    <!-- Sidebar -->
      <?php include "Includes/sidebar.php";?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
       <?php include "Includes/topbar.php";?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
           
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./"><font color=#000000>Home</a></li>
            
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-30">
              <!-- Form Basic -->
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                            <label class="form-control-label"><font color=#000000><h3>Session Name</h3></font><span class="text-danger ml-2">*</span></label>
                      <input type="text" class="form-control" name="sessionName" value="<?php echo $row['sessionName'];?>" id="exampleInputFirstName" placeholder="Session">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label"><font color=#000000><h3>Year</h3></font><span class="text-danger ml-2">*</span></label>
                              <?php
                        $qry= "SELECT * FROM tblterm ORDER BY termName ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="termId" class="form-control mb-3">';
                          echo'<option value="">--Select Year--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['Id'].'" >'.$rows['termName'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                    </div>
                      <?php
                    if (isset($Id))
                    {
                    ?>
                    <button type="submit" name="update" class="btn btn-warning">Update</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    } else {           
                    ?>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                    <?php
                    }         
                    ?>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Session and Year</h6>
                 
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                     <style>
      table {
        border: 1px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 86%;
        margin: auto;
    }

    td,
    th {
        border: 1px solid black !important;
        padding: 5px;
    }

    tr:nth-child(even) {
        background-color: white;
    }
</style>
                    <thead class="thead-light">
                      <tr>
                        <th><h5>#</h5></th>
                        <th><h5>Session</h5></th>
                        
                        <th><h5>Status</h5></th>
                        <th><h5>Date</h5></th>
                        <th><h5>Activate</h5></th>
                        <th><h5>Edit</h5></th>
                        <th><h5>Delete</h5></th>
                      </tr>
                    </thead>
                  
                    <tbody>

                  <?php
                      $query = "SELECT tblsessionterm.Id,tblsessionterm.sessionName,tblsessionterm.isActive,tblsessionterm.dateCreated,
                      tblterm.termName
                      FROM tblsessionterm
                      INNER JOIN tblterm ON tblterm.Id = tblsessionterm.termId";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                            if($rows['isActive'] == '1'){$status = "Active";}else{$status = "InActive";}
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td><h5>".$sn."</h5></td>
                                <td><h5>".$rows['sessionName']."</h5></td>
                                
                                <td><h5>".$status."</h5></td>
                                <td><h5>".$rows['dateCreated']."</h5></td>
                                 <td><a href='?action=activate&Id=".$rows['Id']."'><h5><font color=#000000>Activate</h5></a></td>
                                <td><a href='?action=edit&Id=".$rows['Id']."'><h5><font color=#000000>Edit</h5></a></td>
                                <td><a href='?action=delete&Id=".$rows['Id']."'><h5><font color=#000000>Delete</h5></a></td>
                              </tr>";
                          }
                      }
                      else
                      {
                           echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
                      }
                      
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
          </div>
          

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
       <?php include "Includes/footer.php";?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>