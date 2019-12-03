<!DOCTYPE html>
<html>
<head>
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