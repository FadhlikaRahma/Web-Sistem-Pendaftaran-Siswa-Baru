<nav class="navbar navbar-expand-lg text-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-white" href="#">
            <img src="../image/tk.png" alt="Logo" width="30" class="d-lg-inline-block d-md-inline-block d-none align-text-top text-white"> TK Pamardisiwi Muja Muju</a>
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span><i class="bi bi-person-fill"></i> Akun </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
            <?php foreach( $user as $row)  : ?>
            <h6 class="me-3 ms-3 fw-bold">Selamat Datang <?= $row["username"] ?></h6>
            <?php endforeach ?>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalGantiPassword">
                    <i class="bi bi-gear-fill"></i></i> Ubah Password</a>
                </li>
                <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-power"></i> Log Out</a></li>
            </ul>
        </div>
    </nav>