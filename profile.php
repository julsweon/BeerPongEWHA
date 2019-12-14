<!DOCTYPE html>
<html>
<head>
<style>
.hero-image {
  background-image: url("long.jpg");
  height: 250px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
</style>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION['id'])){
	echo "<script> alert('로그인해주세요.');
			location.replace('login.html')</script>";
}
?>
<?php
	if(isset($_SESSION['id'])){
?>
<p align="right" style="color:#222222">
<?php	echo $_SESSION['id'].'님 안녕하세요';?>
<button class="do_login" onclick="location.href='logout.php'">[로그아웃]</button>
</p>
<?php
} else{
?>
<p align="right" style="color:#222222">
<button class="do_login" onclick="location.href='login.html'">[로그인]</button> |
<button class="do_login" onclick="location.href='join.html'">[회원가입]</button>
</p>
<?php
}
?>
<div class="hero-image" onclick="location.href='home.php'"></div>
    <button class="tab"onclick="location.href='home.php'">HOME</button>
    <button class="tab" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>
<?php
$mysqli=mysqli_connect("localhost", "root","1234", "beerpong");
if ( !$mysqli) die('DB Error');
$id= $_SESSION['id'];
$sql="SELECT * FROM Customers WHERE Customer_ID='$id'";
$result=$mysqli->query($sql);
$arr=mysqli_fetch_array($result);
$name=$arr['Customer_Name'];
$email=$arr['Customer_ID'];

?>
<p id="login">이름 : <?php echo $name ?> </p>
<p id="login">아이디 :<?php echo $id ?></p>
<p id="login">이메일 : <?php echo $email ?> </p>
<form method="post" action = "modify.php"> 
<p id="login">비밀번호 변경하기</p>
<div id="login_engine">
<div>
<input type="password" name="my_password" class="loginbox"></div>
</div>

<p id="login">< 나의 맛 취향 ><br><br>
당도
<select name="stars_Sugar">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>
<br>
산미
<select name="stars_Sour">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>
<br>
풍미
<select name="stars_Flavor">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>
<br>

</p>


<p align="center"><button id="loginbutton" onclick="location.href='mypage.php'">정보 수정하기</button></p>
</form>
</body>
</html>
