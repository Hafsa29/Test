<?php
include ("/home/purba/Documents/Web/config.php");
class Frame{
	private $connect;
	function __construct() {
	
	}
	public function connectdb()
	{
		echo "ed";
		$host = host(); 
	$user = "root"; 
	$pass = password(); 
	$db=database();
	$r1 = mysql_connect($host, $user, $pass);

	if (!$r1) {
    echo "Could not connect to server\n";
    trigger_error(mysql_error(), E_USER_ERROR);
	}
	} 
	public function select_database()
	{
		//echo "sdlkkds";
		$r2 = mysql_select_db("hotelDb");

		if (!$r2) {
	    echo "Cannot select database\n";
	    trigger_error(mysql_error(), E_USER_ERROR); 
		} 
	   mysql_query('SET CHARACTER SET utf8');
	        mysql_query('SET SESSIONonnection =’utf8_general_ci');
	}
	public function execute_query($query) {
		//echo "		
		//$this->connectdb();
		//$this->select_database();
    $rr = mysql_query($query);
   	return $rr;
	}
}
?>