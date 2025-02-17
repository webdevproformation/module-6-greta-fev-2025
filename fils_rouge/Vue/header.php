<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titre ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="public/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="public/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="public/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="public/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="public/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="public/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="public/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="public/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="public/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="public/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="public/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/favicon/favicon-16x16.png">
    <link rel="manifest" href="public/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="public/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="public/style.css" rel="stylesheet" >
  </head>
  <body>
    <header class="bg-light mb-4 sticky-top">
        <nav class="navbar navbar-expand navbar-light container">
            <span class="navbar-brand">
                <a href="<?php echo URL ?>" class="nav-link">
                    <img src="public/logo.jpg" alt="" width="60" class="img-thumbnail">
                </a>
            </span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo URL ?>" class="nav-link">Home</a>
                </li>
                <?php if( !isset($_SESSION["user"]) ) : ?>
                 <li class="nav-item">
                    <a href="<?php echo URL ?>?page=inscription" class="nav-link">Inscription</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URL ?>?page=connexion" class="nav-link">Connexion</a>
                </li>
                <?php endif ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if( isset($_SESSION["user"]) ) : ?>
                <li class="nav-item">
                    <a href="<?php echo URL ?>?page=admin/dashboard" class="nav-link">Back Office</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URL ?>?page=deconnexion" class="nav-link">Déconnexion</a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </header>  
    