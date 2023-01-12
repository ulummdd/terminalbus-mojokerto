<?php

include_once("config.php");
$id = $_GET['id'];
$result = mysqli_query($connect, "DELETE FROM pesan WHERE id=$id");
header("Location:message.php");

?>