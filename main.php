<?php
include('Creator.php');
$obj=new Create();
$obj->body("<div id='slideshow'><a href='BACK3.jpg' id='image'><img src='images/suit8.png' alt='' id='imagedesign' /></a>
<img onclick='dosomething('next');' id='arrow' class='imageofarrow' src='images/arrowsquare.jpg'/>
<img onclick='dosomething('last');' id='arrow' class='imageofleftarrow' src='images/arrowsquare1.jpg'/>
</div>
<div  class='information'>
<p id='font'><em><strong>Welcome to Our Business Hotel in Dhaka,
Bangladesh</em></strong></br><span style='font-size:16px;'><em>Sprawling over seven acres of manicured grounds and gardens
with water features, the Radisson Blu Water Garden Hotel Dhaka
offers all the conveniences of a business hotel with the atmosphere</em></span></p>
</div>
<div class='price'>
<p>
<strong>
<span style='font-size:16px; color:#FFFFFF'><em>Nightly rates from</em></span>
<span style='font-size:16px;'>USD</span>
<span style='font-size:32px;'>247</span>
<span style='font-size:16px;'><em>at hotels </br></em></span>
<a href=''><span style='font-size:16px; color:#0066FF;'>contact us</span></a>
</strong>
</p>
</div>
<div class='horizontallineone'>
<p></p>
</div>
<div class='moreinfo'>
<span style='font-size:14px; color:#06F;'><a href='style1.css' style='color:#06F'>More about Us<a></span>
</div>
<div class='horizontallinetwo'>
</div>
<div class='lastbox'>
<div class='lastboxdiv1'>
<span style='font-size:30px;'>Hot Deals</span>
</br>
</br>
<img src='images/Satellite.jpg' />
</div>
<div class='lastboxdiv2'>
<span><strong>Save 20% on Best Available Rates and enjoy Free Internet throughout your 2-night stay</strong></span>
</div>
<div class='lastboxdiv3'>
<span style='font-size:30px;'>Hotel Facilities</span>
</br>
<ul>
<li>High Speed Internet</li>
<li>Pool</li>
<li>Outdoor Pool</li>
<li>Suites</li>
<li>Health Club</li>
<li>Room Service</li>
</ul>
</div>
</div>
<div class='reservation'>
<a href=''><img src='images/review.png'/></a>
<a href=''><img src='images/review1.png' /></a>
<form>
<div class='input1style'>
<span>Check-in Date</span><input type='date' name='checkindate' style='width:120px;'/>
</div>
<div class='input2style'>
<span>Check-out Date </span><input type='date' name='checkindate' style='width:120px;'/>
</div>
<div class='inputgroupstyle' id='input3style'>
<span>Rooms</span>
<select style='width:80px;'>
  <option value='one'>1</option>
  <option value='two'>2</option>
  <option value='three'>3</option>
  <option value='four'>4</option>
  <option value='five'>5</option>
  <option value='six'>6</option>
  <option value='seven'>7</option>
  <option value='eight'>8</option>
  <option value='nine'>9</option>
</select>
</div>
<div class='inputgroupstyle' id='input4style'>
<span>Adults</span>
<select style='width:80px;'>
 <option value='one'>1</option>
  <option value='two'>2</option>
  <option value='three'>3</option>
  <option value='four'>4</option>
  <option value='five'>5</option>
  <option value='six'>6</option>
  <option value='seven'>7</option>
  <option value='eight'>8</option>
</select>
</div>
<div class='inputgroupstyle' id='input5style'>
<span>Child</span>
<select style='width:80px;'>
 <option value='one'>1</option>
  <option value='two'>2</option>
  <option value='three'>3</option>
  <option value='four'>4</option>
  <option value='five'>5</option>
  <option value='six'>6</option>
  <option value='seven'>7</option>
  <option value='eight'>8</option>
</select>
</div>
</form>
<div class='findrate'>
<a><img src='images/review2.png'/></a>
<a><img src='images/review3.png' id='input3style'/></a>
</div>
</div>
<div>


</div>
</div>
<p>&nbsp;</p>
</div>
</body>
</html>");
//echo $d;
?>
