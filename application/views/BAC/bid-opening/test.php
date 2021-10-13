<?php

if( current_user_can('administrator') ) {  


	$servername = "localhost";
	$username = "subroot";
	$password = "Hello101!";
	$dbname = "chatterchallenge";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$userid1 = get_current_user_id();

	if (isset($_POST['sts1'])) {
        $mcid = (int) $_POST['sts1'];
        $sqlu1 = "UPDATE minichallenges SET status = '0' WHERE id = '$mcid'";
		if (mysqli_query($conn, $sqlu1)) {}
    }

    if (isset($_POST['sts0'])) {
        $mcid = (int) $_POST['sts0'];
        $sqlu0 = "UPDATE minichallenges SET status = '1' WHERE id = '$mcid'";
		if (mysqli_query($conn, $sqlu0)) {}
    }

	$sql = "SELECT id, name, description, status, adddate, startdate FROM minichallenges";

	echo '<div class="ct-section-inner-wrap">
		';


	if ($result = mysqli_query($conn, $sql)) {
	while($row = $result->fetch_assoc()) {
	      $idh = $row["id"];
		  $descriptionh = $row["description"];
		  $nameh = $row["name"];
		  $statush = $row["status"];
		  $adddateh = $row["adddate"];
		  $startdateh = $row["startdate"];


	     

	      echo '<div class="ct-div-block" style="margin-right:3%;max-width: 30%; flex: 1 1 30%;">
	      <div class="ct-div-block atomic-iconblock-15-wrapper">
				<div class="ct-div-block ct-div-block-n nowrap">
				<h4 class="ct-headline ">'. $nameh .'</h4> <form method="post" action="">';
		
		if ($statush == 1){
	      	echo '<button type="submit" class="mcstatus mcstatus1" name="sts1" value="'.$idh .'"></button>';
	      }else{
	      	echo '<button type="submit" class="mcstatus mcstatus0" name="sts0" value="'.$idh .'"></button>';
	      }
		
		echo '</form><div class="ct-text-block" style="text-align:left">'.$descriptionh.'<br><br><span style="float:left"> ID: '. $idh .'</span><span style="float:right"> Start: '. $startdateh .'</span></div>
				</div></div></div>	';

	      
	    }}


	   echo '</div>
		';


	mysqli_close($conn);

} else { die;}
	?>