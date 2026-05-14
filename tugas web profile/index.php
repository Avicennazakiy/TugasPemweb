<?php
session_start(); // paling atas sebelum apapun
$hal = $_GET['hal'] ?? 'home';

// Halaman yang bisa diakses tanpa login
$publicPages = ['home', 'about', 'contact', 'login'];

if (!in_array($hal, $publicPages) && !isset($_SESSION['MEMBER'])) {
    header('Location: index.php?hal=login');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Web</title>
   <link href="css/bootstrap.min.css" rel="stylesheet" />
   <style>
.carousel-item {
    height: 300px;
}

.carousel-item img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}
</style>
</head>
<body class="d-flex flex-column min-vh-100">

<?php
include_once 'koneksi.php';
include_once 'models/Level.php';
include_once 'models/Studies.php';
include_once 'models/Member.php';
?>

<div class="container-fluid flex-grow-1">

  <div class="row">
    <div class="col-md-12">
      <?php include_once 'header.php'; ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <?php include_once 'menu.php'; ?>
    </div>
  </div>

  <br />

  <div class="row">
    <div class="col-md-4">
      <?php include_once 'sidebar.php'; ?>
    </div>

    <div class="col-md-8">
      <?php
      if ($hal == 'home') {
          include_once 'home.php';
      } elseif ($hal == 'about') {
          include_once 'about.php';
      } elseif ($hal == 'contact') {
          include_once 'contact.php';
      } elseif ($hal == 'login') {
          include_once 'login.php';
      } elseif ($hal == 'level_list') {
          include_once 'level_list.php';
      } elseif ($hal == 'level_form') {
          include_once 'level_form.php';
      } elseif ($hal == 'studies_form') {
          include_once 'studies_form.php';
      } elseif ($hal == 'studies_list') {
          include_once 'studies_list.php';
      } else {
          echo '<div class="alert alert-warning">Halaman tidak ditemukan.</div>';
      }
      ?>
    </div>
  </div>

</div>

<?php include_once 'footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>