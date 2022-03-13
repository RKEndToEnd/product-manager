<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Magazyn produktów</title>
    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link type="text/css" href="<?php echo main_url(); ?>resources/css/simple-datatables-style.css" rel="stylesheet"/>
    <link type="text/css" href="<?php echo main_url(); ?>resources/css/styles.css" rel="stylesheet"/>
    <script type="text/javascript" src="<?php echo main_url(); ?>resources/js/font-awesome-5-all.min.js" crossorigin="anonymous"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>-->

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="" sizes="180x180">
    <link rel="icon" href="" sizes="32x32" type="image/png">
    <link rel="icon" href="" sizes="16x16" type="image/png">
    <link rel="manifest" href="">
    <link rel="mask-icon" href="" color="#7952b3">
    <link rel="icon" href="">
    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<?php

if (is_user_login())
{
?>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.php">Magazyn</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile.php">Konto</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout.php">Wyloguj się</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="products.php">Produkty</a>
                        <a class="nav-link" href="product-categories.php">Kategorie produktów</a>
                        <hr class="divider" />
                        <a class="nav-link" href="logout.php">Wyloguj się</a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
<?php
}else{

?>
    <body>
        <main>
            <div class="container py-4">
                <header class="pb-3 mb-4 border-bottom">
                    <a href="../index.php" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">System zarządzania produktami</span>
                    </a>
                </header>
            </div>
<?php
}
?>
