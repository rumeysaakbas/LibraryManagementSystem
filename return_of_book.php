<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<?php

    $prepare=$db->query("SELECT transactions.id, books.title, members.name, transactions.date_of_issue,
    transactions.book_id, member_id FROM transactions 
    INNER JOIN members ON transactions.member_id=members.id
    INNER JOIN books ON transactions.book_id=books.id 
    WHERE transactions.tag=0");

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
                        <th scope="col" >Üye Adı</th>
                        <th scope="col" >Kitap Adı</th>
                        <th scope="col" >Verilme Tarihi</th>
                        <th scope="col" >İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($prepare->fetchAll() as $data){ ?>
                        </tr>
                            <?php $id=$data['id']; $member_id=$data['member_id']; $book_id=$data['book_id']; ?>
                            <td><?php echo $i++; ?> </td>
                            <td> <?php echo $data['name'] ?> </td>
                            <td> <?php echo $data['title'] ?> </td>
                            <td> <?php echo $data['date_of_issue'];?>  </td>
                            <td> <a href="process.php?process=return_of_book&id=<?php echo $id;?>&member_id=<?php echo $member_id;?>&book_id=<?php echo $book_id?>" class="btn btn-primary">Kitabı Al</a> </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            

        <?php } else{echo "Verilmiş Kitap Bulunmamaktadır";} ?>
    </div>

</body>
</html>