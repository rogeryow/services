<?php
	$sql = "SELECT * FROM `tblservices` WHERE `Username` = '$cduser'";
	$stmt = mysqli_stmt_init($link);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);		
		while($row = mysqli_fetch_assoc($result)){
			echo '<div class = "single-box">
					<div class = "img-text">';
			echo '<a href = "Services_pictures/'.$row['Services_Fullname'].'">
			<img class = "img-area" src = "Services_pictures/'.$row['Services_Fullname'].'"/></a>';
			echo '<h3 style = "color:blue">'.$row['Services_title'].'</h3>
				<p style = "color:orange">'.$row['Services_Desc'].'</p>
				<p style = "color:orange">Price: '.$row['Services_Price'].'</p>';
			echo $welcome_user['Company_Name'];
			$service_code = $row['Services_Fullname'];
			$feedback = $link->query("SELECT * FROM `tblposting` WHERE `Services_Code` = '$service_code'");
			$fb_count = mysqli_num_rows($feedback);	
		}
	}
?>