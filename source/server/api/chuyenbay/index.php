<?php 

define('USER', 'user');
require_once "../../helper/constants.php";
	require_once "../../helper/helper.php";
 	require_once "../../models/chuyenbay.php";
 	$model = new chuyen_bay();
 	$METHOD = $_SERVER['REQUEST_METHOD'];
 	$OUTPUT = array("METHOD" => "", "DATA" => array(), "MESSAGE" => array());

 	switch ($METHOD) {
 		case 'GET':
 			# code...
 			$OUTPUT['METHOD'] = "GET";
 			// trả về tất cả danh sách các chuyến bay
 			if (count($_GET) == 0) {
 				$data = $model->lay_thong_tin_tat_ca_chuyen_bay();
 				$OUTPUT['DATA'] = $data;
 			} else {
				$str_parameters = $_SERVER['QUERY_STRING'];
				$parameters = explode('/', $str_parameters);
				// trả về chuyến bay theo mã
				if (count($parameters) == 1) {
					$ma = $parameters[0];

					$data = $model->lay_thong_tin_chuyen_bay($ma);
					if (count($data) > 0) {
						$OUTPUT['DATA'] = $data;
						// found
						http_response_code(200);
					} else {
						// bad request
						http_response_code(400);
					}
				} else //tìm chuyến bay
				if (count($parameters) == 4){
					$noidi = $parameters[0];
					$noiden = $parameters[1];
					$ngay = $parameters[2];
					$soluonghanhkhach = $parameters[3];
					$data = $model->tim_chuyen_bay($noidi, $noiden, $ngay, $soluonghanhkhach);
					if (count($data) > 0) {
						$OUTPUT['DATA'] = $data;
						// found
						http_response_code(200);
					} else {
						// bad request
						http_response_code(400);
					}
				}
 			}
 			break;
 		case 'POST':
 			# code...
 			break;
 		case 'PUT':
 			# code...
 			break;
 		case 'DELETE':
 			# code...
 			break;
 		
 		default:
 			# code...
 			http_response_code(404);
 			break;
 	}
 	echo json_encode($OUTPUT);
 ?>

