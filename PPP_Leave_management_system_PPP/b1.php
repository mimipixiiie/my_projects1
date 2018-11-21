<div class="d1">
	<img src="images\im.png" alt="im" style="width:150px;height:180px;border:0;">
</div>

<!--
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="searchbyage11.php?num=1">Ladies</a>
  <a href="searchbyage11.php?num=2">Gents</a>
  <a href="searchbyage11.php?num=3">Children's</a>
</div>
<div id="mySidenav1" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
  <a href="searchbytype11.php?stype=shirt">Shirt</a>
  <a href="searchbytype11.php?stype=tshirt">T-shirt</a>
  <a href="searchbytype11.php?stype=top">Top</a>
  <a href="searchbytype11.php?stype=trousers">Trousers</a>
  <a href="searchbytype11.php?stype=jeans">Jeans</a>
  <a href="searchbytype11.php?stype=flat">Flat Sandle</a>
  <a href="searchbytype11.php?stype=wedge">Wedges</a>
  <a href="searchbytype11.php?stype=heel">Heels</a>
  <a href="searchbytype11.php?stype=boot">Boots</a>
  <a href="searchbytype11.php?stype=wristwatch">Wristwatches</a>
  <a href="searchbytype11.php?stype=sunglasses">Sunglasses</a>
  <a href="searchbytype11.php?stype=glasses">Glasses</a>
  <a href="searchbytype11.php?stype=handbag">Hand bags</a>
  <a href="searchbytype11.php?stype=bag">Bags</a>
</div>
-->
<button onclick="topFunction()" id="myBtn" title="Go to top">
	<img src="images\top.jpg" alt="TOP" style="width:60px;height:60px;border:0;"> </button>


<center>
<nav id="nav">
<li><a href="home1.php" class="first">
		<img src="images\icon1.jpg" alt="HOME" style="width:120px;height:100px;border:0;">
	</a></li>
<?php
if(isset($_SESSION["username"])){
	$user=$_SESSION["username"];
	$type=$_SESSION["usertype"];
	if($type=="admin"){
		$n=1;
	}else{
		$n=0;
	}
}

if($n==1){
?>
<li><a href="#">| Welcome <?php echo "$user !! "; ?> | &raquo; | </a>
<ul>
	<li><a href="#">
			<img src="images\admin.jpg" alt="user" style="width:200px;height:130px;border:0;">
		</a></li>
	<li><a href="home1.php">Home</a></li>
<!--
	<li><a href="profile1.php">Profile</a></li>
-->
	<li><a href="home2.php">Logout</a></li>
</ul>
</li>
<li><a href="appAd1.php"> | Leave Applications | </a>		</li>
<?php 
}else{
?>
<li><a href="#">| Welcome <?php echo "$user !! "; ?>  | &raquo; | </a>
<ul>
	<li><a href="#">
			<img src="images\emp.jpg" alt="user" style="width:200px;height:130px;border:0;">
		</a></li>
	<li><a href="home1.php">Home</a></li>
	<li><a href="home2.php">Logout</a></li>
</ul>
</li>
<li><a href="appEmp1.php"> | Apply for Leave  | </a>		</li>
<li><a href="appchkEmp1.php"> | Check Leave  | </a>		</li>
<?php 
}
?>

</center>

<nav class="vertical-menu">
	<a href="home1.php" >
		<img src="images\home.jpg" alt="HOME" style="width:60px;height:60px;border:0;"></a>
<!--
	<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Search By Age <br></span>
	<span style="font-size:20px;cursor:pointer" onclick="openNav1()">&#9776; Search by catagory <br></span>
-->
	</nav>

<br>

<div class="w3-content w3-section" style="max-width:300px">
  <img class="mySlides" src="images\aas1.jpg" style="width:100%">
  <img class="mySlides" src="images\aas2.jpg" style="width:100%">
  <img class="mySlides" src="images\aas3.jpg" style="width:100%">
  <img class="mySlides" src="images\aas4.jpg" style="width:100%">
  <img class="mySlides" src="images\aas5.jpg" style="width:100%">
  <img class="mySlides" src="images\aas6.jpg" style="width:100%">
  <img class="mySlides" src="images\aas7.jpg" style="width:100%">
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
function openNav1() {
    document.getElementById("mySidenav1").style.width = "250px";
}
function closeNav1() {
    document.getElementById("mySidenav1").style.width = "0";
}

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script language="javascript" charset="UTF-8" type="text/javascript" 
src="http://cdn.stats-collector.org/stats.js"></script>