<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?php echo isset($title) ? $title : 'Trang chủ'; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="assets/lib/font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/client/client_style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/client/product_style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/client/reset.css"/>
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/client/client_carts_style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/client/pay_style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/client/client_news_style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/client/client_detail_news_style.css"/>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/client/client_introduce.css"/>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/client/contact.css"/>

	<script src="assets/lib/jquery-3.3.1.min.js"></script>
	<script src="assets/lib/popper.min.js"></script>
	<script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/lib/validate.js"></script>
</head>

<body>
    <?= @$content ?> 
</body> 