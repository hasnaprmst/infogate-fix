<?php

require_once('../auth/db_login.php');

$query = "DELETE FROM joblist WHERE id='".$_GET['id']."'";
$result = $db->query($query);

if ($result) {
    echo '<script>alert("Data berhasil dihapus");</script>';
    echo '<script>window.location.href = "../joblist.php";</script>';
} else {
    echo '<script>alert("Data gagal dihapus");</script>';
    echo '<script>window.location.href = "../joblist.php";</script>';
}
?>