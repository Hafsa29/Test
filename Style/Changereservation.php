<?php
session_start();
include('Creator.php');
$obj=new Create();
if(!isset($_SESSION["res"]))
$_SESSION["res"]=1;
$str=$_SESSION["res"];
$arr=$_SESSION['changereserve'];
$formpage=new Formandelement();
$page=new  Pageandelement();
$design="<div class='rooms'>
<div class='bookingspace'></div>
<div class='booking1'>
	<div class='title'>
	<p style='color:white;'><strong>আপনার রিসার্ভেশন এর রিভিউ </strong></p>
	</div><div style='margin-left:65px;font-size:15px;'>";
		foreach ($arr as $key => $value) {
			foreach ($value as $keyone => $valueone) {
				if($keyone=='reservation_no')$_SESSION['reserve']=$valueone;
				if($valueone!=NULL)
				$design=$design."<p>$keyone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $valueone</p>";
			}
		}
	$design=$design."</div><div class='title'>
	<p style='color:white;'><strong>রিসার্ভেশন পরিবর্ত্ন করুন</strong></p>
	</div>
	<form method='post' action='/Testing/Parser/Parseurl.php?link=Controller/update_reservation'>
	<input id='onecheck' type=\"checkbox\" name=\"name\" value=\"name\" >আপ্নার নাম<input type='text' name='0' class='inputchangereserve' id='oneid'><br>
	<input id='twocheck' type=\"checkbox\" name=\"room_type\" value=\"room_type\" >কী ধরনের রম চান<input name='1' type='text' class='inputchangereserve' id='twoid' ><br>
	<input id='threecheck' type=\"checkbox\" name=\"bedtype\" value=\"bedtype\">কী ধরণের বেড চান<input name='2' type='text' class='inputchangereserve' id='threeid' ><br>
	<input id='fourcheck' type=\"checkbox\" name=\"no_of_child\" value=\"no_of_child\">শিশু<input name='3' type='text' class='inputchangereserve' id='fourid' ><br>
	<input id='fivecheck' type=\"checkbox\" name=\"no_of_room\" value=\"no_of_room\">রুম সংখ্যা<input name='4' type='text' class='inputchangereserve' id='fiveid' ><br>
	<input id='sixcheck' type=\"checkbox\" name=\"check_in\" value=\"check_in\">চেক ইন<input type='text' name='5' class='inputchangereserve' id='sixid' ><br>
	<input id='sevencheck' type=\"checkbox\" name=\"check_out\" value=\"check_out\">চেক আউট<input type='text' name='6' class='inputchangereserve' id='sevenid' ><br>
	<input id='eightcheck' type=\"checkbox\" name=\"no_of_adult\" value=\"no_of_adult\">প্রাপ্ত বয়স্ক<input name='7' type='text' class='inputchangereserve' id='eightid' ><br>
	<input id='ninecheck' type=\"checkbox\" name=\"contact_no\" value=\"contact_no\">যোগাযোগ<input type='text' name='8' class='inputchangereserve' id='nineid' ><br>
	
	<input id='tencheck' type=\"checkbox\" name=\"address\" value=\"address\">ঠিকানা<input type='text' name='9' class='inputchangereserve' id='tenid' ><br>
	<input id='elevencheck' type=\"checkbox\" name=\"Country\" value=\"Country\">দেশ<input type='text' name='10' class='inputchangereserve' id='elevenid' ><br>
	<input id='twelvecheck' type=\"checkbox\" name=\"Zipcode\" value=\"Zipcode\">জিপকোড<input type='text' name='11' class='inputchangereserve' id='twelveid' ><br>
	<input id='thirteencheck' type=\"checkbox\" name=\"Special_req\" value=\"Special_req\">বিশেষ অনুরোধ<input name='12' type='text' class='inputchangereserve' id='thirteenid' ><br>
	<button class='butt' type='submit' onclick=\"changereserve($str)\" >নিশ্চিত করুন</button>
	";
	if($_SESSION["res"]==2)
		unset($_SESSION["res"]);
	$design=$design."</div>
	</div>
</body>
</html>
";
$obj->body($design);
?>
