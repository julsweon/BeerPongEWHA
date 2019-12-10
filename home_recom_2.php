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

    <button class="tab"onclick="location.href='home.php'">HOME</button>
    <button id="tab1" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>

   <div id="REVIEW" class="content">
<div id="search_engine">
<input type="text" placeholder="맥주이름을 입력하세요" class="searchbox">
<button id="search"> 검색</button>
</div>

<div id="hashtags">
<button class="hashtag"> #향긋한 </button>
<button class="hashtag"> #새콤한 </button>
<button class="hashtag"> #과일향 </button>
<button class="hashtag"> #깊은 </button>
</div>

<table class="beerreview">
<tr> <td rowspan="7" width=10><p class="Ranknum">1</p> </td> </tr>
<tr> <td rowspan="7" width=10><img class ="beer"  src="https://file.mk.co.kr/meet/neds/2019/03/image_readtop_2019_149823_15524352613667037.jpg" width="280" height="500"/></td></tr>
<tr><td></td></tr>
<tr><td><p style="font-size:25px"> 테라(Terra)</p>
	<p><img src="http://world.moleg.go.kr/oweb/images/countryFlag/KR_L.png" width="30" height="25" float="left"/>     대한민국</p>
	<p>#가벼운 #청량한 #강한탄산</p>
	<p> 세계 공기질 부문 1위 호주에서 자란 청정 맥아를 사용하여 만들었습니다. 조밀한 거품과 오래 유지되는 탄산이 매력적이며 토네이도 패턴으로 눈으로 보는 청량감을 구현했습니다. <br>국내 최초 Green Bottle을 사용한 레귤러 라거입니다.</p>
	<table id="preference">
        <tr><td>당도</td> 
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr>
	<tr><td>산미</td>
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr>
	<tr><td>풍미</td>
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr>
	<tr><td>총점</td>
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr></table>
</td></tr>
</table>
<p class="beerreview"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"> 2.63 (87명 참여)</p>
<p align="center"><button id="writereview" onclick="location.href='review3.php'">REVIEW 작성하기</button></p>
</p>

<div class="rank">
<table>
<tbody>
<tr>
<td width="25%"><image src = "https://cdn2.iconfinder.com/data/icons/user-people-4/48/6-512.png" width=100 height=100></td>
<td width="65%"><p id="reviewscore">3.0/5</p>
	<p id="reviewdate">당도: 4 | 산미: 3 | 풍미: 3 | 총점: 3</p>
	<p id="reviewtext">탄산이 강하고, 깔끔한 맛!</p>
	<p id="reviewdate">2019.10.24 beerpong_16</p></td>
</tr>
<tr>
<td width="25%"><image src = "https://cdn2.iconfinder.com/data/icons/user-people-4/48/6-512.png" width=100 height=100></td>
<td width="65%"><p id="reviewscore">2.5/5</p>
	<p id="reviewdate">당도: 3 | 산미: 4 | 풍미: 3 | 총점: 2</p>
	<p id="reviewtext">깨끗하고 시원한 느낌이에요~~</p>
	<p id="reviewdate">2019.11.23 beerpong_03</p></td>
</tr>
      </tbody>
    </table>
</div>


</div>

</body>
</html>
