<?php
	ob_start ();
	session_start();
	require "php/config.php";
	require_once "php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: index.php');
		exit();
	}
	
?>
<?php 
$pageTitle = "All student details";
include "php/headertop_admin.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6"><font color=#000000>
		<div class="hdinfo"><h3>All Registered Student List</h3></div>	
		<div class="search">
		<form action="admin_search_student.php" method="GET">
			<input type="text" name="src_student" placeholder="search student" /><font color=#000000>
			<input type="submit" value="Search" /></font>
		</form>
		</div>
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Data deleted successfully</h3>";
				}
			}
			
		?>
		<div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
		<table class="tab_one">
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
			<tr>
				<th>  SL</th>
				<th>  Name</th>
				<th>ID</th>
				<th>Show Profile</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Photo</th>
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
			<tr>
				
				<td><?php echo $i; ?></td><br>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="admin_single_student.php?id=<?php echo $rows['st_id'];?>"><font color=#000000>	View Details</a></td>
				<td><a href="admin_single_student_update.php?id=<?php echo $rows['st_id'];?>"><font color=#000000>	Edit</a></td>
				<td><a href="admin_delete_student.php?id=<?php echo $rows['st_id'];?>"><font color=#000000>	Delete</a></td>
				<td><img src="img/student/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
			</tr>
			<?php } ?>
		</table>
</div>

<?php ob_end_flush() ; ?>