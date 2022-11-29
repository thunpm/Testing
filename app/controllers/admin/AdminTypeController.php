
<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Category.php');
    require_once('models/Type.php');

    class AdminTypeController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/type'; 
        } 

        public function list() { 
            $list = Type::list();
            $data = array('title' => 'Quản lý thể loại', 'listTL' => $list); 
            $this->render('list', $data);
        }

        public function edit() {
            $list = Category::listDanhMuc();
            if(isset($_GET['id'])) {
                $MaTL = $_GET['id'];
                $theloai = Type::getTheLoai($MaTL);

                if(isset($_POST['submit'])) {
                    $message = "";
                    $TenTL = $_POST['TenTL'];
                    $MaDM = $_POST['MaDM'];

                    if($TenTL == "") {
                        $message = "Tên thể loại nhập vào rỗng!";
                        $theloai->setTenTL("");
                        $data = array('title' => 'Sửa thể loại', 'theloai' => $theloai, 'listDM' => $list, 'message' => $message); 
                        $this->render('edit', $data);
                        return;
                    } else {
                        $theloai->setTenTL($TenTL);
                    }

                    if($MaDM != 0 && $MaDM != $theloai->maDM) {
                        $theloai->setMaDM($MaDM);
                    }

                    Type::editTheLoai($theloai);
                    $message = "Sửa thể loại thành công";
                    $list = Type::list();
                    $data = array('title' => 'Quản lý thể loại', 'listTL' => $list, 'message' => $message); 
                    $this->render('list', $data);
                    return;
                }

                $data = array('title' => 'Sửa thể loại', 'theloai' => $theloai, 'listDM' => $list); 
                $this->render('edit', $data);
                return;
            }
        }

        public function add() {
            if(isset($_POST['submit'])) {
                $message = "";
                $tenTL = $_POST['TenTL'];
                $maDM = $_POST['MaDM'];
                
                if($tenTL == "" || $maDM == "0") {
                    $message = "Dữ liệu nhập vào rỗng!";
                    $list = Category::listDanhMuc();
                    $data = array('title' => 'Thêm thể loại', 'listDM' => $list, 'message' => $message, 'MaTL' => Type::lastID(), 'TenTL' => $tenTL, 'MaDM' => $maDM); 
                    $this->render('add', $data);
                    return;
                }

                Type::insertTheLoai($tenTL, $maDM);
                $message = "Thêm thể loại thành công!";
                $list = Type::list();
                $data = array('title' => 'Quản lý thể loại', 'listTL' => $list, 'message' => $message); 
                $this->render('list', $data);
                return;
            } else {
                $list = Category::listDanhMuc();
                $data = array('title' => 'Thêm thể loại', 'listDM' => $list, 'MaTL' => Type::lastID()); 
                $this->render('add', $data);
            }
        }

        public function delete() {
            if(isset($_GET['id'])) {
                $MaTL = $_GET['id'];
                $message = "";
                if(Type::deleteTheLoai($MaTL) == 1) {
                    $message = "Xóa thể loại thành công!";
                } else {
                    $message = "Lỗi xóa!";
                }
                $list = Type::list();
                $data = array('title' => 'Quản lý thể loại', 'message' => $message, 'listTL' => $list); 
                $this->render('list', $data);
            }
        }

    }
?>