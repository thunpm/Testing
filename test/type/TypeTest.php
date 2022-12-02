<?php
   
   require_once ('./app/models/Type.php');
   use PHPUnit\Framework\TestCase;

    class TypeTest extends TestCase {

      //kiểm tra mã sp phải là chuỗi
        public function testFormatIdType(): void {
            $maTL_Err = 123;
            $maTL_True = "TL001";

            $res = Type::getTheLoai($maTL_Err);

            self::assertEquals($res, "Mã thể loại phải là chuỗi!");
        }

    //kiểm tra mã sp phải bắt đầu bằng TL
        public function testFormatIdType1(): void {
            $maTL_Err = "123";
            $maTL_True = "TL001";

            $res = Type::getTheLoai($maTL_Err);

            self::assertEquals($res, "Mã thể loại phải bắt đầu bằng TL!");
           }
    // kiểm tra thêm thể loại
        public function testinsertTypeField(): void {
            $TenTheLoai = "";
            $MaDanhMuc = "DM001";
           
            $result = Type::insertTheLoai($TenTheLoai, $MaDanhMuc);

            self::assertEquals("Chưa nhập dữ liệu ", $result);
        }
        public function testinsertTypeSuccess(): void {
            $TenTheLoai = "Điện thoaị";
            $MaDanhMuc = "DM001";
           
            $result = Type::insertTheLoai($TenTheLoai, $MaDanhMuc);

            self::assertEquals("Thêm thành công", $result);
        }
    // kiểm tra sửa thể loại
        public function testUpdateTypeField(): void {
            $theloai = "";
        
            $result = Type::editTheLoai($theloai);

            self::assertEquals("Chưa sửa dữ liệu ", $result);
        }
 
        public function testUpdateTypeSuccess(): void {
            $theloai = "HP";
        
            $result = Type::editTheLoai($theloai);

            self::assertEquals("Update thành công", $result);
        }
   }
    
?>