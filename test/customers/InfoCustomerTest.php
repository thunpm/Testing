<?php

    /**
     * @group customers
     * Tests the api edit form
     */

    use PHPUnit\Framework\TestCase;
    require_once ('./app/models/Customer.php');

    class InfoCustomerTest extends TestCase {

        public function testEmptyNameField(): void {
            $MaKH = 'KH001';
            $HoTen = '';
            $SoDienThoai = '0898765554';
            $Email = NULL;
            $GioiTinh = NULL;
            $NgaySinh = NULL;

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Chưa nhập trường bắt buộc", $result);
        }

        public function testEmptyPhoneField(): void {
            $MaKH = 'KH001';
            $HoTen = 'Nguyen Thi Tuong Vy';
            $SoDienThoai = '';
            $Email = NULL;
            $GioiTinh = NULL;
            $NgaySinh = NULL;

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Chưa nhập trường bắt buộc", $result);
        }

        public function testPhoneError(): void {
            $MaKH = 'KH001';
            $HoTen = 'Nguyen Thi Tuong Vy';
            $SoDienThoai = '000099998';
            $Email = NULL;
            $GioiTinh = NULL;
            $NgaySinh = NULL;

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Số điện thoại không hợp lệ", $result);
        }

        public function testEmailError(): void {
            $MaKH = 'KH001';
            $HoTen = 'Nguyen Thi Tuong Vy';
            $SoDienThoai = '0898154429';
            $Email = 'minhthu';
            $GioiTinh = NULL;
            $NgaySinh = NULL;

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Email không hợp lệ", $result);
        }

        public function testBirthdayError(): void {
            $MaKH = 'KH001';
            $HoTen = 'Nguyen Thi Tuong Vy';
            $SoDienThoai = '0898154429';
            $Email = NULL;
            $GioiTinh = NULL;
            $NgaySinh = '2022-02-31';

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Ngày sinh không hợp lệ", $result);
        }

        public function testBirthdayGreaterNow(): void {
            $MaKH = 'KH001';
            $HoTen = 'Nguyen Thi Tuong Vy';
            $SoDienThoai = '0898154429';
            $Email = NULL;
            $GioiTinh = NULL;
            $NgaySinh = '2027-12-10';

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Ngày sinh không hợp lệ", $result);
        }

        public function testUpdateSuccess(): void {
            $MaKH = 'KH001';
            $HoTen = 'Nguyen Phan Minh Thu';
            $SoDienThoai = '0898154429';
            $Email = 'minhthu@gmail.com';
            $GioiTinh = NULL;
            $NgaySinh = NULL;

            $result = Customer::updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh);

            self::assertEquals("Ok", $result);
        }

    }

?>