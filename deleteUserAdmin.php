<?php
require "koneksi.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE id = $id";
    $con->query($sql);
}

header("location: adminUser.php");
exit();
?>