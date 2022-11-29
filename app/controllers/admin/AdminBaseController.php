<?php 
    class AdminBaseController { 
	    protected $folder; 

	    // Hàm hiển thị kết quả ra cho người dùng. 
        function render($file, $data = array()) {		
            $view_file = 'views/' . $this->folder . '/' . $file . '.php'; 
            if (is_file($view_file)) {			
                extract($data); // nhập các biến từ một mảng cho bảng biểu tượng hiện tại
                ob_start(); 
                require_once($view_file); 
                $content = ob_get_clean(); 
                require_once('views/admin/layouts/application.php'); 
            } else {
                header('Location: admin.php?controller=page&action=error'); 
            } 
        }
        
    }
?>