<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Admin.php');

    class AdminPageController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/pages'; 
        } 

        public function home() { 
            $data = array('title' => 'Trang chủ Admin'); 
            $this->render('home', $data);
        }

        public function login() { 
            $data = array('title' => 'Đăng nhập Admin', "checklogin" => "login"); 
            $this->render('login', $data);
        }

        public function logout() { 
            session_unset(); 
            $this->login();
        }

        public function check_login() { 
            if (isset($_POST['TenDangNhap']) && isset($_POST['password'])) {
                $tenDangNhap = $_POST['TenDangNhap'];
                $matKhau = $_POST['password'];

                $admin = Admin::isValidAccount($tenDangNhap, $matKhau);
                if ($admin != null) {
                    $_SESSION['admin'] = $admin;

                    $this->home();
                } else {
                    $message = "Tên đăng nhập hoặc mật khẩu không khớp!";

                    $data = array('title' => 'Đăng nhập Admin', 'message' => $message); 
                    $this->render('login', $data);
                }
                
            } else {
                $this->login();
            } 
        }

        public function info_admin() { 
            $data = array('title' => 'Thông tin Admin'); 
            $this->render('info_admin', $data); 
        }

        public function error() { 
            $data = array('title' => 'Lỗi'); 
            $this->render('error', $data); 
        }

    }
?>