<?php 
	/**
	* 
	*/
 	require_once "database.php";

	class chuyen_bay extends database
	{
		public function lay_thong_tin_tat_ca_chuyen_bay() {
			$sql = "SELECT * FROM `chuyenbay`;";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

		public function lay_thong_tin_chuyen_bay($ma) {
			$sql = "SELECT * FROM `chuyenbay` WHERE ma = '$ma';";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

		public function tim_chuyen_bay($noidi, $noiden, $ngay, $soluonghanhkhach) {
			$sql = "SELECT * FROM `chuyenbay` WHERE `noidi` LIKE '$noidi' AND `noiden` LIKE '$noiden' AND `ngay` = '$ngay' AND `soluongghe` >= $soluonghanhkhach;";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		} 

		public function lay_thong_tin_sbd_sbd($masanbaydi) {
			$sql = "SELECT cd.masanbaydi MA, mota MOTA, khuvuc KHUVUC 
					FROM chuyendi cd JOIN sanbay sb ON cd.masanbaydi = sb.masanbay
					WHERE cd.masanbaydi = '{$masanbaydi}';";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

	}
 ?>