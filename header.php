<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=library_management_system", "root", "");
}catch ( PDOException $e ){
    echo "Bir Hata Oluştu: ".$e->getMessage();
    exit();
}

$db->query("SET NAMES utf8");
?>
