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

$query_BeerSugar="SELECT * FROM Beers WHERE Beer_ID='$row_Sugar[Beer_ID]'";
$query_BeerSour="SELECT * FROM Beers WHERE Beer_ID='$row_Sour[Beer_ID]'";
$query_BeerFlavor="SELECT * FROM Beers WHERE  Beer_ID='$row_Flavor[Beer_ID]'";
$rec_Sugar=$mysqli->query($query_BeerSugar);
$rec_Sour=$mysqli->query($query_BeerSour);
$rec_Flavor=$mysqli->query($query_BeerFlavor);
$rec_BeerSugar=mysqli_fetch_array($rec_Sugar);
$rec_BeerSour=mysqli_fetch_array($rec_Sour);
$rec_BeerFlavor=mysqli_fetch_array($rec_Flavor);

$query_HashtagSugar1="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSugar[Beer_Hashtag1]'";
$query_HashtagSugar2="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSugar[Beer_Hashtag2]'";
$query_HashtagSugar3="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSugar[Beer_Hashtag3]'";
$Hash_Sugar1=$mysqli->query($query_HashtagSugar1);
$Hash_Sugar2=$mysqli->query($query_HashtagSugar2);
$Hash_Sugar3=$mysqli->query($query_HashtagSugar3);
$rec_BeerHashSugar1=mysqli_fetch_array($Hash_Sugar1);
$rec_BeerHashSugar2=mysqli_fetch_array($Hash_Sugar2);
$rec_BeerHashSugar3=mysqli_fetch_array($Hash_Sugar3);


$query_HashtagSour1="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSour[Beer_Hashtag1]'";
$query_HashtagSour2="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSour[Beer_Hashtag2]'";
$query_HashtagSour3="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerSour[Beer_Hashtag3]'";
$Hash_Sour1=$mysqli->query($query_HashtagSour1);
$Hash_Sour2=$mysqli->query($query_HashtagSour2);
$Hash_Sour3=$mysqli->query($query_HashtagSour3);
$rec_BeerHashSour1=mysqli_fetch_array($Hash_Sour1);
$rec_BeerHashSour2=mysqli_fetch_array($Hash_Sour2);
$rec_BeerHashSour3=mysqli_fetch_array($Hash_Sour3);


$query_HashtagFlavor1="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerFlavor[Beer_Hashtag1]'";
$query_HashtagFlavor2="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerFlavor[Beer_Hashtag2]'";
$query_HashtagFlavor3="SELECT * FROM Hashtag WHERE Hashtag_ID='$rec_BeerFlavor[Beer_Hashtag3]'";
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

    <table>
    <tr> <td width=28%><article id="myPageMenu"><header><h3>맛 취향</h3></header>
	<table id="preference">
             <tr><td>당도</td> 
	<td>
<?php while($Taste_Sugar){
?>
<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

<?php $Taste_Sugar--;}
?>
	</td></tr>
	<tr><td>산미</td>
	<td><?php while($Taste_Sour){
?>
<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

<?php $Taste_Sour--;}
?>
	</td></tr>
	<tr><td>풍미 </td>
	<td><?php while($Taste_Flavor){
?>
<img class="star" src="https://upload.wikimedia.org/wikipedia/commons/4/44/Plain_Yellow_Star.png" width="30" height="25">

<?php $Taste_Flavor--;}
?>
	</td></tr>
	</table>
    </article></td>
    <td width=44%><article id="myPageMenu"><header><h3>추천 맥주</h3></header>
     <table id="preference"  width="70px">
	<?php

/*Sugar 추천 맥주*/
		echo '<tr ><td ><form action="review2.php" name=form method="post">
	<input type=hidden name="searchterm" value="'; print($rec_BeerSugar['Beer_Name']); echo'">
	<input type="image"  class="logoimg" src="'; print($rec_BeerSugar['Beer_Image']); echo'">    
</form></td>';

	echo '<td ><form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashSugar1['Hashtag']); echo '"size="20"></form>
	<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashSugar2['Hashtag']); echo '"size="20"></form>
	<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashSugar3['Hashtag']); echo '"size="20"></form></td></tr>';
	echo'<tr ><td ><br></td></tr>';
/*Sour 추천 맥주*/
	echo '<tr><td><form action="review2.php" name=form method="post">
	<input type=hidden name="searchterm" value="'; print($rec_BeerSour['Beer_Name']); echo'">
	<input type="image"  class="logoimg" src="'; print($rec_BeerSour['Beer_Image']); echo'">    
</form></td>';
	echo '<td> <form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashSour1['Hashtag']); echo '"size="20"></form>
	<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashSour2['Hashtag']); echo '"size="20"></form>
	<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashSour3['Hashtag']); echo '"size="20"></form></td></tr>';
	echo'<tr ><td ><br></td></tr>';
/*Flavor 추천 맥주*/
	echo '<tr><td><form action="review2.php" name=form method="post">
	<input type=hidden name="searchterm" value="'; print($rec_BeerFlavor['Beer_Name']); echo'">
	<input type="image"  class="logoimg" src="'; print($rec_BeerFlavor['Beer_Image']); echo'">    
</form></td>';

	echo '<td> <form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashFlavor1['Hashtag']); echo '"size="20"></form>
	<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashFlavor2['Hashtag']); echo '"size="20"></form>
	<form action = "clicked_hashtag.php" method="post">
<input type="submit" class ="hashtagButton" name="hashtag" value="'; print($rec_BeerHashFlavor3['Hashtag']); echo '"size="20"></form></td></tr>';

	?>

	</table>

    <td width=28%> <article id="myPageMenu"><header><h3>내가 남긴 리뷰</h3></header>
	<table id="preference">

	<?php
	$review_query="SELECT * FROM beer_review WHERE Reviewer_ID='$id'";
	$result_review=$mysqli->query($review_query);

	while($row_review=mysqli_fetch_array($result_review)){
		$review_beer_query="SELECT * FROM beers WHERE Beer_ID='$row_review[Review_Beer_ID]'";
		$result_review_beer=$mysqli->query($review_beer_query);
		$row_review_beer=mysqli_fetch_array($result_review_beer);
		
	echo '<tr><td><form action="review2.php" name=form method="post">
	<input type=hidden name="searchterm" value="'; print($row_review_beer['Beer_Name']); echo'">
	<input type="image"  class="logoimg" src="'; print($row_review_beer['Beer_Image']); echo'">    
</form></td>
	  <td class="myreview"> -'; print($row_review['Review']); echo' </td></tr>';
	}

	?>

	  </table>


</article></td></tr></table>

</body>
</html>
