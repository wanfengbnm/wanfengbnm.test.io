<!--login.php-->
 
<?php
 
//连接数据库
include("connect.php");
 
//获取表单数据
$username = $_POST['username'];
$password = $_POST['password'];
 
//查询用户
$sql = "select userid from user where username = '$username' and password = '$password'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){//mysqli_num_rows的返回值是查询结果的行数，查询成功跳转到主页index.php
	echo "<script>url=\"index.php\";window.location.href=url;</script>";
}else{//没有查询到该用户，弹出一个对话框"用户名或密码错误"，并返回login.html页面
	echo "<script>alert(\"用户名或密码错误\");</script>";
	echo "<script>url=\"login.html\";window.location.href=url;</script>";
}
 
//关闭数据库
mysqli_close($conn);
 
?>