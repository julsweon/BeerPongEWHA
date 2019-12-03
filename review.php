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
<div id="searh2">
<input type="text" placeholder="맥주이름을 입력하세요" class="searchbox"></div>
<button id="search"> 검색</button>
</div>

<div id="hashtags">
<button class="hashtag"> #향긋한 </button>
<button class="hashtag"> #새콤한 </button>
<button class="hashtag"> #과일향 </button>
<button class="hashtag"> #깊은 </button>
</div>

<p align="right">
<select name="stars">
<option value="0" selected="selected">별점순</option></selected>
<option value="1">리뷰많은순</option></select>
</p>

<div class="rank">
<table>
<thead>
          <tr>   </tr>
</thead>
      <tbody>
<tr >
<td width="15%"><p class="Ranknum">1</p></td>
<td width="25%"><img class ="beer"  src="https://cdn11.bigcommerce.com/s-0294a/images/stencil/1280x1280/products/8029/12648/hoegaarden__80083.1563531641.jpg?c=2&imbypass=on" width="90" height="110"/></td>
<td width="40%"><button class="ranking" onclick="location.href='review2.php'">호가든</button></td>
<td width="10%"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"><p class="score"> 4.5</p></td>
</tr>
<tr>
<td width="70"> <p class="Ranknum">2</p></td>
<td width="120"><img class ="beer" src="https://products1.imgix.drizly.com/ci-heineken-lager-6ea7dedfaaced647.jpeg?auto=format%2Ccompress&fm=jpeg&q=20"width="90" height="110"/> </td>
<td width="500"> <button class="ranking">하이네켄</button></td>
<td width="100"> <img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"><p class="score"> 4.0</p></td>
</tr>
<tr >
<td width="70"> <p class="Ranknum">3</p></td>
<td width="120"><img class ="beer" src="https://products2.imgix.drizly.com/ci-tsingtao-42c4e4345d0ea5d3.jpeg?auto=format%2Ccompress&fm=jpeg&q=20" width="80" height="110">  </td>
<td width="500"><button class="ranking">칭따오</button> </td>
<td width="100"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"><p class="score"> 3.8</p></td>
</tr>
<tr>
<td width="70"> <p class="Ranknum">4</p></td>
<td width="120"><img class ="beer" src="https://sc01.alicdn.com/kf/UTB8mKnnCqrFXKJk43Ovq6ybnpXaG/Budweiser-33cl-bottles.jpg_220x220.jpg"width="140" height="110"/>  </td>
<td width="500"><button class="ranking">버드와이저</button> </td>
<td width="100"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"><p class="score"> 3.5</p></td>
</tr>
      </tbody>
    </table>

</div>
    </div>


</body>
</html>
