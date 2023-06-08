<?php
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
	if(isset($_REQUEST['ar'])){
		$stid = $_REQUEST['ar'];
		$name = $_REQUEST['vn'];
	}
?>	
<?php 
$pageTitle = "Student Result";
include "php/headertop_admin.php";
?>
<div class="all_student fix">

		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$subject = $_POST['subject'];
				$semester = $_POST['semester'];
				$marks = $_POST['marks'];
				$res = $user->add_marks($stid,$subject,$semester,$marks);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Marks successfully inserted!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Failed to insert data</p>";
				}
			}
		
		
		?>
	<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Name: ".$name."<br>Student ID: " . $stid; ?></p>
	</div>	
	<div style="width:40%;margin:50px auto">
		
		<table class="tab_one" style="text-align:center;">
			<form action="" method="post">
				<table>
					<tr>
						<td>Select Course: </td>
						<td><font color=#000000><input type="text" name="subject" placeholder="Enter Course Name" required />
						
						</td>
					</tr>
					<tr>
						<td>Select Semester: </td>
						<td><font color=#000000><input type="text" name="semester" placeholder="Enter Semester" required />
						
						</td>
					
					<tr>
						<td>Input marks: </td>
						<td><font color=#000000><input type="text" name="marks" placeholder="Enter marks" required /></td>
					</tr>
					<tr>
						<td><font color=#000000>	<input type="submit" name="sub" value="Add marks" /></td>
						<td><font color=#000000>	<input type="reset" /></td>
					</tr>
				</table>
				
			</form>
		</table>
		
	</div>
		<div class="back fix">
				<p style="text-align:center"><a href="st_result.php"><button class="editbtn"><font color=#000000>	Back to list</button></a></p>
			</div>
			<br><br><br><br><br><br><br>
</div>
<?php ;?>
<?php ob_end_flush() ; ?>