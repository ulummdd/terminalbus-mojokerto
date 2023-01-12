<?php

include_once("config.php");
$id = $_GET['id'];
$result = mysqli_query($connect, "DELETE FROM informasi WHERE id=$id");
header("Location:information.php");

?>