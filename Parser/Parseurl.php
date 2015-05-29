<?php
include("Controller.php");
$var=$_GET["link"];
$splitted=split("\=",$var);
$temp =$splitted[0];
$secondsplit=split("\/",$temp);
$a= $secondsplit[0];
$b=$secondsplit[1];
$a=$a;
$b=$b;
$control=new $a;
$control->$b();
//$control->$func;
/*class parse{
	
	public function getUrls($string)
		{
			$regex = '/Testing\/[^\" ]+/i';
			preg_match_all($regex, $string, $matches);
			return ($matches[0]);
		}
}
class router{
	public function parse($string)
	{
		$control=array();
		$func=array();
		$url=new parse();
		$i=0;
	$urls= $url->getUrls($string);
	foreach($urls as $u)
	{
		$aftersplit=split("\/",$u);
		$len=sizeof($aftersplit);
		$after=split("?",$aftersplit[$len-1]);
		$afternew=split("-",$after[1]);
		$control[$i]=$after[0];$func[$i]=$afternew[1];
		var_dump($control[$i]);
		var_dump($func[$i]);
		$i++
	}
	}
}*/
?>
