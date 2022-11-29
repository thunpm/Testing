<?php 
    class Picture { 
        public $maHinh;
        public $maSP;
        public $tenHinh;

        function __construct($maHinh, $maSP, $tenHinh) { 
            $this->maHinh = $maHinh;
            $this->maSP = $maSP;
            $this->tenHinh = $tenHinh;
        }

        static function listBySanPham($MaSanPham) { 
            $db = DB::getInstance(); 
            $sql = "SELECT * FROM HinhAnh 
                    WHERE MaSP ='".$MaSanPham."'"; 
            $req = $db->query($sql);
            $list = [];

            foreach ($req->fetchAll() as $item) { 
                $list[] = new Picture($item['MaHinh'], $item['MaSP'], $item['TenHinh']); 
            } 

            return $list; 
        }

        static function lastID() {
            $db = DB::getInstance(); 
            $sql = "SELECT MaHinh FROM HinhAnh ORDER BY MaHinh DESC LIMIT 1"; 
            $req = $db->query($sql);
            $last = null;

            foreach ($req->fetchAll() as $item) { 
                $last = $item['MaHinh'];
            } 

            if ($last == null) {
                $last = 'SP000';
            }
            $last = substr($last, 2, 3) + 0;
            $last = $last + 1;
            for ($i = 0; $i < 3 - strlen($last); $i++) {
                $last = '0'.$last;
            }
            $last = 'HA'.$last;

            return $last;
        }

        static function insert($MaSP, $TenHA) { 
            $db = DB::getInstance(); 

            $MaHA = Picture::lastID();
        
            $sql = "INSERT INTO `HinhAnh`(`MaHinh`, `MaSP`, `TenHinh`) 
                                VALUES ('$MaHA','$MaSP','$TenHA')";
            
            $req = $db->query($sql);
        }

        static function edit($MaSP, $TenHA) { 
            $db = DB::getInstance(); 

            $MaHA = Picture::lastID();
        
            $sql = "UPDATE `HinhAnh` SET TenHinh = '$TenHA' WHERE MaSP = '$MaSP'";
            
            $req = $db->query($sql);
        }
    }
?>
