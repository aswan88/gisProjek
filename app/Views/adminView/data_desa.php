<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>
<div class="container p-5">
    <div class="row justify-content-between">
        <div class="col-2">
            <h3>Data Desa</h3>
        </div>
        <div class="col-2">
            <a href="/admin/tambah_desa" class="btn btn-primary">+ Tambah</a>
        </div>
    </div>
    <!-- set flash data -->
    <?php if (session()->getFlashdata('pesanData')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesanData'); ?>
        </div>
    <?php elseif (session()->getFlashdata('pesanError')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('pesanError'); ?>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-hover" id="table_desa" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Desa</th>
                        <th scope="col">Latutude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Warna Poligon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $s = 1; ?>
                    <?php foreach ($dataDesa as $row) : ?>
                        <tr>
                            <th scope="row"><?= $s; ?></th>
                            <td><?= $row['nama_desa']; ?></td>
                            <td><?= $row['latitude']; ?></td>
                            <td><?= $row['longitude']; ?></td>
                            <td>
                                <div class="kotak" style="background-color: <?= $row['warna_poli']; ?>; width: 30px; height: 15px; "></div>
                                <?= $row['warna_poli']; ?>
                            </td>
                            <td>
                                <?php
                                foreach ($cekDataInfo as $data) {
                                    $id[] = $data['id_desa'];
                                }
                                ?>
                                <?php if (!empty($id)) : ?>
                                    <?php if (in_array($row['id_desa'], $id)) : ?>
                                        <a href="/admin/tambah_info/<?= $row['id_desa']; ?>" class="btn btn-warning text-white btn-circle btn-sm mb-2"><i class="fas fa-check"></i> Lengkapi Data</a>
                                    <?php else : ?>
                                        <a href="/admin/lihat/<?= $row['id_desa']; ?>" class="btn btn-success btn-circle btn-sm mb-2"><i class="fas fa-check"></i> Lihat</a>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <a href="/admin/lihat/<?= $row['id_desa']; ?>" class="btn btn-success btn-circle btn-sm mb-2"><i class="fas fa-check"></i> Lihat</a>
                                <?php endif; ?>
                                <a href="/admin/edit_desa/<?= $row['id_desa']; ?>" class="btn btn-secondary btn-circle btn-sm mb-2"> <i class="fas fa-edit"></i> Edit</a>
                                <a href="/admin/hapus_desa/<?= $row['id_desa']; ?>" class="btn btn-danger btn-circle btn-sm mb-2" onclick="return confirm('yakin akan menghapus data ini. ?')"> <i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php $s++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php include "template/footer.php"; ?>