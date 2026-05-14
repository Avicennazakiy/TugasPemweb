<?php
include_once '../koneksi.php';

$proses = $_POST['proses'];

if ($proses == "simpan") {

    $nama = $_POST['nama'];

    // simpan ke database (tabel level)
    $sql = "INSERT INTO level (nama) VALUES (?)";
    $ps = $dbh->prepare($sql);
    $ps->execute([$nama]);

    header('Location: ../index.php?hal=level_list');
    exit;
}

// DELETE
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM level WHERE id=?";
    $ps = $dbh->prepare($sql);
    $ps->execute([$id]);

    header('Location: ../index.php?hal=level_list');
    exit;
}
