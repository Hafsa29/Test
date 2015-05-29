<?php
include ("/home/purba/Documents/Web/config.php");
class Db{
	private $connect;
	private $queryret;
	private $tablename;
public function settable($table){
	$this->tablename=$table;
	return $this->tablename;
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
$query = sprintf("SELECT * From ".$this->tablename." Where Email = '%s' and Password = '%s'", mysql_real_escape_string($email),mysql_real_escape_string($password));
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
