
<?php require("header.php"); ?>
<?php include("menu.php"); ?>

<?php

    $prepare=$db->prepare("SELECT * FROM users ORDER BY name");
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
            <table class="table table-striped table-hover" style="">
                <thead>
                    <tr>
                        <th scope="col" ></th>
                        <th scope="col" >Görevli Adı</th>
                        <th scope="col" >Mail Adresi</th>
                        <th scope="col" >Telefon Numarası</th>
                        <th scope="col" >İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($prepare->fetchAll() as $u){ ?>
                        </tr>
                            <?php $id=$u['id']; ?>
                            <td><?php echo $i++; ?> </td>
                            <td><?php echo $u['name']  ?> </td>
                            <td><?php echo $u['email'];    ?>  </td>
                            <td><?php echo $u['tel_number'];  ?></td>
                            <td>
                            <?php if($u['name']==$_SESSION['user']){
                                echo "";}else{ ?>
                            <a onclick="func(<?php echo $id; ?>)" class="btn btn-danger">Sil</a>
                            <?php } ?> </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>

        <?php }else{echo "Kütüphane Sorumlusu Bulunamadı";} ?>
    </div>

    <script type="text/javascript">
    
        function func(id){
            Swal.fire({
                icon: 'warning',
                title: '',
                text: 'Kütüphane Sorumlusunu Silmek İstediğinizden Emin Misiniz?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil',
                cancelButtonText: 'Hayır'
            }).then((result) =>{
                if(result.isConfirmed){
                    window.location.href = 'process.php?process='+'dlt_user'+'&id='+id;
                }
            })
        }
    </script>

</body>
</html>