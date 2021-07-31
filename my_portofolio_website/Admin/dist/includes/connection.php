<?php
	$conn = new mysqli("localhost","root","","db_pwpb11_web_portofolio");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}

?>