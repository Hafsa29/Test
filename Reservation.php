<?php
session_start();
include('Creator.php');
$obj=new Create();
if(!isset($_SESSION['changereserve']))
$_SESSION['changereserve']=1;
$arr=array();
$formpage=new Formandelement();
$arr["id"]="reservationform";
$selectattributes=array();
$page=new  Pageandelement();
function checkvalidity()
{
	$flag;
	if($_SESSION['changereserve']==2){
				$p=new  Pageandelement();
				$flag=$p->spantag($p->new_line()."Invalid Id or name ","margin-left: 20px; margin-top: 250px;
				color:red; font-size:10px;");
				unset($_SESSION['changereserve']);
			}	
			return $flag;
}
function setoptions()
{
	
		//$options=array( "১","২","৩","৪","৫","৬","৭","৮","৯" );
	$options=array("1","2","3","4","5","6","7","8","9");
		return $options;	
}
function setattribute($val)
{
	$selectattributes["class"]=$val;$selectattributes["style"]="width:80px;";
	return $selectattributes;
}
function check_in()
{
	if($_SESSION["checkincheck"]==1)
	{
		unset($_SESSION["checkincheck"]);
		return "<span style='color:red'>এই তারিখে কোনো রুম সহজল্ভ্য নয়</span>";
	}
}
	$attr=array();
		$attr["style"]="width:300px;";
		$option=array("সবচেয়ে কম বরদ্দকৃত দাম","সরকারি বরদ্দকৃত দাম","সিনিয়র সিটিজেন রেট");


	$page->addinnerelement($page->create_div(".rooms",NULL).$page->create_div(".roommain",NULL),false);
	$page->addinnerelement($page->create_image("images/book_a_room.jpg",NULL,NULL),true);

		
	$formpage->formset("","post",$arr);
	$page->addinnerelement($page->create_div(".reserv1",NULL).$page->create_image("images/headerhotelplan.png",NULL,NULL)
	.$page->create_div(".roomselect",NULL).$page->spantag("রুম সিলেক্ট করুন :",NULL),false);
	
	$options=array("ডিলাক্স রুম", "বিজনেস ক্লাস রুম","অ্যাট্রিয়াম  রুম" ,"এক্সিকিউটিভ সুট");
		
	//$design=$design.$page->showinnerelement();
	$formone=$formpage->add_element($formpage->setSelect("roomtype",$selectattributes,$options,$options).$page->end_div().$page->create_div(".vertical1",NULL).$page->end_div().
	$page->create_div(".checkindate",NULL).$page->spantag("চেক ইন",NULL).$formpage->create_textbox("checkindate","date",NULL).
	$page->new_line().$page->new_line().$page->spantag("চেক আউট",NULL).$formpage->create_textbox("checkoutdate","date",NULL).
	$page->new_line().
	check_in().
	$page->end_div().$page->create_div(".vertical2",NULL).$page->end_div().
	$page->create_div(".adult",NULL).
	$page->spantag("রুম সংখ্যা :",NULL)
	.$formpage->setSelect("rooms",setattribute("in1"),setoptions(),setoptions()).$page->new_line().$page->spantag("প্রাপ্ত বয়স্ক :",NULL)
	.$formpage->setSelect("adults",setattribute("in2"),setoptions(),setoptions()).$page->new_line().$page->spantag("শিশু   :",NULL)
	.$formpage->setSelect("child",setattribute("in3"),setoptions(),setoptions()).$page->end_div().$page->create_div(".vertical3",NULL).
	$page->end_div().$page->create_div(".buttoncheck",NULL)
	    .$formpage->create_button("book","এখনি বুক করুন","submit","onclick","var e = document.getElementById('reservationform'); e.action='Parser/Parseurl.php?link=Controller/only_book';",NULL).
		$page->new_line().$formpage->create_button("search","দাম খুঁজুন","submit","onclick","var e = document.getElementById('reservationform'); e.action='Parser/Parseurl.php?link=Controller/search_cost';",NULL).
		$formpage->create_button("search","সাইন ইন এবং বুক","submit","onclick","var e = document.getElementById('reservationform'); e.action='Parser/Parseurl.php?link=Controller/signinandbook';",NULL).
		$page->new_line().$page->end_div().$page->end_div().$page->create_div(".advancedsearch",NULL).
		$page->create_div(".in4",NULL).$page->end_div().
	$page->create_div(".in8",NULL),true);
	
	$page->addinnerelement($formone,true);
	$page->addinnerelement("",true);
	$page->addinnerelement($page->create_div(".changereservation",NULL).$page->create_div(".subdiv1",NULL)
	.$page->create_image("images/changereservation.png",NULL,NULL).
	$page->create_div(".underdiv1",NULL),false);
	//$design=$design;
	$formpage->formset("Parser/Parseurl.php?link=Controller/change_reservation","post",NULL);

	$form=$formpage->add_element("ব্যবহারকারী নাম:".$formpage->create_textbox("user_name","text",".in5").
		$page->new_line().$page->new_line().
		"	 কাস্টমার আইডি(যদি থাকে):".$formpage->create_textbox("cid","text",".in6").
		$page->new_line().$page->new_line().
		"নিশ্চিতকরণ নাম্বার :".$formpage->create_textbox("conformationno","text",".in7").checkvalidity().
		$formpage->create_button("submitchange","সাবমিট","submit",NULL,NULL),true);
		;
		$page->addinnerelement($form,true);
		$page->addinnerelement("",true);
		$page->addinnerelement($page->create_div(".subdiv2",NULL).$page->create_image("images/image1.jpg",NULL,NULL),true);
		$page->addinnerelement("",true);
		$page->addinnerelement("",true);
		$design=$page->showinnerelement();
			
$obj->body($design."	
</body>
</html>");
?>


