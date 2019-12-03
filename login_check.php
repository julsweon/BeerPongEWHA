<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
session_start();
$id=$_POST['my_id'];
$pw=$_POST['my_password'];

$mysqli=mysqli_connect("localhost", "root", "1234", "beerpong");
if (!$mysqli){
	die("Connection failed: ".mysqli_connect_error());
}
/*id가 있는지 검사*/
$check="SELECT * FROM customers WHERE Customer_ID='$id'";
$result=$mysqli-> query($check);   //해당 고객 행가져옴

/*id가 있다면 비밀번호 검사*/
$num=mysqli_num_rows($result);
if($num==1){
	$row=mysqli_fetch_array($result);
	$encryptedPW=md5($pw);
	if($row['Customer_PW']==$encryptedPW){
		$_SESSION['id']=$id;
		if(isset($_SESSION['id'])){
		echo "<script> alert('로그인되었습니다.');
			location.replace('home.php')</script>";

		}
		else{
		echo"세션 저장 실패";
		}
	}
	else{
	echo "<script> alert('아이디 또는 패스워드가 올바르지 않습니다.');</script>";
	echo "<script> location.href='login.html' </script>";
	}
}
else{
	echo "<script> alert('아이디 또는 패스워드가 올바르지 않습니다.');</script>";
	echo "<script> location.href='login.html' </script>";
}
?>
</body>
</html>

