<?php 
	//script untuk hapus data
	include 'connection.php';
	if(isset($_GET['id'])){
		$delete = mysqli_query($connection, "DELETE FROM book WHERE idbuku = '".$_GET['id']."' ");
		if($delete){
			header('location:index.php');
		}
	}
?>