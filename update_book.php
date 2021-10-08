
<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<?php   
    if($_GET) {
        $id= $_GET['id'];

        $query=$db->prepare("SELECT * FROM books WHERE id=?");
        $query->execute(array("$id"));
        if($query->rowCount()){
            $book=$query->fetch();
            $title = $book["title"];
            $author = $book["author"];
            $publisher = $book["publisher"];
            $category = $book["category"];
            $count = $book["book_count"];
        }
        $query=NULL;
    }
    ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kütüphane Kayıt Sistemi</title>
    <style>
        label{
            width:150px;
            color:black;
        }
        input, button{
            width:250px;
        }
    </style>
</head>
<body>
    <div class="conteiner">
        <div class="row">
            <form action="process.php?process=update_book&id=<?php echo $id;?>" method="post" class="position-absolute top-50 start-50 translate-middle" style="width: 500px; height: 300px;"> 
                <label>Kitabın Adı</label><input class="mb-2 rounded text-center"  type="text" name="title" value="<?php echo $title; ?>"  required /><br>
                <label>Yazarı</label><input class="mb-2 rounded text-center" type="text" name="author" value="<?php echo $author; ?>"  required /><br>
                <label>Yayın Evi</label><input class="mb-2 rounded text-center" type="text" name="publisher" value="<?php echo $publisher; ?>"  required /><br>
                <label>Kategori</label><input class="mb-2 rounded text-center" type="text" name="category" value="<?php echo $category; ?>"  required /><br>
                <label>Kitap Sayısı</label><input class="mb-2 rounded text-center" type="text" name="count" value="<?php echo $count; ?>"  required /><br>
                <label></label><button class="btn btn-primary mt-2 rounded text-center" name="update_btn" class="">Kitap Bilgilerini Güncelle</button>
            </form>
            
        </div>
    </div>
</body>
</html>