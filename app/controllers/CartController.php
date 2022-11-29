<?php 
    require_once('controllers/BaseController.php'); 
    require_once('models/Product.php'); 
    require_once('models/Cart.php'); 
    require_once('models/Items.php'); 
    require_once('models/Address.php'); 
    require_once('models/Customer.php'); 
    require_once('models/Invoice.php'); 
    require_once('models/Evaluate.php'); 

    class CartController extends BaseController  { 
        function __construct() { 
            $this->folder = 'client/carts'; 
        } 

        public function add() { 
            $message = "";

            if (isset($_POST['id']) != null) {
                $maSP = $_POST['id'];
                $soLuong = $_POST['soLuong'];
                $ok = false;      
                if(isset($_SESSION['cart'])) {
                    $_SESSION["cart"] = unserialize(serialize($_SESSION["cart"]));
                }

                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                } else {
                    $cart = new Cart();
                }

                for ($i = 0; $i < count($cart->listItems); $i++) {
                    if ($cart->listItems[$i]->sanPham->maSP == $maSP) {
                        if ($cart->listItems[$i]->soLuong+$soLuong <= $cart->listItems[$i]->sanPham->soLuongCo) {
                            $cart->listItems[$i]->soLuong = $cart->listItems[$i]->soLuong+$soLuong;
                        } else {
                            $cart->listItems[$i]->soLuong = $cart->listItems[$i]->sanPham->soLuongCo;
                            $message = "Số lượng sản phẩm không đủ!";
                        }
                        
                        $ok = true;
                        break;
                    } 
                }

                if ($ok == false) {
                    $sanPham = Product::getSanPham($maSP);
                    $item = new Items($sanPham, $soLuong, $sanPham->gia, $sanPham->khuyenMai);
                    $cart->add($item);
                }

                $_SESSION['cart'] = $cart;
            }
            
            $data = array('title' => 'Giỏ hàng', 'message' => $message); 
            $this->render('list', $data);
        }

        public function edit() {
            $message = "";
            if (isset($_GET['id']) != null) {
                $tt = $_GET['tt'];
                $maSP = $_GET['id'];

                if(isset($_SESSION['cart'])) {
                    $_SESSION["cart"] = unserialize(serialize($_SESSION["cart"]));
                }

                $cart = $_SESSION['cart'];

                if ($tt == 'xoa') {
                    for ($i = 0; $i < count($cart->listItems); $i++) {
                        if ($cart->listItems[$i]->sanPham->maSP == $maSP) {
                            \array_splice($cart->listItems, $i, 1);
                            $message = "Đã xóa thành công!";
                            break;
                        } 
                    }
                } else if ($tt == 'giam') {
                    for ($i = 0; $i < count($cart->listItems); $i++) {
                        if ($cart->listItems[$i]->sanPham->maSP == $maSP) {
                            if ($cart->listItems[$i]->soLuong > 1) {
                                $cart->listItems[$i]->soLuong = $cart->listItems[$i]->soLuong - 1;
                            } else {
                                $message = "Không thể trừ!";
                            }

                            break;
                        } 
                    }
                } else if ($tt == 'tang') {
                    for ($i = 0; $i < count($cart->listItems); $i++) {
                        if ($cart->listItems[$i]->sanPham->maSP == $maSP) {
                            if ($cart->listItems[$i]->soLuong < $cart->listItems[$i]->sanPham->soLuongCo) {
                                $cart->listItems[$i]->soLuong = $cart->listItems[$i]->soLuong + 1;
                            } else {
                                $message = "Số lượng không đủ!";
                            }
                            break;
                        } 
                    }
                } else if ($tt == 'doi') {
                    $soLuong = $_GET['soLuong'];

                    for ($i = 0; $i < count($cart->listItems); $i++) {
                        if ($cart->listItems[$i]->sanPham->maSP == $maSP) {
                            if ($soLuong <= $cart->listItems[$i]->sanPham->soLuongCo
                                && $soLuong >= 1) {
                                $cart->listItems[$i]->soLuong = $soLuong;
                            } else {
                                $message = "Số lượng thay đổi không hợp lệ!";
                            }
                            break;
                        } 
                    }
                }


                $_SESSION['cart'] = $cart;
            }

            $data = array('title' => 'Giỏ hàng', 'message' => $message); 
            $this->render('list', $data);
        }

        public function list() { 
            $data = array('title' => 'Giỏ hàng'); 
            $this->render('list', $data);
        }

        public function pay() {
            if (isset($_SESSION['cart']))
                if (isset($_SESSION['user'])) {
                    $_SESSION["user"] = unserialize(serialize($_SESSION["user"]));
                    
                    $user = $_SESSION['user'];
                    $diaChi = Address::getAddressByIdCustomer($user->idCustomer);
                    $data = array('title' => 'Thanh toán', 'diaChi' => $diaChi, 'user' => $user);  

                    $this->render('pay', $data);
                } else {
                    header('Location: index.php?controller=user&action=login'); 
                }
            else {
                header('Location: index.php?controller=cart&action=list'); 
            }
            
        }

        public function order() {
            if (isset($_SESSION['cart']) && isset($_SESSION['user'])) {
                $_SESSION["user"] = unserialize(serialize($_SESSION["user"]));
                $_SESSION["cart"] = unserialize(serialize($_SESSION["cart"]));
                
                $user = $_SESSION['user'];
                $cart = $_SESSION['cart'];

                $ok = Invoice::add($user, $cart);

                if ($ok == true) {
                    $_SESSION['cart'] = null;
                    header('Location: index.php?controller=user&action=order');
                } else {
                    header('Location: index.php?controller=cart&action=list'); 
                }
            }
            else {
                header('Location: index.php?controller=cart&action=list'); 
            }
            
        }
    }
?>