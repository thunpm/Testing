<?php
require_once ('app/connection.php');
// require_once ('connection.php');

class Customer { 
    public $idCustomer;
    public $username;
    public $password;
    public $fullname;
    public $phoneNumber;
    public $email;
    public $gender;
    public $birthday;

    function __construct($idCustomer, $username, $password, $fullname, $phoneNumber, $email, $gender, $birthday) { 
        $this->idCustomer = $idCustomer;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->gender = $gender;
        $this->birthday = $birthday;
    } 

    public function setUers ($idCustomer)
    	{
        	$this->idCustomer = $idCustomer;
    	}


    static function lastID() {
        $db = DB::getInstance(); 
        $sql = "SELECT MaKH FROM khachhang ORDER BY MaKH DESC LIMIT 1"; 
        $req = $db->query($sql);
        $last = null;

        foreach ($req->fetchAll() as $item) { 
            $last = $item['MaKH'];
        } 

        return $last;
    }


	 static function isRegister($so,$TenDangNhap,$MatKhau,$HoTen,$SoDienThoai){
        $db = DB::getInstance(); 
        $MaKH = Customer::lastID();
        if ($MaKH == null) {
            $MaKH = 'KH000';
        }
        $so = substr($MaKH, 2, 3) + 0;
        $so = $so + 1;
        for ($i = 0; $i < 3 - strlen($so); $i++) {
            $so = '0'.$so;
        }
        $so = 'KH'.$so;

        $sql = "INSERT INTO `khachhang`(`MaKH`, `TenDangNhap`, `MatKhau`, `HoTen`, `SoDienThoai`)
                VALUE('$so','$TenDangNhap','$MatKhau','$HoTen','$SoDienThoai')"; 
        $req = $db->query($sql);
    }

    static function getregisterId($TenDangNhap) { 
        $db = DB::getInstance(); 
        $sql = "SELECT TenDangNhap FROM khachhang WHERE TenDangNhap='".$TenDangNhap."'"; 
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $item) { 
            return $item;
        } 

    }
	
    static function isValidAccount($TenDangNhap, $MatKhau) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM khachhang WHERE TenDangNhap='".$TenDangNhap."' AND MatKhau='".$MatKhau."'"; 
        $req = $db->query($sql);

        foreach ($req->fetchAll() as $item) { 
           
           return true;
        } 

        return false;
    }

    static function getByUsername($username) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM KhachHang WHERE TenDangNhap='".$username."'"; 
        $req = $db->query($sql);

        foreach ($req->fetchAll() as $item) {
           return new Customer($item['MaKH'], $item['TenDangNhap'], $item['MatKhau'], $item['HoTen'],
                            $item['SoDienThoai'], $item['Email'], $item['GioiTinh'], $item['NgaySinh']);
        }
    }

    static function getByMaKH($MaKH) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM KhachHang WHERE MaKH='".$MaKH."'"; 
        $req = $db->query($sql);

        foreach ($req->fetchAll() as $item) { 
           return new Customer($item['MaKH'], $item['TenDangNhap'], $item['MatKhau'], $item['HoTen'],
                            $item['SoDienThoai'], $item['Email'], $item['GioiTinh'], $item['NgaySinh']);
        } 
    }

    static function updateAccount($MaKH, $HoTen, $SoDienThoai, $Email, $GioiTinh, $NgaySinh) {
        if ($HoTen == '' || $SoDienThoai == '') {
            return "Chưa nhập trường bắt buộc";
        }

        if (! preg_match('/[(84)0][35789]([0-9]{8})$/', $SoDienThoai)) {
            return "Số điện thoại không hợp lệ";
        }

        if ($Email != '' && ! preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $Email)) {
            return "Email không hợp lệ";
        }

        if ($NgaySinh != '') {
            try {
                if (date("Y-m-d", $NgaySinh) >= date("Y-m-d", strtotime("now"))) {
                    return "Ngày sinh không hợp lệ";
                }
                date_default_timezone_set('UTC');
                $date = DateTime::createFromFormat($format, $NgaySinh);
                return $date && ($date->format($format) === $NgaySinh);
            } catch (Exception $e) {
                return "Ngày sinh không hợp lệ";
            }
        }

        $db = DB::getInstance();
        $sql = "UPDATE khachhang 
                SET HoTen='".$HoTen."', SoDienThoai='".$SoDienThoai."', Email='".$Email."', GioiTinh='".$GioiTinh."', NgaySinh='".$NgaySinh."' 
                WHERE MaKH='".$MaKH."'";

        try {
            $req = $db->query($sql);
            return "Ok";
        } catch (Exception $e) {
            return "Đã xảy ra lỗi, vui lòng thử lại";
        }
    }

    static function SeclecPass($TenDangNhap,$matkhaucu) { 
		$db = DB::getInstance(); 
		$sql = "SELECT * FROM khachhang WHERE TenDangNhap='".$TenDangNhap."' AND MatKhau='".$matkhaucu."'";
		$req = $db->query($sql);
		foreach ($req->fetchAll() as $item) { 
       
            return $item;
        } 
	
	}
    
    static function UpdatePass($matkhaumoi_1) { 
		$db = DB::getInstance(); 
		$sql = "UPDATE khachhang SET MatKhau='".$matkhaumoi_1."' WHERE MaKH='KH001'";

		$req = $db->query($sql);
		foreach ($req->fetchAll() as $item) { 
			return true;
		} 
		return false;
	}

    static function getName($idCustomer) {
        $db = DB::getInstance(); 
        $sql = "SELECT HoTen FROM khachhang WHERE MaKH='".$idCustomer."'"; 
        $req = $db->query($sql);
        $ten = "";

        foreach ($req->fetchAll() as $item) { 
            $ten = $item['HoTen'];
        }
        return $ten; 
    }
static function getAll()
    {
        $db = DB::getInstance(); 
		$sql = "SELECT* FROM KhachHang  WHERE DaXoa = 0 ORDER BY MaKH";
		$req = $db->query($sql);
        $list = [];

        foreach ($req->fetchAll() as $item) { 
            $list[] = new Customer($item['MaKH'], $item['TenDangNhap'], $item['MatKhau'], $item['HoTen'],
            $item['SoDienThoai'], $item['Email'], $item['GioiTinh'], $item['NgaySinh']);
        } 

        return $list; 

		
	}

    static function getById($id) { 
        $db = DB::getInstance(); 
        $sql = "SELECT * FROM KhachHang WHERE MaKH='".$id."'"; 
        $req = $db->query($sql);

        foreach ($req->fetchAll() as $item) { 
           return new Customer($item['MaKH'], $item['TenDangNhap'], $item['MatKhau'], $item['HoTen'],
                            $item['SoDienThoai'], $item['Email'], $item['GioiTinh'], $item['NgaySinh']);
        } 

        return null;
    }
   
    static function delete($idCustomer) {
        $db = DB::getInstance(); 
        $stmt = $db->prepare('update khachhang set DaXoa = 1 where MaKH = :MaKH');
        $stmt->bindParam(':MaKH', $idCustomer);
        $stmt->execute();
        return 1;
    }

    static function deleteAll() {
        $db = Db::getInstance();
        $stmt = $db->prepare('delete from khachhang');
        $stmt->execute();
    }
    
}

?>
