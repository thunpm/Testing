<?php
require_once('models/CategoryNews.php'); 

class News {
	public $maTT;
	public $tieuDe;
	public $tomTat;
	public $ngayDang;
	public $admin;
	public $noiDung;
	public $danhmuctin;
	public $anh;
	public $trangThai;

	function __construct($maTT, $tieuDe, $tomTat, $ngayDang, $admin, $noiDung, $danhmuctin, $anh) { 
			$this->maTT = $maTT;
			$this->tieuDe = $tieuDe;
			$this->tomTat = $tomTat;
			$this->ngayDang = $ngayDang;
			$this->admin = $admin;
			$this->noiDung = $noiDung;
			$this->danhmuctin = $danhmuctin;
			$this->anh = $anh;
	}

	static function listTinTuc() { 
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM tintuc"; 
		$req = $db->query($sql);
		$list = [];

		foreach ($req->fetchAll() as $item) {
			$list[] = new News ($item['MaTT'], $item['TieuDe'], $item['TomTat'], $item['NgayDang'], null, $item['NoiDung'], null, $item['Anh']);
		} 

		return $list; 
	}

	static function listTinTucc($maDMT) { 
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM tintuc where MaDMT = '".$maDMT."'"; 
		$req = $db->query($sql);
		$list = [];

		foreach ($req->fetchAll() as $item) { 
			$list[] = new News  ($item['MaTT'], $item['TieuDe'], $item['TomTat'], $item['NgayDang'], null, $item['NoiDung'], null, $item['Anh']);
		} 

		return $list; 
	}

	static function getTinTuc($maTT) { 
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM tintuc as tt INNER JOIN danhmuctin as dmt on tt.maDMT = dmt.maDMT WHERE MaTT = '".$maTT."'"; 
		$req = $db->query($sql);
		$list = [];

		foreach ($req->fetchAll() as $item) {
			$tenDM = $item['TenDM'];
			$list[] = new News  ($item['MaTT'], $item['TieuDe'], $item['TomTat'], $item['NgayDang'], null, $item['NoiDung'], new CategoryNews($item['MaDMT'], $item['TenDM']), $item['Anh']);
		} 

		return $list[0]; 
	}

}

?>