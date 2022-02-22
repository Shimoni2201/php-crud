<?php
require_once("db.php");
$sql = "DELETE FROM users WHERE userId='" . $_GET["userId"] . "'";
mysqli_query($conn,$sql);
$message = "Record Deleted";
header("Location:index.php");
?>