<?php 
    class Items { 
        public $sanPham;
        public $soLuong;
        public $donGia;
        public $khuyenMai;

        function __construct($sanPham, $soLuong, $donGia, $khuyenMai) { 
            $this->sanPham = $sanPham;
            $this->soLuong = $soLuong;
            $this->donGia = $donGia;
            $this->khuyenMai = $khuyenMai;
        }

    }
?>
