<?php
include '../Includes/dbcon.php';

$cid = intval($_GET['cid']);

$queryss = mysqli_query($conn, "SELECT * FROM tblclassarms WHERE classId = ".$cid."");
$countt = mysqli_num_rows($queryss);

echo '
<select required name="classArmId" class="form-control mb-3">
    <option value="">--Select Class Section--</option>';
while ($row = mysqli_fetch_array($queryss)) {
    echo '<option value="'.$row['Id'].'">'.$row['classArmName'].'</option>';
}
echo '</select>';
?>

