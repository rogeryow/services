<?php
	include ("../connection.php");
	$my_data = $_GET['cd'];
	$get_info = $link->query("Select * From `tblrequestservices` Where `ID` = '$my_data'");
	$info_row = $get_info->fetch_array();
	$new = $info_row['ID'];
	
		$update_query = $link->query("DELETE FROM `tblrequestservices` WHERE `ID` = '$my_data'");
		
		if($update_query){
			echo "<script>
						window.location.href = '../Services_requested.php'
				  </script>	";	  
		}
		else{
			echo "<script>	
						window.alert('Cancel Error!');
						window.location.href = '../Services_requested.php'
				  </script>";
		}
		
?>