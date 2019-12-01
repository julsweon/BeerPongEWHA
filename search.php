<?php
$searchterm=$_POST["searchterm"];
if(empty($searchterm) {
       echo "<script> alert('맥주 이름을 입력하세요.');<script>";
	   echo "<script> location.href='review.php' </script>";
       exit();
}

$db = mysqli_connect('localhost','root','1234','beerpong');

$query = "SELECT Beer_Name, Beer_origin, Beer_Rank, Beer_Hashtag1, Beer_Hashtag2, Beer Hashtag3, Beer_Info, Beer_TotalScore, Beer_Image FROM Beers WHERE Beer_Name='$searchterm'";

if(!$searchterm) {
	echo "<script>alert('없는 맥주입니다.');</script>";
	echo "<script>location.href = 'review.php' </script>";
	exit();
}

else {
	$stmt = $db->prepare($query);
	$stmt->bind_param('s', $searchterm);  
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($Beer_Name, $Beer_origin, $Beer_Rank, $Beer_Hashtag1, $Beer_Hashtag2, $Beer_Hashtag3, $Beer_Info, $Beer_TotalScore, $Beer_Image);
}
?>