<?php 
    require_once('models/Category.php'); 

    class CategoryController { 
        function __construct() { 
            
        } 

        public function list() { 
            $listDM = Category::listDanhMuc();
            
            return $listDM;
        }
    }
?>