<?php 

define('USER', 'user');
	require_once "../../helper/constants.php";
	require_once "../../helper/helper.php";
 	require_once "../../models/hanhkhach.php";

 	$model = new hanh_khach();
 	$METHOD = $_SERVER['REQUEST_METHOD'];
 	$OUTPUT = array("METHOD" => "", "DATA" => array(), "MESSAGE" => array());

 	switch ($METHOD) {
 		case 'GET':
 			$OUTPUT['METHOD'] = "GET";
 			// trả về tất cả danh sách các chuyến bay
 			if (count($_GET) == 0) {
 				$data = $model->lay_thong_tin_tat_ca_hanh_khach();
 				$OUTPUT['DATA'] = $data;
 			} else {
				$str_parameters = $_SERVER['QUERY_STRING'];
				$parameters = explode('/', $str_parameters);
				if (count($parameters) == 1) {
					$madatcho = $parameters[0];
					$data = $model->lay_thong_tin_hanh_khach($madatcho);
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
 			$OUTPUT['METHOD'] = "POST";
 			if (count($_REQUEST) == 4) {
	 			$madatcho = $_REQUEST['madatcho'];
	 			$danhxung = $_REQUEST['danhxung'];
	 			$ho = $_REQUEST['ho'];
	 			$ten = $_REQUEST['ten'];
 			} else {
 				$str_parameters = $_SERVER['QUERY_STRING'];
				$parameters = explode('/', $str_parameters);

				if (count($parameters) == 4) {
					$madatcho = $parameters[0];
		 			$danhxung = $parameters[1];
		 			$ho = $parameters[2];
		 			$ten = $parameters[3];
				}
 			}

 			if (isset($madatcho) && isset($danhxung) && isset($ho) && isset($ten)) {
				$result = $model->them_hanh_khach($madatcho, $danhxung, $ho, $ten);
				
				if ($result) {
					$OUTPUT['DATA'] = $result;
					// found
					http_response_code(200);
				} else {
					// bad request
					http_response_code(400);
				}
 			} else {
 				http_response_code(400);
 			}

 			break;
 		case 'PUT':
 			break;
 		case 'DELETE':
 			# code...
 			break;
 		
 		default:
 			http_response_code(404);
 			break;
 	}
 	echo json_encode($OUTPUT);
 ?>

