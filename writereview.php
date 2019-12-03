<!DOCTYPE html>
<html>
<head>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>

<body>

<?php
$review=$_POST['review'];
$stars_Sugar=$_POST['stars_Sugar'];
$stars_Sour=$_POST['stars_Sour'];
$stars_Flavor=$_POST['stars_Flavor'];
$stars_TotalScore=$_POST['stars_TotalScore'];
(int)$int_stars_Sugar = $stars_Sugar;
(int)$int_stars_Sour = $stars_Sour;
(int)$int_stars_Flavor = $stars_Flavor;
(int)$int_stars_TotalScore = $stars_TotalScore;
$db=mysqli_connect("localhost","root","1234","beerpong");
if ( !$db) die('DB Error');
mysqli_query($db, 'set session character_set_connection=utf8;');
mysqli_query($db, 'set session character_set_results=utf8;');
mysqli_query($db, 'set session character_set_client=utf8;');
if(($stars_Sugar=="0")||($stars_Sour=="0")||($stars_Flavor=="0")||($stars_TotalScore=="0")) {
	echo"<script>alert('다시 작성해주세요.');</script>";
	echo"<script> location.href='review3.php' </script>";
	exit();
}
//빠짐없이 점수가 부여됐을 경우
else{
	//새로운 review에 Review_ID값 부여하기
	$reviewidquery = "SELECT Review_ID FROM beer_review ORDER BY Review_ID DESC LIMIT 1";
	$result=mysqli_fetch_array(mysqli_query($db,$reviewidquery));
	$Review_ID_original = $result[0];
	$Review_ID_new = $result[0]+1;
	switch($stars_Sugar) {
	   case "1":
	    	$int_stars_Sugar = 1;
			break;
		case "2":
   	 		$int_stars_Sugar = 2;
			break;
		case "3":
    		$int_stars_Sugar = 3;
			break;
	 	case "4":
    		$int_stars_Sugar = 4;
			break;
		case "5":
    		$int_stars_Sugar = 5;
			break;
  		default:
    		 break;
	}
	switch($stars_Sour) {
    	case "1":
    		$int_stars_Sour = 1;
			break;
		case "2":
    		$int_stars_Sour = 2;
			break;
		case "3":
    		$int_stars_Sour = 3;
			break;
		case "4":
    		$int_stars_Sour = 4;
			break;
		case "5":
    		$int_stars_Sour = 5;
			break;
    	default:
    		break;
	}
	switch($stars_Flavor) {
  		case "1":
    		$int_stars_Flavor = 1;
			break;
		case "2":
    		$int_stars_Flavor = 2;
			break;
		case "3":
    		$int_stars_Flavor = 3;
			break;
		case "4":
		    $int_stars_Flavor = 4;
			break;
		case "5":
			$int_stars_Flavor= 5;
			break;
    	default:
    		break;
	}
	switch($stars_TotalScore) {
    	case "1":
		    $int_stars_TotalScore = 1;
			break;
		case "2":
		    $int_stars_TotalScore = 2;
			break;
		case "3":
    		$int_stars_TotalScore = 3;
			break;
		case "4":
   			$int_stars_TotalScore = 4;
			break;
		case "5":
    		$int_stars_TotalScore = 5;
			break;
    	default:
    		break;
	}
	#이전 review3.php에서 받아온 값 입력해야함.
	$Review_Beer_ID=1;
	$Review_Hashtag1="10";
	$sql="INSERT INTO beer_review (Review_ID, Review_Beer_ID, Review, Review_Hashtag1,Review_hashtag2,Review_Hashtag3,Taste_Sugar,Taste_Sour,Taste_Flavor,BeerScore) VALUES ('$Review_ID_new','$Review_Beer_ID','$review','$Review_Hashtag1','$Review_Hashtag1','$Review_Hashtag1','$stars_Sugar','$stars_Sour','$stars_Flavor','$stars_TotalScore')";
	$query=mysqli_query($db,$sql);
	$newreviewidquery = "SELECT Review_ID FROM beer_review ORDER BY Review_ID DESC LIMIT 1";
	$newidresult=mysqli_fetch_array(mysqli_query($db,$newreviewidquery));
	$Review_ID_new = $newidresult[0];
	if($Review_ID_new != $Review_ID_original) {
   		echo "<script> alert('리뷰작성이 완료되었습니다.');</script>";
		echo "<script> location.href='home.php' </script>";
	}
	else{
		echo "<script> alert('리뷰를 다시 작성해주세요.');</script>";
		echo "<script> location.href='review3.php' </script>";
	}
	$db->close();
}
?>

</body>
</html>