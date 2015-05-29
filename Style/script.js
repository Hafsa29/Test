// JavaScript Document
// JavaScript Document
var opacity=1.0;var i=0;
var counter=0;
var images=new Array();
var main=function ()
{
	images[0]="images/suit8.png";
	images[1]="images/suit13.jpg";
	images[2]="images/suit17.jpg";
	images[3]="images/suit12.jpg";
};
function decreaseopacity(var1,var2)
{
		var interval=setInterval(function(){
		if(opacity<=0.20)
		{
			clearInterval(interval);
			if(var1=="next")
			nextimage();
			else
			previousimage();
	setTimeout(function(){increaseopacity();},1300);
		}
	document.getElementById("imagedesign").style.opacity=opacity;
	document.getElementById("imagedesign").style.filter='alpha(opacity=' + opacity * 100 + ")";
	opacity-=opacity*.10;
	},var2);
}
function increaseopacity()
{
	opacity=0.20;
	var interval=setInterval(function(){
		if(opacity>=1.0)
		{
			clearInterval(interval);
		}
	document.getElementById("imagedesign").style.opacity=opacity;
	document.getElementById("imagedesign").style.filter='alpha(opacity=' + opacity * 100 + ")";
	opacity+=opacity*.10;
	},100);
}
function previousimage()
{
	counter--;
	if(counter<0)
	counter=3;
	document.getElementById("imagedesign").src=images[counter];
}
function dosomething(var1)
{
	setTimeout(function(){decreaseopacity(var1,50);},1300);
}
function nextimage()
{
	counter++;
	if(counter>3)
	counter=0;
	document.getElementById("imagedesign").src=images[counter];
}
function slideshow()
{
	var var1=15000;
	while(window.onfocus)
	{
		if(var1>=45000)
		var1=15000;
	setTimeout(function(){decreaseopacity("next",50);},var1);
	var1+=15000;
	}
}
function validateForm(var1,var2,var3)
{
var x=document.forms[var1][var2].value;
if (x==null || x=="")
  {
  alert("Password Field must be filled out");
  return false;
  }
 x=document.forms[var1][var3].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}
