<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/style.css">
    <script src="./../../js/script.js"></script>
    <title>Aluraplay</title>
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= $base_url ?>home/index" class="nav-link px-2 text-secondary">Home</a></li>
                </ul>

                <div class="text-end">
                    <span><?= $_SESSION['usuario']->getNome() ?? "" ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-light me-2"
                    onclick="location.href = '<?= $base_url ?>login/logout'">Logout</button>
                </div>
            </div>
        </div>
    </header>
    <main class="container pt-3">
        <div class="row">