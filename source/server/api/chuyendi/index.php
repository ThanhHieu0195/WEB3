<?php 

define('USER', 'user');
require_once "../../helper/constants.php";
require_once "../../helper/helper.php";
require_once "../../models/chuyendi.php";

 	$model = new chuyen_di();
 	$METHOD = $_SERVER['REQUEST_METHOD'];
 	$OUTPUT = array("METHOD" => "", "DATA" => array(), "MESSAGE" => array());

 	switch ($METHOD) {
 		case 'GET':
 			# code...
 			$OUTPUT['METHOD'] = "GET";
 			// trả về tất cả danh sách các chuyến bay
 			if (count($_GET) == 0) {
 				$data = $model->lay_thong_tin_sbd();
 				$OUTPUT['DATA'] = $data;
 			} else {
				$str_parameters = $_SERVER['QUERY_STRING'];
				$parameters = explode('/', $str_parameters);

				// api/chuyendi/?sanbayden/{masanbaydi}
				if ($parameters[0] == "sanbayden") {
					$masanbaydi = $parameters[1];
					$data = $model->lay_thong_tin_sbd_sbd($masanbaydi);
					if (count($data) > 0) {
						$OUTPUT['DATA'] = $data;
						// found
						http_response_code(200);
					} else {
						// bad request
						http_response_code(400);
					}
				} else 
				if ($parameters[0] == "chanbay"){
					if (count($parameters) == 1) {
						$data = $model->lay_thong_tin_tat_ca_chan_bay();
 						$OUTPUT['DATA'] = $data;
 						http_response_code(200);
					} else {
						http_response_code(400);
					}

				}
 			}
 			break;
 		case 'POST':
 			# code...
 			$OUTPUT['METHOD'] = "POST";
			
			$_DATA = $_REQUEST;
			if (count($_DATA) == 2) {
				$sanbaydi = isset($_DATA['sanbaydi'])?$_DATA['sanbaydi']:""; 			
				$sanbayden = isset($_DATA['sanbayden'])?$_DATA['sanbayden']:""; 
			} else {
				$str_parameters = $_SERVER['QUERY_STRING'];
				$parameters = explode('/', $str_parameters);
				if (count($parameters) == 2) {
					$sanbaydi = $parameters[0]; 			
					$sanbayden = $parameters[1]; 
				}
			}
			if (isset($sanbaydi) && isset($sanbayden)) {
				if ($model->them_chan_bay($sanbaydi, $sanbayden)) {
					http_response_code(200);
				} else {
					http_response_code(400);
				}
			} else {
				http_response_code(400);
			}			
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

