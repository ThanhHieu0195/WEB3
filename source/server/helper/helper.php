<?php 
if (defined('USER')) {
		function create_uid($more_entropy = TRUE) {
		    if ($more_entropy) {
		        $id = uniqid ( '', true );
		        $id = str_replace ( '.', '', $id );
		    } else {
		        $id = uniqid ();
		    }
		    
		    return $id;
		}

		function create_uid_ascill($uid = 'AAAAAA', $length = 6) {
			$arr = str_split($uid, 1);
			$uid_new = "";
			if (count($arr) == $length) {
					$p = $length-1;
				while ($p >= 0) {
					$k = ord($arr[$p]);
					if ($k >= ord('A') && $k < ord('Z')) {
						$arr[$p] = chr($k+1);
						$p = -1;
					} else
					if ($k >= ord('Z')) {
						$arr[$p] = 'A';
						$p -= 1;
					} else {
						return "";
					}
				}
				return implode("", $arr);
			}
			return "";
		}
} else {
    require_once "../redirect/error.php";
}
?>