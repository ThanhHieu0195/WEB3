<?php 

define('USER', 'user');
	require_once "../../helper/constants.php";
	require_once "../../helper/helper.php";
 	require_once "../../models/datcho.php";

 	$model = new dat_cho();
 	$METHOD = $_SERVER['REQUEST_METHOD'];
 	$OUTPUT = array("METHOD" => "", "DATA" => array(), "MESSAGE" => array());

 	switch ($METHOD) {
 		case 'GET':
 			# code...
 			$OUTPUT['METHOD'] = "GET";
 			// thông tin mã đặt chổ

			$str_parameters = $_SERVER['QUERY_STRING'];
			$parameters = explode('/', $str_parameters);

			$ma = $parameters[0];
			$data = $model->lay_thong_tin_dat_cho($ma);

			if (count($data) > 0) {
				$OUTPUT['DATA'] = $data;
				// found
				http_response_code(200);
			} else {
				// bad request
				http_response_code(400);
			}
 			break;

 		case 'POST':
 			# code...
 			$OUTPUT['METHOD'] = "POST";
 			if (isset($_REQUEST['tongtien'])) {
				$tongtien = $_REQUEST['tongtien'];
				$trangthai = F_FALSE;
				$result = $model->dat_cho_moi($tongtien, $trangthai);
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
 			$OUTPUT['METHOD'] = "PUT";
 			$_PUT = $_REQUEST;

 			if (isset($_PUT['trangthai'])) {
 				$ma = $_PUT['ma'];	
 			} else {
 				$str_parameters = $_SERVER['QUERY_STRING'];
				$parameters = explode('/', $str_parameters);
				if (count($parameters) == 2 && $parameters[0] == "trangthai") {
					$ma = $parameters[1];
				}
 			}

 			if (isset($ma)) {
				if ($result = $model->cap_nhat_trang_thai($ma)) {
					$OUTPUT['data'] = $result;
					http_response_code(200);
				} else {
					http_response_code(400);
				}
 			} else {
 				http_response_code(404);
 			}

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

