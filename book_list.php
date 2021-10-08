<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<?php

    $prepare=$db->prepare("SELECT * FROM books ORDER BY title ASC");
    $prepare->execute();
    $i=1;
?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <div class="container mt-5">
        <?php if($prepare->rowCount()){ ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Kitap Adı</th>
                        <th scope="col" >Yazarı</th>
                        <th scope="col" >Yayın Evi</th>
                        <th scope="col" >Kategori</th>
                        <th scope="col" >Kitap Sayısı</th>
                        <th scope="col" ></th>
                        <th scope="col" >İşlem</th>
                        <th scope="col" ></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($prepare->fetchAll() as $book){ ?>
                        </tr>
                            <?php $id=$book['id']; ?>
                            <td><?php echo $i++; ?> </td>
                            <td><?php echo $book['title']  ?> </td>
                            <td><?php echo $book['author']  ?> </td>
                            <td><?php echo $book['publisher'];?>  </td>
                            <td><?php echo $book['category'];  ?></td>
                            <td><?php echo $book['book_count'];  ?></td>
                            <td>
                            <?php if( $book['book_count']>0){ ?>
                                <a onclick="lend(<?php echo $id; ?>)" class="btn btn-primary">Kitap Ver</a>
                            <?php } else{ 
                                echo "Kitap Okuyucuda";} ?> </td>
                            <td> <a href="update_book.php?id=<?php echo $id; ?>" class="btn btn-secondary">Güncelle</a> </td>
                            <td> <a onclick="func(<?php echo $id; ?>)" class="btn btn-danger">Sil</a> </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            

        <?php }else{echo "Kitap Bulunamadı";} ?>

    </div>
    <script type="text/javascript">
    
        function func(id){
            Swal.fire({
                icon: 'warning',
                title: '',
                text: 'Kitabı Silmek İstediğinizden Emin Misiniz?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil',
                cancelButtonText: 'Hayır'
            }).then((result) =>{
                if(result.isConfirmed){
                    window.location.href = 'process.php?process='+'dlt_book'+'&id='+id;
                }
            })
        }

        function lend(id){
            (async () => {
                const { value: uye_id } = await Swal.fire({
                title: 'Kitabı Verileceği Üye Numarası',
                input: 'text',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kitabı Ver',
                cancelButtonText: 'İptal'
                }) 
                if (uye_id) {
                window.location.href = 'process.php?process='+'lend_book'+'&member_id='+uye_id+'&id='+id;
                }
            })()
        }

    </script>
</body>
</html>
