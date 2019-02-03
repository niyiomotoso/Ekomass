<?php
include_once 'controller/database_connect.php';

class functionsModel extends ConnectDB{

   public function loadKeys(){
  //$tipster=$_SESSION['vanizon_user']['unique_id'];
  $status_id=0;
$query = "SELECT * FROM serials"; 
  $result = $this->query($query);
    $counter=0;
    $_SESSION['keys']=null;
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['keys'][$counter]=$value;
         
         $counter++;
        }     
}

   public function loadIndexItems(){
  //$tipster=$_SESSION['vanizon_user']['unique_id'];
  $status_id=0;
$query = "SELECT * FROM inventory  ORDER BY ind ASC  LIMIT 0, 12"; 
  $result = $this->query($query);
    $counter=0;
    $_SESSION['base_index_items']=null;
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['base_index_items'][$counter]=$value;
         
         $counter++;
        }     
}

   public function loadCompletedOrders(){
  $vanister=$_SESSION['vanizon_user']['ind'];
  $status_id=0;
$query = "SELECT * FROM orders  WHERE vanister= '$vanister' ORDER BY ind DESC"; 
  $result = $this->query($query);
    $counter=0;
    $_SESSION['completed_orders']=array();
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['completed_orders'][$counter]=$value;
         
         $counter++;
        }     
}
 public function statusDet($val){
 if($val == 1){
   echo "<b class=\"btn-success\">Delivered</b>";
 }elseif($val ==0){
  echo "<b class=\"btn-primary\">Awaiting</b>";
 }elseif($val == 2){
  echo "<b class=\"btn-danger\">Cancelled</b>";
 }
}

public function featuresLoader ($phrase){
$words=explode('|', $phrase);
if(isset($words[1])){
$inner_words=explode(",", $words[1]);
foreach ($inner_words as $value) {
      echo "<a>".$value."</a><br>";
    }  
  }  
}

public function appandsheetLoader ($phrase){
$words=explode(',', $phrase);
foreach ($words as $value) {
      echo "<a href=".$value.">".$value."</a><br>";
    }    
}

   public function loadParticularItem($ind){
  //$tipster=$_SESSION['vanizon_user']['unique_id'];
  $status_id=0;
$query = "SELECT * FROM inventory  WHERE ind = $ind "; 
  $result = $this->query($query);
  return $value = mysqli_fetch_assoc($result);
        
}
  public function loadParticularUser($ind){
  //$tipster=$_SESSION['vanizon_user']['unique_id'];
  $status_id=0;
$query = "SELECT * FROM users  WHERE ind= $ind "; 
  $result = $this->query($query);
  return $value = mysqli_fetch_assoc($result);
        
}
   public function loadRelatedItems($ind, $category){
  //$tipster=$_SESSION['vanizon_user']['unique_id'];
  $status_id=0;
$query = "SELECT * FROM inventory  WHERE (category LIKE '%$category%' and ind !='$ind'  and available= 1) LIMIT 0, 4"; 
  $result = $this->query($query);
  $counter=0;
    $_SESSION['related_items']=null;
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['related_items'][$counter]=$value;
         
         $counter++;
        }   
        
}

   public function loadCatProduct($cat){
   $status_id=0;
   $_SESSION['search_result']=array();
$query = "SELECT * FROM inventory  WHERE category LIKE '%".$cat."%' "; 
  $result = $this->query($query);
 while( $runrows = mysqli_fetch_assoc( $result ) ) {
      array_push($_SESSION['search_result'], $runrows);     
    }    
}
   public function awaitingLoader(){
   $_SESSION['awaiting_orders']=array();
$query = "SELECT * FROM orders  WHERE status = '0'"; 
  $result = $this->query($query);
 while( $runrows = mysqli_fetch_assoc( $result ) ) {
      array_push($_SESSION['awaiting_orders'], $runrows);     
    }    
}

  public function searchCat($cat){
  //$tipster=$_SESSION['vanizon_user']['unique_id'];
  $status_id=0;
$query = "SELECT * FROM inventory  WHERE category LIKE '%".$cat."%' "; 
  $result = $this->query($query);
  return $value = mysqli_num_rows($result);
        
}

public function searchProduct($search){
           $_SESSION['search_result']=array();
          if( strlen( $search ) <= 1 )
                    echo "Search term too short";
             else {
                   
                    $search_exploded = explode ( " ", $search );
                    $x = 0; 
                     $construct = "";
                    foreach( $search_exploded as $search_each ) {
                           $x++;
                          
                           if( $x == 1 )
                                  $construct .="tag LIKE '%".$search_each."%'"." ";
                           else
                                  $construct .=" OR tag LIKE '%".$search_each."%'";
                    }
              
                    $construct = " SELECT * FROM inventory WHERE ".$construct." ";
                    $run = $this->query( $construct );
 
                    $foundnum = mysqli_num_rows($run);
 
                  
                          
                           while( $runrows = mysqli_fetch_assoc( $run ) ) {
                            array_push($_SESSION['search_result'], $runrows);     
                           }
                  
 
             }
       

}
}
?>