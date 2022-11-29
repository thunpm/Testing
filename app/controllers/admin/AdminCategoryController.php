<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Category.php');

    class AdminCategoryController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/category'; 
        } 

        public function list() { 
            $listDM = Category::listDanhMuc();
            $data = array('title' => 'Quản lý danh mục', 'listDM' => $listDM); 
            $this->render('list', $data);
        }

        public function edit() { 
            //lấy dữ liệu 1 danh mục đưa ra màn hình
            if (isset($_GET['id'])) {
                $maDM = $_GET['id'];
                $item = Category::getDanhMuc($maDM);

                if (isset($_POST['submit'])) {
                    $message = "";
                    $MaDM = $maDM;
                    $TenDM = $_POST['TenDM'];

                    if($TenDM == "") {
                        $message = "Giá trị nhập vào rỗng!";
                        $item->setTenDM ("");
                        $data = array('title' => 'Sửa danh mục', 'message' => $message, 'danhmuc' => $item); 
                        $this->render('edit', $data);
                        return;
                    }

                    $kq = Category::editDM($MaDM, $TenDM);
                    //tên danh mục đã tồn tại
                    if($kq == 2) {
                        $message = "Tên danh mục đã tồn tại!";
                        $item->setTenDM ($TenDM);
                        $data = array('title' => 'Sửa danh mục', 'message' => $message, 'danhmuc' => $item); 
                        $this->render('edit', $data);
                        return;
                    }
                    //sửa thành công
                    $message = "Sửa danh mục thành công!";
                    $listDM = Category::listDanhMuc();
                    $data = array('title' => 'Quản lý danh mục', 'message' => $message, 'listDM' => $listDM);  
                    $this->render('list', $data);
                    return;
                }

                $data = array('title' => 'Sửa danh mục', 'danhmuc' => $item); 
                $this->render('edit', $data);
            }
        }

        public function add() { 
            if (isset($_POST['submit'])) {
                $message = "";
                $TenDM = $_POST['TenDM'];

                if($TenDM == "") {
                    $message = "Giá trị nhập vào rỗng!";
                    $data = array('title' => 'Thêm danh mục', 'message' => $message, 'maDM' => Category::lastID()); 
                    $this->render('add', $data);
                    return;
                }

                $kq = Category::insertDM($TenDM);
                //tên danh mục đã tồn tại
                if ($kq == 2) {
                    $message = "Tên danh mục đã tồn tại!";
                    $data = array('title' => 'Thêm danh mục', 'message' => $message, 'maDM' => Category::lastID(), 'tenDM' => $TenDM); 
                    $this->render('add', $data);
                } else if ($kq == 1) {
                    $message = "Lỗi không xác định!";
                    $data = array('title' => 'Thêm danh mục', 'message' => $message, 'maDM' => Category::lastID(), 'tenDM' => $TenDM); 
                    $this->render('add', $data);
                } else {
                    //thêm thành công
                    $message = "Thêm danh mục thành công!";
                    $listDM = Category::listDanhMuc();
                    $data = array('title' => 'Quản lý danh mục', 'message' => $message, 'listDM' => $listDM);  
                    $this->render('list', $data);
                }
            } else {
                $data = array('title' => 'Thêm danh mục', 'maDM' => Category::lastID()); 
                $this->render('add', $data);
            }
        }

        public function delete() {
            if (isset($_GET['id'])) {
                $maDM = $_GET['id'];
                $message = "";
                if(Category::deleteDM($maDM) == 1) {
                    $listDM = Category::listDanhMuc();
                    $message = "Xóa danh mục thành công!";
                    $data = array('title' => 'Quản lý danh mục', 'message' => $message, 'listDM' => $listDM); 
                    $this->render('list', $data); 
                    return; 
                } else {
                    $message = "Lỗi xóa!";
                    $listDM = Category::listDanhMuc();
                    $data = array('title' => 'Quản lý danh mục', 'message' => $message, 'listDM' => $listDM); 
                    $this->render('list', $data); 
                    return;
                }
            }
        }

    }
?>