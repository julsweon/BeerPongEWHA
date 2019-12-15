<!DOCTYPE html>
<html>
<head>
  
<script type="text/javascript">
var maxChecked = 3;
var totalChecked = 0;

function count_ck(field){
  if (field.checked)
    totalChecked += 1;
  else
    totalChecked -= 1;

  if (totalChecked > maxChecked) {
    alert("최대 3개까지만 선택 가능합니다.");
  field.checked = false;
  totalChecked -= 1;
  }
}

</script>
<style>
.hero-image {
  background-image: url("long.jpg");
  height: 250px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
#check {
  text-align : center;
  width : 600px;
  height : 130px;
  border : solid 1px brown;
}

input[type="checkbox"] {
  display:none;
}

input[type="checkbox"] + label span {
  display : inline-block;
  width : 10px;
  height : 10px;
  background:#fff;
  border : solid brown;
  left top no-repeat;
  cursor : pointer;
  border-radius : 3px
  float : right;
}
input[type="checkbox"]:checked + label span {
    background:brown -19px top no-repeat;
}
</style>
<title>BeerPong | 세상의 모든 맥주</title>
<link rel="stylesheet" href="beerpong.css" type="text/css"/>
<link href="http://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
</head>

<body>
<?php
  session_start();
  if(!isset($_SESSION['id'])){
  echo "<script> alert('로그인해주세요.');
      location.replace('login.html')</script>";
}
?>
<?php
  if(isset($_SESSION['id'])){
?>
<p align="right" style="color:#222222">
<?php echo $_SESSION['id'].'님 안녕하세요';?>
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

    </div>

<div id="REVIEW" class="content">
<?php
$db = mysqli_connect('localhost','root','1234','beerpong');
?>
<br><p class="Ranknum" p align="center" name="Review_Beer_ID"> <strong><?php echo $_SESSION["beername"]?></strong></p>

<div id="reviewpage">
<form action="writereview.php" method = "post">

당도 <select name="stars_Sugar">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_Sugar">★</option>
<option value="2" name="stars_Sugar">★ ★</option>
<option value="3" name="stars_Sugar">★ ★ ★</option>
<option value="4" name="stars_Sugar">★ ★ ★ ★</option>
<option value="5" name="stars_Sugar">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
산미 <select name="stars_Sour">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_Sour">★</option>
<option value="2" name="stars_Sour">★ ★</option>
<option value="3" name="stars_Sour">★ ★ ★</option>
<option value="4" name="stars_Sour">★ ★ ★ ★</option>
<option value="5" name="stars_Sour">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
풍미 <select name="stars_Flavor">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_Flavor">★</option>
<option value="2" name="stars_Flavor">★ ★</option>
<option value="3" name="stars_Flavor">★ ★ ★</option>
<option value="4" name="stars_Flavor">★ ★ ★ ★</option>
<option value="5" name="stars_Flavor">★ ★ ★ ★ ★</option></select>&nbsp&nbsp&nbsp
총점 <select name="stars_TotalScore">
<option value="0" selected="selected">별점 선택</option></selected>
<option value="1" name="stars_TotalScore">★</option>
<option value="2" name="stars_TotalScore">★ ★</option>
<option value="3" name="stars_TotalScore">★ ★ ★</option>
<option value="4" name="stars_TotalScore">★ ★ ★ ★</option>
<option value="5" name="stars_TotalScore">★ ★ ★ ★ ★</option></select>
</div>
&nbsp &nbsp
<br><br>

<table id="check" style="font-size : 15px">
<tr><td><p style="font-size : 15px; align : center"><strong> 3가지 해시태그를 선택해주세요!</strong> </p></td></tr>
<tr> <td>
<input type="checkbox" id="11" name="Hashtag[]" onclick="count_ck(this);" value="11" class="checkSelect"/> <label for="11"><span></span> #쌉쌀한  /  </label>
<input type="checkbox" id="16" name="Hashtag[]" onclick="count_ck(this);" value="16" class="checkSelect"/> <label for="16"><span></span> #청량한  /  </label>
<input type="checkbox" id="2" name="Hashtag[]" onclick="count_ck(this);" value="2" class="checkSelect"/> <label for="2"><span></span> #과일향  /  </label>
<input type="checkbox" id="9" name="Hashtag[]" onclick="count_ck(this);" value="9" class="checkSelect"/> <label for="9"><span></span> #산뜻한  /  </label>
<input type="checkbox" id="15" name="Hashtag[]" onclick="count_ck(this);" value="15" class="checkSelect"/> <label for="15"><span></span> #진한 </label> <br>
<p style="font-size : 5px"></p>
<input type="checkbox" id="1" name="Hashtag[]" onclick="count_ck(this);" value="1" class="checkSelect"/> <label for="1"><span></span> #가벼운  /  </label>
<input type="checkbox" id="8" name="Hashtag[]" onclick="count_ck(this);" value="8" class="checkSelect"/> <label for="8"><span></span> #부드러운  /  </label>
<input type="checkbox" id="5" name="Hashtag[]" onclick="count_ck(this);" value="5" class="checkSelect"/> <label for="5"><span></span> #달콤한  /  </label>
<input type="checkbox" id="3" name="Hashtag[]" onclick="count_ck(this);" value="3" class="checkSelect"/> <label for="3"><span></span> #깊은  /  </label>
<input type="checkbox" id="4" name="Hashtag[]" onclick="count_ck(this);" value="4" class="checkSelect"/> <label for="4"><span></span> #꽃향 </label> <br>
<p style="font-size : 5px"></p>
<input type="checkbox" id="6" name="Hashtag[]" onclick="count_ck(this);" value="6" class="checkSelect"/> <label for="6"><span></span> #바디감  /  </label>
<input type="checkbox" id="7" name="Hashtag[]" onclick="count_ck(this);" value="7" class="checkSelect"/> <label for="7"><span></span> #보리  /  </label>
<input type="checkbox" id="10" name="Hashtag[]" onclick="count_ck(this);" value="10" class="checkSelect"/> <label for="10"><span></span> #시원한  /  </label>
<input type="checkbox" id="12" name="Hashtag[]" onclick="count_ck(this);" value="12" class="checkSelect"/> <label for="12"><span></span> #쓴맛  /  </label>
<input type="checkbox" id="13" name="Hashtag[]" onclick="count_ck(this);" value="13" class="checkSelect"/> <label for="13"><span></span> #아로마 </label> <br>
<p style="font-size : 5px"></p>
<input type="checkbox" id="14" name="Hashtag[]" onclick="count_ck(this);" value="14" class="checkSelect"/> <label for="14"><span></span> #전통식  /  </label>
<input type="checkbox" id="17" name="Hashtag[]" onclick="count_ck(this);" value="17" class="checkSelect"/> <label for="17"><span></span> #커피향  /  </label>
<input type="checkbox" id="18" name="Hashtag[]" onclick="count_ck(this);" value="18" class="checkSelect"/> <label for="18"><span></span> #탄산강한  /  </label>
<input type="checkbox" id="19" name="Hashtag[]" onclick="count_ck(this);" value="19" class="checkSelect"/> <label for="19"><span></span> #풍부한  /  </label>
<input type="checkbox" id="20" name="Hashtag[]" onclick="count_ck(this);" value="20" class="checkSelect"/> <label for="20"><span></span> #홉향 </label>
<br> &nbsp&nbsp
</td> </tr>
</table>

<div id="review">
<input class="reviewbox" type="text" style="width:1000px" placeholder="리뷰를 작성해주세요" name="review">
</div>
<p align="center"><button id = "writereview" type = "submit" name="submit"> 작성 완료</button></p>
</body>
</html>