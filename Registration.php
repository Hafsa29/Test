<?php
session_start();
include('Creator.php');
$obj=new Create();
$formpage=new Formandelement();
$page=new  Pageandelement();
$formid=array();
function validity()
{
	$str="";
	if($_SESSION["notregistered"]==1){
		$str="<span style='color:red;'>ইনভ্যালিড </span>";
	}
	unset($_SESSION["notregistered"]);
	return $str;
}
$formid["name"]="registrationform";
$formid["onsubmit"]="return validateForm('registrationform','Password','Email')";
$formpage->formset("/Testing/Parser/Parseurl.php?link=Controller/register","post",$formid);
$registrationform=$formpage->add_element($page->spantag("ইমেইল&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp",NULL).
	$formpage->create_textbox("Email","text","").$page->new_line().
	$page->spantag("পাসওয়ার্ড",NULL).
	$formpage->create_textbox("Password","password","").$page->new_line().
	$page->spantag("নাম",NULL).
	$formpage->create_textbox("Name","text","").$page->new_line().
	$page->spantag("লিঙ্গ",NULL).
	$formpage->create_textbox("gender","radio","vmale")."male".
	$formpage->create_textbox("gender","radio","vfemale")."female".$page->new_line().
	$page->spantag("জাতীয়তা",NULL).
	$formpage->create_textbox("Nationality","text","").$page->new_line().
	$page->spantag("যোগাযোগ",NULL).
	$formpage->create_textbox("Contact","text","").$page->new_line().
	$page->spantag("পূর্ব বর্তী কোনো রিসার্ভেশ্ন নঞ",NULL).
	$formpage->create_textbox("reservation_no","text","").$page->new_line().validity().
	$formpage->create_button("submit","সাবমিট","submit",NULL,NULL,NULL)
	,true);
$page->addinnerelement($page->create_div(".rooms",NULL).$page->create_div(".bookingspace",NULL),true);
$page->addinnerelement($page->create_div(".booking1",NULL).$page->create_div(".title",NULL),false);
$page->addinnerelement($page->spantag("তথ্য পূরণ করুন","color:white"),true);
$page->addinnerelement($page->create_div(".registration"),false);
//$page->addinnerelement($page->create_div(".inputs"),true);

$page->addinnerelement($registrationform,true);
$design=$page->showinnerelement();
$obj->body($design);
?>