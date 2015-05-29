<?php
include("PageStruct.php");
class Create
{
	public function create_head()
	{
		$s= "<html >
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <title>Hotel Website</title>
            <link href='/Testing/style1.css' rel='stylesheet' type='text/css' />
            
             <script type='text/javascript' src='/Testing/Jquery.js'></script>
             <script type='text/javascript' src='/Testing/cycle.js'></script>
            <script type='text/javascript' src='/Testing/script.js'></script>
            </head>";
            return $s;
	}
	public function create_head_header()
	{
		$page=new Pageandelement();

$page=new Pageandelement();
		$page->addinnerelement("<body onload='main();slideshow();'>".$page->create_div("#container",NULL),false);
	
		$page->set_image_style("alignment-adjust:after-edge");
		$page->addinnerelement($page->create_image("images/logo2.jpg" ,"110","1181"),false);
		$page->addinnerelement($page->create_div(".headeroption",NULL),false);
		$page->addinnerelement($page->link("/Testing/Parser/Parseurl.php?link=Controller/mainpage","হোম",NULL,NULL),false);
		$page->addinnerelement($page->link("/Testing/Parser/Parseurl.php?link=Controller/reservation" ,"রিসার্ভেশন",NULL,NULL),false);
		$page->addinnerelement($page->link("/Testing/Parser/Parseurl.php?link=Controller/service","সেবা",NULL,NULL),false);
		$page->addinnerelement($page->link("/Testing/Parser/Parseurl.php?link=Controller/room","রুম",NULL,NULL),false);
		$page->addinnerelement($page->link("/Testing/Parser/Parseurl.php?link=Controller/dining","ডাইনিং",NULL,NULL),false);
		$page->addinnerelement($page->link("/Testing/Parser/Parseurl.php?link=Controller/signin","সাইন ইন",NULL,NULL),false);
		$page->addinnerelement($page->link("","",NULL,NULL),true);
	$s=$page->showinnerelement();
;	return $s;
}
public function body($design)
{
	$a=$this->create_head();
	$b=$this->create_head_header();
		echo $a.$b.$design;
	return $a.$b.$design;
}	
}
?>
