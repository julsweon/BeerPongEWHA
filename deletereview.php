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
$reviewid=$_POST['deleteButton'];
$mysqli=mysqli_connect("localhost", "root","1234", "beerpong");
$query="DELETE from Beer_Review WHERE Review_ID='$reviewid'";
$signup=mysqli_query($mysqli, $query);
if($signup){
	echo "<script> alert('리뷰가 삭제되었습니다.'); </script>";
	echo "<script> location.href='mypage.php' </script>";
}
?>
</body>
</html>
