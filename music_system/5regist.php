<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/regist.css">
	<script src="js/regist.js"></script>
</head>
<body>
	<div class="container">
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<table class="table">
				<thead class="table_title">
					<tr>
						<td colspan="2" >会员注册</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="left_td">用户名：</td>
						<td><input type="text" name ="username" id='uesename'><span>请输入3-16位用户名</span></td>
					</tr>
					<tr>
						<td class="left_td">密码：</td>
						<td><input type="password" name ="password1" id='password1'></td>
					</tr>
					<tr>
						<td class="left_td">确认密码：</td>
						<td><input type="password" name ="password2" id='password2'></td>
					</tr>
					<tr>
						<td class="left_td">邮箱:</td>
						<td><input type="text" name ="mail" id='mail'></td>
					</tr>
					<tr>
						<td class="left_td">性别:</td>
						<td>
							<label for="male"><input type="radio" name="gender" id="male">男</label>
							<label for="female"><input type="radio" name="gender" id="female">女</label>
						</td>
					</tr>
					<tr>
						<td class="left_td">个人主页:</td>
						<td><input type="text" value="http://"></td>
					</tr>
					<tr>
						<td class="left_td">爱好:</td>
						<td>
							<label for="photo"><input type="checkbox" name="hobby[]" id="photo">摄影</label>
							<label for="draw"><input type="checkbox" name="hobby[]" id="draw">绘画</label>
							<label for="read"><input type="checkbox" name="hobby[]" id="read">阅读</label>
							<label for="sport"><input type="checkbox" name="hobby[]" id="sport">运动</label>
						</td>
					</tr>
					<tr>
						<td class="left_td">职业:</td>
						<td>
							<select name="job">
								<option value="engineer">工程师</option>
								<option value="teacher">教师</option>
								<option value="student">学生</option>
								<option value="doctor">医生</option>
								<option value="freework">自由职业者</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="left_td">备注:</td>
						<td><textarea name="" id="" cols="30" rows="2"></textarea></td>
					</tr>
					<tr class="text-center">
						<td colspan="2">
							<button class="btn btn-danger btn-sm">注册</button>
							<button class="btn btn-danger btn-sm" type="reset">清除</button>
						</td>
					</tr>
					
				</tbody>
			</table>
		</form>
	</div>
	
</body>
</html>