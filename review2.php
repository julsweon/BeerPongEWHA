<?php
$searchterm=$_POST["searchterm"];
$db = mysqli_connect('localhost','root','1234','beerpong');
$findBeerID="SELECT EXISTS (SELECT Beer_ID FROM beers WHERE Beer_Name='$searchterm') AS SUCCESSS";
$queryfindBeerID = mysqli_fetch_array(mysqli_query($db, $findBeerID));
$check_hashtag=mb_substr($searchterm, 0,1);

if(!$searchterm) {
	echo "<script>alert('맥주 이름을 입력하세요.');</script>";
	echo "<script>location.href = 'review.php' </script>";
	exit();
}
//해시태그 검색시
elseif($check_hashtag=="#"){
	$len=strlen($searchterm);
	$searchHashtag=mb_substr($searchterm, 1,$len);
	echo'<form method=post name=form action=clicked_hashtag.php>
	<input type=hidden name="hashtag" value=';print($searchHashtag); echo '>
	<script>document.form.submit();</script>
	</form>';
	exit();
}
#DB에 없는 맥주일 경우 없다는 알림 나타내는 작동 필요
elseif ($queryfindBeerID[0]==0) {
	echo $searchterm;
	echo "<script>alert('존재하지 않는 맥주입니다.');</script>";
	echo "<script>location.href = 'review.php' </script>";
	exit();	
}

else {
//DB에 존재하는 맥주일 경우
	$BeerIDSQL="SELECT Beer_ID FROM Beers WHERE Beer_NAME='$searchterm'";
	$BeerID=mysqli_fetch_array(mysqli_query($db,$BeerIDSQL));
	$SelectedBeerID=$BeerID[0];
	$_SESSION["beerID"]=$SelectedBeerID;

	//맥주랭킹
	$BeerRank="SELECT Beer_Rank FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerRank=mysqli_fetch_array(mysqli_query($db,$BeerRank));

	//맥주 사진
	$BeerImg="SELECT Beer_Image FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerImg=mysqli_fetch_array(mysqli_query($db,$BeerImg));

	//맥주 이름
	$BeerName="SELECT Beer_Name FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerName=mysqli_fetch_array(mysqli_query($db,$BeerName));

	//맥주 원산지
	$BeerOrigin="SELECT Beer_Origin FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerOrigin=mysqli_fetch_array(mysqli_query($db,$BeerOrigin));

	//해쉬태그 1
	$BeerHashtag1="SELECT Beer_Hashtag1 FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerHashtag1=mysqli_fetch_array(mysqli_query($db,$BeerHashtag1));
	$FinalHashtag1=$SelectedBeerHashtag1[0];
	$printHashtag="SELECT Hashtag FROM Hashtag WHERE Hashtag_ID='$FinalHashtag1'";
	$printBeerHashtag1=mysqli_fetch_array(mysqli_query($db,$printHashtag));

	//해쉬태그 2
	$BeerHashtag2="SELECT Beer_Hashtag2 FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerHashtag2=mysqli_fetch_array(mysqli_query($db,$BeerHashtag2));
	$FinalHashtag2=$SelectedBeerHashtag2[0];
	$printHashtag="SELECT Hashtag FROM Hashtag WHERE Hashtag_ID='$FinalHashtag2'";
	$printBeerHashtag2=mysqli_fetch_array(mysqli_query($db,$printHashtag));

	//해쉬태그 3
	$BeerHashtag3="SELECT Beer_Hashtag3 FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerHashtag3=mysqli_fetch_array(mysqli_query($db,$BeerHashtag3));
	$FinalHashtag3=$SelectedBeerHashtag3[0];
	$printHashtag="SELECT Hashtag FROM Hashtag WHERE Hashtag_ID='$FinalHashtag3'";
	$printBeerHashtag3=mysqli_fetch_array(mysqli_query($db,$printHashtag));

	//맥주 정보
	$BeerInfo="SELECT Beer_Info FROM Beers Where Beer_ID='$SelectedBeerID'";
	$SelectedBeerInfo=mysqli_fetch_array(mysqli_query($db,$BeerInfo));

	//맥주 TOTAL SCORE
	$BeerTotalScore="SELECT Beer_TotalScore FROM Beers WHERE Beer_ID='$SelectedBeerID'";
	$SelectedBeerTotalScore=mysqli_fetch_array(mysqli_query($db,$BeerTotalScore));

	//맥주 scoring 참여자 수
	$people="SELECT COUNT(Review_ID) FROM Beer_Review WHERE Review_Beer_ID='$SelectedBeerID'";
	$Selectedpeople=mysqli_fetch_array(mysqli_query($db,$people));

	//Sour 점수
	$Beer_Sour="SELECT Taste_Sour FROM Beer_Score WHERE Beer_ID='$SelectedBeerID'";
	$SelectedSour=mysqli_fetch_array(mysqli_query($db,$Beer_Sour));

	//Sugar 점수
	$Beer_Sugar="SELECT Taste_Sugar FROM Beer_Score WHERE Beer_ID='$SelectedBeerID'";
	$SelectedSugar=mysqli_fetch_array(mysqli_query($db,$Beer_Sugar));

	//Flavor 점수
	$Beer_Flavor="SELECT Taste_Flavor FROM Beer_Score WHERE Beer_ID='$SelectedBeerID'";
	$SelectedFlavor=mysqli_fetch_array(mysqli_query($db,$Beer_Flavor));

	//review_Sugar 계산
	$ReviewSugarScore="SELECT ROUND(AVG(Taste_Sugar), 2) FROM Beer_Review WHERE Review_Beer_ID='$SelectedBeerID'";
	$SelectedReviewSugarScore=mysqli_fetch_array(mysqli_query($db, $ReviewSugarScore));

	//review_Sour 계산
	$ReviewSourScore="SELECT ROUND(AVG(Taste_Sour), 2) FROM Beer_Review WHERE Review_Beer_ID='$SelectedBeerID'";
	$SelectedReviewSourScore=mysqli_fetch_array(mysqli_query($db, $ReviewSourScore));

	//review_Flavor 계산
	$ReviewFlavorScore="SELECT ROUND(AVG(Taste_Flavor), 2) FROM Beer_Review WHERE Review_Beer_ID='$SelectedBeerID'";
	$SelectedReviewFlavorScore=mysqli_fetch_array(mysqli_query($db, $ReviewFlavorScore));
	
	//review 평점 계산
	$ReviewTotalScore="SELECT ROUND(AVG(BeerScore), 2) FROM Beer_Review WHERE Review_Beer_ID='$SelectedBeerID'";
	$SelectedReviewTotalScore=mysqli_fetch_array(mysqli_query($db,$ReviewTotalScore));

?>

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

<p> &nbsp; &nbsp; &nbsp;</p>
</div>

<?php 
	$_SESSION["beername"]=$SelectedBeerName[0];
	$_SESSION["beerID"]=$SelectedBeerID;
?>

<table class="beerreview">
	<tr><td rowspan="6" width=10 style="padding : 10px; margin : 10px;"><p class="Ranknum"><?php echo "".$SelectedBeerRank[0]."" ?></p></td><td rowspan="6" width=40%  style="padding : 10px; margin : 10px;" ><img class ="beer" style="max-height:500px; max-width:300px; width: auto;" src="<?php echo"".$SelectedBeerImg[0].""?>"/></td><td><font size="20"><strong> <?php echo "".$SelectedBeerName[0]."" ?> </strong></font></td></tr>
	<tr><td style="padding : 10px"><p style="font-size:25px"></p>
	<p> <?php echo'('; echo "".$SelectedBeerOrigin[0].""; echo ')';?> </p> </td></tr>
	<tr><td><p align = "left"><?php echo "".$SelectedBeerInfo[0]."" ?></p></td></tr>
	<tr><td><table class = "review2hashtag">
<tr>
	<td><form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" style="margin-left:80px" name="hashtag" value=<?php echo $printBeerHashtag1[0] ?> size="20">
</form></td>
	<td><form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" style="margin-right:50px; margin-left:50px" name="hashtag" value=<?php echo $printBeerHashtag2[0] ?> size="20" >
</form></td>
	<td><form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" style="margin-right:80px" name="hashtag" value=<?php echo $printBeerHashtag3[0] ?> size="20">
</form></td> </tr> </table>
	</td>
</tr>
<tr><td>
<table id="preference">
<tr><td colspan=3>:: 전문가 별점 ::</td></tr>
   <tr><td width="50%">당도</td> 
	<td>
		<?php
		$i = 0;
		for($i=0; $i< $SelectedSugar[0]; $i++) { ?>
			<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
		<?php }
		?>
	</td></tr>
	
	<tr><td>      산미      </td>
	<td><?php
		$i = 0;
		for($i=0; $i< $SelectedSour[0]; $i++) { ?>
			<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
		<?php }
		?>
	</td></tr>
	
	<tr><td>      풍미      </td>
	<td><?php
		$i = 0;
		for($i=0; $i< $SelectedFlavor[0]; $i++) { ?>
			<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
		<?php }
		?>
	</td></tr>
	
	<tr><td>      총점      </td>
	<td> <?php
		$i = 0;
		for($i=0; $i<$SelectedBeerTotalScore[0]; $i++) { ?>
			<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png">
		<?php 
		}
		?>
	</td></tr>
</table></td></tr></table>

<?php
}
?>

