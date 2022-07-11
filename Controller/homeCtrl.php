<?php
    $action = "home";

    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case "home":
            include "Views/trangchu.php";
            break;
        case "themcongthuc":
            include 'Views/themcongthuc.php';
            break;
        case "themcongthuc1":
            $tenct = $_POST['tenct'];
            $congthuc = $_POST['congthuc'];
            $mota = $_POST['mota'];
            $ngaylap = $_POST['ngaydang'];
            $maloai = $_POST['maloai'];
            $themcongthuc = new CongThuc();
            $themcongthuc -> insertProduct( $tenct,$congthuc,$maloai,$ngaylap,$mota);
            echo ("<script>alert('Đã thêm công thức mới');</script>");
            include "Views/themcongthuc.php";
            break;
        case "themtuvung":
            include 'Views/themcongthuc.php';
            break;
        case "themtuvung1":
            $tiengbd = $_POST['tiengbd'];
            $tiengmd= $_POST['tiengmd'];
            $vidu = $_POST['vidu'];
            $mamon = $_POST['mamon'];
            $maloai = $_POST['maloai'];
            $themtuvung = new CongThuc();
            $themtuvung -> insertTV( $tiengbd,$tiengmd,$maloai,$mamon,$vidu);
            echo ("<script>alert('Đã thêm từ vựng mới');</script>");
            include "Views/themcongthuc.php";
            break;
        case "congthuc":
            include 'Views/congthuc.php';
            break;
        case "tudien":
            include 'Views/tudien.php';
            break;
        case "tvanh":
            include 'Views/showcongthuc.php';
            break;
        case "tvhan":
            include 'Views/showcongthuc.php';
            break;
        case "toan":
            include 'Views/showcongthuc.php';
            break;
        case "hoa":
            include 'Views/showcongthuc.php';
            break;
        case "anhvan":
            include 'Views/showcongthuc.php';
            break;
        case "nnhan":
            include 'Views/showcongthuc.php';
            break;
        case "vatly":
            include 'Views/showcongthuc.php';
            break;
        case "timkiem":
            include 'Views/showcongthuc.php';
            break;
        case "updatect":
            include 'Views/updateCT.php';
            break;
        case "updatetv":
            include 'Views/updateCT.php';
            break;
        case "updatect1":
            $id = $_POST['mact'];
            $tenct = $_POST['tenct'];
            $congthuc = $_POST['congthuc'];
            $maloai = $_POST['maloai'];
            $ngaylap = $_POST['ngaydang'];
            $mota = $_POST['mota'];
            $fixproduct = new CongThuc();
            $fixproduct -> getfixCongThuc($id,$tenct,$congthuc,$maloai,$ngaylap,$mota);
            if($tenct = "") {
                echo '<script> alert("Lỗi, sửa thất bại!) </script>';
            } else{ 
                echo '<script> alert("Sửa thành công!");</script>';
                include "Views/congthuc.php";
                // echo '<meta http-equiv="refresh" content="0; url=/index.php?action=homeCtrl&act=congthuc';
            }
            break;
        case "delct":
            if(isset($_GET['mact'])) {
                $mact = $_GET['mact'];
                $xoa = new CongThuc();
                $xoa -> delproduct($mact);
                echo ("<script>alert('Xóa thành công');</script>");
                include 'Views/tudien.php';
            }
            break;
        case "updatetv1":
            $id = $_POST['matd'];
            $tiengbd = $_POST['tiengbd'];
            $tiengmd = $_POST['tiengmd'];
            $maloai = $_POST['maloai'];
            $mamon = $_POST['mamon'];
            $vidu = $_POST['vidu'];
            $fixproduct = new CongThuc();
            $fixproduct -> getfixTuVung($id,$tiengbd,$tiengmd,$maloai,$mamon,$vidu);
            if($tiengbd = "") {
                echo '<script> alert("Lỗi, sửa thất bại!) </script>';
            } else{ 
                echo '<script> alert("Sửa thành công!");</script>';
                include "Views/tudien.php";
                // echo '<meta http-equiv="refresh" content="0; url=/index.php?action=homeCtrl&act=congthuc';
            }
            break;
        case "deltv":
            if(isset($_GET['matd'])) {
                $matd = $_GET['matd'];
                $xoa = new CongThuc();
                $xoa -> delTV($matd);
                echo ("<script>alert('Xóa thành công');</script>");
                include 'Views/tudien.php';
            }
            break;
        case "timkiem":
            include 'View/product.php';
            break;
        case "favorite":
            if (isset($_SESSION['makh']))
            {
                include 'View/product.php';
                break;
            } else {
                echo '<script>alert("Vui lòng đăng nhập!")</script>';
                include 'View/login.php';
                break;
            }
            
        case "comment" :
            $mahh = $_POST['txtmahh'];
            $noidung = $_POST['comment'];
            $makh = $_SESSION['makh'];
            $obj = new User();
            $check = trim($noidung);
            if ($check == null)
            {
                include 'View/product_detail.php';
                break;
            } else {
                $obj->insertComment($mahh,$makh,$noidung);
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=homeCtrl&act=detail&id='.$mahh.'"';
                break;
            }

            // $obj->insertComment($mahh,$makh,$noidung);
            // include 'View/product_detail.php';
            // break;          
        case "contact":
            include 'View/contact.php';
            break;
        case "feedback":
            $name = $_POST['tenkhachhang'];
            $email = $_POST['email'];
            $tinnhan = $_POST['message'];
            $user = new User();
            $user->insertFeedback($name,$email,$tinnhan);
            echo '<script>alert("Cảm ơn phản hồi của bạn!")</script>';
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=homeCtrl&act=contact"';
            break;
        case "addFavoriteFood":
            $makh = $_SESSION['makh'];
            $mahh = $_GET['id'];
            $obj = new User();
            $favorite = $obj->getDanhMucUaThich($makh,$mahh);

            if ($favorite == null)
            {
                $obj->addFavoriteFood($makh,$mahh);
                echo '<meta http-equiv="refresh" content="0; url=./index.php?action=homeCtrl&act=detail&id='.$mahh.'"';
                break;
            }
        case "deleteFavoriteFood":
            $makh = $_SESSION['makh'];
            $mahh = $_GET['id'];
            $obj = new User();
            $obj->deleteFavoriteFood($makh,$mahh);
            echo '<meta http-equiv="refresh" content="0; url=./index.php?action=homeCtrl&act=detail&id='.$mahh.'"';
            break;
    }