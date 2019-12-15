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

    <button class="tab" onclick="location.href='home.php'">HOME</button>
    <button class="tab" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>

<div>

<table>
<tr> 
<form method="post" action="findID.php">
<td width=50%><article id="find"><header><h3>아이디 찾기</h3></header>
<p id="login">이름</p>
<div id="login_engine">
<div>
<input type="text" name="my_name" class="loginbox"></div>
</div>
<p id="login">이메일</p>
<div id="login_engine">
<div>
<input type="text" name="my_email" class="loginbox"></div>
</div>
<p align="center"><button id="loginbutton" type="submit" name="submit">확인</button></p>
</td>
</form>
<form method="post" action="findPW.php">
<td width=50%><article id="find"><header><h3>비밀번호 찾기</h3></header>
<p id="login">이름</p>
<div id="login_engine">
<div>
<input type="text" name="my_name2" class="loginbox"></div>
</div>
<p id="login">아이디</p>
<div id="login_engine">
<div>
<input type="text" name="my_id" class="loginbox"></div>
</div>
<p id="login">이메일</p>
<div id="login_engine">
<div>
<input type="text" name="my_email2" class="loginbox"></div>
</div>
<p align="center"><button id="loginbutton" type="submit" name="submit">확인</button></p>
</td>
</form>
</td></tr></table>

</body>
</html>
