<!DOCTYPE html>
<html>
<head>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css?after" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
$name=$_POST['my_name2'];
$id=$_POST['my_id'];
$email=$_POST['my_email2'];
$mysqli=mysqli_connect("localhost", "root", "1234", "beerpong");
if (!$mysqli){
	die("Connection failed: ".mysqli_connect_error());
}
if($name==NULL||$email==NULL){
	echo "<script> alert('빈칸을 모두 채워주세요.');</script>";
	echo "<script> location.href='findidpw.php' </script>";
	exit();
}
$query="SELECT *FROM Customers WHERE Customer_ID='$id'";
$result=$mysqli->query($query);
$row=mysqli_fetch_array($result);
if(!$row) {
	echo "<script> alert('존재하지 않는 회원입니다.');</script>";
	echo "<script> location.href='findidpw.php' </script>";
}
elseif($row['Customer_Email']!=$email||$row['Customer_Name']!=$name){
	echo "<script> alert('회원정보가 올바르지 않습니다.');</script>";
	echo "<script> location.href='findidpw.php' </script>";
	exit();
}
elseif($row['Customer_ID']==$id&&$row['Customer_Email']==$email&&$row['Customer_Name']==$name){
	$ch='0123456789abcdefghijklmnoparstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$chlen=strlen($ch);
	$randomPW='';
	for($i=0;$i<6;$i++){
		$randomPW.=$ch[rand(0,$chlen-1)];
	}
	$changePW=md5($randomPW);
	$changequery="UPDATE Customers SET Customer_PW='$changePW' WHERE Customer_ID='$id'";
	$mysqli->query($changequery);
	$msg="임시 비밀번호: ".$randomPW;
	$comment='\n\n로그인 후 비밀번호를 변경해주세요';
	echo "<script> alert('$msg$comment');</script>";
	echo "<script> location.href='findidpw.php' </script>";
}

?>
</body>
</html>