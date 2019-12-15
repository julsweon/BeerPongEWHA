<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
session_start();
$name=$_POST['my_name'];
$email=$_POST['my_email'];
$mysqli=mysqli_connect("localhost", "root", "1234", "beerpong");
if (!$mysqli){
	die("Connection failed: ".mysqli_connect_error());
}
if($name==NULL||$email==NULL){
	echo "<script> alert('빈칸을 모두 채워주세요.');</script>";
	echo "<script> location.href='findidpw.php' </script>";
	exit();
}
$query="SELECT *FROM Customers WHERE Customer_Name='$name'";
$result=$mysqli->query($query);
$row=mysqli_fetch_array($result);
if(!$row) {
	echo "<script> alert('존재하지 않는 회원입니다.');</script>";
	echo "<script> location.href='findidpw.php' </script>";
}
elseif($row['Customer_Email']!=$email){
	echo "<script> alert('회원정보가 올바르지 않습니다.');</script>";
	echo "<script> location.href='findidpw.php' </script>";
	exit();
}
elseif($row['Customer_Email']==$email&&$row['Customer_Name']==$name){
	$msg="ID: ".$row['Customer_ID'];
	echo "<script> alert('$msg');</script>";
	echo "<script> location.href='findidpw.php' </script>";
}

?>
</body>
</html>
