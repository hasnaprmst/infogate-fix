<?php
// active session
session_start();

// connect database
require_once('db_login.php');

// assign username and password from login form
$username = $_POST['username'];
$password = $_POST['password'];

// selection user data from database
$login = $db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

// count the amount of user data
$result = mysqli_num_rows($login);

// if user data is more than 0, then login is success
if ($result > 0) {

    $query = "SELECT * FROM user WHERE username='$username'";
    $hasil = $db->query($query);
    $user = $hasil->fetch_assoc();
    
    $_SESSION['user'] = $username;
    $nama = $user['nama_lengkap'];
    $machineName = gethostname();   //for get current system name 
    $uip = gethostbyname($machineName); //For get ipaddress

    $query = "INSERT INTO `user_log`(username, nama_lengkap, user_ip) values('".$_SESSION['user']."', '$nama', '$uip')";
    $db->query($query);
    $data=mysqli_fetch_assoc($login);

    $_SESSION['username'] = $username;
    // session role = role from database
    $_SESSION['role'] = $data['role'];
    header('Location: ../dashboard.php');
} else {
    // redirect to login page

    header('Location: ../login.php');
}


?>
