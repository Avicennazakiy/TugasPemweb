<div class="container px-5 my-5">
    <h3>Form Level Sekolah</h3>

    <form method="POST" action="controller/levelController.php">

        <div class="form-floating mb-3">
            <input class="form-control" name="nama" id="namaLevel" type="text" placeholder="Nama Level" required />
            <label for="namaLevel">Nama Level</label>
        </div>

        <div class="text-center">
            <button class="btn btn-primary" name="proses" type="submit" value="simpan">
                Simpan
            </button>
            <a href="index.php?hal=level_list" class="btn btn-info">
                Kembali
            </a>
        </div>

    </form>
</div>
