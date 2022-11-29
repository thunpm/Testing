<?php 
    require_once('controllers/BaseController.php');
    require_once('models/CategoryNews.php');
    require_once('models/News.php'); 

    class NewsController extends BaseController  { 
        function __construct() { 
            $this->folder = 'client/news'; 
        } 

        public function news_list() {
            $id = null;
            $list_tintuc = null;
            $ten_danhmuc = '';
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $list_tintuc = News::listTinTucc($id);
                $ten_danhmuc = CategoryNews::getTenDanhMuc($id);
            } else {
                $list_tintuc = News::listTinTuc();
            }
            $danhMucTin = CategoryNews::listDanhMuc();
            $data = array('title' => 'Tin tức', 'danhMucTin' => $danhMucTin, 'list_tintuc' => $list_tintuc, 'ten_danhmuc' => $ten_danhmuc); 
            $this->render('news_list', $data);
        }

        public function news_detail() {
            $id = null;
            $tintuc = '';
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $tintuc = News::getTinTuc($id);
            }
            $data = array('title' => 'Chi tiết tin tức', 'tintuc' => $tintuc);  
            $this->render('news_detail', $data);
        }
    }
?>