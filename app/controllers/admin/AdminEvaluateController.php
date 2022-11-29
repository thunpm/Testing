<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Evaluate.php');

    class AdminEvaluateController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/evaluate'; 
        } 

        public function list() { 
            $list = Evaluate::getAll();
            $message = "";
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
            }
            $data = array('title' => 'Đánh giá', 'listEvaluate' => $list, 'message' => $message); 
            $this->render('list', $data);
        }

        public function delete() {
            $id = "";
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            Evaluate::delete($id);

            $_GET['message'] = "Đã xóa thành công!";

            header('Location: admin.php?controller=evaluate&action=list');
        } 
    }
?>