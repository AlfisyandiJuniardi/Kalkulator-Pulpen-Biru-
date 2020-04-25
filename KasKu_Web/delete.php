<?php 
    include "connect.php";
    $id = $_POST['id'];
    mysqli_query($koneksi, "DELETE FROM penyimpanan WHERE id='$id'");
    header("location:index.php?pesan=delete")
?>