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

mysqli_set_charset($mysqli,"utf8");
mysqli_query($mysqli,"set session character_set_connection=utf8;");
mysqli_query($mysqli,"set session character_set_results=utf8;");
mysqli_query($mysqli,"set session character_set_client=utf8;");



if ( !$mysqli) die('DB Error');
$id= $_SESSION['id'];
$sql="SELECT * FROM Customers WHERE Customer_ID='$id'";
$result=$mysqli->query($sql);
$arr=mysqli_fetch_array($result);
$name=$arr['Customer_Name'];
$Taste_Sugar=$arr['Taste_Sugar'];
$Taste_Sour=$arr['Taste_Sour'];
$Taste_Flavor=$arr['Taste_Flavor'];

$query_Sugar="SELECT * FROM Beer_Score WHERE Taste_Sugar='$Taste_Sugar' Order by rand() limit 1";
$query_Sour="SELECT * FROM Beer_Score WHERE Taste_Sour='$Taste_Sour' Order by rand() limit 1";
$query_Flavor="SELECT * FROM Beer_Score WHERE Taste_Flavor='$Taste_Flavor' Order by rand() limit 1";
$result_Sugar=$mysqli->query($query_Sugar);
$result_Sour=$mysqli->query($query_Sour);
$result_Flavor=$mysqli->query($query_Flavor);
$row_Sugar=mysqli_fetch_array($result_Sugar);
$row_Sour=mysqli_fetch_array($result_Sour);
$row_Flavor=mysqli_fetch_array($result_Flavor);

$query_BeerSugar="SELECT * FROM Beers WHERE Beer_ID='$row_Sugar[0]'";
$query_BeerSour="SELECT * FROM Beers WHERE Beer_ID='$row_Sour[0]'";
$query_BeerFlavor="SELECT * FROM Beers WHERE  Beer_ID='$row_Flavor[0]'";
$rec_Sugar=$mysqli->query($query_BeerSugar);
$rec_Sour=$mysqli->query($query_BeerSour);
$rec_Flavor=$mysqli->query($query_BeerFlavor);
$rec_BeerSugar=mysqli_fetch_array($rec_Sugar);
$rec_BeerSour=mysqli_fetch_array($rec_Sour);
$rec_BeerFlavor=mysqli_fetch_array($rec_Flavor);

$query_HashtagSugar1="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSugar[4]'";
$query_HashtagSugar2="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSugar[5]'";
$query_HashtagSugar3="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSugar[6]'";
$Hash_Sugar1=$mysqli->query($query_HashtagSugar1);
$Hash_Sugar2=$mysqli->query($query_HashtagSugar2);
$Hash_Sugar3=$mysqli->query($query_HashtagSugar3);
$rec_BeerHashSugar1=mysqli_fetch_array($Hash_Sugar1);
$rec_BeerHashSugar2=mysqli_fetch_array($Hash_Sugar2);
$rec_BeerHashSugar3=mysqli_fetch_array($Hash_Sugar3);


$query_HashtagSour1="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSour[4]'";
$query_HashtagSour2="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSour[5]'";
$query_HashtagSour3="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSour[6]'";
$Hash_Sour1=$mysqli->query($query_HashtagSour1);
$Hash_Sour2=$mysqli->query($query_HashtagSour2);
$Hash_Sour3=$mysqli->query($query_HashtagSour3);
$rec_BeerHashSour1=mysqli_fetch_array($Hash_Sour1);
$rec_BeerHashSour2=mysqli_fetch_array($Hash_Sour2);
$rec_BeerHashSour3=mysqli_fetch_array($Hash_Sour3);


