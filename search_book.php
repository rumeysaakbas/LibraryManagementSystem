<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <div class="container mt-5" >
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="d-flex mt-5 mx-auto" style="width:500px;">
                <input class="rounded text-center" name="search" type="search" style="width:325px;" placeholder="Kitap Adı veya Yazar Adı Arayın">
                <button class= "btn btn-primary" name="btn"  type="submit" style="width:125px;" >Ara</button>
            </form>

            <?php
            if(isset($_GET['btn'])){
                $i=1;
                $search=$_GET['search'];
                $prepare = $db->query("SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'");

                if($prepare->rowCount()){ ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" >#</th>
                            <th scope="col" >Kitap Adı</th>
                            <th scope="col" >Yazarı</th>
                            <th scope="col" >Yayın Evi</th>
                            <th scope="col" >Kategori</th>
                            <th scope="col" >Kitap Sayısı</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($prepare->fetchAll() as $book){ ?>
                            </tr>
                                <td><?php echo $i++; ?> </td>
                                <td><?php echo $book['title']  ?> </td>
                                <td><?php echo $book['author']  ?> </td>
                                <td><?php echo $book['publisher'];?>  </td>
                                <td><?php echo $book['category'];  ?></td>
                                <td><?php echo $book['book_count'];  ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                

            <?php }else{?>
                <label class="text-center mt-5" style="width:block;"> <?php echo "Kitap Bulunamadı";}?> </label>
    <?php } $prepare=NULL; ?>
        </div>
    </div>



    <script src="bootstrap/bootstrap.js"></script>
</body>
</html>