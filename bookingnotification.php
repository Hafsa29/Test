<?php
session_start();
include('Creator.php');
unset($_SESSION["signinandbook"]);
$obj=new Create();
$obj->body("<div class='rooms'>
<div class='roommain'>
<img src='images/book_a_room.jpg'/>
</div>
<div class='bookingnoti' id='hei'>
<div class='title'>
<p><strong>বুকিং নিশ্চিতকরণ  এবং তথ্য</strong></p>
</div>
<div class='bookingspace'>
<div class='space'>
<p>Your reservation id is &nbsp".$_SESSION['reservation_no']."</p>
<p>20% of the total cost has been deducted from ur credit card</p>
<p>You will checkin at ".$_SESSION['checkindate']."</p>
<p>You will checkout at ".$_SESSION['checkoutdate']."</p>
<p>Click here to change reservation</p>
<form method='post' action='/Testing/Parser/Parseurl.php?link=Controller/reservation'>
<button class='butt' type='submit' >পরিবর্ত্ন</button>
</div>
</div>
</div>
</div>
</body>
</html>");
?>


