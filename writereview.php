<!DOCTYPE html>
<html>
<head>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css?after" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>

<body>

<?php
session_start();
$reviewer_ID=$_SESSION['id'];
$Review_Beer_ID=$_SESSION["beerID"];

$review=$_POST['review'];
$stars_Sugar=$_POST['stars_Sugar'];
$stars_Sour=$_POST['stars_Sour'];
$stars_Flavor=$_POST['stars_Flavor'];
$stars_TotalScore=$_POST['stars_TotalScore'];
(int)$int_stars_Sugar = $stars_Sugar;
(int)$int_stars_Sour = $stars_Sour;
(int)$int_stars_Flavor = $stars_Flavor;
(int)$int_stars_TotalScore = $stars_TotalScore;


    $no_arr = $_POST['Hashtag'];

    if(isset($no_arr)) {
      if (count($no_arr)<3) {
        for($i=0; $i<count($no_arr); $i++) {
           echo "<script>alert('해쉬태그를 반드시 3가지 선택해주세요.');</script>";
	   echo"<script> location.href='review3.php' </script>";
        }
        for($i=count($no_arr); $i<3; $i++) {
           echo "<script>alert('해쉬태그를 반드시 3가지 선택해주세요.');</script>";
	   echo"<script> location.href='review3.php' </script>";
        }
      }
      else {
        for($i=0; $i<3; $i++) {
          $stringhash=$no_arr;
        }
      }
    }
    else {
      for($i=0; $i<3; $i++) {
       echo "<script>alert('해쉬태그를 반드시 3가지 선택해주세요.');</script>";
	   echo"<script> location.href='review3.php' </script>";
      }
    }

$Review_Hashtag1=$stringhash[0];
$Review_Hashtag2=$stringhash[1];
$Review_Hashtag3=$stringhash[2];


$db=mysqli_connect("localhost","root","1234","beerpong");
if ( !$db) die('DB Error');
mysqli_query($db, 'set session character_set_connection=utf8;');
mysqli_query($db, 'set session character_set_results=utf8;');
mysqli_query($db, 'set session character_set_client=utf8;');
if(($stars_Sugar=="0")||($stars_Sour=="0")||($stars_Flavor=="0")||($stars_TotalScore=="0")) {
	echo"<script>alert('반드시 별점을 선택해주세요.');</script>";
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
	
	$sql="INSERT INTO beer_review (Review_ID, Review_Beer_ID, Review, Review_Hashtag1,Review_hashtag2,Review_Hashtag3,Taste_Sugar,Taste_Sour,Taste_Flavor,BeerScore,Reviewer_ID) VALUES ('$Review_ID_new','$Review_Beer_ID','$review','$Review_Hashtag1','$Review_Hashtag2','$Review_Hashtag3','$stars_Sugar','$stars_Sour','$stars_Flavor','$stars_TotalScore','$reviewer_ID')";
	$query=mysqli_query($db,$sql);
	$newreviewidquery = "SELECT Review_ID FROM beer_review ORDER BY Review_ID DESC LIMIT 1";
	$newidresult=mysqli_fetch_array(mysqli_query($db,$newreviewidquery));
	$Review_ID_new = $newidresult[0];

//해시태그 업데이트//
	$resultHashtag = "SELECT Review_Hashtag1, Review_Hashtag2, Review_Hashtag3 FROM Beer_Review WHERE Review_Beer_ID=$Review_Beer_ID";
	$count = "SELECT COUNT(Review_Hashtag1) FROM beer_review WHERE Review_Beer_ID=$Review_Beer_ID";
	$sqlcount = mysqli_fetch_array(mysqli_query($db,$count));
	$sqlresultHashtag = mysqli_query($db,$resultHashtag);

	for ($i=0; $i<21; $i++) {
		$hashtagarr=array();
		$hashtagarr[$i]=0;
	}

	while($resultHashtag = mysqli_fetch_row($sqlresultHashtag)) {
		
		for ($i=0; $i<21; $i++) {
			if($i==$resultHashtag[0]) $hashtagarr[$i]++;
			if($i==$resultHashtag[1]) $hashtagarr[$i]++;
			if($i==$resultHashtag[2]) $hashtagarr[$i]++;
			else ;
		}	
	}

	arsort($hashtagarr);
	$keyarr = array_keys($hashtagarr);

	$New_Hashtag1=$keyarr[0];
	$New_Hashtag2=$keyarr[1];
	$New_Hashtag3=$keyarr[2];

	$UpdateTag = "UPDATE Beers SET Beer_Hashtag1=$New_Hashtag1, Beer_Hashtag2=$New_Hashtag2, Beer_Hashtag3=$New_Hashtag3 WHERE Beer_ID=$Review_Beer_ID";
	mysqli_query($db,$UpdateTag);

//DB 업데이트 확인
	if($Review_ID_new != $Review_ID_original) {
   		echo "<script> alert('리뷰작성이 완료되었습니다.');</script>";
		echo "<script> location.href='mypage.php' </script>";
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