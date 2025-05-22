<?php

if (session_status() == PHP_SESSION_NONE) {
   
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_strict_mode', 1);
    session_start();
}

$inactivityLimit = 1800; 

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactivityLimit) {
    session_unset();
    session_destroy();
    header("Location: ../public/index.php");
    exit();
}
$_SESSION['last_activity'] = time();
?>