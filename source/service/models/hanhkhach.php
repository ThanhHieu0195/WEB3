<?php 
	/**
	* 
	*/
 	require_once "database.php";

	class hanh_khach extends database
	{
		public function lay_thong_tin_tat_ca_hanh_khach() {
			$sql = "SELECT * FROM `hanhkhach`;";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

		public function lay_thong_tin_hanh_khach($madatcho) {
			$sql = "SELECT * FROM `hanhkhach` WHERE madatcho = '$madatcho';";
			$this->setQuery($sql);
			$result = $this->query();
			$arr = array();
			while ($row = mysql_fetch_assoc($result)) {
				# code...
				$arr[] = $row;
			}
			return $arr;
		}

		function them_hanh_khach($madatcho, $danhxung, $ho, $ten){
			$sql = "INSERT INTO `hanhkhach` (`id`, `madatcho`, `danhxung`, `ho`, `ten`) VALUES (NULL, '$madatcho', '$danhxung', '$ho', '$ten');";
			$this->setQuery($sql);
			$result = $this->query();
			return $result;
		}

	}
 ?>