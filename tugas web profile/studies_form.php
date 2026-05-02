<?php
if (!class_exists('Studies')) {
    include_once 'models/Studies.php';
}

$obj = new Studies();
$level = $obj->getLevel();
?>

<h3>Form Data Pendidikan</h3>

<form method="POST" action="controller/studiesController.php" enctype="multipart/form-data">

    <div class="mb-3">
        <label>Nama Sekolah</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Level</label>
        <select name="idlevel" class="form-control" required>
            <option value="">-- Pilih Level --</option>
            <?php foreach($level as $l){ ?>
                <option value="<?= $l['id'] ?>"><?= $l['nama'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" class="form-control">
    </div>

    <div class="mb-3">
        <label>Foto Sekolah</label>
        <input type="file" name="foto_sekolah" class="form-control" required>
    </div>

    <button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>
    <a href="index.php?hal=studies_list" class="btn btn-secondary">Kembali</a>

</form>
