<?php

include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "DELETE FROM anggota WHERE id='$id'"
);

if($query){

    header("location:admin.php");
    exit;

}else{

    echo "Data gagal dihapus";

}

?>