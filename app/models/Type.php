<?php 
    class Type { 
        public $maTL;
        public $tenTL;
        public $maDM;
        public $tenDM;

        function __construct($maTL, $tenTL, $maDM, $tenDM) { 
            $this->maTL = $maTL;
            $this->tenTL = $tenTL;
            $this->maDM = $maDM;
            $this->tenDM = $tenDM;
        }

        public function setTenTL ($tenTL)
        {
            $this->tenTL = $tenTL;
        }

        public function setMaDM ($maDM)
        {
            $this->maDM = $maDM;
        }

        static function list() { 
            $db = DB::getInstance(); 
            $sql = "SELECT tl.*, dm.TenDM FROM TheLoai tl INNER JOIN DanhMuc dm on dm.MaDM = tl.MaDM where tl.DaXoa = 0 order by tl.MaTL "; 
            $req = $db->query($sql);
            $list = [];

            foreach ($req->fetchAll() as $item) { 
                $list[] = new Type($item['MaTL'], $item['TenTL'], $item['MaDM'], $item['TenDM']); 
            } 

            return $list; 
        }

        static function listByDanhMuc($MaDanhMuc) { 
            $db = DB::getInstance(); 
            $sql = "SELECT tl.* FROM TheLoai tl INNER JOIN DanhMuc dm on dm.MaDM = tl.MaDM WHERE tl.DaXoa = 0 and tl.MaDM ='".$MaDanhMuc."'"; 
            $req = $db->query($sql);
            $list = [];

            foreach ($req->fetchAll() as $item) { 
                $list[] = new Type($item['MaTL'], $item['TenTL'], $item['MaDM'], null); 
            } 

            return $list; 
        }

        static function getTheLoai($MaTheLoai) { 
            if(!is_string($MaTheLoai)) {
                return "Mã thể loại phải là chuỗi!";
            }

            if(($MaTheLoai[0] != 'T') || ($MaTheLoai[1] != 'L')) {
                return "Mã thể loại phải bắt đầu bằng TL!";
            }
            $db = DB::getInstance(); 
            $sql = "SELECT * FROM TheLoai WHERE MaTL ='".$MaTheLoai."'"; 
            $req = $db->query($sql);
            $list = [];

            foreach ($req->fetchAll() as $item) { 
                $list[] = new Type($item['MaTL'], $item['TenTL'], $item['MaDM'], Category::getNameById($item['MaDM'])); 
            } 
            if(sizeof($list) <= 0) {
                return null;
            }

            return $list[0]; 
        }

        static function lastID() {
            $db = DB::getInstance(); 
            $sql = "SELECT MaTL FROM theloai ORDER BY MaTL DESC LIMIT 1"; 
            $req = $db->query($sql);
            $last = null;

            foreach ($req->fetchAll() as $item) { 
                $last = $item['MaTL'];
            } 

            if ($last == null) {
                $last = 'LSP000';
            }
            $last = substr($last, 3, 4) + 0;
            $last = $last + 1;
            for($i = 0; $i < 3 - strlen($last); $i++) {
                $last = '0'.$last;
            }
            $last = 'LSP'.$last;

            return $last;
        }

        static function insertTheLoai($TenTheLoai, $MaDanhMuc) { 
            if($TenTheLoai ==""|| $MaDanhMuc==""){
                return "Chưa nhập dữ liệu ";
            }
            $db = DB::getInstance();

            $MaTheLoai = Type::lastID();
            
            $stmt = $db->prepare('insert into theloai (MaTL, TenTL, MaDM) values (:MaTL, :TenTL, :MaDM)');
            try {
                $stmt->bindParam(':MaTL', $MaTheLoai);
                $stmt->bindParam(':TenTL', $TenTheLoai);
                $stmt->bindParam(':MaDM', $MaDanhMuc);
                $stmt->execute();
                return "Thêm thành công";
            } catch (Exception $e) {
                return "Error";
            } 
        }

        static function editTheLoai($theloai) { 
            if($theloai==""){
                return "Chưa sửa dữ liệu ";
            }
            $db = DB::getInstance();
            $stmt = $db->prepare('update theloai set TenTL = :TenTL, MaDM = :MaDM where MaTL = :MaTL');
            try {
                $stmt->bindParam(':TenTL', $theloai->tenTL);
                $stmt->bindParam(':MaDM', $theloai->maDM);
                $stmt->bindParam(':MaTL', $theloai->maTL);
                $stmt->execute();
                return"Update thành công";
            } catch (Exception $e) {
                return"Update thành công";
            }
                
            
        }

        static function deleteTheLoai($maTL) { 
            $db = DB::getInstance();
            $stmt = $db->prepare('update theloai set DaXoa = 1 where MaTL = :MaTL');
            $stmt->bindParam(':MaTL', $maTL);
            $stmt->execute();
            return 1;
        }
    }
?>
