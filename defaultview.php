<?php
include("/var/www/WebProject/Manager/default_manager.php");
$formurl="/WebProject/View/testone.php";
$manager=new default_manager();
$default_start="<html>
<body>";
$default_end="</body></html>
";
$default_form="<form action= ".$manager->load_page($formurl)." method='post'>

Name: <input type='text' name='name'><br>
E-mail: <input type='text' name='email'><br>
<input type='submit' name='submitbutton'>
</form>";
echo $default_start."<img src='logo2.png'>".$default_end;
?>
