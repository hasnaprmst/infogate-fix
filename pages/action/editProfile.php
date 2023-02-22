<?php

require_once('../auth/db_login.php');
session_start();

$username = $_SESSION['username'];
$password = $_POST["password"];
$initial_name = $_POST["initial_name"];

if (isset($_POST['save'])){
    $query = "UPDATE user SET password='$password', initial_name='$initial_name' WHERE username='$username'";
    $result = $db->query($query);

    echo '<script>alert("Data berhasil diubah");</script>';
    echo '<script>window.location.href = "../profile.php";</script>';
}

?>