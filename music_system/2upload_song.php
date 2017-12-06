<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// var_dump($_POST);
	$title = empty($_POST['title']);//布尔值
	$singer = empty($_POST['singer']);//布尔值
	$record = empty($_POST['record']);//布尔值
	$flag = true;
	if($title || trim($_POST['title'] === '')){
		$flag = false;
		$error_arr['title'] = '请输入歌名';
	}
	if($singer || trim($_POST['singer'] === '')){
		$flag = false;
		$error_arr['singer'] = '请输入歌手姓名';
	}
	if($record || trim($_POST['record'] === '')){
		$flag = false;
		$error_arr['record'] = '请输入专辑名称';
	}
	if($_FILES['source']['error'] !== 0){
		$flag = false;
		$error_arr['source'] = '请上传歌曲文件';
	}else{
		$accept_type = array('audio/mp3','video/mp4');
		if (!in_array($_FILES['source']['type'], $accept_type)) {
			$flag = false;
			$error_arr['source'] = '文件格式错误';
		}
	}
	// var_dump($error_arr);
	if($flag===true){
		//进来说明条件都满足,可以进行数据存储操作
		move_uploaded_file($_FILES['source']['tmp_name'], 'music/'.$_FILES['source']['name']);
		$data_str = file_get_contents('songs.json');
		$data_arr = json_decode($data_str);
		$new_data = array(
			'id' => uniqid(),
			'title' => $_POST['title'] , 
			'singer' => $_POST['singer'] , 
			'record' => $_POST['record'] , 
			'source' => 'music/'.$_FILES['source']['name']

		);
		// var_dump($new_data);
		$data_arr[] = $new_data;
		// var_dump($data_arr);//存入之前先校验数据是否正确
		$new_data_str = json_encode($data_arr);
		file_put_contents('songs.json', $new_data_str);
		header('Location:1list.php');

		
	}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>上传歌曲</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center display-3 py-3">音乐上传</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="title" class="control-label">歌名</label>
				<input type="text" class="form-control <?php echo array_key_exists('title', $error_arr) ? 'is-invalid' : '';?>" id="title" name="title">
				<small class="invalid-feedback"><?php echo $error_arr['title']; ?></small>
			</div>
			<div class="form-group">
				<label for="singer" class="control-label">歌手</label>
				<input type="text" class="form-control <?php echo array_key_exists('singer', $error_arr) ? 'is-invalid' : '';?>" id="singer" name="singer">
				<small class="invalid-feedback"><?php echo $error_arr['singer']; ?></small>
			</div>
			<div class="form-group">
				<label for="record" class="control-label">专辑</label>
				<input type="text" class="form-control <?php echo array_key_exists('record', $error_arr) ? 'is-invalid' : '';?>" id="record" name="record">
				<small class="invalid-feedback"><?php echo $error_arr['record']; ?></small>
			</div>
			<div class="form-group">
				<label for="source" class="control-label">资源文件</label>
				<input type="file" class="form-control <?php echo array_key_exists('source', $error_arr) ? 'is-invalid' : '';?>" id="source"  name="source" accept=".mp3,.mp4">
				<small class="invalid-feedback"><?php echo $error_arr['source']; ?></small>
			</div>
			<button class="btn btn-primary btn-block">上传</button>


		</form>
	</div>
	
</body>
</html>