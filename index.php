
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <title>Kütüphane Kayıt Sistemi</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="process.php?process=login" method="post" class="position-absolute top-50 start-50 translate-middle " style="width:310px; height:275px;">
                <input class="mb-2 rounded text-center"  type="text" name="name" value="" placeholder="Adınız" required />
                <input class="mb-2 rounded text-center" type="password" name="password" value="" placeholder="Şifreniz" required />
                <button class="mb-2 rounded text-center" value="kayit" name="button" class="">Giriş Yap</button> <br>
                <a class="text-decoration-none text-black" style="margin-left:70px;" href="sign_up.php">Kayıt olmak için tıklayın</a>
            </form>
        </div>
    </div>

    <script src="bootstrap/bootstrap.js"></script>

</body>
</html>

