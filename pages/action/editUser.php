<?php
session_start();
require_once('../auth/db_login.php');

$nama_lengkap = $_POST['nama_lengkap'];
$role = $_POST['role'];
$username = $_POST['username'];

$query = "SELECT * FROM user WHERE username='$username'";
$result = $db->query($query);

if (isset($_POST['submit'])){
    $query = "UPDATE user SET nama_lengkap='$nama_lengkap', role='$role' WHERE username='$username'";
    $db->query($query);

    echo '<script>alert("Data berhasil diubah");</script>';
    echo '<script>window.location.href = "../master_data.php";</script>';
}

?>