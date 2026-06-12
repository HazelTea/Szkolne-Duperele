<?php
$servername = "localhost";
$user = $db = "glejzerd";
$pass = "2222";

$GLOBALS['conn'] = mysqli_connect($servername, $user, $pass, $db);

if (!$GLOBALS['conn']) die("Connection failed: " . mysqli_connect_error());
