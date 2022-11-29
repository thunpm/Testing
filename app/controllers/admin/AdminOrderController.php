<?php 
    require_once('controllers/admin/AdminBaseController.php');
    require_once('models/Invoice.php'); 

    class AdminOrderController extends AdminBaseController  { 
        function __construct() { 
            $this->folder = 'admin/order'; 
        } 

        public function list() { 
            $orders = Invoice::getOrders();
			$data = array('title' => 'Quản lý đơn hàng', 'orders' => $orders);
            $this->render('list', $data);
        }

        public function edit() { 
            $MaHD = $_GET['MaHD'];
            $order = Invoice::showOrder($MaHD);
            $data = array('title' => 'Chi tiết đơn hàng', 'order' => $order);
            $this->render('edit', $data);
        }

        public function update() {
            $MaHD = $_GET['MaHD'];
            $TrangThai = $_POST['TrangThai'];
            Invoice::updateOrder($MaHD, $TrangThai);
            header('Location: admin.php?controller=order&action=list');
        }

        public function delete() { 
            $MaHD = $_GET['MaHD'];
            Invoice::deleteInvoice($MaHD);
            header('Location: admin.php?controller=order&action=list');
        }

    }
?>