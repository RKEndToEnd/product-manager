<?php
include "controllers/function.php";
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
    <link href="<?php echo main_url(); ?>resources/css/simple-datatables-style.css" rel="stylesheet"/>
    <link href="<?php echo main_url(); ?>resources/css/styles.css" rel="stylesheet"/>
    <script src="<?php echo main_url(); ?>resources/js/font-awesome-5-all.min.js" crossorigin="anonymous"></script>
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

    <body>
        <main>
            <div class="container py-4">
                <header class="pb-3 mb-4 border-bottom">
                    <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                        <span class="fs-4">System zarządzania produktami</span>
                    </a>
                </header>
            </div>
