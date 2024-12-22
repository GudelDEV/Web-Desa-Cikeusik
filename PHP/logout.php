<?php
session_start();
session_destroy(); // Menghapus semua sesi
header("Location: ../Components/Login.php");
exit();
?>