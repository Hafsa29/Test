<?php
include("/Testing/Dbframe.php");
include ("/home/purba/Documents/Web/config.php");
class Db{
	private $connect;
	private $queryret;
	private $tablename;
public function settable($table){
	$this->tablename=$table;
	return $this->tablename;
}
public function update_db($arr1,$arr2,$arr3,$arr4)
{
    $this->create_connection();
    $string="UPDATE ".$this->tablename." SET ";
    for($i=0;$i<sizeof($arr1);$i++)
        {
            $string=$string.$arr1[$i]."="."'".$arr2[$i]."'"." ,";
        }
    $string=substr_replace($string ,"",-1);
    $string=$string." WHERE ";
    for($i=0;$i<sizeof($arr3);$i++)
    {
         $string=$string.$arr3[$i]." = "."'".$arr4[$i]."' "."and ";
    }
    $string=substr_replace($string ,"",-5);
    //echo $string;
    $ne=$this->execute_query($string);
    if(!$ne)
        return false;
    else return true;

}
public function special_select($type,$checkin,$checkout)
{
    $this->create_connection();
    $query = "SELECT SUM( no_of_room ) AS value_sum From ".$this->tablename." Where room_type = '$type' and check_in >= '$checkin' and check_out<= '$checkout'";
  //  echo $query;
    $ne=$this->execute_query($query);$no=0;
    if(!$ne)
        return false;
    else
    {
        $row = mysql_fetch_assoc($ne); 
        $sum = $row['value_sum'];
        return $sum;
    }
}
public function select_db($arr1,$arr2,$a)
{
    $this->create_connection();
    $string="SELECT * From ".$this->tablename."";
    if($a==1)
    {
        $i=0;
        $string=$string." Where ";
        foreach ($arr1 as $k ) {
            $string=$string.$k." = "."'".$arr2[$i]."' "."and ";
            $i++;
        }
    $string=substr_replace($string ,"",-5);
    }
     //echo $string;
   $ne=$this->execute_query($string);
  if(!$ne)
        return false;
    else 
    {
        
        $fetched=array();$i=0;
        while ($row = mysql_fetch_assoc($ne)) {
            $fetched[] = $row;
        }
        return $fetched;
    }

}
public function insert_db($arr1,$arr2)
{
                $this->create_connection();
             $string="insert into ".$this->tablename."(";
             foreach($arr1 as $u)
             {
                $string=$string.$u.",";
             }
             $string=substr_replace($string ,"",-1);
             $string=$string.") values (";
             foreach ($arr2 as $v) {
                if($v==NULL)
                    $string=$string."NULL".",";
                else
                $string=$string."'".$v."'".",";
             }
             $string=substr_replace($string ,"",-1);
             $string=$string.")";
            $ne=$this->execute_query($string);
            if(!$ne)return false;
            else return true;

 }   
private function create_connection()
{
	$host = host(); 
$user = "root"; 
$pass = password(); 
$db=database();
$this->r = mysql_connect($host, $user, $pass);

if (!$this->r) {
    echo "Could not connect to server\n";
    trigger_error(mysql_error(), E_USER_ERROR);
} 

$r2 = mysql_select_db($db);

if (!$r2) {
    echo "Cannot select database\n";
    trigger_error(mysql_error(), E_USER_ERROR); 
} 
   mysql_query('SET CHARACTER SET utf8');
        mysql_query('SET SESSION collation_connection =’utf8_general_ci');
}
private function execute_query($query) {
    $no=0;
    $rr = mysql_query($query);
   return $rr;
}

public function checklogin($email,$password)
{
            	   $this->create_connection();
            $name = $email;
            $query = "SELECT * From ".$this->tablename." Where Email = '$email' and Password = '$password'";
            $ne=$this->execute_query($query);$no=0;

             while ($row = mysql_fetch_array($ne)) {
                    $no++;    
                    $_SESSION['fetch']=$row;
                 //   print_r($_SESSION['fetch'][0]);
                   // echo $no;
                    
            }
            if($no==1){
            //	mysql_close();
                return true;
            }
            else
                return false;
            ;
//echo $no_of_rows;
}

}
?>
