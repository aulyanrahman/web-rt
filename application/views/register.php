<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Daftar</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">DAFTAR SISFO RT</h1>
                                        <?= $this->session->flashdata('pesan') ?>
                                    </div>
                                    <form method="post" action="<?= base_url('register/add_users') ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Username Anda" name="username">
                                                <?= form_error('username', '<div class="text-danger small ml-3">',
                                                '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Email Anda" name="email">
                                                <?= form_error('email', '<div class="text-danger small ml-3">',
                                                '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password Anda" name="password">
                                                <?= form_error('password', '<div class="text-danger small ml-3">',
                                                '</div>') ?>
                                        </div>
                                        <input type="hidden" name="level" value="warga">
                                        <button class="btn btn-primary btn-user btn-block">DAFTAR</button>
                                        <a href="<?= base_url() ?>" class="btn btn-success btn-user btn-block mt-3">HOME</a>
                                        <div class="text-center">
                                            <h1 class="h6 text-gray-900 mb-4 mt-4">Sudah punya akun? <a href="<?= base_url('auth') ?>" class="h6 text-priumary-900 mb-4 mt-4">Login!</a> </h1>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>