<?php
// No PHP code included
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
  <script>
    function classArmDropdown(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp;
        if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
        } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "ajaxClassArms.php?cid=" + str, true);
        xmlhttp.send();
      }
    }
  </script>
</head>

<body>
  <div class="row">
    <div class="col-lg-12 col-lg-offset-0">
      <div class="login-form">
        <h1>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
              <div id="wrapper">
                <?php include "Includes/sidebar.php";?>
                <div id="content-wrapper" class="d-flex flex-column">
                  <div id="content">
                    <?php include "Includes/topbar.php";?>
                    <div class="container-fluid" id="container-wrapper">
                      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="./"><font color=#000000>Home</font></a></li>
                        </ol>
                      </div>
                      <div class="row">
                        <div class="col-lg-30">
                          <div class="card mb-6">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Create Class Teachers</h6>
                              <?php echo $statusMsg; ?>
                            </div>
                            <div class="card-body">
                              <form method="post">
                                <div class="form-group row mb-3">
                                  <div class="col-xl-4">
                                    <label class="form-control-label"><font color=#000000><h3>Firstname</h3></font><span class="text-danger ml-2">*</span></label>
                                    <input type="text" class="form-control" required name="firstName" value="<?php echo $row['firstName'];?>" id="exampleInputFirstName">
                                  </div>
                                  <div class="col-xl-4">
                                    <label class="form-control-label"><font color=#000000><h3>Lastname</h3></font><span class="text-danger ml-2">*</span></label>
                                    <input type="text" class="form-control" required name="lastName" value="<?php echo $row['lastName'];?>" id="exampleInputFirstName" >
                                  </div>
                                </div>
                                <div class="form-group row mb-3">
                                  <div class="col-xl-4">
                                    <label class="form-control-label"><font color=#000000><h3>Email Address</h3></font><span class="text-danger ml-2">*</span></label>
                                    <input type="email" class="form-control" required name="emailAddress" value="<?php echo $row['emailAddress'];?>" id="exampleInputFirstName" >
                                  </div>
                                  <div class="col-xl-4">
                                    <label class="form-control-label"><font color=#000000><h3>Phone No</h3></font><span class="text-danger ml-2">*</span></label>
                                    <input type="text" class="form-control" name="phoneNo" value="<?php echo $row['phoneNo'];?>" id="exampleInputFirstName" >
                                  </div>
                                </div>
                                <div class="form-group row mb-3">
                                  <div class="col-xl-4">
                                    <label class="form-control-label"><font color=#000000><h3>Select Class</h3></font><span class="text-danger ml-2">*</span></label>
                                    <?php
                                    $qry = "SELECT * FROM tblclass ORDER BY className ASC";
                                    $result = $conn->query($qry);
                                    $num = $result->num_rows;
                                    if ($num > 0){
                                      echo ' <select required name="classId" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
                                      echo'<option value="">--Select Class--</option>';
                                      while ($rows = $result->fetch_assoc()){
                                        echo'<option value="'.$rows['Id'].'" >'.$rows['className'].'</option>';
                                      }
                                      echo '</select>';
                                    }
                                    ?>  
                                  </div>
                                  <div class="col-xl-6">
                                    <label class="form-control-label"><font color=#000000><h3>Class Section</h3></font><span class="text-danger ml-2">*</span></label>
                                    <?php
                                    echo"<div id='txtHint'></div>";
                                    ?>
                                  </div>
                                </div>
                                <?php
                                if (isset($Id)) {
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
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                  <h6 class="m-0 font-weight-bold text-primary">All Class Teachers</h6>
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
                                        <th><h5>Email Address</h5></th>
                                        <th><h5>Phone No</h5></th>
                                        <th><h5>Class</h5></th>
                                        <th><h5>Class Section</h5></th>
                                        <th><h5>Date Created</h5></th>
                                        <th><h5>Delete</h5></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $query = "SELECT tblclassteacher.Id,tblclass.className,tblclassarms.classArmName,tblclassarms.Id AS classArmId,tblclassteacher.firstName,
                                          tblclassteacher.lastName,tblclassteacher.emailAddress,tblclassteacher.phoneNo,tblclassteacher.dateCreated
                                          FROM tblclassteacher
                                          INNER JOIN tblclass ON tblclass.Id = tblclassteacher.classId
                                          INNER JOIN tblclassarms ON tblclassarms.Id = tblclassteacher.classArmId";
                                      $rs = $conn->query($query);
                                      $num = $rs->num_rows;
                                      $sn=0;
                                      $status="";
                                      if($num > 0) { 
                                        while ($rows = $rs->fetch_assoc()) {
                                          $sn = $sn + 1;
                                          echo"
                                          <tr>
                                            <td><h5>".$sn."</h5></td>
                                            <td><h5>".$rows['firstName']."</h5></td>
                                            <td><h5>".$rows['lastName']."</h5></td>
                                            <td><h5>".$rows['emailAddress']."</h5></td>
                                            <td><h5>".$rows['phoneNo']."</h5></td>
                                            <td><h5>".$rows['className']."</h5></td>
                                            <td><h5>".$rows['classArmName']."</h5></td>
                                            <td><h5>".$rows['dateCreated']."</h5></td>
                                            <td><a href='?action=delete&Id=".$rows['Id']."&classArmId=".$rows['classArmId']."'><h5><font color=#000000>Delete</h5></a></td>
                                          </tr>";
                                        }
                                      }
                                      else {
                                        echo "<div class='alert alert-danger' role='alert'>
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
                    </div>
                    <?php include "Includes/footer.php";?>
                  </div>
                </div>
                <a class="scroll-to-top rounded" href="#page-top">
                  <i class="fas fa-angle-up"></i>
                </a>
                <script>
                  $(document).ready(function () {
                    $('#dataTable').DataTable(); 
                    $('#dataTableHover').DataTable(); 
                  });
                </script>
              </div>
            </div>
          </div>
        </h1>
      </div>
    </div>
  </div>
</body>

</html>
