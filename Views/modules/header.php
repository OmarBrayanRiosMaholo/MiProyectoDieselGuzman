<?php
require_once dirname(__FILE__, 3) . '/Config/config.php';
date_default_timezone_set(ZONA_HORARIA);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYSTEMNAME; ?></title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <!--<link rel="stylesheet" href="assets/extensions/select2/dist/css/select2.min.css">-->
    <link rel="stylesheet" href="assets/extensions/sweetalert2/sweetalert2.min.css">
    <!--<link rel="stylesheet" href="assets/extensions/choices.js/public/assets/styles/choices.css">-->
    <!-- DATATABLES -->
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">-->
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/buttons.bootstrap5.min.css">
    <!--<link rel="stylesheet" href="assets/js/extensions/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">-->
    <!--<link rel="shortcut icon" href="assets/img/logo/favicon.svg" type="image/x-icon">-->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <link rel="stylesheet" href="assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
    <div id="app">
        <?php require "sidebar.php" ?>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $_SESSION['nombre']; ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"> <?php echo $_SESSION['cargo']; ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/img/users/<?php echo $_SESSION['imagen']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header"><?php echo $_SESSION['nombre']; ?></h6>
                                    </li>
                                    <li><a class="dropdown-item" href="profile"><i
                                                class="icon-mid bi bi-person me-2"></i>
                                            Perfil</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="salir"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Salir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">