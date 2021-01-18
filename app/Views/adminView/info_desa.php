<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>
<div class="container p-5">
    <div class="row justify-content-between">
        <div class="col-2">
            <h3>Data Desa</h3>
        </div>
        <div class="col-2">
            <a href="/admin/desa" class="btn btn-success">
                <- Kembali</a> </div> </div> <div class="row mt-3">
        </div>
        <!-- set flash data -->
        <?php if (session()->getFlashdata('pesanData')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesanData'); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-hover" id="table_desa" width="100%" cellspacing="0">
                <tbody class="text-left">
                    <?php foreach ($infoDesa as $row) : ?>

                        <tr>
                            <th scope="row">Nama Desa</th>
                            <th scope="row"><?= $row['nama_desa']; ?></th>
                        </tr>
                        <tr>
                            <th scope="row">Luas Wilayah</th>
                            <th scope="row"><?= $row['luas_wilayah']; ?> M<sup>2</sup></th>
                        </tr>
                        <tr>
                            <th scope="row">Jumlah Penduduk</th>
                            <th scope="row"><?= $row['jumlah_pend']; ?> KK</th>
                        </tr>
                        <tr>
                            <th scope="row">Info Lengkap</th>
                            <td class="w-50"><?= $row['info_lengkap']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Aksi</th>
                            <td>
                                <a href="/admin/editInfo/<?= $row['id_info']; ?>/<?= $row['id_desa']; ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "template/footer.php"; ?>