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
<br><p class="Ranknum" p align="center" name="Review_Beer_ID"> <호가든 (Hoegaarden)></p>

<div id="reviewpage">
<form action="writereview.php" method = "post">

당도 <select name="stars_Sugar">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_Sugar">★</option>
<option value="2" name="stars_Sugar">★ ★</option>
<option value="3" name="stars_Sugar">★ ★ ★</option>
<option value="4" name="stars_Sugar">★ ★ ★ ★</option>
<option value="5" name="stars_Sugar">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
산미 <select name="stars_Sour">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_Sour">★</option>
<option value="2" name="stars_Sour">★ ★</option>
<option value="3" name="stars_Sour">★ ★ ★</option>
<option value="4" name="stars_Sour">★ ★ ★ ★</option>
<option value="5" name="stars_Sour">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
풍미 <select name="stars_Flavor">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_Flavor">★</option>
<option value="2" name="stars_Flavor">★ ★</option>
<option value="3" name="stars_Flavor">★ ★ ★</option>
<option value="4" name="stars_Flavor">★ ★ ★ ★</option>
<option value="5" name="stars_Flavor">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
총점 <select name="stars_TotalScore">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_TotalScore">★</option>
<option value="2" name="stars_TotalScore">★ ★</option>
<option value="3" name="stars_TotalScore">★ ★ ★</option>
<option value="4" name="stars_TotalScore">★ ★ ★ ★</option>
<option value="5" name="stars_TotalScore">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
<br><br>
<button class="hashtag2" name="Hashtag"> #쌉싸름한 </button>
<button class="hashtag2" name="Hashtag"> #청량한 </button>
<button class="hashtag2" name="Hashtag"> #은은한 </button>
<button class="hashtag2" name="Hashtag"> #깔끔한 </button>
<button class="hashtag2" name="Hashtag"> #과일향 </button>
<button class="hashtag2" name="Hashtag"> #산뜻한 </button>
<button class="hashtag2" name="Hashtag"> #진한 </button><br>
<button class="hashtag2" name="Hashtag"> #가벼운 </button>
<button class="hashtag2" name="Hashtag"> #부드러운 </button>
<button class="hashtag2" name="Hashtag"> #향긋한 </button>
<button class="hashtag2" name="Hashtag"> #새콤한 </button>
<button class="hashtag2" name="Hashtag"> #달콤한 </button>
<button class="hashtag2" name="Hashtag"> #깊은 </button>
</div>
<div id="review">
<input class="reviewbox" type="text" placeholder="리뷰를 작성해주세요" name="review">
</div>
<p align="center"><button id = "writereview" type = "submit" name="submit"> 작성 완료</button></p>
</body>
</html>