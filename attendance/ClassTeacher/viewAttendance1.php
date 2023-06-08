<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
  <title>Dashboard</title>
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
                    <div class="col-md-5">  <div id="wrapper">
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
            <h1 class="h3 mb-0 text-gray-800">View Class Attendance</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./"><font color=#000000>Home</a></li>
            
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Class Attendance</h6>
                    <?php echo $statusMsg; ?>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                            <input type="date" class="form-control" name="dateTaken" id="exampleInputFirstName" placeholder="Class Arm Name">
                        </div>
                       
                    </div>
                    <button type="submit" name="view" class="btn btn-primary">View Attendance</button>
                  </form>
                </div>
              </div>

              <!-- Input Group -->
                 <div class="row">
              <div class="col-lg-30">
              <div class="card mb-6">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Class Attendance</h6>
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
                        <th><h5>First Name</h5></th>
                        <th><h5>Last Name</h5></th>
                        <th><h5>Other Name</h5></th>
                        <th><h5>Reg No</h5></th>
                        <th><h5>Class</h5></th>
                        <th><h5>Class Section</h5></th>
                        <th><h5>Session</h5></th>
                   
                        <th><h5>Status</h5></th>
                        <th><h5>Date</h5></th>
                      </tr>
                    </thead>
                   
                    <tbody>

                  <?php

                    if(isset($_POST['view'])){

                      $dateTaken =  $_POST['dateTaken'];

                      $query = "SELECT tblattendance.Id,tblattendance.status,tblattendance.dateTimeTaken,tblclass.className,
                      tblclassarms.classArmName,tblsessionterm.sessionName,tblsessionterm.termId,tblterm.termName,
                      tblstudents.firstName,tblstudents.lastName,tblstudents.otherName,tblstudents.admissionNumber
                      FROM tblattendance
                      INNER JOIN tblclass ON tblclass.Id = tblattendance.classId
                      INNER JOIN tblclassarms ON tblclassarms.Id = tblattendance.classArmId
                      INNER JOIN tblsessionterm ON tblsessionterm.Id = tblattendance.sessionTermId
                      INNER JOIN tblterm ON tblterm.Id = tblsessionterm.termId
                      INNER JOIN tblstudents ON tblstudents.admissionNumber = tblattendance.admissionNo
                      where tblattendance.dateTimeTaken = '$dateTaken' and tblattendance.classId = '$_SESSION[classId]' and tblattendance.classArmId = '$_SESSION[classArmId]'";
                      $rs = $conn->query($query);
                      $num = $rs->num_rows;
                      $sn=0;
                      $status="";
                      if($num > 0)
                      { 
                        while ($rows = $rs->fetch_assoc())
                          {
                              if($rows['status'] == '1'){$status = "Present"; $colour="#00FF00";}else{$status = "Absent";$colour="#FF0000";}
                             $sn = $sn + 1;
                            echo"
                              <tr>
                                <td><h5>".$sn."</h5></td>
                                 <td><h5>".$rows['firstName']."</h5></td>
                                <td><h5>".$rows['lastName']."</h5></td>
                                <td><h5>".$rows['otherName']."</h5></td>
                                <td><h5>".$rows['admissionNumber']."</h5></td>
                                <td><h5>".$rows['className']."</h5></td>
                                <td><h5>".$rows['classArmName']."</h5></td>
                                <td><h5>".$rows['sessionName']."</h5></td>
                              
                                <td style='background-color:".$colour."'>".$status."</td>
                                <td><h5>".$rows['dateTimeTaken']."</h5></td>
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

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
   <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>