<?php
class Creditcheck{
	private $num;
	private $type;
	public function __construct($cnum,$ctype)
	{
		$this->num=$cnum;
		$this->type=$ctype;
		//echo "sdfs".$this->num;
	}
	private function check_validity()
	{
		$validFormat = false;  
		if($this->type=="Master"){
			$validFormat = ereg("^5[1-5][0-9]{14}$", $this->num);
		}
		else if($this->type=="Visa"){
			$validFormat = ereg("^4[0-9]{12}([0-9]{3})?$",$this->num);
		}
		else if($this->type=="Ax"){
			$validFormat = ereg("^3[47][0-9]{13}$", $this->num);
		}

		return $validFormat; 
	}
	public function check_credit()
	{
				$valid=$this->check_validity();$pass=false;
					$cardNumber = strrev($this->num);      
			 $numSum = 0;      
			 for($i = 0; $i < strlen($cardNumber); $i++)      
			 {      
					   $currentNum = substr($cardNumber, $i, 1);     
					 if($i % 2 == 1)      
					 {      
					   $currentNum *= 2;      
					 }      
					 if($currentNum > 9)      

					 {      
					   $firstNum = $currentNum % 10;      
					   $secondNum = ($currentNum - $firstNum) / 10;      
					   $currentNum = $firstNum + $secondNum;      
					 }     

					 $numSum += $currentNum;  
			 }    
			 if($numSum%10==0)
			 	$pass=true;
			 else $pass=false;
			 if($valid && $pass)return true;
			 else return false;
	}
}
?>