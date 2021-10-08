<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<?php

    $prepare=$db->prepare("SELECT * FROM members ORDER BY id DESC");
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
                        <th scope="col" >Üye Numarası</th>
                        <th scope="col" >Üye Adı</th>
                        <th scope="col" >Mail Adresi</th>
                        <th scope="col" >Telefon Numarası</th>
                        <th scope="col" >İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($prepare->fetchAll() as $m){ ?>
                        </tr>
                            <?php $id=$m['id']; ?>
                            <td><?php echo $i++; ?> </td>
                            <td><?php echo $m['id']  ?> </td>
                            <td><?php echo $m['name']  ?> </td>
                            <td><?php echo $m['email'];    ?>  </td>
                            <td><?php echo $m['tel_number'];  ?></td>
                            <td> <a onclick="func(<?php echo $id; ?>)" class="btn btn-danger">Sil</a> </td>
                            <td> <a href="update_member.php?id=<?php echo $id; ?>" class="btn btn-secondary">Güncelle</a> </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            

        <?php }else{echo "Üye Bulunamadı";} ?>
    </div>

    <script type="text/javascript">
    
        function func(id){
            Swal.fire({
                icon: 'warning',
                title: '',
                text: 'Üyeyi Silmek İstediğinizden Emin Misiniz?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil',
                cancelButtonText: 'Hayır'
            }).then((result) =>{
                if(result.isConfirmed){
                    window.location.href = 'process.php?process='+'dlt_member'+'&id='+id;
                }
            })
        }
    </script>

</body>
</html>
