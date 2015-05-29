<?php

class Pageandelement{
	private $div,$s;
	public function set_image_style($style)
	{
		$this->s="$style";
	}
	public function create_image($imagesource,$height,$width)
	{
		$src=$imagesource;
		$h=$height;
		$w=$width;
		$img="<img src='$src' height='$h'  width='$w' style=' $this->s; ' />";
		return $img;
	}
	public function spantag($item,$style)
	{
		return "<span style='$style' >$item</span>";
	}
	public function link($src,$name,$classorid,$attributes)
	{
		$setclass;$attr;$attrname;;
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
		}
		if($attributes !=NULL){
			foreach ($attributes as $key => $value) {
			$otherattribute=$otherattribute." $key = '$value' ";
			}
		}
		$linkfunc="<a href=\"$src\" $setclass $attributes >$name</a>";
		return $linkfunc;
	}
	public function create_div($classorid,$attributes)
	{
		$setclass;$attr;$attrname;$otherattribute;
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
		}
		if($attributes !=NULL){
			foreach ($attributes as $key => $value) {
			$otherattribute=$otherattribute." $key = '$value' ";
			}
		}
		$d= "<div $setclass $otherattribute >";
		return $d;

	}
	public function addinnerelement($el,$endofdiv)
	{
		$this->div=$this->div.$el;
		if($endofdiv)
			$this->div=$this->div."</div>";
	}
	public function showinnerelement()
	{
		return $this->div;
	}
	public function new_line()
	{
		$newline="<br />";
		return $newline;
	}
	public function end_div()
	{
		return "</div>";
	}
}
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