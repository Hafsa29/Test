<?php
include("Form.php");
$formpage=new Formandelement();
$formpage->formset("action.php","post",NULL);
$formone=$formpage->add_element("Name:".$formpage->create_textbox("Name","text","")."</br>".
  "Password".$formpage->create_textbox("Password","password",""),true  );
echo $formone;
?>