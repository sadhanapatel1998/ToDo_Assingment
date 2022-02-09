<?php
include'conn.php';
if (isset($_POST['delete'])) {
	$sql ="DELETE FROM customer";
	$result = mysqli_query($conn,$sql);

	if ($result==true) {
	  echo "Record Deleted";
	  header('location:index.php');
	}else{
		echo "Not deleted";
	}
	
}
?>