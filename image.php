^Zuw2_o]J}x+
vanizonc_user

ftp.kitchenclinic.com.ng
public_html@vanizon.com
#4TwfTzzs+;q

$dbhost_name = "localhost"; // Your host name 
$database = "vanizonc_dbase";       // Your database name
$username = "vanizonc_user";            // Your login userid 
$password = "^Zuw2_o]J}x+";            // Your password 

mailgun
tipzag2016
 sandboxef0e7a719b60432caef0acd9c80784b1.mailgun.org



 emails
 hello@vanizon.com
 t~#F5(OZ=z.W

<?php
class connectDB
{
  //public static $dbUsername = 'pluscomp_user', $dbPassword = '0;UafM9k=tcG', $dbName = 'pluscomp_papilow' , $dbPortNo = 3306, $dbHost = 'localhost';
    public static $dbUsername = "vanizonc_user", $dbPassword = "^Zuw2_o]J}x+", $dbName = "vanizonc_dbase" , $dbPortNo = 3306, $dbHost = "localhost";
   
    private $link, $statement;
    function __construct()
    {
       $this->link = mysqli_connect( connectDB::$dbHost, connectDB::$dbUsername, connectDB::$dbPassword, connectDB::$dbName)or die("could not connect to the database");
    }
	function setStatement( $stmnt )
	{
		$this->statement = $stmnt;
	}
	function getStatement()
	{
		return $this->statement;
	}
    function query( $statement )
    {
        $this->setStatement( $statement );
        
        try
        {
        $result = mysqli_query( $this->link , $this->getStatement())  or die(mysqli_error($this->link));;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
     
        return $result;
    }
}
?>


