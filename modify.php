<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
session_start();
$id= $_SESSION['id'];
$stars_Sugar=$_POST['stars_Sugar'];
$stars_Sour=$_POST['stars_Sour'];
$stars_Flavor=$_POST['stars_Flavor'];
$newPassword=$_POST['my_password'];
$newPassword2=$_POST['my_password2'];
$db=mysqli_connect("localhost","root","1234","beerpong");
if ( !$db) die('DB Error');
if($_POST['my_password']==""){
	echo"<script>alert('비밀번호를 다시 입력해주세요.');</script>";
	echo "<script> location.href='profile.php' </script>";
}
else if(($stars_Sugar=="0")||($stars_Sour=="0")||($stars_Flavor=="0")) {
	echo"<script>alert('다시 입력해주세요.');</script>";
	echo"<script> location.href='profile.php' </script>";
	exit();
}
elseif($newPassword!=$newPassword2){
	echo "<script> alert('비밀번호와 비밀번호 확인이 서로 다릅니다.');</script>";
	echo "<script> location.href='profile.php' </script>";
	exit();
}
elseif(strlen($newPassword)<4||strlen($newPassword)>10){
	echo "<script> alert('비밀번호를 4자이상 10자이하로 입력해주세요.');</script>";
	echo "<script> location.href='join.html' </script>";
	exit();
}
else {
	$password=md5($newPassword);
	$query="UPDATE Customers SET Customer_PW='$password', Taste_Sugar='$stars_Sugar', Taste_Sour='$stars_Sour', Taste_Flavor='$stars_Flavor' WHERE Customer_ID='$id'";
	$modify=mysqli_query($db, $query);
	if($modify){
	session_destroy();
	echo "<script> alert('회원정보 수정 완료');</script>";
	echo "<script> alert('다시 로그인 해주세요.');</script>";
	echo"<script> location.href='login.html' </script>";	
	}
}
$db->close();
?>
</body>
</html>