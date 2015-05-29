// JavaScript Document
// JavaScript Document
var opacity=1.0;var i=0;
var counter=0;
var images=new Array();
var valueofid="";
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
function setvalueofid(var1)
{
	valueofid=var1;
}
function pointochange()
{ if(valueofid!=null || valueofid!="")
	document.getElementById(valueofid).scrollIntoview();
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
function changereserve(var1)
{
	if(var1==1)
	alert("Changed reservation");	
}
$(document).ready(function(){
	$("#oneid").hide();$("#twoid").hide();$("#threeid").hide();$("#fourid").hide();
	$("#fiveid").hide();$("#sixid").hide();$("#sevenid").hide();$("#eightid").hide();
	$("#nineid").hide();$("#tenid").hide();$("#elevenid").hide();$("#twelveid").hide();
	$("#thirteenid").hide();
  $("#onecheck").change(function(){if ($("#onecheck").is(":checked"))$("#oneid").show();
 else $("#oneid").hide();});
  $("#twocheck").change(function(){if ($("#twocheck").is(":checked"))$("#twoid").show();
 else $("#twoid").hide();});
   $("#threecheck").change(function(){if ($("#threecheck").is(":checked"))$("#threeid").show();
 else $("#threeid").hide();});
    $("#fourcheck").change(function(){if ($("#fourcheck").is(":checked"))$("#fourid").show();
 else $("#fourid").hide();});
     $("#fivecheck").change(function(){if ($("#fivecheck").is(":checked"))$("#fiveid").show();
 else $("#fiveid").hide();});
      $("#sixcheck").change(function(){if ($("#sixcheck").is(":checked"))$("#sixid").show();
 else $("#sixid").hide();});
       $("#sevencheck").change(function(){if ($("#sevencheck").is(":checked"))$("#sevenid").show();
 else $("#sevenid").hide();});
        $("#eightcheck").change(function(){if ($("#eightcheck").is(":checked"))$("#eightid").show();
 else $("#eightid").hide();});
         $("#ninecheck").change(function(){if ($("#ninecheck").is(":checked"))$("#nineid").show();
 else $("#nineid").hide();});
          $("#tencheck").change(function(){if ($("#tencheck").is(":checked"))$("#tenid").show();
 else $("#tenid").hide();});
           $("#elevencheck").change(function(){if ($("#elevencheck").is(":checked"))$("#elevenid").show();
 else $("#elevenid").hide();});
             $("#twelvecheck").change(function(){if ($("#twelvecheck").is(":checked"))$("#twelveid").show();
 else $("#twelveid").hide();});
               $("#thirteencheck").change(function(){if ($("#thirteencheck").is(":checked"))$("#thirteenid").show();
 else $("#thirteenid").hide();});

});
$(document).ready(function() {
							   
		var currentPosition = 0;
		var slideWidth = 500;
		var slides = $('.slide');
		var numberOfSlides = slides.length;
		var slideShowInterval;
		var speed = 3000;

		
		slideShowInterval = setInterval(changePosition, speed);
		
		slides.wrapAll('<div id="slidesHolder"></div>')
		
		slides.css({ 'float' : 'left' });
		
		$('#slidesHolder').css('width', slideWidth * numberOfSlides);
		
		
		function changePosition() {
			if(currentPosition == numberOfSlides - 1) {
				currentPosition = 0;
			} else {
				currentPosition++;
			}
			moveSlide();
		}
		
		
		function moveSlide() {
				$('#slidesHolder')
				  .animate({'marginLeft' : slideWidth*(-currentPosition)});
		}

	});
