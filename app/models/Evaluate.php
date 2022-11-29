<?php 
	require_once('models/Customer.php');
	require_once('models/Product.php');

	class Evaluate { 
		public $maDG;
		public $maSP;
		public $maKH;
		public $danhgia;
		public $nhanXet;
		public $sanPham;
		public $khachHang;

		function __construct($maDG, $maSP, $maKH, $danhgia, $nhanXet) { 
			$this->maDG = $maDG;
			$this->maSP = $maSP;
			$this->maKH = $maKH;
			$this->danhgia = $danhgia;
			$this->nhanXet = $nhanXet;
		}

		//lấy các nhận xét về sản phẩm
		static function listNhanXet($MaSP) { 
            $db = DB::getInstance(); 
            $sql = "SELECT * FROM danhgia
                    WHERE MaSP ='".$MaSP."'"; 
            $req = $db->query($sql);
            $list = [];

            foreach ($req->fetchAll() as $item) { 
                $list[] = new Evaluate($item['MaDG'], $item['MaSP'], Customer::getName($item['MaKH']), $item['DanhGia'], $item['NhanXet']); 
            } 
            return $list; 
        }

		static function getAll() { 
            $db = DB::getInstance(); 
            $sql = "SELECT * FROM danhgia"; 
            $req = $db->query($sql);
            $list = [];
			$i = 0;

            foreach ($req->fetchAll() as $item) { 
				$i++;
                $list[$i] = new Evaluate($item['MaDG'], $item['MaSP'], $item['MaKH'], $item['DanhGia'], $item['NhanXet']); 
				$list[$i]->khachHang = Customer::getById($item['MaKH']);
				$list[$i]->sanPham = Product::getSanPham($item['MaSP']);
			} 
            return $list; 
        }

		static function delete($id) { 
            $db = DB::getInstance(); 
            $sql = "DELETE FROM DanhGia WHERE MaDG='".$id."'"; 
            $req = $db->query($sql);
        }

		static function lastID() {
			$db = DB::getInstance(); 
			$sql = "SELECT MaDG FROM DanhGia ORDER BY MaDG DESC LIMIT 1"; 
            $req = $db->query($sql);
			$last = null;

			foreach ($req->fetchAll() as $item) { 
                $last = $item['MaDG'];
            } 

			return $last;
		}

		static function add($maSP, $maKH, $danhGia, $nhanXet) { 
            $db = DB::getInstance(); 

			$maDG = Evaluate::lastID();
			if ($maDG == null) {
				$maDG = 'DG000';
			}
			$so = substr($maDG, 2, 3) + 0;
			$so = $so + 1;
			for ($i = 0; $i < 3 - strlen($so); $i++) {
				$so = '0'.$so;
			}
			$so = 'DG'.$so;
			echo $so;

            $sql = "INSERT DanhGia(MaDG, MaSP, MaKH, DanhGia, NhanXet)
                    VALUES ('".$so."', '".$maSP."', '".$maKH."', ".$danhGia.", '".$nhanXet."')"; 
            $req = $db->query($sql);
            
			if ($req == true) {
				return true;
			} else {
				return false;
			}
        }

		static function store ($maSP, $maKH, $danhGia, $nhanXet) {
			$maDG = Evaluate::lastID();
			if ($maDG == null) {
				$maDG = 'DG000';
			}
			$so = substr($maDG, 2, 3) + 0;
			$so = $so + 1;
			for ($i = 0; $i < 3 - strlen($so); $i++) {
				$so = '0'.$so;
			}
			$so = 'DG'.$so;
			$db = DB::getInstance(); 
			$sql = "INSERT INTO `danhgia`(`MaDG`, `MaSP`, `MaKH`, `DanhGia`, `NhanXet`)
                           VALUE('$so','$maSP','$maKH','$danhGia','$nhanXet')"; 
			$req = $db->query($sql);
		}

		
	}
?>