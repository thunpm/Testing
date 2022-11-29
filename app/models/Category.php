
<?php 
	require_once('models/Type.php'); 
	require_once('models/Product.php'); 

	class Category { 
		public $maDM;
		public $tenDM;
		public $listTL;
		public $listSP;

		function __construct($maDM, $tenDM, $listTL, $listSP) { 
			$this->maDM = $maDM;
			$this->tenDM = $tenDM;
			$this->listTL = $listTL;
			$this->listSP = $listSP;
		}

		public function setMaDM ($maDM) {
        	$this->maDM = $maDM;
    	}

    	public function setTenDM ($tenDM) {
        	$this->tenDM = $tenDM;
    	}

		static function listDanhMuc() { 
			$db = DB::getInstance(); 
			$sql = "SELECT * FROM DanhMuc WHERE DaXoa = 0"; 
			$req = $db->query($sql);
			$list = [];

			foreach ($req->fetchAll() as $item) { 
				$list[] = new Category($item['MaDM'], $item['TenDM'], Type::listByDanhMuc($item['MaDM']), 
										Product::listByDanhMuc($item['MaDM']));
			} 

			return $list; 
		}

		static function getDanhMuc($maDM) { 
			$db = DB::getInstance(); 
			$sql = "SELECT * FROM DanhMuc WHERE MaDM = '".$maDM."' AND DaXoa = 0"; 
			$req = $db->query($sql);
			$list = [];

			foreach ($req->fetchAll() as $item) { 
				$list[] = new Category($item['MaDM'], $item['TenDM'], Type::listByDanhMuc($item['MaDM']), 
										Product::listByDanhMuc($item['MaDM']));
			} 

			return $list[0]; 
		}

		static function getNameById($maDM) { 
			$db = DB::getInstance(); 
			$sql = "SELECT TenDM FROM DanhMuc WHERE MaDM = '".$maDM."' AND DaXoa = 0"; 
			$req = $db->query($sql);

			foreach ($req->fetchAll() as $item) { 
				return $item['TenDM'];
			} 

		}

		static function getByName($tenDM) { 
			$db = DB::getInstance(); 
			$sql = "SELECT MaDM FROM DanhMuc WHERE TenDM = '".$tenDM."' AND DaXoa = 0"; 
			$req = $db->query($sql);

			foreach ($req->fetchAll() as $item) { 
				return $item['MaDM'];
			} 
		
		}

		static function lastID() {
	        $db = DB::getInstance(); 
	        $sql = "SELECT MaDM FROM danhmuc ORDER BY MaDM DESC LIMIT 1"; 
	        $req = $db->query($sql);
	        $last = null;

	        foreach ($req->fetchAll() as $item) { 
	            $last = $item['MaDM'];
	        } 

			if ($last == null) {
            	$last = 'DM00';
        	}
        	$last = substr($last, 2, 2) + 0;
        	$last = $last + 1;
        	for($i = 0; $i < 2 - strlen($last); $i++) {
        		$last = '0'.$last;
        	}
        	$last = 'DM'.$last;

	        return $last;
    	}

		static function insertDM($tenDM) {
			$db = DB::getInstance();

			$kt_tenDM = Category::getByName($tenDM);
			if ($kt_tenDM != null) {
				return 2;
			}

			$maDM = Category::lastID();

			$stmt = $db->prepare('insert into DanhMuc (MaDM, TenDM) values (:MaDM, :TenDM)');
			$stmt->bindParam(':MaDM', $maDM);
			$stmt->bindParam(':TenDM', $tenDM);
			$stmt->execute();
			return 0;
		}

		static function editDM($maDM, $tenDM) {
			$kt_tenDM = Category::getByName($tenDM);
			if($kt_tenDM != null) {
				return 2;
			}

			$db = DB::getInstance(); 
			$stmt = $db->prepare('update DanhMuc set TenDM = :TenDM where MaDM = :MaDM');
			$stmt->bindParam(':MaDM', $maDM);
			$stmt->bindParam(':TenDM', $tenDM);
			$stmt->execute();
			if ($stmt > 0) {
				return 0;
			} else {
				return 1;
			}
		}

		static function deleteDM($maDM) {
			$db = DB::getInstance(); 
			$db = DB::getInstance(); 
			$stmt = $db->prepare('update DanhMuc set DaXoa = 1 where MaDM = :MaDM');
			$stmt->bindParam(':MaDM', $maDM);
			$stmt->execute();
			return 1;
		}
	}
?>