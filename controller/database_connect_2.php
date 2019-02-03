<?php
class connectDB2
{
    static $dbUsername = 'root', $dbPassword = '', $dbName = 'inventory_sample_2' , $dbPortNo = 3306, $dbHost = 'localhost';
  //  public static $dbUsername = "vanizonc_user", $dbPassword = "^Zuw2_o]J}x+", $dbName = "vanizonc_dbase" , $dbPortNo = 3306, $dbHost = "localhost";
   
    private $link, $statement;
    function __construct()
    {
       $this->link = mysqli_connect( connectDB2::$dbHost, connectDB2::$dbUsername, connectDB2::$dbPassword, connectDB2::$dbName)or die("could not connect to the database");
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
	 function last_id()
    {
       
        
        try
        {
        $result = mysqli_insert_id($this->link)  or die(mysqli_error($this->link));;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
     
        return $result;
    }
     function escape($value)
    {
       
        
        try
        {
        $result = mysqli_real_escape_string($this->link, $value)  or die(mysqli_error($this->link));;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
     
        return $result;
    }
}
?>