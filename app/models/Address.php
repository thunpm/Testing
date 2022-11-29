<?php 

class Address { 
    public $maDC;
    public $maKH;
    public $tinh;
    public $huyen;
    public $xa;
    public $soNha;
    public $ghiChu;
    public $macDinh;

    function __construct($maDC, $maKH, $tinh , $huyen, $xa, $soNha, $ghiChu, $macDinh) { 
        $this->maDC = $maDC;
        $this->maKH = $maKH;
        $this->tinh = $tinh;
        $this->huyen = $huyen;
        $this->xa = $xa;
        $this->soNha = $soNha;
        $this->ghiChu = $ghiChu;
        $this->macDinh = $macDinh;
    } 

    static function getAddressByIdCustomer($maKH) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM DiaChi WHERE MakH='".$maKH."'"; 
        $req = $db->query($sql);
        $list = [];

        foreach ($req->fetchAll() as $item) { 
            $list[] = new Address($item['MaDC'], $item['MaKH'], $item['Tinh'], $item['Huyen'], $item['Xa'], $item['SoNha'], 
                        $item['GhiChu'], $item['MacDinh']); 
        } 

        return $list[0];
    }

    static function listAddress($maKH) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM DiaChi WHERE MakH='".$maKH."'"; 
        $req = $db->query($sql);
        $list = [];

        foreach ($req->fetchAll() as $item) { 
            $list[] = new Address($item['MaDC'], $item['MaKH'], $item['Tinh'], $item['Huyen'], $item['Xa'], $item['SoNha'], 
                        $item['GhiChu'], $item['MacDinh']); 
        } 

        return $list;
    }

    static function lastID() {
        $db = DB::getInstance(); 
        $sql = "SELECT MaDC FROM DiaChi ORDER BY MaDC  DESC LIMIT 1"; 
        $req = $db->query($sql);
        $last = null;

        foreach ($req->fetchAll() as $item) { 
            $last = $item['MaDC'];
        } 

        if ($last == null) {
            $last = 'DC000';
        }
        $last = substr($last, 2, 3) + 0;
        $last = $last + 1;
        for ($i = 0; $i < 3 - strlen($last); $i++) {
            $last = '0'.$last;
        }
        $last = 'DC'.$last;

        return $last;
    }


    static function add($maKH, $tinh, $huyen, $xa, $diaChi, $ghiChu) { 
        $db = DB::getInstance(); 
        $maDC = Address::lastID();
        $sql = "INSERT DiaChi(MaDC, MaKH, Tinh, Huyen, Xa, SoNha, GhiChu) 
                VALUES ('".$maDC."', '".$maKH."', '".$tinh."', '".$huyen."', '".$xa."', '".$diaChi."', '".$ghiChu."')"; 
        $req = $db->query($sql);
        
        return $req;
    }

    static function update($id, $tinh, $huyen, $xa, $diaChi, $ghiChu) { 
        $db = DB::getInstance(); 
        $sql = "UPDATE DiaChi SET Tinh='".$tinh."', Huyen='".$huyen."', Xa='".$xa."', SoNha='".$diaChi."', GhiChu='".$ghiChu."' 
             WHERE MaDC='".$id."'"; 
        $req = $db->query($sql);
        return $req;
    }

    static function delete($id) { 
        $db = DB::getInstance(); 
        $sql = "DELETE FROM DiaChi WHERE MaDC='".$id."'"; 
        $req = $db->query($sql);
        
        return $req;
    }
 
}

?>

