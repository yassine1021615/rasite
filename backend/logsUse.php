<?php

$datenow = date("Y,m,d H:i:s");
$username = $_SESSION['username'];
if(!isset($title)){
	$title = "";
}
if(!isset($short_disc)){
	$short_disc = "";
}
if(!isset($disc)){
	$disc = "";
}

$sqlLogs = "INSERT INTO logs (title, short_disc, disc, username, date_time, level) VALUES ('$title','$short_disc','$disc','$username','$datenow', '$level')";
$conn->query($sqlLogs);
