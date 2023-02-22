<?php
require_once('../auth/db_login.php');
session_start();

$jenis_file = $_POST['jenis_file'];
$informasi_file = $_POST['informasi_file'];

$ekstensi_diperbolehkan = array('pdf');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

$username = $_SESSION['username'];
$initial = "SELECT * FROM user WHERE username='$username'";
$hasil = $db->query($initial);
$data = $hasil->fetch_assoc();

$query = "SELECT * FROM bankfile";
$result = $db->query($query);

if ($ukuran < 1044070){
    move_uploaded_file($file_tmp, '../../files/bankfile/'.$nama);
    $query = "INSERT INTO bankfile (jenis_file, informasi_file, file_lampiran, input_by) VALUES ('$jenis_file', '$informasi_file', '$nama', '$data[initial_name]')";
    $db->query($query);

    echo '<script>alert("Data berhasil ditambahkan");</script>';
    echo '<script>window.location.href = "../bankfile.php";</script>';
}
else {
    echo '<script>alert("Ukuran file terlalu besar");</script>';
}
?>