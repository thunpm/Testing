<?php 
	require_once('models/Product.php'); 
	require_once('models/Items.php'); 
	require_once('models/Customer.php'); 
	class Invoice { 
		public $maHD;
		public $maKH;
		public $ngayLap;
		public $trangThai;
		public $detail;

		function __construct($maHD, $maKH, $ngayLap, $trangThai) { 
			$this->maHD = $maHD;
			$this->maKH = $maKH;
			$this->ngayLap = $ngayLap;
			$this->trangThai = $trangThai;
		}

		static function getOrders() {
			$db = DB::getInstance(); 
			$sql = "SELECT * FROM hoadon"; 
            $req = $db->query($sql);
			$list = [];
			$i = 0;

			foreach ($req->fetchAll() as $item) { 
				$i++;
                $list[$i] = new Invoice($item['MaHD'], $item['MaKH'], $item['NgayLap'], $item['TrangThai']);
				$sql = "SELECT * FROM chitiethoadon WHERE MaHD='".$item['MaHD']."'"; 
            	$req2 = $db->query($sql);
				$list2 = [];
				$customer = '';

				foreach ($req2->fetchAll() as $item2) { 
					$sanPham = Product::getSanPham($item2['MaSP']);
                    $list2[] = new Items($sanPham, $item2['SoLuong'], $item2['Gia'], $item2['KhuyenMai']);

					$customer = Customer::getByMaKH($item['MaKH']);
				}

				$list[$i]->detail = $list2;
				$list[$i]->customer = $customer;
            }

			return $list;
        }

		static function lastID() {
			$db = DB::getInstance(); 
			$sql = "SELECT MaHD FROM HoaDon ORDER BY MaHD DESC LIMIT 1"; 
            $req = $db->query($sql);
			$last = null;

			foreach ($req->fetchAll() as $item) { 
                $last = $item['MaHD'];
            } 

			return $last;
		}

		static function add($user, $cart) { 
            $db = DB::getInstance(); 
			$today = date("Y-m-d H:i:s");
			$maHD = Invoice::lastID();
			if ($maHD == null) {
				$maHD = 'HD000';
			}
			$so = substr($maHD, 2, 3) + 0;
			$so = $so + 1;
			for ($i = 0; $i <= 3 - strlen($so); $i++) {
				$so = '0'.$so;
			}
			$so = 'HD'.$so;
            $sql = "INSERT HoaDon(MaHD, MaKH, NgayLap, TrangThai) VALUES ('".$so."', '".$user->idCustomer."', '".$today."', 'Đang chuẩn bị hàng')"; 
            $req = $db->query($sql);

			if ($req == true) {
				foreach ($cart->listItems as $item) {
					$sql = "INSERT ChiTietHoaDon(MaHD, MaSP, SoLuong, Gia, KhuyenMai) 
							VALUES ('".$so."', '".$item->sanPham->maSP."', '".$item->soLuong."', '".$item->donGia."', '".$item->khuyenMai."')"; 
            		$req = $db->query($sql);
				}
				return true;	
			} else {
				return false;
			}
        }

		static function listByIdCustomer($maKH) {
			$db = DB::getInstance(); 
			$sql = "SELECT * FROM HoaDon WHERE MaKH='".$maKH."'"; 
            $req = $db->query($sql);
			$list = [];
			$i = 0;

			foreach ($req->fetchAll() as $item) { 
				$i++;
                $list[$i] = new Invoice($item['MaHD'], $item['MaKH'], $item['NgayLap'], $item['TrangThai']);
				$sql = "SELECT * FROM ChiTietHoaDon WHERE MaHD='".$item['MaHD']."'"; 
            	$req2 = $db->query($sql);
				$list2 = [];

				foreach ($req2->fetchAll() as $item2) { 
					$sanPham = Product::getSanPham($item2['MaSP']);
                    $list2[] = new Items($sanPham, $item2['SoLuong'], $item2['Gia'], $item2['KhuyenMai']);
				}

				$list[$i]->detail = $list2;
            }

			return $list;
		}

		static function deleteInvoice($MaHD) {
			$db = DB::getInstance(); 
            $sql01 = "DELETE FROM hoadon WHERE MaHD = '".$MaHD."'"; 
            $sql02 = "DELETE FROM chitiethoadon WHERE MaHD = '".$MaHD."'"; 
			$db->query($sql02);
			sleep(1);
            $db->query($sql01);
		}

		static function showOrder($MaHD) {
			$db = DB::getInstance(); 
			$sql = "SELECT * FROM hoadon WHERE MaHD = '".$MaHD."'"; 
            $req = $db->query($sql);
			$list = [];
			$i = 0;

			foreach ($req->fetchAll() as $item) { 
				$i++;
                $list[$i] = new Invoice($item['MaHD'], $item['MaKH'], $item['NgayLap'], $item['TrangThai']);
				$sql = "SELECT * FROM chitiethoadon WHERE MaHD='".$item['MaHD']."'"; 
            	$req2 = $db->query($sql);
				$list2 = [];
				$customer = '';

				foreach ($req2->fetchAll() as $item2) { 
					$sanPham = Product::getSanPham($item2['MaSP']);
                    $list2[] = new Items($sanPham, $item2['SoLuong'], $item2['Gia'], $item2['KhuyenMai']);

					$customer = Customer::getByMaKH($item['MaKH']);
				}

				$list[$i]->detail = $list2;
				$list[$i]->customer = $customer;
            }

			return $list['1'];
		}

		static function updateOrder($MaHD, $TrangThai) {
			$db = DB::getInstance(); 
			$sql = "UPDATE hoadon SET TrangThai='".$TrangThai."' WHERE MaHD = '".$MaHD."'";
            $db->query($sql);
		}

		static function listByDate($date1, $date2) {
			$db = DB::getInstance(); 
			$sql = "select cthd.MaSP, sum(cthd.SoLuong) as TongSoLuong, cthd.Gia, cthd.KhuyenMai from ChiTietHoaDon cthd 
					inner join SanPham on SanPham.MaSP = cthd.MaSP 
					inner join HoaDon on HoaDon.MaHD = cthd.MaHD 
					where date(NgayLap) between '".$date1."' and '".$date2."' 
					group by cthd.MaSP"; 
            $req = $db->query($sql);
			$list = [];

			foreach ($req->fetchAll() as $item) { 
				$sanPham = Product::getSanPham($item['MaSP']);
				$list[] = new Items($sanPham, $item['TongSoLuong'], $item['Gia'], $item['KhuyenMai']);
            }

			return $list;
		}
	}
?>
