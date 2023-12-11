<?php
session_start();
ob_start();

include "model/connect.php";
include "model/sanpham.php";
include "view/header.php";
$kq = getall_product();


include "view/promo.php";
if(isset($_REQUEST['page'])){
$page = $_REQUEST['page'];
switch ($page){
    case 'about': 
        include 'view/about.php';  
        break;
    case 'quenmk': 
        include 'view/quenmk.php';  
        break;
    case 'giohang': 
        include 'view/giohang.php';  
        break;
    case 'blog':
        include 'view/blog.php';
        break;
    case 'contact':
        include 'view/contact.php';
        break;
    case 'login':
        include 'view/login.php';
        break;
    case 'update':
        include 'view/updatePro.php';
        break;
    case 'signup':
        include 'view/signup.php';
        break;
    case 'thanhtoan':
        include 'view/thanhtoan.php';
        break; 
    case 'chitietsp':
        if(isset($_GET['id']) && $_GET['id'] > 0){
            $id = $_GET['id'];
            $chitiet = getidsp($id);
            require_once 'view/chitietsp.php';
        }
        break; 
    case 'dangxuat':
        unset($_SESSION['role']);
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        unset($_SESSION['pass']);
        unset($_SESSION['img']);
        unset($_SESSION['name']);
        unset($_SESSION['viewcart']);
        header('location: index.php'); 
        break;
    case 'shop-single':
        if(isset($_GET['id']) && $_GET['id'] > 0){
            $id = $_GET['id'];
            $chitiet = getidsp($id);
            require_once 'view/shop-single.php';
        }
        break;
    case 'addcart':
        if(isset($_POST['sub']) && ($_POST['sub'])){
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $tien = $_POST['tien'];
            $img = $_POST['img'];
            $soluong = 1;
            $productExists = false;
                foreach ($_SESSION['viewcart'] as &$item) {
                    if ($item['id'] == $id) {
                        // Sản phẩm đã tồn tại, tăng số lượng
                        $item['soluong']++;
                        $productExists = true;
                        break;
                    }
                }
                if (!$productExists) {
            $sp = ['id'=> $id, 'ten' => $ten, 'img' => $img, 'tien' => $tien, 'soluong' => $soluong];
            $_SESSION['viewcart'][] = $sp;}
            header('location: index.php');
            
        }
        break;
        case 'count':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                ob_clean();
                header('Content-Type: application/json');
                if (isset($_POST['id']) && isset($_POST['action'])) {
                    $productId = $_POST['id'];
                    $action = $_POST['action'];
                    foreach ($_SESSION['viewcart'] as &$item) {
                        if ($item['id'] == $productId) {
                            if ($action === 'increase') {
                                $item['soluong']++;
                            } elseif ($action === 'decrease' && $item['soluong'] > 1) {
                                $item['soluong']--;                                
                            }
                            $item['total'] = $item['soluong'] * $item['gia'];
                        }
                    }
                }
            }
            break;
    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            delete_product($id);
        }  
        $kq = getall_product();
        header('location: admin.php');
        break;
        case 'removecart':
            if (isset($_GET['id'])) {
                $productId = $_GET['id'];
                if (isset($_SESSION['viewcart']) && is_array($_SESSION['viewcart'])) {
                    foreach ($_SESSION['viewcart'] as $key => $item) {
                        if ($item['id'] == $productId) {
                            unset($_SESSION['viewcart'][$key]);
                        }
                    }
                }
            }
            header('location: index.php?page=viewcart');
            break;
    case 'xltt':
        if (isset($_SESSION['viewcart'])&& is_array($_SESSION['viewcart'])) {
            foreach($_SESSION['viewcart'] as $item){
                extract($item);
                $id = $_POST['id'];
                if ($item['id'] == $id){
                if (isset($_POST['thanhtoan'])){
                   
                    
                    insert_cart($id,$ten, $img, $tien, $soluong);}
                }
            }
            
        }
        break;
    default:
        include 'view/product.php';
        break;
}
}
else {
    include 'view/product.php';
};
include 'view/footer.php';
?> 
