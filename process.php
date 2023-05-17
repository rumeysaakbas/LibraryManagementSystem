<?php session_start(); ?>
<?php require("header.php"); ?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title></title>
</head>
<body>
<?php

$title='Bir Hata Oluştu, Tekrar Deneyin';
$icon='error';
if(isset($_GET['process']) && isset($_GET['id'])){
    $id = $_GET['id'];
    switch($_GET['process']){
        //// kitap sil ////
        case 'dlt_book':
            $prepare=$db->prepare("DELETE FROM books WHERE id=?");
            $result=$prepare->execute(array("$id"));
            if($result){
                $title='Kitap Silindi';
                $icon='success';
            }
            $target='book_list.php';
            break;
        //// kitap güncelle ////    
        case 'update_book':
            $new_title=$_POST['title'];
            $new_author=$_POST['author'];
            $new_publisher=$_POST['publisher'];
            $new_category=$_POST['category'];
            $new_count=$_POST['count'];
    
            $prepare=$db->prepare("UPDATE books SET title=?, author=?, publisher=?, category=?, book_count=? WHERE id=?");
            $result=$prepare->execute(array($new_title, $new_author, $new_publisher, $new_category, $new_count, $id));
            if($result){
                $title='Kitap Güncellendi';
                $icon='success';
            }
            $target='book_list.php';
            break;
        //// üye sil ////
        case 'dlt_member':
            $prepare=$db->prepare("DELETE FROM members WHERE id=?");
            $result=$prepare->execute(array("$id"));
            if($result){
                $title='Üye Silindi';
                $icon='success';
            }
            $target='member_list.php';
            break;
        //// üye güncelle ////
        case 'update_member':
            $new_name=$_POST['name'];
            $new_email=$_POST['email'];
            $new_tel=$_POST['tel'];

            $prepare=$db->prepare("UPDATE members SET name=?, email=?, tel_number=? WHERE id=?");
            $result=$prepare->execute(array($new_name, $new_email, $new_tel, $id));
            if($result){
                $title='Üye Güncellendi';
                $icon='success';
            }
            $target='member_list.php';
            break;
        //// görevli sil ////
        case 'dlt_user':
            $prepare=$db->prepare("DELETE FROM users WHERE id=?");
            $result=$prepare->execute(array($id));
            if($result){
                $title='Kütüphane Sorumlusu Silindi';
                $icon='success';
            }
            $target='users.php';
            break;
        //// kitap ver ////
        case 'lend_book':
            $member_id=$_GET['member_id']; //$id=book_id
            $query=$db->query("SELECT capacity FROM members WHERE id=$member_id")->fetch();
            if($query != NULL){
                if( $query['capacity']>0){
                    $prepare=$db->prepare("INSERT INTO transactions (book_id, member_id, tag) VALUES (?, ?, ?) ");
                    $result=$prepare->execute(array($id, $member_id, 0));
                    if($result){
                        $db->exec("UPDATE books SET book_count=book_count-1 WHERE id=$id");
                        $db->exec("UPDATE members SET capacity=capacity-1 WHERE id=$member_id");
                        $title='Kitap Verilmiştir';
                        $icon='success';
                    }
                }else if($query['capacity']==0){
                    $title="Aynı anda ikiden fazla kitap alınamaz";
                }
            }else{
                $title="Üye Kayıtlı Değil";
            }
            $query=NULL;
            $target='book_list.php';
            break;
        //// kitap geri al ////
        case 'return_of_book':
            $id=$_GET['id'];
            $member_id=$_GET['member_id'];
            $book_id=$_GET['book_id'];
            $query=$db->query("SELECT capacity FROM members WHERE id=$member_id")->fetch();
            if($query['capacity'] <3){
                $prepare=$db->prepare("UPDATE transactions SET tag = 1 WHERE id=?");
                $result=$prepare->execute(array($id));
                if($result){
                    $db->exec("UPDATE books SET book_count=book_count+1 WHERE id=$book_id");
                    $db->exec("UPDATE members SET capacity=capacity+1 WHERE id=$member_id");
    
                    $title='Kitap Alınmıştır';
                    $icon='success';
                }
            }
            $query=NULL;
            $target='return_of_book.php';
            break;

            
    } 
}

if(isset($_GET['process'])){
    switch($_GET['process']){
        //// kitap ekle ////
        case 'add_book':
            $title=($_POST["title"]);
            $author=($_POST["author"]);
            $publisher=($_POST["publisher"]);
            $category=($_POST["category"]);
            $book_count=($_POST["book_count"]);
            $prepare=$db->prepare("INSERT INTO books (title, author, publisher, category, book_count) VALUES (?, ?, ?, ?, ?)");
            $prepare-> execute(array($title, $author, $publisher, $category, $book_count));
            if($prepare->rowCount()){
                $title='Kitap Eklendi';
                $icon='success';
            }
            $target='home.php';
            break;
        //// üye ekle ////
        case 'add_member':
            $name=($_POST["name"]);
            $email=($_POST["email"]);
            $tel=($_POST["tel"]);
            $prepare=$db->prepare("INSERT INTO members (name, email, tel_number) VALUES (?, ?, ?)");
            $prepare-> execute(array($name, $email, $tel));
            if($prepare->rowCount()){
                $query=$db->prepare("SELECT * FROM members WHERE name=?;");
                $query->execute(array("$name"));
                $result=$query->fetch();
                $new_id=$result["id"];

                $title="$new_id Numaralı Üye Kaydı Oluşturulmuştur";
                $icon='success';
            }
            $query=NULL;
            $target='home.php';
            break;
        //// kayıt ol ////
        case 'sign_up':
            $name=($_POST["name"]);
            $email=($_POST["email"]);
            $tel=($_POST["tel"]);
            $password=($_POST['password']);

            $prepare=$db->prepare("INSERT INTO users (name, email, tel_number, password) VALUES(?, ?, ?, ?)");
            $prepare->execute(array($name, $email, $tel, $password));
            if($prepare->rowCount()){
                $title='Kaydınız Başarıyla Oluşturulmuştur';
                $icon='success';
                $target='index.php';
            }else{
                $target='sign_up.php';
            }
            break;

        //// giriş işlemi ////
        case 'login':
            $email=($_POST["email"]);
            $password=($_POST['password']);

            $target='index.php';

            $prepare=$db->prepare("SELECT password, name FROM users WHERE email=?;");
            $prepare->execute(array("$email"));
            if($prepare->rowCount()){
                $result=$prepare->fetch();
                $user_password = $result["password"];
                $user_name = $result["name"];
                if($user_password==$password){
                    $_SESSION['user']=$user_name;
                    $title='Giriş Yaptınız';
                    $icon='success';
                    $target='home.php';
                }else{
                    $title='Kullanıcı Adı veya Şifre Hatalı';
                }
            }
            break;

        //// çıkış ////
        case 'exit':
            session_destroy();
            $title='Çıkış Yaptınız';
            $icon='success';
            $target='index.php';
            break;

    }
}?>
    <?php $prepare=NULL; ?>
    <script type="text/javascript">

        Swal.fire({
            position: 'center', 
            icon: '<?php echo $icon; ?>', 
            title: '<?php echo $title; ?>', 
            showConfirmButton: false, 
            timer: 1500 
        });
       
    </script> 

    <?php header("Refresh:1.5; url=$target"); ?>

    <script src="bootstrap/bootstrap.js"></script>

</body>
</html>
