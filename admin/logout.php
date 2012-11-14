<?php
session_start();
unset($_SESSION['adminID']);
unset($_SESSION['rID']);
session_destroy();
header("Location: index.php?cmd=1&err=6");
exit;
?>