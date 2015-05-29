<?php
session_start();

include('Creator.php');
$obj=new Create();

if(!isset($_SESSION["fg"]))
$_SESSION["fg"]=1;
if(!isset($_SESSION["signin"]))
$_SESSION["signin"]=1;
$des="<div class='signindiv1'>
<div class='signindiv2'>
<img src='images/logo1.png' />
</div>
<div class='signindiv3'>
<div class='signindiv4'>
<span>সাইন ইন</span>
</div>
<div class='signindiv5'>
	 <form name='signinform' method='post' action=\"Parser/Parseurl.php?link=Controller/checklogin\" onsubmit=\"return validateForm('signinform','password','email')\">
<span>ইমেইল ঠিকানা  :&nbsp;<input type='text' value='' name='email'/></span>
<span>পাসওয়ার্ড:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' value='' name='password'/></span>
<button name='butt'>সাইন ইন</button>";
if($_SESSION["fg"]==2){
$des=$des."<span style='color:red; font-size:16px;'><br />Invalid Id password</span>";
$_SESSION["fg"]=1;
unset($_SESSION["fg"]);
}
$des=$des."<span style='color:#06F; font-size:16px;'><br />
এখনও রেজিস্ট্রেশন করেননি!!!!!!রেজিস্ট্রেশন করতে এখানে 
<a href=\"Parser/Parseurl.php?link=Controller/registration\">ক্লিক করুন </a>
</span>
</div>
</div>
</div>
<div class='signindiv6'>
<img src='images/logo2.png' />
<span>
</div>
<div class='signindiv7'>
<span>
Sign In
<li>
এখন যোগ দিন এবং আকর্ষণীয় অফার পান
</li>
<li>
প্রচুর ই অফার পান
</li>
</span>
</div>
<div class='signindiv8'>
<div class='div1'>
<span>
<b>আমাদের সুবিধা সমূহ
</b>
<br />
<ul>
<li>
দ্রুতগতি সম্পন্ন ইন্টার্নেট
</li>
<li>
Pool
</li>
<li>
আউটডোর পুল
</li>
<li>
সু্যট
</li>
<li>
হেলথ ক্লাব
</li>
<li>
রুম সার্ভিস
</li>
</ul>
</span>
</div>
<div class='div2'>
<span>
<b>ভাষা
</b>
<ul>
<li>
ইংলিশ (ইউ কে)
</li>
<li>
ইংলিশ (গ্লোবাল)
</li>
<li>
ইংলিশ (আয়ারল্যান্ড)
</li>
<li>
বাংলা
</li>
</ul> 
</span>
</div>
<div class='div3'>
<span>
<b>লোকেশ্নস</b>
<ul>
<li>
ঢাকা 
</li>
<li>
চট্টগ্রাম
</li>
<li>
সিলেট 
</li>
</ul>
</span>
</div>
</div>
<div class='footer'>
<b>আমাদের হোটেল পুরো দেশ জুড়ে বিস্তৃত</b><br />
<span>
অনলাইন হোটেল বুক করুন একদম সস্তা রেট এ
</span>
<span class='span1'>
All rights reserved @purba
</span>
</div>
</div>
</body>
</html>";
$design=$obj->body($des);

?>
