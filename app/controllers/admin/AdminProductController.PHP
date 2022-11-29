<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Product.php'); 
    require_once('models/Type.php'); 
    require_once('models/Picture.php'); 

    class AdminProductController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/product'; 
        } 

        public function list() { 
            $dulieu = Product::listSanPham();

            $data = array('title' => 'Quản lý sản phẩm', 'dulieu' => $dulieu); 
            $this->render('list', $data);
        }
        
        public function edit() { 
            //lấy dữ liệu 1 san pham đưa ra màn hình
            $MaSanPham = "";
            if (isset($_GET['id'])) {
                $MaSanPham = $_GET['id'];
            } else {
                $message = "Không thể cập nhật!";
                $dulieu = Product::listSanPham();

                $data = array('title' => 'Quản lý sản phẩm', 'dulieu' => $dulieu, 'message' => $message); 
                $this->render('list', $data);
                return;
            }

            $item = Product::getSanPham($MaSanPham);
            $listtype = Type::list();

            if (isset($_POST['submit'])) {
                $message = "";
                $maSP = $_POST['masp'];
                $tenSP = $_POST['tensanpham'];
                $SoLuongCo = $_POST['soluong'];
                $MoTa = $_POST['mota'];
                $Gia = $_POST['giasp'];
                $KhuyenMai = $_POST['khuyenmai'];
                $maTL = $_POST['MaTL'];
                $hinhAnh = null;

                // thêm hình ảnh vô thư mục images
                if (isset($_FILES["hinhanh"]) && $_FILES["hinhanh"]["name"] != "") {
                    if ($_FILES["hinhanh"]['error'] == 0) {
                        $target_dir    = "assets/images/products/";
                        $target_file   = $target_dir.basename($_FILES["hinhanh"]["name"]);

                        $name = "";
                        while (file_exists($target_file)) { 
                            $name = "1".$name;  // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
                            $target_file = $target_dir.basename($name.$_FILES["hinhanh"]["name"]);
                        }
                        
                        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                        if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                        
                        } else {
                            $message = "Có lỗi xảy ra khi upload file!";
                            $item->settenSP ("");
                            $data = array('title' => 'Sửa sản phẩm', 'listt'=>$listtype, 'message' => $message, 'item' => $item); 
                            $this->render('edit', $data);
                            return;
                        }
                        $hinhAnh = $_FILES["hinhanh"]["name"];
                    } else {
                        $message = "File không đúng định dạng!";
                        $data = array('title' => 'Sửa sản phẩm', 'listt'=>$listtype, 'message' => $message, 'item' => $item); 
                        $this->render('edit', $data);
                        return;
                    }
                }

                if($tenSP == "" || $MoTa == "" ||$Gia == "" || $SoLuongCo == "" ||$maTL == "") {
                    $message = "Giá trị nhập vào rỗng!";
                    $data = array('title' => 'Sửa sản phẩm', 'listt'=>$listtype, 'message' => $message, 'item' => $item); 
                    $this->render('edit', $data);
                    return;
                }

                $add = Product::editSP($maSP, $tenSP, $MoTa, $SoLuongCo, $Gia, $KhuyenMai, $maTL);
                //tên san pham đã tồn tại
                if($add == false) {
                    $message = "Lỗi không xác định!";

                    // $data = array('title' => 'Sửa sản phẩm', 'message' => $message, 'item' => $item, 'listtype'=>$listtype); 
                    // $this->render('edit', $data);
                    // return;
                }

                if ($hinhAnh != null) {
                    Picture::edit($maSP, $_FILES["hinhanh"]["name"]);
                }

                //sửa thành công
                $message = "Sửa sản phẩm thành công!";
                $dulieu = Product::listSanPham();
                $data = array('title' => 'Quản lý sản phẩm', 'message' => $message, 'dulieu' => $dulieu);  
                $this->render('list', $data);
                return;
            }  

            $data = array('title' => 'Sửa sản phẩm','item' => $item, 'listt'=>$listtype); 
            $this->render('edit', $data);
        }

        public function add() { 
            $listtype = Type::list();
            if(isset($_POST['submit']) && ($_POST['submit'])){
                $tenSP = $_POST['TenSP'];
                $MoTa = $_POST['MoTa'];
                $Gia = $_POST['Gia'];
                $SoLuongCo = $_POST['SoLuongCo'];
                $KhuyenMai = $_POST['KhuyenMai'];
                $maTL = $_POST['danhmuc'];

                // thêm hình ảnh vô thư mục images
                if (isset($_FILES["TenHinh"]) && $_FILES["TenHinh"]['error'] == 0) {
                    $target_dir    = "assets/images/products/";
                    $target_file   = $target_dir.basename($_FILES["TenHinh"]["name"]);

                    if (file_exists($target_file)) {   // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
                        $target_file = $target_dir.basename("1".$_FILES["TenHinh"]["name"]);
                    }
                    
                    // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                    if (move_uploaded_file($_FILES["TenHinh"]["tmp_name"], $target_file)) {
                    
                    } else {
                        $message = "Có lỗi xảy ra khi upload file";
                        $data = array('title' => 'Thêm sản phẩm', 'listt' => $listtype, 'message' => $message); 
                        $this->render('add', $data);
                        return;
                    }
                } else {
                    $data = array('title' => 'Thêm sản phẩm', 'listt' => $listtype, 'message' => "File ảnh không đúng định dạng!"); 
                    $this->render('add', $data);
                    return;
                }

                // hình ok rồi thì thêm sản phẩm
                if ($tenSP == "" || $MoTa == "" || $Gia == "" || $SoLuongCo == "" || $maTL == "" ) {
                    $message = "Giá trị nhập vào rỗng!";
                    $data = array('title' => 'Thêm sản phẩm', 'listt'=>$listtype, 'message' => $message); 
                    $this->render('add', $data);
                    return;
                }

                $id = Product::lastID();

                $add = Product::InsetSP($tenSP, $MoTa, $SoLuongCo, $Gia, $KhuyenMai, $maTL);
                if ($add == false) {
                    $message = "Lỗi không xác định!";
                    $data = array('title' => 'Thêm sản phẩm', 'listt'=>$listtype, 'message' => $message, 'maSP' => $id, 'tenSP' => $tenSP); 
                    $this->render('add', $data);
                    return;
                }
                
                Picture::insert($id, $_FILES["TenHinh"]["name"]);

                // thêm thành công
                $message = "Thêm sản phẩm thành công!";
                $dulieu = Product::listSanPham();
                $data = array('title' => 'Quản lý sản phẩm', 'message' => $message, 'dulieu' => $dulieu);  
                $this->render('list', $data);
                return;
            }

            $data = array('title' => 'Thêm sản phẩm', 'listt'=>$listtype); 
            $this->render('add', $data);
        }




        public function delete() { 
           
            if (isset($_GET['id'])) {
                $maSP = $_GET['id'];
                $message = "";
                if(Product::deleteSP($maSP)== 1) {
                    $message = "Xóa sản phẩm thành công!";
                } else {
                    $message = "Lỗi xóa!";
                }
                $dulieu = Product::listSanPham();
                $data = array('title' => 'Quản lý sản phẩm', 'message' => $message, 'dulieu' => $dulieu); 
                $this->render('list', $data); 
            }

        }
    }


?>