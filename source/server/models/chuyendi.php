<?php 
	/**
	* 
	*/
 	require_once "database.php";

	class chuyen_di extends database
	{
		public function lay_thong_tin_sbd() {
			$sql = "SELECT DISTINCT cd.masanbaydi MA, sb.mota MOTA, kv.mota KHUVUC
					FROM chuyendi cd JOIN sanbay sb ON cd.masanbaydi = sb.masanbay JOIN khuvuc kv ON sb.khuvuc = kv.id;";
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
			$sql = "SELECT DISTINCT cd.masanbayden MA, sb.mota MOTA, kv.mota KHUVUC 
					FROM chuyendi cd JOIN sanbay sb ON cd.masanbayden = sb.masanbay JOIN khuvuc kv ON sb.khuvuc = kv.id
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