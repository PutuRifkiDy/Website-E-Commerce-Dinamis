<?php
require "koneksi.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM subscribtion WHERE id = $id";
    $con->query($sql);
}

header("location: adminSubscriber.php");
exit();
?>