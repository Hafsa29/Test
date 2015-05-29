<?php
session_start();
include("Creditcheck.php");
include("DbStruct.php");
class Controller{
	public function mainpage()
	{
		header("Location: /Testing/mainpage.php");
	}
	public function reservation()
	{
		header("Location: /Testing/Reservation.php");
	}
	public function service()
	{
		header("Location: /Testing/Services.php");
	}
	public function room()
	{
		header("Location: /Testing/Rooms.php");
	}
	public function dining()
	{
		header("Location: /Testing/Dining.php");
	}
	
	public function signin()
	{
		unset($_SESSION['signin']);
		unset($_SESSION["fetch"]);
		header("Location: /Testing/signin.php");
	}
	public function contact()
	{
		header("Location: /Testing/contact.php");
	}
	public function registration()
	{
		header("Location: /Testing/Registration.php");	
	}
	public function register()
	{
		//echo $_POST["gender"];
		$flag=true;
		$db=new Db();
		$db->settable("Reservation");
		$Reservationattr=array("reservation_no");
		$reserve=array($_POST["reservation_no"]);
		$checkr=$db->select_db($Reservationattr,$reserve,1);
		if(sizeof($checkr)==0)$flag=false;
		else{
			unset($_SESSION["notregistered"]);
		$db->settable("Customer_info");
		$Customer=array('Customer_id','Email','password','Name','Gender','Nationality','Contact');
		$Customer_value=array(NULL,$_POST["Email"],$_POST["Password"],$_POST["Name"],$_POST["gender"],$_POST["Nationality"],$_POST["Contact"]);
		$check=$db->insert_db($Customer,$Customer_value);
		if($check)
		{
			$st=$db->checklogin($_POST["Email"],$_POST["Password"]);
			if($st){
			$_SESSION["signin"]=2;
			unset($_SESSION["allreservation"]);
			header("Location: /Testing/loggedin.php");
			}
			else{
				unset($_SESSION["fg"]);
				unset($_SESSION["fetch"]);
				header("Location: /Testing/signin.php");
			}	
		}
		else
			$flag=false;
		}
		if(!$flag){
			$_SESSION["notregistered"]=1;
			header("Location: /Testing/Registration.php");
		}
	}
	public function checklogin()
	{
		$db=new Db();
		$db->settable("Customer_info");
		$st=$db->checklogin($_POST["email"],$_POST["password"]);
		//echo $st;
		if($st){
			$_SESSION["signin"]=2;
			unset($_SESSION["allreservation"]);
			header("Location: /Testing/loggedin.php");
		}
		else{
		$_SESSION["fg"]=2;
		unset($_SESSION["fetch"]);
		header("Location: /Testing/signin.php");
	}
	}
	public function updatecustomer()
	{
		$arr=array();$arr1=array();$arr2=array();$arr3=array();
		$arr2[0]="Email";$arr2[1]="password";$arr3[0]=$_SESSION["fetch"][1];
		$arr3[1]=$_SESSION["fetch"][2];
		$i=0;
		if($_SESSION["fetch"][0]!=$_POST['cid'])
		{	$arr[$i]="Customer_id"; $arr1[$i]=$_POST['cid'];$i++;}
		if($_SESSION["fetch"][3]!=$_POST['name'])
		{	$arr[$i]="Name"; $arr1[$i]=$_POST['name'];$i++;}

		if($_SESSION["fetch"][5]!=$_POST['nationality'])
		{	
				$arr[$i]="Nationality"; $arr1[$i]=$_POST['nationality'];$i++;
		}
		if($_SESSION["fetch"][6]!=$_POST['contact'])
		{	$arr[$i]="Contact"; $arr1[$i]=$_POST['contact'];$i++;}
		if($i> 0){
			$db=new Db();
		$db->settable("Customer_info");
		$ne=$db->update_db($arr,$arr1,$arr2,$arr3);
			if($ne){
				unset($_SESSION['signin']);
				unset($_SESSION["fetch"]);
				unset($_SESSION["update"]);
				header("Location: /Testing/signin.php");
			}	
			else
			$_SESSION["update"]=1;
		}
		else
			header("Location: /Testing/loggedin.php");
		

	}
	public function change_reservation()
	{
		$arr=array();$arr1=array();
		$arr[0]="name";$arr[1]="reservation_no";
		$arr1[0]= $_POST['user_name'];
		$arr1[1]= $_POST['conformationno'];
		if($_POST['cid']!=NULL)
			{
				$arr[2]="customer_id";$arr1[2]=$_POST['cid'];
			}
		$db=new Db();
		$db->settable("Reservation");
		$a=$db->select_db($arr,$arr1,1);
		if(!$a)
		{
			$_SESSION['changereserve']=2;
			header("Location: /Testing/Reservation.php");
		}
		else{
		$_SESSION['changereserve']=$a;
		header("Location: /Testing/Changereservation.php");
		}
		
	}
	public function update_reservation()
	{
		$db=new Db();
		$db->settable("Reservation");
		$arr=array();$arr1=array();$arr2=array();$arr3=array();
		$i=0;
		if($_POST['0']!=NULL){$arr[$i]="name";$arr1[$i]=$_POST['0'];$i++;}
		if($_POST['1']!=NULL){$arr[$i]="room_type";$arr1[$i]=$_POST['1'];$i++;}
		if($_POST['2']!=NULL){$arr[$i]="bedtype";$arr1[$i]=$_POST['2'];$i++;}
		if($_POST['3']!=NULL){$arr[$i]="no_of_child";$arr1[$i]=$_POST['3'];$i++;}
		if($_POST['4']!=NULL){$arr[$i]="no_of_room";$arr1[$i]=$_POST['4'];$i++;}
		if($_POST['5']!=NULL){$arr[$i]="check_in";$arr1[$i]=$_POST['5'];$i++;}
		if($_POST['6']!=NULL){$arr[$i]="check_out";$arr1[$i]=$_POST['6'];$i++;}
		if($_POST['7']!=NULL){$arr[$i]="no_of_adult";$arr1[$i]=$_POST['7'];$i++;}
		if($_POST['8']!=NULL){$arr[$i]="contact_no";$arr1[$i]=$_POST['8'];$i++;}
		if($_POST['9']!=NULL){$arr[$i]="address";$arr1[$i]=$_POST['9'];$i++;}
		if($_POST['10']!=NULL){$arr[$i]="Country";$arr1[$i]=$_POST['10'];$i++;}
		if($_POST['11']!=NULL){$arr[$i]="Zipcode";$arr1[$i]=$_POST['11'];$i++;}
		if($_POST['12']!=NULL){$arr[$i]="Special_req";$arr1[$i]=$_POST['12'];$i++;}
		$arr2[0]="reservation_no";$arr3[0]=$_SESSION['reserve'];
		$ne=$db->update_db($arr,$arr1,$arr2,$arr3);
		if(!$ne)
			$_SESSION["res"]=2;

		header("Location: /Testing/Changereservation.php");
	}
	public function only_book()
	{
		$db=new Db();
		$db->settable("Reservation");
		$ne=$db->special_select($_POST['roomtype'],$_POST['checkindate'],$_POST['checkoutdate']);

		if($ne>=400){
			echo "bsf";
			$_SESSION["checkincheck"]=1;
			header("Location: /Testing/Reservation.php");
		}
		else {	

		$_SESSION['checkindate']=$_POST['checkindate'];
		$_SESSION['checkoutdate']=$_POST['checkoutdate'];
		$_SESSION['roomtype']=$_POST['roomtype'];
		$_SESSION['rooms']=$_POST['rooms'];
		$_SESSION['adults']=$_POST['adults'];
		$_SESSION['child']=$_POST['child'];
		//echo $_SESSION['checkindate'];
		unset($_SESSION["signinandbook"]);
		
		header("Location: /Testing/booking.php");
		}

		
	}
	public function signinandbook()
	{
		$_SESSION["signinandbook"]=3;
		
		header("Location: /Testing/booking.php");
	}
	public function advanced_search()
	{

	}
	public function search_cost()
	{
		$db=new Db();
		$db->settable("new_room");
		$a=array();$b=array();
		$a[0]="type_r";
		$b[0]=$_POST['roomtype'];
		$n=$db->select_db($a,$b,1);
		$_SESSION["searcharr"]=$n;
		$db->settable("Servicesandpackage");
		$service=$db->select_db(0,0,1);
		$_SESSION["services"]=$service;
		header("Location: /Testing/searchreservation.php");
	}
	public function seeallreservation()
	{
		$cid=$_SESSION["fetch"][0];
		echo $cid;
		$db=new Db();
		$db->settable("Reservation");
		$arr=array(); $arr1=array();
		$arr[0]="customer_id"; $arr1[0]=$cid;
		
		$ne=$db->select_db($arr,$arr1,1);
		$_SESSION["allreservation"]=$ne;
		header("Location: /Testing/loggedin.php");
		
	}
	public function booking()
	{
//	echo $_SESSION["checkindate"];
		$flag=false;$newflag=true;$str=NULL;
		if($_SESSION["signinandbook"]==3)
		{
			$_SESSION["emailid"]=$_POST["emailid"];
			$_SESSION["passwordone"]=$_POST["passwordone"];
			$flag=true;
		}
		else if($_SESSION["signin"]==2)
			$flag=true;
		$db=new Db();
		if($flag){
		$db->settable("Customer_info");
		$st=$db->checklogin($_SESSION["emailid"],$_SESSION["passwordone"]);
		if(!$st){
			$newflag=false;
			$_SESSION["checkone"]=2;
			header("Location: /Testing/booking.php");
		}
		else
			$str=$_SESSION["fetch"][0];
		}
		if($newflag){
		
			unset($_SESSION["checkone"]);
			$creditcheck=new Creditcheck($_POST['card'],$_POST['card_type']);
			if(!$creditcheck->check_credit()){
				$_SESSION["check_credit"]=1;
				header("Location: /Testing/booking.php");
			}
			else{
					$arr1=array();
					$arr1[0]="reservation_no";$arr1[1]="name";$arr1[2]="customer_id";$arr1[3]="room_type";$arr1[4]="bedtype";
					$arr1[5]="check_in";$arr1[6]="check_out";$arr1[7]="no_of_adult";$arr1[8]="contact_no";$arr1[9]="nid";
					$arr1[10]="card_no";$arr1[11]="address";$arr1[12]="Country";$arr1[13]="Zipcode";$arr1[14]="Special_req";$arr1[15]="no_of_child";
					$arr1[16]="no_of_room";
					$arr=array();
					
					$db->settable("Reservation");
					$arr[0]=rand();
					$arr[1]=$_POST['name'];
					$arr[2]=$str;
					$arr[3]=$_SESSION['roomtype'];
					$arr[4]=$_POST['bedtype'];
					$arr[5]=$_SESSION['checkindate'];
					$arr[6]=$_SESSION['checkoutdate'];
					$arr[7]=$_SESSION['adults'];
					$arr[8]=$_POST['contact'];
					$arr[9]=NULL;
					$arr[10]=$_POST['card'];
					$arr[11]=$_POST['address'];
					$arr[12]=$_POST['country'];
					$arr[13]=$_POST['zip'];
					$arr[14]=$_POST['describe'];
					$arr[15]=$_SESSION['child'];
					$arr[16]=$_SESSION['rooms'];
			
					$check=$db->insert_db($arr1,$arr);
					if($check){
						$_SESSION['reservation_no']=$arr[0];
						header("Location: /Testing/bookingnotification.php");
					}
				}
				

		}

		
	}
}

?>
