<?php 
	/**
	* 
	*/
 	require_once "database.php";

	class chuyen_di extends database
	{
		public function lay_thong_tin_sbd() {
			$sql = "SELECT cd.masanbaydi MA, mota MOTA, khuvuc KHUVUC 
					FROM chuyendi cd JOIN sanbay sb ON cd.masanbaydi = sb.masanbay;";
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

		function lay_thong_tin_tat_ca_chan_bay() {
			$sql = "SELECT * 
					FROM chuyendi;";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

		public function them_chan_bay($sanbaydi, $sanbayden) {
			$sql = "INSERT INTO `chuyendi` (`masanbaydi`, `masanbayden`) VALUES ('$sanbaydi', '$sanbayden');";
			$this->setQuery($sql);
			$result = $this->query();
			return $result;
		}

	}
 ?>