<?php 
	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		// var_dump($_GET['id']);
		$id = $_GET['id'];
		$data_str = file_get_contents('songs.json');
		$data_arr = json_decode($data_str,true);
		// var_dump($data_arr);
		foreach ($data_arr as $value) {
			if ($id===$value['id']) {
				$index = array_search($value, $data_arr);
				unlink($value['source']);
				// var_dump($index);
				array_splice($data_arr, $index,1);
				// var_dump($data_arr);
				$new_data_str = json_encode($data_arr);
				file_put_contents('songs.json', $new_data_str);
				break;
			}
		}
		header("Location:1list.php");
		
	}
 ?>