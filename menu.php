<?php session_start(); ?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <title> Kütüphane Kayıt Sistemi </title>
    <style>

    </style>
</head>
<body>
    <ul class="nav" style="background-color:rgb(48,48,48);">
        <li class="nav-item">
            <a class="nav-link text-white ms-3" aria-current="page" href="home.php">ANA SAYFA</a>
        </li>
        <div class="vr text-white"></div>
        <li class="nav-item">
            <a class="nav-link text-white" href="search_book.php">Kitap Ara</a>
        </li>
        <div class="vr text-white"></div>
        <li class="nav-item">
            <a class="nav-link text-white" href="return_of_book.php">Kitap Geri Al</a>
        </li>
        <div class="vr text-white"></div>
        <li class="nav-item">
            <a class="nav-link text-white" href="book_list.php">Kitap Listesi/Kitap Ver</a>
        </li>
        <div class="vr text-white"></div>
        <li class="nav-item">
            <a class="nav-link text-white" href="member_list.php">Üye Listesi</a>
        </li>
        <li class="nav-item position-absolute top-0 end-0">
            <a class="nav-link text-white" type="button" href="process.php?process=exit" ><?php echo $_SESSION['user']; ?> <div class="vr">  </div> Çıkış </a>
        </li>

    </ul>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="bootstrap/bootstrap.js"></script>
</body>
</html>