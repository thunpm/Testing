<?php 

class Admin { 
    public $maAD;
    public $tenDangNhap;
    public $matKhau;
    public $hoTen;

    function __construct($maAD, $tenDangNhap, $matKhau , $hoTen) { 
        $this->maAD = $maAD;
        $this->tenDangNhap = $tenDangNhap;
        $this->matKhau = $matKhau;
        $this->hoTen = $hoTen;
    } 

    static function isValidAccount($tenDangNhap, $matKhau) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM Admin WHERE TenDangNhap='".$tenDangNhap."' AND MatKhau='".$matKhau."'"; 
        $req = $db->query($sql);
    
        foreach ($req->fetchAll() as $item) { 
            return new Admin($item['MaAD'], $item['TenDangNhap'], $item['MatKhau'], $item['HoTen']); 
        } 

        return null;
    }

}

?>

