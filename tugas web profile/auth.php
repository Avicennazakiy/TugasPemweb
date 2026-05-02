<?php
// Tidak perlu session_start() karena sudah di index.php
if (!isset($_SESSION['MEMBER'])) {
    header('Location: index.php?hal=login');
    exit;
}