<?php
class Formandelement {
private $formelement;
public function formset ($action,$method,$otherattributes)
{
	$formbuildfunc="<form ";
	if($otherattributes!=NULL){
		foreach ($otherattributes as $key => $value) {
		$formbuildfunc=$formbuildfunc." $key = \"$value\" ";
		}
	}
	$formbuildfunc=$formbuildfunc." action='$action' method='$method' >";
	$this->formelement=$formbuildfunc;
	return $this->formelement;
}
public function add_element($element,$endofform)
{
	$this->formelement=$this->formelement.$element;
	if($endofform)
		$this->formelement=$this->formelement."</form>";
	else if($endofform==1){
		$this->formelement="";
		$this->formelement=$this->formelement.$element;
	}

	return $this->formelement;
}
public function setSelect($name,$attributes,$options,$values)
{
	$i=0;
	$selectfunc="<select name='$name' ";$optionfunc;
	if($attributes!=NULL) 
	{
		foreach ($attributes as $key => $value) {
			$selectfunc=$selectfunc." $key = '$value' ";
		}
	}
	$selectfunc=$selectfunc.">";
	foreach ($options as $key => $value) {
		$val=$values[$i];
		$selectfunc=$selectfunc."<option value='$val' >$value</option>";
		$i++;
	}
	$selectfunc=$selectfunc."</select>";
	return $selectfunc;
}
public function create_button($name,$buttonname,$type,$eventname,$event,$attributes)
{
	$events=" $eventname=\"$event\" ";
	$buttonfunc="<button name='$name' type='$type' ";
	if($eventname!=NULL)
	$buttonfunc=$buttonfunc.$events;
	if($attributes!=NULL) 
	{
		foreach ($attributes as $key => $value) {
			$buttonfunc=$buttonfunc." $key = '$value' ";
		}
	}	
	$buttonfunc=$buttonfunc.">$buttonname</button>";
	return $buttonfunc;
}
public function create_textbox($name,$type,$classorid)
{
	$attr;$attrname;$setclass;
	if($classorid!=NULL){
	if(substr($classorid, 0,1)=='.'){
		$attrname="class";
		$attr=substr($classorid, 1,strlen($classorid));
		$setclass=" $attrname='$attr' ";
	}
	else if(substr($classorid, 0,1)=='#'){
		$attrname="id";
		$attr=substr($classorid, 1,strlen($classorid));
		$setclass=" $attrname='$attr' ";
	}
	else if(substr($classorid, 0,1)=='v'){
		$attrname="value";
		$attr=substr($classorid, 1,strlen($classorid));
		$setclass=" $attrname='$attr' ";
	}
	}

		$input="<input name='$name' type='$type' $setclass >";
	return $input;
}
public function endform()
{
	return "</form>";
}
}
?>