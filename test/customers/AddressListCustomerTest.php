<?php

    /**
     * @group address
     * Tests the api edit form
     */

    use PHPUnit\Framework\TestCase;
    require_once ('./app/models/Address.php');

    class AddressListCustomerTest extends TestCase {

        public function testAddEmptyRequiredField(): void {
            $maKH = "KH001";
            $tinh = "Quang Nam";
            $huyen = "";
            $xa = "";
            $diaChi = "12 Do Dang Tuyen";
            $ghiChu = NULL;

            $result = Address::add($maKH, $tinh, $huyen, $xa, $diaChi, $ghiChu);

            self::assertEquals("Chưa nhập trường bắt buộc", $result);
        }

        public function testAddSuccess(): void {
            $maKH = "KH001";
            $tinh = "Quang Nam";
            $huyen = "Dai Loc";
            $xa = "Dai Tan";
            $diaChi = "12 Do Dang Tuyen";
            $ghiChu = NULL;

            $result = Address::add($maKH, $tinh, $huyen, $xa, $diaChi, $ghiChu);

            self::assertEquals("Ok", $result);
        }

        public function testUpdateEmptyRequiredField(): void {
            $id = "DC001";
            $tinh = "Quang Nam";
            $huyen = "";
            $xa = "";
            $diaChi = "12 Do Dang Tuyen";
            $ghiChu = NULL;

            $result = Address::update($id, $tinh, $huyen, $xa, $diaChi, $ghiChu);

            self::assertEquals("Chưa nhập trường bắt buộc", $result);
        }

        public function testUpdateSuccess(): void {
            $id = "DC001";
            $tinh = "Quang Nam";
            $huyen = "Dai Loc";
            $xa = "Dai Tan";
            $diaChi = "12 Do Dang Tuyen";
            $ghiChu = "";

            $result = Address::update($id, $tinh, $huyen, $xa, $diaChi, $ghiChu);

            self::assertEquals("Ok", $result);
        }

    }

?>