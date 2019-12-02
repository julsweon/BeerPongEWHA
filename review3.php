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
<p align="center">
<button id="main_title" onclick="location.href='home.php'">비  어  퐁</button>
</p>

    <button class="tab"onclick="location.href='home.php'">HOME</button>
    <button id="tab1" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>

    </div>

   <div id="REVIEW" class="content">
<br><p class="Ranknum" p align="center"><호가든 (Hoegaarden)></p>
<div id="reviewpage">
당도 <select name="stars">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
산미 <select name="stars">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
풍미 <select name="stars">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
총점 <select name="stars">
<option value="0" selected="selected"></option></selected>
<option value="1">★</option>
<option value="2">★ ★</option>
<option value="3">★ ★ ★</option>
<option value="4">★ ★ ★ ★</option>
<option value="5">★ ★ ★ ★ ★</option></select>
<br><br>
<button class="hashtag2"> #쌉싸름한 </button>
<button class="hashtag2"> #청량한 </button>
<button class="hashtag2"> #은은한 </button>
<button class="hashtag2"> #깔끔한 </button>
<button class="hashtag2"> #과일향 </button>
<button class="hashtag2"> #산뜻한 </button>
<button class="hashtag2"> #진한 </button><br>
<button class="hashtag2"> #가벼운 </button>
<button class="hashtag2"> #부드러운 </button>
<button class="hashtag2"> #향긋한 </button>
<button class="hashtag2"> #새콤한 </button>
<button class="hashtag2"> #달콤한 </button>
<button class="hashtag2"> #깊은 </button>
</div>
<div id="review">
<input class="reviewbox" type="text" placeholder="리뷰를 작성해주세요">
</div>
<p align="center"><button id="writereview"> 작성 완료</button></p>
</body>
</html>