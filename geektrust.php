<?php  
	include 'src/MeetFamilyApplication.php';
	$geekTrust = new MeetFamilyApplication();
	echo $geekTrust->processData($argv[1]);
?>