<?php
session_start();
require_once('../auth/db_login.php');

$nama_lengkap = $_POST['nama_lengkap'];
$role = $_POST['role'];
$username = $_POST['username'];
$grup1 = $_POST['grup1'];
$grup2 = $_POST['grup2'];

if (isset($_POST['add'])){
    $query = "INSERT INTO user (nama_lengkap, role,  username, password, grup1, grup2) VALUES ('$nama_lengkap', '$role', '$username', '1234', '$grup1', '$grup2')";
    $db->query($query);

    echo '<script>alert("Data berhasil ditambahkan");</script>';
    echo '<script>window.location.href = "../master_data.php";</script>';
}

?>