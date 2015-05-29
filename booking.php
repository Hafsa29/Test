<?php
session_start();
include('Creator.php');
$obj=new Create();
$page=new Pageandelement();
$formpage=new Formandelement();
function checkcredit()
{
	if($_SESSION["check_credit"]==1){
		unset($_SESSION["check_credit"]);
		return "<span style='color:red'>Please enter a valid credit card no</span>";
	}

}
$formpage->formset("/Testing/Parser/Parseurl.php?link=Controller/booking","post",NULL);
$page->addinnerelement($page->create_div(".rooms",NULL).$page->create_div(".bookingspace",NULL),true);
$page->addinnerelement($page->create_div(".booking1",NULL),false);
//$page->addinnerelement($page->spantag("তথ পূরণ করুন","color:white"),true);
$design;
$bookingform=$formpage->add_element(
	$formpage->create_textbox("name","text","").$page->new_line().
	$formpage->create_textbox("address","text","").$page->new_line().
	$formpage->create_textbox("email","text","").$page->new_line().
	$formpage->create_textbox("country","text","").$page->new_line().
	$formpage->create_textbox("contact","text","").$page->new_line().
	$formpage->create_textbox("zip","text","").$page->new_line()
	,false);
if((!isset($_SESSION["signin"]) || $_SESSION["signin"]==1) && $_SESSION["signinandbook"]!=3)
{
	$page->addinnerelement($page->create_div(".title",NULL),false);
	$page->addinnerelement($page->spantag("তথ্য পূরণ করুন","color:white"),true);	
	$page->addinnerelement($page->create_div(".names",NULL),false);
	$page->addinnerelement($page->spantag("নাম",NULL).$page->new_line().$page->new_line(),false);
	$page->addinnerelement($page->spantag("ঠিকানা",NULL).$page->new_line().$page->new_line(),false);
	$page->addinnerelement($page->spantag("ইমেইল ঠিকানা",NULL).$page->new_line().$page->new_line(),false);
	$page->addinnerelement($page->spantag("দেশ",NULL).$page->new_line().$page->new_line(),false);
	$page->addinnerelement($page->spantag("ফোন নমবর",NULL).$page->new_line().$page->new_line(),false);
	$page->addinnerelement($page->spantag("জিপ কোড",NULL).$page->new_line().$page->new_line(),true);
	$page->addinnerelement($page->create_div(".inputs",NULL).$bookingform,true);
	$page->addinnerelement("",true);
;
}
else  if($_SESSION["signinandbook"]==3){
	$arr;
	if($_SESSION["checkone"]==2)
		$arr="<span style='color: red'>অগ্রহন যোগ্য আইডি অথবা পাসওয়ার্ড</span>";
	$page->addinnerelement($page->create_div(".booking1",NULL).$page->create_div(".title",NULL),false);
	$page->addinnerelement($page->spantag("<strong>১Registered Customer</strong>","color:white"),true);
	$bookingform="ই মেইল".$formpage->create_textbox("emailid","text","").$page->new_line().
	"পাসওয়ার্ড".$formpage->create_textbox("password","password","").$page->new_line().$arr;
	$page->addinnerelement($bookingform,true);
	unset($_SESSION["checkone"]);

}
$page->addinnerelement($page->create_div(".booking1",NULL).$page->create_div(".title",NULL),false);
	$page->addinnerelement($page->spantag("<strong>2.বিশেষ অনুরোধ থাকলে পূরণ করুন</strong>","color:white"),true);
	$page->addinnerelement($page->create_div(".names",NULL),false);
	$page->addinnerelement($page->spantag("নাম","").$page->new_line().$page->new_line().
		$page->spantag("ফোন নমবর","ফোন নমবর").$page->new_line().$page->new_line().
		$page->spantag("বিশেষ অনুরোধ","").$page->new_line().$page->new_line(),true);
	$bookingform=$formpage->create_textbox("nameone","text","").$page->new_line().
	$formpage->create_textbox("addressone","text","").$page->new_line().
	$formpage->create_textbox("describe","text","").$page->new_line().$page->new_line().$page->new_line();
	$page->addinnerelement($page->create_div(".inputs1",NULL).$bookingform,true);
	$page->addinnerelement("",true);
	$page->addinnerelement($page->create_div(".booking1",NULL).$page->create_div(".title",NULL),false);
	$page->addinnerelement($page->spantag("<strong>৩.অাপনার রিসার্ভেশন নিশ্চিত করুন</strong>","color:white"),true);
	$page->addinnerelement($page->create_div(".inputing",NULL),false);
	$selectattributes=array("Visa Card","Master Card","American Express");
	$options=array("Visa","Master","Ax");
	$bookingform="card type".$formpage->setSelect("card_type",NULL,$selectattributes,$options);
	$page->addinnerelement($bookingform,false).checkcredit().$page->new_line();
	$selectattributes=array("কিংসাইজ বেড","ডাবল বেড","সেমি ডাবল বেড","সিঙগল");
	$options=array("kingsize","double","semi double","single");
	$bookingform="</br>কার্ড নমবর:".$formpage->create_textbox("card","text","").
	$page->new_line().$page->new_line().
	"bed type".$formpage->setSelect("bedtype",NULL,$selectattributes,$options).$page->new_line().
	$formpage->create_button("submit","রিজার্ভেশন নিশ্চিত করুন","submit",NULL,NULL,NULL)
	;
	$page->addinnerelement($bookingform,true);
	$design=$design.$page->showinnerelement();
$obj->body($design);

?>
