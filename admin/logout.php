<?php
session_start();
// Unset session variables
$_SESSION = array();
// Destroy the session.
session_destroy();
// Kembali ke halaman index di luar folder admin
header("Location: ../index.php");
exit();
?>
