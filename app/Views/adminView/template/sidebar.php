</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-warning">
        <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>

        <a class="navbar-brand" href="#">
            SISTEM INFORMASI GEOGRAFI
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <?= $username; ?> <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" onclick="return confirm('Yakin Akan Keluar.?')" href="/admin/logoutAdmin">logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex bg-light">
        <nav class="sidebar bg-dark">
            <div class="row justify-content-center pt-4">
                <h4 class="text-white"> NAVIGASI</h4>
            </div>
            <hr>
            <ul class="list-unstyled text-justify">
                <li><a href="/admin"><i class="fa fa-fw fa-home"></i> Dasboard</a></li>
                <li><a href="/admin/desa"><i class="fa fa-fw fa-book"></i>Data Data desa</a></li>
                <li><a href="/admin/viewAdmin"><i class="fa fa-fw fa-users"></i>Data Admin</a></li>
            </ul>
        </nav>