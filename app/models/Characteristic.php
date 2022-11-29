<?php 
class Characteristic { 
    public $maDT;
    public $maSP;
    public $tenDT;
    public $chiTietDT;

    function __construct($maDT, $maSP, $tenDT, $chiTietDT) { 
        $this->maDT = $maDT;
        $this->maSP = $maSP;
        $this->tenDT = $tenDT;
        $this->chiTietDT = $chiTietDT;
    }

	static function listBySanPham($MaSanPham) { 
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM DacTinhSanPham 
                WHERE MaSP ='".$MaSanPham."'"; 
		$req = $db->query($sql);
        $list = [];

        foreach ($req->fetchAll() as $item) { 
			$list[] = new Characteristic($item['MaDT'], $item['MaSP'], $item['TenDT'], $item['ChiTietDT']); 
		} 

		return $list; 
	}
}
