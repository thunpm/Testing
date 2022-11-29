<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>
<div class="contact">
    <ul class="breadcrum">
        <li class="active"><a href="#" class="breadcrum__active">Trang chủ</a> <span class="active">/&nbsp</span></li>
        <li class="active"> Liên hệ</li>
    </ul>

    <div class="contact__title">
        <h3 class="contact__heading">LIÊN HỆ</h3>
    </div>

    <div class="contact-infor">
        <div class="contact__map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12896.241647124238!2d108.15222325714015!3d16.06156725364652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1638749790256!5m2!1svi!2s"
                width="1060" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="contact-content">
            <div class="contact-content__left">
                <span>
                    <p class="contact-content__left-title"> HAI SHOP</p>
                </span>
                <table class="contact-content__left-table">

                    <body>
                        <tr>
                            <td class="contact-infor__left-from-td">Địa chỉ: &nbsp</td>
                            <td class="contact-infor__left-from-td">Liên Chiểu, Đà Nẵng, Việt Nam</td>
                        </tr>
                        <tr>
                            <td class="contact-infor__left-from-td">Số điện thoại: &nbsp</td>
                            <td class="contact-infor__left-from-td contact-infor__left-from-red">(84-8) 9856 2345</td>
                        </tr>
                        <tr>
                            <td class="contact-infor__left-from-td">Hotline: &nbsp</td>
                            <td class="contact-infor__left-from-td contact-infor__left-from-red">1894705</td>
                        </tr>

                        <tr>
                            <td class="contact-infor__left-from-td">Email: &nbsp</td>
                            <td class="contact-infor__left-from-td contact-infor__bank">info@haishop.com</td>
                        </tr>
                        <tr>
                            <td class="contact-infor__left-from-td">Website: &nbsp</td>
                            <td class="contact-infor__left-from-td contact-infor__bank">shophai.ued.vn</td>
                        </tr>
                    </body>
                </table>
            </div>
            <div class="contact-content__right">
                <span>
                    <p class="contact-infor__right-title"> HAI SHOP chào đón đối tác ngỏ ý liên hệ với HAI SHOP. Vui
                        lòng liên hệ theo biểu mẫu dưới. HAI SHOP sẽ hồi âm trong thời gian nhanh nhất.</p>
                </span>
                <form class="contact-infor__right-from contact-form" action="index.php?controller=page&action=sendContact" method="post">
                    <table class="contact-infor__right-from-table">
                        <tbody>
                            <tr>
                                <td class="contact-infor__right-from-td" style="width:150px;">
                                    <span class="contact-infor__right-from-red">(*)</span>
                                    Họ và tên:</td>
                                <td class="contact-infor__right-from-td">
                                    <input class="form-control" placeholder="Nhập họ và tên" id="name" name="name" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="contact-infor__right-from-td" style="width:150px;">
                                    <span class="contact-infor__right-from-red">(*)</span>
                                    Email: </td>
                                <td class="contact-infor__right-from-td">
                                    <input class="form-control" placeholder="Nhập Email" id="email" name="email"
                                        type="email" required>
                                </td>
                            </tr>

                            <tr>
                                <td class="contact-infor__right-from-td" style="width:150px;">
                                    <span class="contact-infor__right-from-red">(*)</span>
                                    Điện thoại:</td>
                                <td class="contact-infor__right-from-td">
                                    <input class="form-control" placeholder="Nhập số điện thoại" id="number"
                                        name="phone_number" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="contact-infor__right-from-td" style="width:150px;">
                                    &nbsp &nbsp &nbsp
                                    Địa chỉ:</td>
                                <td class="contact-infor__right-from-td">
                                    <textarea class="form-control" placeholder="Nhập địa chỉ" id="address"
                                        name="address" rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="contact-infor__right-from-td" style="width:150px;">
                                    <span class="contact-infor__right-from-red">(*)</span>
                                    Tiêu đề:</td>
                                <td class="contact-infor__right-from-td">
                                    <input class="form-control" placeholder="Nhập tiêu đề" id="title" name="title"
                                        type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="contact-infor__right-from-td" style="width:150px;">
                                    <span class="contact-infor__right-from-red">(*)</span>
                                    Nội dung:</td>
                                <td class="contact-infor__right-from-td">

                                    <textarea class="required form-control" placeholder="Nhập nội dung" id="Description"
                                        name="description" rows="2" required></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td class="contact__right-from-btn">
                                    <button type="submit" class="btn btn-send-contact">GỬI</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('views/client/layouts/footer.php'); ?>

<script type="text/javascript">
    $(".contact-form").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            phone_number: "required",
            title: "required",
            description: "required",
        },
        messages: {
            name: "Trường này không được để trống",
            email: {
                required: "Trường này không được để trống",
                email: "Vui lòng nhập đúng định dạng Email",
            },
            phone_number: "Trường này không được để trống",
            title: "Trường này không được để trống",
            description: "Trường này không được để trống",
        }
    });
</script>