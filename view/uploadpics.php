<?php
session_start();
include_once '../controller/database_connect.php';
include_once '../controller/functions.php';
$functionsVariable = new ControllerFunctions();
$dbconn = new  ConnectDB();
$unique_id= $_SESSION['tipzag_user']['unique_id'];

if(($_FILES['pic_one']['name']=="")) 
    {$report= '-1';
	       echo  "no picture selected";
			 die();	 }
else{
$size=$_FILES['pic_one']['size'];
$temp_name=$_FILES['pic_one']['tmp_name'];
if($size<2000000){
 $fileData = pathinfo(basename($_FILES["pic_one"]["name"]));
$fileName = uniqid() . '.' . $fileData['extension'];
$filepath = ('../img/' .$fileName);
while(file_exists($filepath))
{
    $fileName = uniqid() . '.' . $fileData['extension'];
    $filepath = ('../img/'.$fileName);
}
      $result= move_uploaded_file($temp_name,$filepath);
        if(isset($result)){
           $reprt= '1'; 
          $new_filepath= ('img/'.$fileName);         
          $query = "UPDATE users SET picture_path= '$new_filepath' WHERE unique_id= '$unique_id' ";
          $result = $dbconn->query($query);   
           $_SESSION['tipzag_user']['picture_path'] = $new_filepath;  
           header( "Location: ../profile");
                         }
        else{$report= 'upload not successful, try again';
	         $report;
			 die();			 
	         }  }
else {$report= 'file size should be less than 1MB';
      echo  $report;
       die();
     }



   }
?>