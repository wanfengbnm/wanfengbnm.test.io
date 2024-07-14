<!--register.php-->
 
<?php
 
//获取表单数据
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
 
//判断两次密码是否一致
if($password != $repassword){
	echo "<script>alert(\"两次密码不一致\");</script>";
	echo "<script>url=\"register.html\";window.location.href=url;</script>";
	exit();
}
 
//连接数据库
include("connect.php");
 
//判断用户名是否已被注册
$sql = "select userid from user where username = '$username'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
	echo "<script>alert(\"该用户名已被注册\");</script>";
	echo "<script>url=\"register.html\";window.location.href=url;</script>";
	exit();
}
 
//向数据库中插入新用户，userid位置插入null，因为建表时userid字段设置为自动递增，useridj就会自动增长
$sql = "insert into user values(null,'$username','$password')";
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert(\"注册成功，前往登录\");</script>";
	echo "<script>url=\"login.html\";window.location.href=url;</script>";
}else{
	//数据库报错
	die("Error: ".mysqli_error($conn));
}
 
//关闭数据库
mysqli_close($conn);
 
?>