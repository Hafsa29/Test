<?php

session_start();

include('Creator.php');
include('Database/DbStruct.php');
if(!isset($_SESSION["signin"]) || $_SESSION["signin"]==1){
echo "এই পেজ এ যাওয়ার জন্য সাইন ইন করুন";
}
else{
	unset($_SESSION["signinandbook"]);
//	var_dump($_SESSION["allreservation"]);
$cid= $_SESSION['fetch'][0];
$name= $_SESSION['fetch'][3];
$gender= $_SESSION['fetch'][4];
$nation= $_SESSION['fetch'][5];
$con= $_SESSION['fetch'][6];
$_SESSION["emailid"]=$_SESSION['fetch'][1];
$_SESSION["passwordone"]=$_SESSION['fetch'][2];
$design="<div class='rooms'>
<div class='linka'>
<a  href='Parser/Parseurl.php?link=Controller/signin' ><strong>লগ আউট</strong></a>
<a  href='booking.php' ><strong>Book a room</strong></a>
<a  href='Parser/Parseurl.php?link=Controller/seeallreservation' ><strong>সকল রিসার্ভেশন দেখুন</strong></a>
</div>
<img style='width: 100px; position: relative; top:0; ' src='images/login.jpg'>

<p style='position: relative; top:-130 ; left:170; font-size:30px; '><strong>আমার প্রোফাইল</strong></p>

<div class='border'></div>
<div class='write'>";

$design=$design.
"<span>গ্রাহকের আইডি&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$cid."</span></br>";
$design=$design.
"<span>গ্রাহকের নাম &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name."</span></br>";
$design=$design.
"<span>লিংগ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$gender."</span></br>";
$design=$design.
"<span>জাতীয়তা &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$nation."</span></br>";
$design=$design.
"<span>যোগাযোগের নম্বর &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$con."</span></br>";
$design=$design."
<div class='imagegallery'>


</div>
</div>

<div id=\"slideshowone\">
    <div id=\"slideshowWindow\">
    
        <div class=\"slide\">
            <img src=\"images/dining2.jpg\" />
        </div>
        
        <div class=\"slide\">
            <img src=\"images/suit14.jpg\" />
        </div>
        
        <div class=\"slide\">
            <img src=\"images/suit15.jpg\" />
        </div>
</div>
</div>";

	$design=$design."</div></div>";
				$design=$design."
				<div class='customerupdate'>
				<form method='post' action='Parser/Parseurl.php?link=Controller/updatecustomer'>
				<div class='inputs'>
				<span >কাস্টমার আইডি:&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name='cid' value=$cid></input></br>
				<span >নাম:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name='name' value=$name></input></br>
				<span >জাতীয়তা:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name='nationality' value=$nation></input></br>
				<span >যোগাযোগ নম্বর:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type='text' name='contact' value=$con></input></br>
				<button type='submit'  class='butt'>আপডেট</button>
				</div>
				</form></div>
				
";
$design=$design."<div class='allshowreserve'>";
	$arr=$_SESSION["allreservation"];
	$i=0;
	foreach ($arr as $key => $value) {
		
			$row="";$column="";
			
		foreach ($value as $keyone => $valueone) {
				$row=$row."<th>$keyone</th>";
				$column=$column."<td>$valueone</td>";
		}
		if($i==0){		$design=$design."<table border='1'>
		<caption>Your Reservations</caption>";
			$design=$design."<thead><tr>$row</tr></thead>";$i=1;}
		$design=$design."<tr>$column</tr>";
	}
	$design=$design."</table></br></br></div>";
$obj=new Create();
$obj->body($design);
}
?>
