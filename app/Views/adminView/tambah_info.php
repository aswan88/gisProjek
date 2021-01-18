<?php include "template/header.php"; ?>
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

<?php include "template/sidebar.php"; ?>
<div class="container p-5">
    <div class="row mb-3">

        <h3>Tambah Ind Data Desa</h3>


    </div>

    <form action="/admin/save_info" method="post">
        <div class="form-group row">
            <label for="nama_desa" class="col-form-label font-weight-bold ">Nama Desa <span class="text-danger">*</span></label>
        </div>
        <div class="form-group row">
            <input type="text" class="form-control w-100" id="nama_desa" name="nama_desa" value="<?= $dataDesa['nama_desa']; ?>" readonly>
            <!-- ambil id desa -->
            <input type="hidden" name="id_desa" value="<?= $dataDesa['id_desa']; ?>">
        </div>

        <div class="form-group row">
            <label for="luas_wilayah" class="col-form-label font-weight-bold ">Luas Wilayah <span class="text-danger">*</span></label>
        </div>
        <div class="form-group row">
            <input type="text" class="form-control w-100" id="luas_wilayah" name="luas_wilayah" placeholder="luas_wilayah" required>
        </div>

        <div class="form-group row">
            <label for="jumlah_pend" class="col-form-label font-weight-bold ">Jumlah Penduduk <span class="text-danger">*</span></label>
        </div>
        <div class="form-group row">
            <input type="text" class="form-control w-100" id="jumlah_pend" name="jumlah_pend" placeholder="jumlah_pend" required>
        </div>
        <div class="form-group row">
            <label for="info_lengkap" class="col-form-label font-weight-bold ">Informasi lengkap <span class="text-danger">*</span></label>
        </div>
        <div class="form-group row">
            <textarea name="info_lengkap" id="info_lengkap" style="width: 100vw;"></textarea>
        </div>
        <div class="form-group row float-right">
            <a href="/admin/desa" class="btn btn-secondary mr-3">Kembali</a>
            <button type="submit" name="submit" class="btn btn-primary ">Simpan </button>
        </div>
    </form>

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
<script>
    new FroalaEditor('#info_lengkap', {
        width: 1000
    })
</script>
<?php include "template/footer.php"; ?>