$query_HashtagFlavor1="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerFlavor[4]'";
$query_HashtagFlavor2="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerFlavor[5]'";
$query_HashtagFlavor3="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerFlavor[6]'";
$Hash_Flavor1=$mysqli->query($query_HashtagFlavor1);
$Hash_Flavor2=$mysqli->query($query_HashtagFlavor2);
$Hash_Flavor3=$mysqli->query($query_HashtagFlavor3);
$rec_BeerHashFlavor1=mysqli_fetch_array($Hash_Flavor1);
$rec_BeerHashFlavor2=mysqli_fetch_array($Hash_Flavor2);
$rec_BeerHashFlavor3=mysqli_fetch_array($Hash_Flavor3);



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
    <table width=100% padding=auto margin=10px>
    	<tr>
    		<td width=35%> 
    			<table width=100% height=265px align=center id="preference">
    				<tr><td colspan=2 align=center> <header><h3>맛 취향</h3></header></td></tr>
    				<tr><td align=center>당도</td>
    					<td align=center><?php while($Taste_Sugar){ ?>
						<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

						<?php $Taste_Sugar--;} ?></td></tr>
    				<tr><td align=center>산미</td>
    					<td align=center><?php while($Taste_Sour){ ?>
						<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

						<?php $Taste_Sour--;} ?></td></tr>
    				<tr><td align=center>풍미</td>
    					<td align=center><?php while($Taste_Flavor){ ?>
						<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

						<?php $Taste_Flavor--;} ?></td></tr>
    			</table> 
    		</td>
    		<td width=65%> 
    			<table width=100% height=265px align=center id="preference">
    				<tr><td colspan=2 align=center> <header><h3>추천 맥주</h3></header></td></tr>
    				<tr>
    					<td align=center><form action="review2.php" name=form method="post">
						<input type=hidden name="searchterm" value=<?php echo $rec_BeerSugar['Beer_Name'] ?> >
						<input type="image"  class="logoimg" src=<?php echo $rec_BeerSugar['Beer_Image'] ?> >    
						</form></td>
						<td align=center><form action = "clicked_hashtag.php" method="post">
	     				<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo $rec_BeerHashSugar1['Hashtag'] ?>>
	     				</form>
	     				<form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo $rec_BeerHashSugar2['Hashtag'] ?>>
						</form>
						<form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo $rec_BeerHashSugar3['Hashtag'] ?>>
						</form></td>
					</tr>

    				<tr>
    					<td align=center> <form action="review2.php" name=form method="post">
						<input type=hidden name="searchterm" value=<? echo $rec_BeerSour['Beer_Name']; ?> >
						<input type="image"  class="logoimg" src= <? echo $rec_BeerSour['Beer_Image']; ?> >    
						</form></td>
						<td align=center><form action = "clicked_hashtag.php" method="post">
	     				<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo $rec_BeerHashSour1[1] ?>>
	     				</form>
	     				<form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo $rec_BeerHashSour2[1] ?>>
						</form>
						<form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo $rec_BeerHashSour3[1] ?>>
						</form></td>
					</tr>
    				<tr><td align=center><form action="review2.php" name=form method="post">
						<input type=hidden name="searchterm" value=<?php echo($rec_BeerFlavor['Beer_Name']); ?> >
						<input type="image"  class="logoimg" src=<?php echo($rec_BeerFlavor['Beer_Image']); ?> >    
						</form></td>
						<td align=center><form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo($rec_BeerHashFlavor1['Hashtag'])?> >
						</form>
						<form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo($rec_BeerHashFlavor2['Hashtag'])?> >
						</form>
						<form action = "clicked_hashtag.php" method="post">
						<input type="submit" class ="hashtagButton" name="hashtag" style="font-size=20;" value=<?php echo($rec_BeerHashFlavor3['Hashtag'])?> >	
						</form></td>
					</tr>
    			</table>
    		</td>
    	</tr>
    	<tr>
    		<td colspan=2 align=center id="preference" height="auto"><header><h3>내가 남긴 리뷰</h3></header>
    			<table>
    				<?php
						$review_query="SELECT * FROM beer_review WHERE Reviewer_ID='$id'";
						$result_review=$mysqli->query($review_query);

						while($row_review=mysqli_fetch_array($result_review)){
							$review_beer_query="SELECT * FROM beers WHERE Beer_ID='$row_review[Review_Beer_ID]'";
							$result_review_beer=$mysqli->query($review_beer_query);
							$row_review_beer=mysqli_fetch_array($result_review_beer);
					?>
				<tr>
					<td width=20%><form action="review2.php" name=form method="post" width=20% style="text-align:center">
					<input type=hidden name="searchterm" style="font-size=20;" value=<?php echo ($row_review_beer['Beer_Name']) ?>>
					<input type="image" class="logoimg" style="height:80px; width:auto; text-align:center;"  src=<?php echo($row_review_beer['Beer_Image'])?> >   
					</form></td>
	  				<td class="myreview" align="left" style="font-size:20px; "> - <?php echo($row_review['Review'])?> 
	  				<form align="right" action = "deletereview.php" method="post">
					<input type=hidden name="deleteButton" style="font-size:20px" value=<?php echo($row_review['Review_ID'])?> >
					<input type="submit" class ="deletereview" name="delete" value="[삭제]"size="20" >
					</form></td>
	  			</tr> 
	  				<?php } ?>
	  			<tr><td> <br><br> </td></tr>
    			</table>
    		</td>
    	</tr>
    </table>
</section>

</body>
</html>
