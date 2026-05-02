<?php
include_once '../koneksi.php';

$proses = $_POST['proses'] ?? $_GET['proses'] ?? '';

// SIMPAN
if ($proses == "simpan") {

    $nama        = $_POST['nama'];
    $idlevel     = $_POST['idlevel'];
    $keterangan  = $_POST['keterangan'];
    $tahun_lulus = $_POST['tahun_lulus'];

    // Upload foto
    $foto = '';
    if (isset($_FILES['foto_sekolah']) && $_FILES['foto_sekolah']['error'] == 0) {

        $namaFile   = $_FILES['foto_sekolah']['name'];
        $tmpFile    = $_FILES['foto_sekolah']['tmp_name'];
        $ukuran     = $_FILES['foto_sekolah']['size'];

        // Validasi ekstensi
        $ekstensi      = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $ekstensiAllow = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ekstensi, $ekstensiAllow)) {
            die('<script>alert("Format file tidak didukung! Gunakan jpg/jpeg/png/gif"); history.back();</script>');
        }

        // Validasi ukuran maksimal 2MB
        if ($ukuran > 2 * 1024 * 1024) {
            die('<script>alert("Ukuran file terlalu besar! Maksimal 2MB"); history.back();</script>');
        }

        // Nama file unik agar tidak tertimpa
        $foto   = time() . '_' . $namaFile;
        $folder = "../uploads/";

        // Buat folder jika belum ada
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        move_uploaded_file($tmpFile, $folder . $foto);
    }

    $sql = "INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus, foto_sekolah) 
            VALUES (?, ?, ?, ?, ?)";
    $ps = $dbh->prepare($sql);
    $ps->execute([$nama, $idlevel, $keterangan, $tahun_lulus, $foto]);

    header('Location: ../index.php?hal=studies_list');
    exit;
}

// DELETE
if ($proses == "hapus" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama foto dulu sebelum dihapus
    $sqlFoto = "SELECT foto_sekolah FROM studies WHERE id=?";
    $psFoto  = $dbh->prepare($sqlFoto);
    $psFoto->execute([$id]);
    $dataFoto = $psFoto->fetch(PDO::FETCH_ASSOC);

    // Hapus file foto dari folder uploads
    if (!empty($dataFoto['foto_sekolah'])) {
        $filePath = "../uploads/" . $dataFoto['foto_sekolah'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Hapus dari database
    $sql = "DELETE FROM studies WHERE id=?";
    $ps  = $dbh->prepare($sql);
    $ps->execute([$id]);

    header('Location: ../index.php?hal=studies_list');
    exit;
}