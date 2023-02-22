<?php
require_once('../auth/db_login.php');
session_start();

$grup = $_POST['grup'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$kategori = $_POST['kategori'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$target_time = $_POST['target_time'];
$agenda = $_POST['agenda'];

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

$pic = implode(', ', $_POST['PIC']);

$query = "SELECT * FROM joblist";
$result = $db->query($query);

if ($ukuran < 1044070){
    move_uploaded_file($file_tmp, '../../files/lampiran/'.$nama);
    $query = "INSERT INTO joblist (grup, judul, deskripsi, PIC, status, kategori, start_date, end_date, target_time, agenda, file_lampiran, input_by) VALUES ('$grup', '$judul', '$deskripsi', '$pic', '$status', '$kategori', '$start_date', '$end_date', '$target_time', '$agenda', '$nama', '$data[initial_name]')";
    $db->query($query);

    echo '<script>alert("Data berhasil ditambahkan");</script>';
    echo '<script>window.location.href = "../joblist.php";</script>';
}
else {
    echo '<script>alert("Ukuran file terlalu besar");</script>';
    echo '<script>window.location.href = "../joblist.php";</script>';
}
?>