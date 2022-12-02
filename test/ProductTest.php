<?php
    require_once ('./app/models/Product.php');
  
    use PHPUnit\Framework\TestCase;

    class ProductTest extends TestCase {

        //kiểm tra mã sp phải là chuỗi
        public function testFormatIdProduct(): void {
            $maSP_Err = 123;
            $maSP_True = "SP001";

            $res = Product::getSanPham($maSP_Err);

            self::assertEquals($res, "Mã sản phẩm phải là chuỗi!");
        }

        //kiểm tra mã sp phải bắt đầu bằng SP
        public function testFormatIdProduct1(): void {
            $maSP_Err = "123";
            $maSP_True = "SP001";

            $res = Product::getSanPham($maSP_Err);

            self::assertEquals($res, "Mã sản phẩm phải bắt đầu bằng SP!");
        }

        //kiểm tra mã sp có tồn tại
        public function testExistIdProduct(): void {
            $maSP_Err = "SP105";
            $maSP_True = "SP001";

            $res = Product::getSanPham($maSP_True);

            self::assertTrue(is_object($res));
        }

    }

?>