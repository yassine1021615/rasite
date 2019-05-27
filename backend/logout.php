<?php
session_start();
$_SESSION = Array();
session_destroy();
header("Location: /rasite/index.php");
