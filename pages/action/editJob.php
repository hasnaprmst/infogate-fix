<?php
require_once('../auth/db_login.php');
session_start();

$grup = $_POST['grup'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];
$kategori = $_POST['kategori'];
$end_date = $_POST['end_date'];
$target_time = $_POST['target_time'];
$agenda = $_POST['agenda'];

$ekstensi_diperbolehkan = array('pdf');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

$name = $_FILES['fileReport']['name'];
$size = $_FILES['fileReport']['size'];
$tmp = $_FILES['fileReport']['tmp_name'];

$username = $_SESSION['username'];
$initial = "SELECT * FROM user WHERE username='$username'";
$hasil = $db->query($initial);
$data = $hasil->fetch_assoc();

$query = "SELECT * FROM joblist WHERE judul='$judul'";
$result = $db->query($query);

if (isset($_POST['save'])){
    if ($status == 'REPORT'){
        $pic = implode(', ', $_POST['PIC']);
        move_uploaded_file($file_tmp, '../../files/lampiran/'.$nama);
        move_uploaded_file($tmp, '../../files/report/'.$name);
        $query = "UPDATE joblist SET grup='$grup', judul='$judul', deskripsi='$deskripsi', PIC='$pic', status='$status', end_date='$end_date', target_time='$target_time', agenda='$agenda', file_lampiran='$nama', file_report='$name', report_by='$data[initial_name]' WHERE judul='$judul'";
        $db->query($query);

        echo '<script>alert("Data berhasil diupdate");</script>';
        echo ($query);
        echo '<script>window.location.href = "../joblist.php";</script>';
    }
    else {
        $pic = implode(', ', $_POST['PIC']);
        move_uploaded_file($file_tmp, '../../files/lampiran/'.$nama);
        move_uploaded_file($tmp, '../../files/report/'.$name);
        $query = "UPDATE joblist SET grup='$grup', judul='$judul', deskripsi='$deskripsi', PIC='$pic', status='$status', end_date='$end_date', target_time='$target_time', agenda='$agenda', file_lampiran='$nama', file_report='$name', input_by='$data[initial_name]' WHERE judul='$judul'";
        $db->query($query);

        echo '<script>alert("Data berhasil diupdate");</script>';
        echo '<script>window.location.href = "../joblist.php";</script>';
    }
}
else {
    echo '<script>alert("Data gagal diupdate");</script>';
    echo '<script>window.location.href = "../joblist.php";</script>';
}
?>