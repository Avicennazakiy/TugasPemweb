<?php include_once 'auth.php'; ?>
<?php
$obj_level = new Level();
$rs = $obj_level->index();

$ar_judul = ['NO', 'LEVEL', 'AKSI'];
?>

<h3>Daftar Jenjang/Level Sekolah</h3>
<a href="index.php?hal=level_form" class="btn btn-primary mb-3">Tambah</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <?php foreach ($ar_judul as $jdl) { ?>
                <th><?= $jdl ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($rs as $level) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($level['nama']) ?></td>
                <td>
                    <a href="controller/levelController.php?proses=hapus&id=<?= $level['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus data?')">
                        <i class="bi bi-trash"></i> Hapus
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>