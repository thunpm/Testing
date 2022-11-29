<?php

class CategoryNews {
	public $maDM;
	public $tenDM;

	function __construct($maDM, $tenDM) { 
			$this->maDM = $maDM;
			$this->tenDM = $tenDM;
	}

	static function listDanhMuc() { 
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM DanhMucTin"; 
		$req = $db->query($sql);
		$list = [];

		foreach ($req->fetchAll() as $item) { 
			$list[] = new CategoryNews ($item['MaDMT'], $item['TenDM']);
		} 

		return $list; 
	}

	static function getTenDanhMuc($maDM) {
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM DanhMucTin WHERE MaDMT = '".$maDM."'"; 
		$req = $db->query($sql);
		$list = [];

		foreach ($req->fetchAll() as $item) { 
			$list[] = new CategoryNews ($item['MaDMT'], $item['TenDM']);
		}  

		return $list[0]->tenDM; 
	}
}

?>