<?php 
	$data_str = file_get_contents('songs.json');
	$data_arr = json_decode($data_str,true);
	// var_dump($data_arr);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>音乐列表</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<table class="table table-bordered">
		<h1 class="text-center display-3 py-3">音乐列表</h1>
		<a class="btn btn-danger btn-sm" href="2upload_song.php">新增</a>
		<hr>
			<thead class="table-success">
				<tr>
					<th>歌名</th>
					<th>歌手</th>
					<th>专辑</th>
					<th>音乐</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if($data_arr): ?>
					<?php foreach ($data_arr as  $value) : ?>
						<tr>
							<td><?php echo $value['title']; ?></td>
							<td><?php echo $value['singer']; ?></td>
							<td><?php echo $value['record']; ?></td>
							<td><audio src="<?php echo $value['source']; ?>" controls></audio></td>
							<td>
								<a class="btn btn-danger btn-sm" href="4modify.php?id=<?php echo $value['id']; ?>">修改</a>
								<a class="btn btn-danger btn-sm" href="3del.php?id=<?php echo $value['id']; ?>">删除</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td class="text-center" colspan="5">暂无内容</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	
</body>
</html>