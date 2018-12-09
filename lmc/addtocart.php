<?php
session_start();
if(isset($_GET['id']) & !empty($_GET['id'])){
        $items = $_GET['id'];
        $_SESSION['cart'] = $items;
        header('location: index.php?status=success');
}else{
    header('location: index.php?status=failed');
}
?>