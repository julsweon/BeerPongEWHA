<!DOCTYPE html>
<html>
<head>
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
<p align="center">
<button id="main_title" onclick="location.href='home.php'">비  어  퐁</button>
</p>
    <button class="tab active" onclick="location.href='home.php'">HOME</button>
    <button class="tab" onclick="location.href='review.php'">REVIEW</button>
    <button id="tab1" onclick="location.href='mypage.php'">MYPAGE</button>
<?php
if(!isset($_SESSION['id'])){
	echo "<script> alert('로그인해주세요.');
			location.replace('login.html')</script>";
}
?>


<?php
$mysqli=mysqli_connect("localhost", "root","1234", "beerpong");
if ( !$mysqli) die('DB Error');
$id= $_SESSION['id'];
$sql="SELECT * FROM Customers WHERE Customer_ID='$id'";
$result=$mysqli->query($sql);
$arr=mysqli_fetch_array($result);
$name=$arr['Customer_Name'];
$Taste_Sugar=$arr['Taste_Sugar'];
$Taste_Sour=$arr['Taste_Sour'];
$Taste_Flavor=$arr['Taste_Flavor'];
?>

   <div id="MYPAGE" class="content">   
<section class="myProfile">
    <h3> 나의 프로필 </h3>
    <table>
    <tr><td><image src = "https://cdn2.iconfinder.com/data/icons/user-people-4/48/6-512.png" width=100 height=100></td>
    <td>이름: <?php echo $name; ?>

    <p>아이디: <?php	echo $_SESSION['id'].'';?></td></tr></table>
    <p align="right">
    <button class="do_login" onclick="location.href='profile.php'">[정보 수정]</button>
    </p>
    </section>
    <section class="myMenu">
    <table>
    <tr> <td width=33.3%><article id="myPageMenu"><header><h3>맛 취향</h3></header>
	<table id="preference">
             <tr><td>당도</td> 
	<td>
<?php while($Taste_Sugar){
?>
<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

<?php $Taste_Sugar--;}
?>
	</td></tr>
	<tr><td>산미</td>
	<td><?php while($Taste_Sour){
?>
<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

<?php $Taste_Sour--;}
?>
	</td></tr>
	<tr><td>풍미 </td>
	<td><?php while($Taste_Flavor){
?>
<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

<?php $Taste_Flavor--;}
?>
	</td></tr>
	</table>
    <table id="preference">
	<tr><td>#향긋한 #달달한 #홉향</td></tr>
	<tr><td>#진한 #국산 #과일향</td></tr>
	</table></article></td>
    <td width=33.3%><article id="myPageMenu"><header><h3>추천 맥주</h3></header>
     <table id="preference">
	<tr><td><img class="logoimg" src = "https://www.cass.co.kr/images/etc/img_logo_1.jpg"></td>
	<td>#가벼운 #상쾌한 #국산</td></tr>
	<tr><td><img class="logoimg" src = "https://www.somersby.com/inc/201907241014/image/general/somersby-logo-rgb.png"> </td>
	<td>#달달한 #과일향 #탄산강한</td></tr>
	<tr><td><img class="logoimg" src = "http://napervilletri.events/wp-content/uploads/2017/01/Guinness-Logo.png"></td>
	<td>#진한 #쌉싸름한 #깔끔한</td></tr></article></td>
	<tr><td><img class="logoimg" src="https://mpng.pngfly.com/20180814/pho/kisspng-san-miguel-beer-logo-cervezas-san-miguel-brand-esi-media-partners-with-san-miguel-on-their-rich-l-5b72afd19e2d74.0369289615342427696479.jpg"></td>
	<td>#과일향 #깔끔한 #고소한</td></tr></table>
    <td width=33.3%> <article id="myPageMenu"><header><h3>내가 남긴 리뷰</h3></header>
	<table id="preference">
	  <tr><td class="logo"><img class="logoimg" src="https://www.somersby.com/inc/201907241014/image/general/somersby-logo-rgb.png"> </td>
	  <td class="review"> -과일향이 강하고 달달해요. </td></tr>
	  <tr><td class="logo"><img class="logoimg" src = "http://napervilletri.events/wp-content/uploads/2017/01/Guinness-Logo.png"></td>
	  <td class="review"> -맛이 깔끔합니다.</td></tr>
	  <tr><td class="logo"><img class="logoimg" src = "https://cdn.freebiesupply.com/logos/large/2x/heineken-1-logo-png-transparent.png"> </td>
	  <td class="review"> -탄산이 약하고, 고소한 향이 나요.</td></tr>
	  <tr><td class="logo"><img class="logoimg" src="https://seeklogo.com/images/T/tiger_beer-logo-AF9E616889-seeklogo.com.png"></td>
 	  <td class="review">-가볍고 청량감이 있어요. </td></tr></table>


</article></td></tr></table>

</body>
</html>
