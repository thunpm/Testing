<?php 
    require_once('controllers/BaseController.php');
    require_once('models/Response.php');

    class PageController extends BaseController  { 
        function __construct() { 
            $this->folder = 'client/pages'; 
        } 

        public function home() { 
            $data = array('title' => 'Trang chủ'); 
            $this->render('home', $data);
        }

        public function contact() {
            $data = array('title' => 'Liên hệ');  
            $this->render('contact', $data);
        }

        public function intro() { 
            $data = array('title' => 'Giới thiệu'); 
            $this->render('intro', $data);
        }

        public function error() {
            $data = array('title' => 'Lỗi'); 
            $this->render('error', $data); 
        } 

        public function sendContact() {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone_number'];
            $address = $_POST['address'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $query = Response::storeContact($name, $email, $phone, $address, $title, $description);
            if ($query > 0) {
                echo '<script type="text/javascript">
                        alert("Gửi phản hồi thất bại. Vui lòng thử lại!"); 
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        alert("Gửi phản hồi thành công!"); 
                    </script>';
            }
            $this->render('contact');
        }
    }
?>