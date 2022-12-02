<?php
    require_once ('./app/models/Evaluate.php');
  
    use PHPUnit\Framework\TestCase;

    class EvaluateTest extends TestCase {

        //kiểm tra số sao hợp lệ
        public function testNumberOfStars(): void {
            $maSP = "SP001";
            $maKH = "KH007";
            $danhGia_Err = 8;
            $danhGia_True = 4;
            $nhanXet = "Tuyệt vời";

            $res = Evaluate::add($maSP, $maKH, $danhGia_True, $nhanXet);

            self::assertEquals($res, "Số sao không hợp lệ!");
       }

    }

?>