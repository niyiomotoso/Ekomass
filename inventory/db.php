<?php
 function query( $statement )
    {
        $dbUsername = 'root';
       $dbPassword = '';
      $dbName = 'inventory_sample' ;
    $dbPortNo = 3306;
    $dbHost = 'localhost';

 $link = mysqli_connect( $dbHost, $dbUsername, $dbPassword, $dbName)or die("could not connect to the database");
        $result = mysqli_query($link , $statement)  or die(mysqli_error($link));
        
        return $result;
    }

function loadproduct($item){
$qry="SELECT * FROM inventory WHERE ind='$item' ";
$result=query($qry);
 
return mysqli_fetch_assoc($result);
}
?>
								

								