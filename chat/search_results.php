<link rel="stylesheet" href="style.css">
<?php
	include 'connection.php';	
	$search_txt = $_GET['user'];
	$ret2 = $link->query("Select * From `tblclient`");
	if($search_txt != ""){
		$ret2 = $link->query("Select * From `tblclient` Where CONCAT (`Username`) Like '%$search_txt%'");	
	}else{
		
	}								
	while($fetch_d = $ret2 -> fetch_array()){
?>		
		<tr>
			<td><?php echo $fetch_d['Username'];?></td>
		</tr>
<?php		
	}
?>
<script type = "text/javascript">
		function confirmApproved(anchor){
			var config = confirm("Do you want to approve this account?");
			if(config == true){
				window.location.href = "approval_now.php?cd="+anchor;
			}else{
				alert("Cancelled by Admin");
			}
		}
		function confirmDeactivate(anchor){
			var config = confirm("Do you want to Deactivate this account?");
			if(config == true){
				window.location.href = "pending_now.php?cd="+anchor;
			}else{
				alert("Cancelled by Admin");
			}
		}
		function confirmDeclined(anchor){
			var config = confirm("Declined this account?");
			if(config == true){
				window.location.href = "del_me.php?cd="+anchor;
			}else{
				alert("Cancelled by Admin");
			}
		}
	</script>		
