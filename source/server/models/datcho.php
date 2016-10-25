<?php 
	/**
	* 
	*/
 	require_once "database.php";

	class dat_cho extends database
	{
		public function lay_dat_cho_cuoi() {
			$sql = "SELECT * FROM `datcho` ORDER BY thoigiandatcho DESC";
			$this->setQuery($sql);
			$result = $this->query();
			$row = mysql_fetch_assoc($result);
			return $row;
		}
		public function lay_thong_tin_dat_cho($ma) {
			$sql = "SELECT * FROM `datcho` WHERE `ma` LIKE '$ma';";
			$this->setQuery($sql);
			$result = $this->query();
			$row = mysql_fetch_assoc($result);
			return $row;
		}

		public function cap_nhat_trang_thai($ma, $trangthai=F_TRUE) {
			$sql = "UPDATE `datcho` SET `trangthai` = '$trangthai' WHERE `datcho`.`ma` = '$ma';";
			$this->setQuery($sql);
			if ($result = $this->query()) {
				$row = $this->lay_thong_tin_dat_cho($ma);
			}
			return $row;
		}

		public function dat_cho_moi($tongtien, $trangthai) {
			$ma_cu = $this->lay_dat_cho_cuoi();
			$ma = create_uid_ascill($ma_cu['ma']);
			if (isset($ma)) {
				$sql = "INSERT INTO `datcho` (`ma`, `thoigiandatcho`, `tongtien`, `trangthai`) VALUES ('$ma', CURRENT_TIMESTAMP, '$tongtien', '$trangthai');";
				$this->setQuery($sql);
				$result = $this->query();
				if ($result) {
					$row = $this->lay_thong_tin_dat_cho($ma);
					return $row;
				}
			}
			return "";
		}

	}
 ?>