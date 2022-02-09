<?php
include'conn.php';
if (isset($_GET['id'])) {
	$sql ="delete from customer where id={$_REQUEST['id']}";
	$result = mysqli_query($conn,$sql);

	if ($result==true) {
	  echo "Record Deleted";
	  header('location:index.php');
	}else{
		echo "Not deleted";
	}
	
}
?>