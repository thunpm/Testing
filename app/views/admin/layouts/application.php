<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Trang chủ Admin'; ?></title>

    <link rel="stylesheet" href="assets/stylesheets/admin/sibar.css">
    <link rel="stylesheet" href="assets/stylesheets/admin/admin_style.css">
    <link rel="stylesheet" href="assets/stylesheets/admin/customer.css">

    <link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.min.css"/>

    <script src="assets/lib/jquery-3.3.1.min.js"></script>
	<script src="assets/lib/popper.min.js"></script>
	<script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

    <script>
        $(document).ready(function() {
            // Cấu hình các nhãn phân trang
            $('#example').dataTable( {
                "language": {
                "sProcessing":   "Đang xử lý...",
                "sLengthMenu":   "Số sản phẩm trên 1 trang _MENU_",
                "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix":  "",
                "sSearch":       "Tìm kiếm",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Đầu",
                    "sPrevious": "Trước",
                    "sNext":     "Tiếp",
                    "sLast":     "Cuối"
                    }
                }
            }); 
        }); 
    </script>  
    <style>
        select.custom-select.custom-select-sm.form-control.form-control-sm, input.form-control.form-control-sm {
            font-size: 15px;
            height: 35px;
            margin: 10px 0px 20px 0px;
        }


    </style>
</head>
<body>
    <?php
    if (! (isset($checklogin) && $checklogin == "login")) {
        if (isset($_SESSION['admin']) == false || $_SESSION['admin'] == null) {
            header("location:admin.php?controller=page&action=login");
            exit();
        } else {
            $_SESSION["admin"] = unserialize(serialize($_SESSION["admin"]));
        }
    } 
    ?>

    <?php
    if (isset($title) && $title == "Đăng nhập Admin") {
    ?>
        <?= @$content ?> 
    <?php
    } else {
    ?>
        <div class="content-block">
            <div style="width: 20%;">
                <?php require_once('views/admin/layouts/sibar.php') ?>
            </div>
            <div style="width: 80%;">
                <?php require_once('views/admin/layouts/menu.php') ?>
                <?= @$content ?> 
            </div>
        </div>
    <?php
    }
    ?>
</body> 