<p class="beerreview">
:: 사용자 평점 ::<br><br>
총점 : <?php echo $SelectedReviewTotalScore[0]?> 
 | 당도 : <?php echo $SelectedReviewSugarScore[0]?>
 | 산미 : <?php echo $SelectedReviewSourScore[0]?>
 | 풍미 : <?php echo $SelectedReviewFlavorScore[0]?></p>
<p align="center" style="font-size:18px">
 (<?php echo $Selectedpeople[0] ?> 명 참여)</p>
<p align="center"><button id="writereview" onclick="location.href='review3.php'">REVIEW 작성하기</button></p>

<p> &nbsp; &nbsp; &nbsp;</p>
<p> &nbsp; &nbsp; &nbsp;</p>

</p>
<?php 
$mysqli=mysqli_connect("localhost", "root", "1234", "beerpong");
$check="SELECT * FROM beer_review WHERE Review_Beer_ID='$SelectedBeerID'";
$result=$mysqli-> query($check);   //해당 고객 행가져옴
while($row=mysqli_fetch_array($result)){
	echo '<div class="rank"> <table> <tbody> <tr> ';
	echo '<td width="35%"> <image src = "https://cdn2.iconfinder.com/data/icons/user-people-4/48/6-512.png" width=100 height=100></td>';
	echo '<td width="65%">';
	echo '<p id="reviewscore">'; print($row['Reviewer_ID']); echo '<br></p>';
	echo '<p id="reviewdate">';
	echo '당도 : '; print($row['Taste_Sugar']);	echo '|';
	echo '산미 : '; print($row['Taste_Sour']);	echo '|';
	echo '풍미 : '; print($row['Taste_Flavor']);	echo '|';
	echo '총점 : '; print($row['BeerScore']);	echo '<br></p>';
	echo '<p id="reviewtext">';print($row['Review']);echo '</p>';
	echo '</p></td></table>';
}
 ?>
</div>


</div>

</body>
</html>