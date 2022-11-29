<?php 
	class Response { 
        public $MaPH;
        public $HoTen;
        public $Email;
        public $SoDienThoai;
        public $DiaChi;
        public $TieuDe;
        public $NoiDung;

        public function __construct($MaPH, $HoTen, $Email, $SoDienThoai, $DiaChi, $TieuDe, $NoiDung)
        {
            $this->MaPH = $MaPH;
            $this->HoTen = $HoTen;
            $this->Email = $Email;
            $this->SoDienThoai = $SoDienThoai;
            $this->DiaChi = $DiaChi;
            $this->TieuDe = $TieuDe;
            $this->NoiDung = $NoiDung;
        }

        static function getContacts() {
            $db = DB::getInstance(); 
            $sql = "SELECT MaPH, HoTen, Email, SoDienThoai, DiaChi, TieuDe, NoiDung FROM phanhoi"; 
            $req = $db->query($sql);
            $list = [];

            foreach ($req->fetchAll() as $item) { 
                $list[] = new Response($item['MaPH'], $item['HoTen'], $item['Email'], $item['SoDienThoai'], $item['DiaChi'], $item['TieuDe'], $item['NoiDung']); 
            } 
            return $list;
        }

		static function storeContact($name, $email, $phone, $address, $title, $description) {
			$MaPH = Response::lastID();
			$db = DB::getInstance(); 
			$sql = "INSERT INTO `phanhoi`(`MaPH`, `HoTen`, `Email`, `SoDienThoai`, `DiaChi`, `TieuDe`, `NoiDung`)
                           VALUE('$MaPH','$name','$email','$phone','$address', '$title', '$description')"; 
			$db->query($sql);
		}
		
		static function lastID() {
			$db = DB::getInstance(); 
			$sql = "SELECT MaPH FROM phanhoi ORDER BY MaPH DESC LIMIT 1"; 
			$req = $db->query($sql);
			$last = null;
	
			foreach ($req->fetchAll() as $item) { 
				$last = $item['MaPH'];
			} 

			if ($last == null) {
				$last = 'PH000';
			}
			$ID = substr($last, 2, 3) + 0;
			$ID = $ID + 1;
			for ($i = 0; $i < 3 - strlen($ID); $i++) {
				$ID = '0'.$ID;
			}
			$ID = 'PH'.$ID;
	
			return $ID;
		}

        static function deleteContact($MaPH) {
            $db = DB::getInstance(); 
            $sql = "DELETE FROM phanhoi where MaPH = '".$MaPH."'"; 
            $db->query($sql);
        }
	}
?>
