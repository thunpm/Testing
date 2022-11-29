<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Invoice.php');

    class AdminStatisticsController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/statistics'; 
        } 

        public function list() { 
            $date1 = date("Y-m-d");
            $date2 = date("Y-m-d");
            $d1 = date("d/m/Y");
            $d2 = date("d/m/Y");
            if (isset($_POST['date1']) && isset($_POST['date2'])) {
                $date1 = date_format(date_create($_POST['date1']), "Y-m-d");
                $date2 = date_format(date_create($_POST['date2']), "Y-m-d");
                $d1 = date_format(date_create($_POST['date1']), "d/m/Y");
                $d2 = date_format(date_create($_POST['date2']), "d/m/Y");
            }

            $list = Invoice::listByDate($date1, $date2);
            $data = array('title' => 'Đánh giá', 'listProduct' => $list, 'date1' => $d1,
                         'date2' => $d2); 
            $this->render('list', $data);
        }
    }
?>