<?php
session_start();
ob_start();

include "model/connect.php";
include "model/danhmuc.php";
include "model/user.php";
include "view/header.php";
$kq = getall_product();
if(isset($_REQUEST['page'])){
    $page = $_REQUEST['page'];
    switch ($page){
    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            delete_product($id);
        } 
        $kq = getall_product();
        include "view/productadmin.php";
        break;
    case 'productadmin':
        include "view/productadmin.php";
    break;
    case 'viewuser':
        include "view/viewuser.php";
    break;
    case 'viewbuy':
        include "view/viewbuy.php";
    break;
    case 'dangxuat':
        unset($_SESSION['role']);
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        unset($_SESSION['img']);
        unset($_SESSION['viewcart']);
        header('location: ../index.php'); 
        break;
    case 'update':
        include "view/update.php";
        break;
    default: 
        include 'view/productadmin.php';
        break;
    }
    
}
// include 'view/productadmin.php';
include 'view/footer.php';
?>