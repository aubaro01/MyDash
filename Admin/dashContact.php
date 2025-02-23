<?php

require '../Config/config.php';
require_once '../Config/db.php';
require '../models/funcs.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DB();

    if ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        deleteContact($db, $id);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacDash - Gestão de Contactos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="/assets/css/Style_dash.css">
    <link rel="shortcut icon" href="/assets/images/iconHead.png">
    <script src="/assets/js/navDash.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
</head>
<body>
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

    </div>
        <div class="container">
        <?php $db = new DB(); getContact($db);?>
    </div>
</section>
</body>
</html>