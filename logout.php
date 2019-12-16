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
$res=session_destroy();
if($res){
	echo "<script> location.href='home.php' </script>";
}
?>
</body>
</html>