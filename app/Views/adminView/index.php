<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>
<div class="container p-5">
    <div class="row mb-3">
        <div class="col-2">
            <h3>Dasboard</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                    <h5 class="card-title">Data Desa</h5>
                    <h5 class="card-text"><?= number_format($dataDesa); ?> Data</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                    <h5 class="card-title">Data Informasi Desa</h5>
                    <h5 class="card-text"><?= number_format($dataInfo); ?> Data</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                    <h5 class="card-title">Data Admin</h5>
                    <h5 class="card-text"><?= number_format($dataAdmin); ?> Data</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "template/footer.php"; ?>