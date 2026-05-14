<?php
if (!class_exists('Studies')) {
    include_once 'models/Studies.php';
}

$obj   = new Studies();
$level = $obj->getLevel();

// Cek apakah mode edit (ada parameter id di URL)
$id   = $_GET['id'] ?? null;
$data = null;
if ($id) {
    $data = $obj->getById($id);
}

$isEdit = $data !== null;
?>

<h3><?= $isEdit ? 'Edit' : 'Form' ?> Data Pendidikan</h3>

<form method="POST" action="controller/studiesController.php" enctype="multipart/form-data">

    <!-- Hidden fields untuk mode edit -->
    <?php if ($isEdit) { ?>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="hidden" name="foto_lama" value="<?= $data['foto_sekolah'] ?>">
    <?php } ?>

    <div class="mb-3">
        <label>Nama Sekolah</label>
        <input type="text" name="nama" class="form-control" required
               value="<?= $isEdit ? htmlspecialchars($data['nama']) : '' ?>">
    </div>

    <div class="mb-3">
        <label>Level</label>
        <select name="idlevel" class="form-control" required>
            <option value="">-- Pilih Level --</option>
            <?php foreach ($level as $l) { ?>
                <option value="<?= $l['id'] ?>"
                    <?= ($isEdit && $data['idlevel'] == $l['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($l['nama']) ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"><?= $isEdit ? htmlspecialchars($data['keterangan']) : '' ?></textarea>
    </div>

    <div class="mb-3">
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" class="form-control"
               value="<?= $isEdit ? htmlspecialchars($data['tahun_lulus']) : '' ?>">
    </div>

    <div class="mb-3">
        <label>Foto Sekolah <?= $isEdit ? '<small class="text-muted">(kosongkan jika tidak ingin mengubah foto)</small>' : '' ?></label>
        <input type="file" name="foto_sekolah" class="form-control"
               <?= $isEdit ? '' : 'required' ?>>

        <!-- Preview foto lama saat mode edit -->
        <?php if ($isEdit && !empty($data['foto_sekolah'])) { ?>
            <div class="mt-2">
                <small class="text-muted">Foto saat ini:</small><br>
                <img src="uploads/<?= $data['foto_sekolah'] ?>" 
                     width="100" height="100" 
                     style="object-fit: cover; border-radius: 5px; margin-top: 5px;">
            </div>
        <?php } ?>
    </div>

    <!-- Tombol submit berbeda tergantung mode -->
    <button type="submit" name="proses" value="<?= $isEdit ? 'update' : 'simpan' ?>" 
            class="btn btn-primary">
        <?= $isEdit ? 'Update' : 'Simpan' ?>
    </button>
    <a href="index.php?hal=studies_list" class="btn btn-secondary">Kembali</a>

</form>