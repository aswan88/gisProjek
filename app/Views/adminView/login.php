<?php include "template/header.php"; ?>
<!-- login -->
</head>
<style>
    body {
        background-image: url(../admin-assets/bg.jpg);
        background-size: cover;
    }
</style>

<body>
    <section id="loginAdmin" class="loginAdmin">
        <div class="row justify-content-center ">
            <div class="col-md-3 shadow-sm p-3 mb-5 mt-5 bg-white rounded">
                <h5 class="text-info">login Admin.!</h5>
                <hr>
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
                <form action="/admin/loginProses" method="POST">
                    <div class="form-group">
                        <label for="username" class="float-left text-secondary">Username : </label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="Masukan username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="float-left text-secondary">Password : </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="loginAdmin" class="btn btn-primary" style="width: 100%;">login.!</button>
                </form>
            </div>
        </div>
    </section>

    <?php include "template/footer.php"; ?>