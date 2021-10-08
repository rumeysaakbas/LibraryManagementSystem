
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <title>Kütüphane Kayıt Sistemi</title>
    <style>
        label, a{
            width:150px;
            color:black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="process.php?process=sign_up" method="post" class="position-absolute top-50 start-50 translate-middle " style="width: 500px; height: 300px;">
                <label>Ad Soyad</label><input class="mb-2 rounded text-center"  type="text" name="name" value="" required />
                <label>Mail Adresi</label><input class="mb-2 rounded text-center" type="email" name="email" value="" required />
                <label>Telefon Numarası</label><input class="mb-2 rounded text-center" type="tel" name="tel" maxlength="11" value="" placeholder="0xxxxxxxxxx" required />
                <label>Şifre Oluşturun</label><input class="mb-2 rounded text-center" type="password" name="password" value="" required />
                <label></label><button class="mb-2 rounded text-center" value="kayit" name="button" style="width:300px;" >Kaydol</button> <br>
                <label></label><a class="text-decoration-none text-black" style="margin-left:90px;" href="index.php">Kaydınız var mı?</a>
            </form>
        </div>
    </div>

    
    <script src="bootstrap/bootstrap.js"></script>
    </body>
</html>