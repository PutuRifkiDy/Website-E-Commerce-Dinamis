<?php
require "koneksi.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM message WHERE id = $id";
    $con->query($sql);
}
header("location: adminMessage.php");
exit();
?>