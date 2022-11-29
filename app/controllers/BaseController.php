<?php 
    require_once('controllers/CategoryController.php');

    class BaseController { 

	    protected $folder; 

	    // Hàm hiển thị kết quả ra cho người dùng. 
        function render($file, $data = array()) {	
            // lấy danh mục
            include_once('controllers/' . 'CategoryController.php');
            $category = new CategoryController;
            $listDM = $category->list();

            $view_file = 'views/' . $this->folder . '/' . $file . '.php'; 
            if (is_file($view_file)) {			
                extract($data); // nhập các biến từ một mảng cho bảng biểu tượng hiện tại
                ob_start(); 
                require_once($view_file); 
                $content = ob_get_clean(); 
                require_once('views/client/layouts/application.php'); 
            } else {
                header('Location: index.php?controller=page&action=error'); 
            } 
        }

        function render1($file) {	
            $view_file = 'views/' . $this->folder . '/' . $file . '.php'; 
            if (is_file($view_file)) {	
                require_once($view_file); 		
                $content = ob_get_clean(); 
                require_once('views/client/layouts/application.php'); 
            } else {
                header('Location: index.php?controller=page&action=error'); 
            } 
        } 
    }
?>