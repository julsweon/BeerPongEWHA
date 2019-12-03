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

<?php
$searchterm=$_POST["searchterm"];

$db = mysqli_connect('localhost','root','1234','beerpong');

$findBeerID="SELECT EXISTS (SELECT Beer_ID FROM beers WHERE Beer_Name='$searchterm') AS SUCCESSS";
$queryfindBeerID = mysqli_fetch_array(mysqli_query($db, $findBeerID));

if(!$searchterm) {
	echo "<script>alert('맥주 이름을 입력하세요.');</script>";
	echo "<script>location.href = 'review.php' </script>";
	exit();
}

#DB에 없는 맥주일 경우 없다는 알림 나타내는 작동 필요
elseif ($queryfindBeerID[0]==0) {
	echo "<script>alert('존재하지 않는 맥주입니다.');</script>";
	echo "<script>location.href = 'review.php' </script>";
	exit();	
}

#
else {
?>

#DB에 존재하는 맥주일 경우
<div id="hashtags">
<button class="hashtag"> #향긋한 </button>
<button class="hashtag"> #새콤한 </button>
<button class="hashtag"> #과일향 </button>
<button class="hashtag"> #깊은 </button>
</div>

<?php 
	
?>

<table class="beerreview">
<tr> <td rowspan="7" width=10><p class="Ranknum">1</p> </td> </tr>
<tr> <td rowspan="7" width=10><img class ="beer"  src="https://cdn11.bigcommerce.com/s-0294a/images/stencil/1280x1280/products/8029/12648/hoegaarden__80083.1563531641.jpg?c=2&imbypass=on" width="350" height="500"/></td></tr>
<tr><td>맥주명</td></tr>
<tr><td><p style="font-size:25px"></p>
	<p><img src="http://world.moleg.go.kr/oweb/images/countryFlag/BE_L.png" width="30" height="25" float="left"/>   beer_origin</p>
	<p>#4.9도 #밀맥주 #부드러운 #과일향</p>
	<p>1445년 비가르덴 지방의 수도원 문화가 최상의 밀을 생산하는 호가든 마을로 전파되며 시작된 호가든 맥주, 호가든 마을 사람들은 자연에서 얻은 최상의 밀을 수확하여 깨끗한 재료를 엄선해 여과를 거치지 않은 백색의 맥주를 만들어 냈습니다.</p>
	<table id="preference">
        <tr><td>외관</td> 
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr>
	<tr><td>향</td>
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr>
	<tr><td>풍미</td>
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr>
	<tr><td>총점</td>
	<td><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
	</td></tr></table>
</td></tr>
</table>
<?php
}
?>
<p class="beerreview"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png"> 4.68 (128명 참여)</p>
<p align="center"><button id="writereview" onclick="location.href='review3.php'">REVIEW 작성하기</button></p>
</p>

<div class="rank">
<table>
<tbody>
<tr>
<td width="25%"><image src = "https://cdn2.iconfinder.com/data/icons/user-people-4/48/6-512.png" width=100 height=100></td>
<td width="65%"><p id="reviewscore">3.75/5</p>
	<p id="reviewdate">외관: 5 | 향: 2 | 풍미: 4 | 총점: 4</p>
	<p id="reviewtext">깔끔하고 맛있어요! 추천합니다.</p>
	<p id="reviewdate">2019.11.24 beerpong_1</p></td>
</tr>
<tr>
<td width="25%"><image src = "https://cdn2.iconfinder.com/data/icons/user-people-4/48/6-512.png" width=100 height=100></td>
<td width="65%"><p id="reviewscore">4.25/5</p>
	<p id="reviewdate">외관: 4 | 향: 3 | 풍미: 5 | 총점: 5</p>
	<p id="reviewtext">부드럽고 상큼한 맛</p>
	<p id="reviewdate">2019.11.23 beerpong_2</p></td>
</tr>
      </tbody>
    </table>
</div>


</div>

</body>
</html>
