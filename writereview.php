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
?>

<?php

$db = mysqli_connect("localhost","root","1234","beerpong");

if(($stars_Sugar="0")||($stars_Sour="0")||($stars_Flavor="0")||($stars_TotalScore="0")) {
	echo"<script>alert('다시 작성해주세요.');</script>";
	echo"<script> location.href='review3.php' </script>";
	exit();
}

else {
	
	switch($stars_Sugar) {
	   case "0":
	    	(int)$stars_Sugar = 0;
			break;
	   case "1":
	    	(int)$stars_Sugar = 1;
			break;
		case "2":
   	 		(int)$stars_Sugar = 2;
			break;
		case "3":
    		(int)$stars_Sugar = 3;
			break;
	 	case "4":
    		(int)$stars_Sugar = 4;
			break;
		case "5":
    		(int)$stars_Sugar = 5;
			break;
  		default:
    		 break;
	}

switch($stars_Sour) {
   case "0":
    (int)$stars_Sour = 0;
	break;
   case "1":
    (int)$stars_Sour = 1;
	break;
	case "2":
    (int)$stars_Sour = 2;
	break;
	 case "3":
    (int)$stars_Sour = 3;
	break;
	 case "4":
    (int)$stars_Sour = 4;
	break;
	 case "5":
    (int)$stars_Sour = 5;
	break;
   default:
     break;
	}

switch($stars_Flavor) {
   case "0":
    (int)$stars_Flavor = 0;
	break;
   case "1":
    (int)$stars_Flavor = 1;
	break;
	case "2":
   (int)$stars_Flavor = 2;
	break;
	 case "3":
    (int)$stars_Flavor= 3;
	break;
	 case "4":
    (int)$stars_Flavor= 4;
	break;
	 case "5":
    (int)$stars_Flavor= 5;
	break;
   default:
     break;
	}

switch($stars_TotalScore) {
   case "0":
   (int)$stars_TotalScore = 0;
	break;
   case "1":
    (int)$stars_TotalScore = 1;
	break;
	case "2":
    (int)$stars_TotalScore = 2;
	break;
	 case "3":
    (int)$stars_TotalScore = 3;
	break;
	 case "4":
   (int)$stars_TotalScore= 4;
	break;
	 case "5":
    (int)$stars_TotalScore= 5;
	break;
   default:
     break;
	}
}

	$Review_ID = "SELECT Review_ID FROM beer_reviews WHERE Review_ID = (SELECT max(Review_ID) FROM beer_reviews)";
	$Review_ID_new = $Review_ID++;

	$Review_Beer_ID=1;
	$Review_Hashtag1="10";

	$sql = "INSERT INTO beer_reviews (
        Review_ID,
        Review_Beer_ID,
        Review,
        Review_Hashtag1,
        Review_hashtag2,
        Review_Hashtag3,
        Taste_Sugar,
        Taste_Sour,
        Taste_Flavor,
        BeerScore
    )
    VALUES (
		$Review_ID_new,
		$Review_Beer_ID,
		$review,
		$$Review_Hashtag1,
		$$Review_Hashtag1,
		$$Review_Hashtag1,
		$stars_Sugar,
		$stars_Sour,
		$stars_Flavor,
		$stars_TotalScore
    )";

    $result=$db->query($sql);

    if($Review_ID_new != $Review_ID) {
    	echo "<script> alert('리뷰작성이 완료되었습니다.')</script>";
		echo "<script> location.href='home.php' </script>";
    }


mysqli_close($db);

?>

</body>
</html>
