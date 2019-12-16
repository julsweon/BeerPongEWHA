<!DOCTYPE html>
<html>
<head>
<style>
.hero-image {
  background-image: url("long.jpg");
  height: 250px;
 width: 99.9%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

</style>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css?after" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>
<body>
<?php
	session_start();
	if(isset($_SESSION['id'])){
?>
<p align="right" style="font-size:20px; color:#222222">
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
    <button id="tab1" onclick="location.href='home.php'">HOME</button>
    <button class="tab" onclick="location.href='review.php'">REVIEW</button>
    <button class="tab" onclick="location.href='mypage.php'">MYPAGE</button>

    <div id="HOME" class="content">

<table>
<th class="title"><br>WELCOME TO BEERPONG! :D<br> 
<p style="font-size:20px"><비어퐁에서 오늘의 추천 맥주를 즐겨보세요!><br></p></th>
</table>

<table class = "hometable">
<?php 
$mysqli=mysqli_connect("localhost", "root", "1234", "beerpong");
$check="select Beer_ID, Beer_Image, Beer_Name from beers order by rand() limit 2";
$result=$mysqli-> query($check);   //해당 행 가져옴
while($row=mysqli_fetch_array($result)){
echo'<td width="300"><p align="center">';
echo '<form action="review2.php" align="center" name=form method="post">
	<input type=hidden name="searchterm" value="'; print($row['Beer_Name']); echo'">
	<input type="image" src="'; print($row['Beer_Image']); echo'" width=auto height=300>    
</form><br>';
?>

<?php
echo '
<form align="center" action = "clicked_Beer.php" method="post">
<input type="submit" class ="beername" name="beerButton" value="'; print( $row['Beer_Name']); echo '"size="20" ></form>';
echo '<p align="center"style="font-size:24px"><img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" align=top width=auto height=40>';
{	
	$check2="SELECT ROUND(AVG(BeerScore), 2) FROM Beer_Review where Review_Beer_ID=$row[Beer_ID]";
	$result2=$mysqli->query($check2);
	while($row=mysqli_fetch_array($result2)){
	print($row[0]);
	echo'</p>';
		}
	}
echo'</p></td>';
}
?>
<td width="650"><table class="imgreview">
<tr>
<p align="center" style="font-size:24px"><b> [추천 리뷰]</b></p>
<?php 
$mysqli=mysqli_connect("localhost", "root", "1234", "beerpong");
$check="SELECT Review, Review_Beer_ID from beer_review order by rand() limit 5";
$result=$mysqli-> query($check);   //해당 고객 행가져옴
while($row=mysqli_fetch_array($result)){
echo '<tr><td class="review"> - ';
print( $row['Review']);
	{
	$check2="SELECT Beer_Name from beers where Beer_ID=($row[Review_Beer_ID])";
	$result2=$mysqli->query($check2);
	while($row=mysqli_fetch_array($result2))
		{
echo '
<form align="right" action = "clicked_Beer.php" method="post">
<input type="submit" class ="Homebeername" name="beerButton" value="'; print( $row['Beer_Name']); echo '"size="20" ></form>';
		}
	}
echo'</form></td></tr>';
}
echo'</table>';
 ?>
</tr>
     </table></td>
  </tr>
  </table>
    </div>
</body>
</html>