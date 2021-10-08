<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<?php
        
    if($_GET) {
        $id= $_GET['id'];

        $query=$db->prepare("SELECT * FROM members WHERE id=?");
        $query->execute(array("$id"));
        if($query->rowCount()){
            $member=$query->fetch();
            $name = $member["name"];
            $email = $member["email"];
            $tel = $member["tel_number"];
        }
        $query=NULL;
    }

?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        label{
            width:150px;
        }
        input, button{
            width:250px;
        }
    </style>
</head>
<body>
    <div class="conteiner">
        <div class="row">
            <form action="process.php?process=update_member&id=<?php echo $id;?>" method="post" class="position-absolute top-50 start-50 translate-middle" style="width: 500px; height: 300px;"> 
                <label>Üyenin Adı Soyadı</label><input class="mb-2 rounded text-center"  type="text" name="name" value="<?php echo $name; ?>"  required /><br>
                <label>Mail Adresi</label><input class="mb-2 rounded text-center" type="email" name="email" value="<?php echo $email; ?>"  required /><br>
                <label>Telefon Numarası</label><input class="mb-2 rounded text-center" maxlength="11" type="tel" name="tel" value="<?php echo $tel; ?>"  required /><br>
                <label></label><button class="btn btn-primary mt-2 rounded text-center" name="update_btn">Üye Bilgilerini Güncelle</button>
            </form>

        </div>
    </div>

</body>
</html>