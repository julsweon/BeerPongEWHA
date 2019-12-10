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
    <button id="tab1" onclick="location.href='home.php'">HOME</button>
    <button class="tab" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>

    <div id="HOME" class="content">
  <table class = "hometable">
  <tr>
    <th class = "title"> [추천맥주] </th>
    <th class = "title">  </th>
    <th class = "title"> [최신리뷰] </th>
  </tr>
  <tr>
    <td class = "tableimg"> <img class = "beerimg" onclick="location.href='home_recom_1.php'" src = "https://img1.daumcdn.net/thumb/R800x0/?scode=mtistory2&fname=https%3A%2F%2Ft1.daumcdn.net%2Fcfile%2Ftistory%2F258E23335978A89816"> </td>
    <td class = "tableimg"> <img class = "beerimg" onclick="location.href='home_recom_2.php'" src = "https://file.mk.co.kr/meet/neds/2019/03/image_readtop_2019_149823_15524352613667037.jpg" </td>
    <td rowspan = "2">
     <table class="imgreview">
      <tr>
       <td class="logo"> <img class="logoimg" src = "https://www.cass.co.kr/images/etc/img_logo_1.jpg"></td>
       <td class="review"> -부드럽고 상큼해요!</td>
      </tr>
      <tr>
        <td class="logo"> <img class="logoimg" src = "https://www.somersby.com/inc/201907241014/image/general/somersby-logo-rgb.png"> </td>
        <td class="review"> -과일향이 강해요.</td>
      </tr>
      <tr>
        <td class="logo"> <img class="logoimg" src = "http://napervilletri.events/wp-content/uploads/2017/01/Guinness-Logo.png"></td>
        <td class="review"> -맛이 깔끔합니다.</td>
      </tr>
      <tr>
        <td class="logo"> <img class="logoimg" src = "https://cdn.freebiesupply.com/logos/large/2x/heineken-1-logo-png-transparent.png"> </td>
        <td class="review"> -탄산이 약하고, 고소한 향이 나요.</td>
      </tr>
     </table></td>
  </tr>
  <tr>
    <td class = "point"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"> 4.68 </td>
    <td class = "point"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"> 3.32 </td>
    <td></td>
  </tr>
  <table>
  
  <th class="title"><br><br>ABOUT BEERPONG<br><br></th>
  <tr class="infobox"></tr></table>
  </table>
    </div>

</body>
</html>
