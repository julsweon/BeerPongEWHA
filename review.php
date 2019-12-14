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

    <button class="tab"onclick="location.href='home.php'">HOME</button>
    <button id="tab1" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>

  
   <div id="REVIEW" class="content">
<div id="search_engine">
<div id="searh2">
<form action = "review2.php" method="post">
<input type="text"  placeholder="맥주이름을 입력하세요" class="searchbox" name="searchterm" size="50"></div>
<button id="search" type = "submit" name="submit"> 검색</button>
</form>
</div>

<div id="hashtags">
<?php
$mysqli=mysqli_connect("localhost", "root","1234", "beerpong");
$check="select * from Hashtag order by rand() limit 3";
$randomHashtag=$mysqli->query($check);
while($rowHashtag=mysqli_fetch_array($randomHashtag)){
	echo '<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value='; print($rowHashtag['Hashtag']); echo' size="20"> </form>';
}
?>

</div>

<p align="right">
<select name="stars">
<option value="0" selected="selected">별점순</option></selected>
<option value="1">리뷰많은순</option></select>
</p>

<div class="rank">
<?php
$query="SELECT * FROM Beers ORDER BY Beer_Rank";
$result=$mysqli->query($query);
while($row=mysqli_fetch_array($result)){
	echo '<div class="rank"> <table> <tbody> <tr> ';
	echo '<td width="15%"><p class="Ranknum">'; print($row['Beer_Rank']); echo '</p></td>';
	echo '<td width="25%"><img class ="beer"  src="'; print($row['Beer_Image']);echo'" width="90" height="110"/></td>';
	echo '<td width="500"><form action = "clicked_Beer.php" method="post">
<input type="submit" class ="ranking" name="beerButton" value="'; print( $row['Beer_Name']); echo '"size="20" ></form></td>';
	echo'<td width="10%"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align="top"><p class="score">'; print($row['Beer_TotalScore']); echo'</p></td>';
echo '</tr></table></div>';
}
?>

</div>
    </div>


</body>
</html>