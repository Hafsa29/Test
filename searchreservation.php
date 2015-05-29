<?php
session_start();
include('Creator.php');
$obj=new Create();
$ne=array();
$ne=$_SESSION["searcharr"];
$neone=$_SESSION["services"];

$design="<div class='rooms'>
<div class='bookingspace'></div>
<div class='booking1'>
	<div class='title'>
	<p style='color:white;'><strong>১.তথ্য </strong></p>
	</div><div style='margin-left:65px;font-size:25px;'>";

	foreach ($ne as $key => $value) {
	$str=null;
	$i=0;
	foreach ($value as $keyone => $valueone) {
		if($i>0){
				$str=$str."                                                                    
                                  ".$valueone;
                }
                $i++;

	}
	$design=$design."<p>$str ডলার</p>";
}


	$design=$design."</div>
	<div class='title'>
	<p style='color:white;'><strong>১.তথ্য </strong></p>
	</div><div style='margin-left:65px;font-size:25px;'>";
	foreach ($neone as $key => $value) {
	$str=null;
	foreach ($value as $keyone => $valueone) {

				$str=$str."                                                                    
                                  ".$valueone;
	}
	$design=$design."<p>$str ডলার</p>";
	}


	$design=$design."</div>

	</div>
	</div>
</body>
</html>
";
$obj->body($design);
?>