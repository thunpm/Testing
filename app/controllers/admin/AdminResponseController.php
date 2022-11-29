<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Response.php');

    class AdminResponseController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/responses'; 
        } 

        public function listContact() {
            $contacts = Response::getContacts();
            $data = array('title' => 'Danh sách phản hồi', 'contacts' => $contacts);
            $this->render('list', $data);
        }

        public function deleteContact() {
            $MaPH = $_GET['MaPH'];
            Response::deleteContact($MaPH);
            $contacts = Response::getContacts();
            $data = array('title' => 'Danh sách phản hồi', 'contacts' => $contacts);
            $this->render('list', $data);
        }

    }
?>