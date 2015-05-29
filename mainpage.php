<?php
include('Creator.php');
$obj=new Create();
$mydesign="<div id='slideshow'><a href='BACK3.jpg' id='image'><img src='images/suit8.png' alt='' id='imagedesign' /></a>
<img onclick=\"dosomething('next');\" id='arrow' class='imageofarrow' src='images/arrowsquare.jpg'/>
<img onclick=\"dosomething('last');\" id='arrow' class='imageofleftarrow' src='images/arrowsquare1.jpg'/>
</div>
<div  class='information'>
<p id='font'><em><strong>বাংলাদেশের ঢাকায় আমাদের ব্যবসায়িক হোটেলে স্বাগতম
</em></strong></br><span style='font-size:16px;'><em>সাত একর জমির উপর বিস্তৃত মনোরম বাগান সমৃদ্ধ ব্লু ওয়াটার গার্ডেন হোটেল এ উপযুক্ত পরিবেশ সহ
একটি ব্যবসায়িক হোটেলের সকল সুযোগ সুবিধা প্রদান করে ।
</em></span></p>
</div>
<div class='price'>
<p>
<strong>
<span style='font-size:16px; color:#FFFFFF'><em>রাত্রিকালীন হার</em></span>
<span style='font-size:16px;'> ডলার</span>
<span style='font-size:32px;'>২৪৭ থেকে </span>
<span style='font-size:16px;'><em>at hotels </br></em></span>
<a href=''><span style='font-size:16px; color:#0066FF;'>যোগাযোগ করুন</span></a>
</strong>
</p>
</div>
<div class='horizontallineone'>
<p></p>
</div>
<div class='moreinfo'>
</div>
<div class='horizontallinetwo'>
</div>
<div class='lastbox'>
<div class='lastboxdiv1'>
<span style='font-size:30px;'>আকর্ষনীয় সুযোগসমুহ</span>
</br>
</br>
<img src='images/Satellite.jpg' />
</div>
<div class='lastboxdiv2'>
<span><strong>সেরা বরাদ্দ দামে ২০% 
সঞ্চয় করুন এবং আপনার
২ রাত থাকাকালীন সময়ে
ফ্রি ইন্টারনেট উপভোগ করুন ।</strong></span>
</div>
<div class='lastboxdiv3'>
<span style='font-size:30px;'>হোটেলের সুযোগসুবিধা</span>
</br>
<ul>
<li>দ্রুতগতি সম্পন্ন ইন্টারনেট</li>
<li>পুল</li>
<li>আউটডোর পুল</li>
<li>Suites</li>
<li>হেলথ ক্লাব</li>
<li>রুম সার্ভিস</li>
</ul>
</div>
</div>
<div class='reservation'>
<img src='images/mainone.jpg'/>
</div>
</div>
<div>


</div>
</div>
<p>&nbsp;</p>
</div>
</body>
</html>";
$obj->body($mydesign);
?>
