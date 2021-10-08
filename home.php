<?php require("header.php"); ?>
<?php include("menu.php"); ?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title></title>
    <style>
        .box{
            width:200px;
            height:125px;
            background-color:#899bb1;
            opacity:1;
            text-align:center;
            color:black;
            font-weight:bold;
            padding:0px;
            border: 2px solid rgb(44, 44, 44);
        }
        .box:hover{
            opacity:0.9;
        }
        label{
            width:200px;
        }
        input{
            width:250px;
        }
        .icons{
            height:25px;
            weight:25px;
            font-weight:bold;
        }
        a:hover{
            color:black;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row mt-5 justify-content-center">
            <a type="button" href="search_book.php" class="box mr-2 mt-5 text-decoration-none" style="padding:40px;"><span><img class="icons" src="icons/search.svg"> Kitap Ara</span></a>
            <a type="button" href="return_of_book.php" class=" box ml-2 mr-2 mt-5 text-decoration-none" style="padding:36px;"><span><img class="icons" src="icons/journal-bookmark.svg"> Kitap Geri Al</span></a>
            <button type="button" data-toggle="modal" data-target="#book" class="box ml-2 mr-2 mt-5"><img class="icons" src="icons/journal-plus.svg"> Kitap Ekle</button>
        </div>
        <div class="row justify-content-center">
            <a type="button" href="book_list.php" class="box ml-2 mt-5 mr-2 text-decoration-none " style="width:240px; padding:35px;"><span><img class="icons" src="icons/journal-text.svg"> Kitap Listesi/ Kitap Ver</span></a>
            <button type="button" data-toggle="modal" data-target="#category" class="box mt-5 ml-2" style="width:240px;"><img class="icons" src="icons/justify.svg">Kategoriler</button>    
        </div>
        <div class="row justify-content-center">
            <button type="button" data-toggle="modal" data-target="#member" class="box ml-2 mr-2 mt-5"><img class="icons" src="icons/person-plus.svg"> Üye Ekle</button>
            <a type="button" href="member_list.php" class="box ml-2 mt-5 mr-2 text-decoration-none " style="padding:40px;"><span><img class="icons" src="icons/people.svg">Üye Listele</span></a>
            <a type="button" href="users.php" class="box ml-2 mt-5 text-decoration-none " style="padding:40px;"><span><img class="icons" src="icons/people.svg">Görevliler</span></a>
        </div>



<!--------------------------------------------------------------------- üye ekleme modal --------------------------------------------------------------------------->
        <div class="modal fade" id="member" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="process.php?process=add_member" method="post">    
                        <div class="modal-header">
                            <h3 class="modal-title mx-auto">Üye Ekleme</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group"></div>
                            <label>Ad Soyad:</label> <input class="mb-2 rounded text-center"  type="text" name="name" value=""  required /> <br>
                            <label>Mail Adresi:</label> <input class="mb-2 rounded text-center" type="email" name="email" value=""  required /> <br>
                            <label>Telefon Numarası:</label> <input class="mb-2 rounded text-center" type="tel" name="tel" value="" maxlength="11" placeholder="0xxxxxxxxxx"  required /> <br>
                        </div>
                        <div class="modal-footer mr-2">
                            <button class="btn btn-success" name="add_member">Kaydet</button>
                            <button class="btn btn-danger" data-dismiss="modal" >Kapat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


<!---------------------------------------------------------------------- kitap ekleme modal --------------------------------------------------------------------------->
        <div class="modal fade" id="book" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="process.php?process=add_book" method="post">    
                        <div class="modal-header">
                            <h3 class="modal-title mx-auto">Kitap Ekleme</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group"></div>
                            <label>Kitap Adı:</label> <input class="mb-2 rounded text-center"  type="text" name="title" value=""  required /> <br>
                            <label>Yazarı:</label> <input class="mb-2 rounded text-center" type="text" name="author" value=""  required /> <br>
                            <label>Yayın Evi:</label> <input class="mb-2 rounded text-center" type="text" name="publisher" value=""  required /> <br>
                            <label>Kategori:</label> <input class="mb-2 rounded text-center" type="text" name="category" value=""  required /> <br>
                            <label>Eklenen Kitap Sayısı:</label> <input class="mb-2 rounded text-center" type="text" name="book_count" value=""  required /> <br>
                        </div>

                        <div class="modal-footer mr-2">
                            <button class="btn btn-success" name="add_book">Kaydet</button>
                            <button class="btn btn-danger" data-dismiss="modal" >Kapat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!---------------------------------------------------------------------- kategori modal --------------------------------------------------------------------------->
        <div class="modal fade" id="category" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">  
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto">Kitap Kategorileri</h5>
                    </div>
                    <div class="modal-body">

                    <?php
                    $prepare=$db->prepare("SELECT category, SUM(book_count) FROM books GROUP BY category;");
                    $prepare->execute();
                    $i=1;
                    ?>

                    <?php if($prepare->rowCount()){ ?>
                        <table class="table table-striped table-hover" style="">
                            <thead>
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col" >Kategori</th>
                                    <th scope="col" >Kitap Sayısı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($prepare->fetchAll() as $c){ ?>
                                    </tr>
                                        <td><?php echo $i++; ?> </td>
                                        <td><?php echo $c['category']  ?> </td>
                                        <td><?php echo $c['SUM(book_count)']; ?>  </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer mr-2">
                        <button class="btn btn-danger" data-dismiss="modal" >Kapat</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>