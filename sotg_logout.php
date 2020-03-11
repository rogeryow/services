<?php
include ("connection");
session_start();
session_destroy();
unset($_SESSION['Username']);
header ("location: login.php");
?>