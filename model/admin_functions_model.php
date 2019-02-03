<?php
include_once 'controller/database_connect.php';
include_once 'controller/generic_functions.php'; 

class functionsModel extends ConnectDB{
public function selectAllProducts(){
  $status_id=0;
$query = "SELECT * FROM inventory  ORDER BY ind ASC  "; 
  $result = $this->query($query);
    $counter=0;
    $_SESSION['all_products']=null;
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['all_products'][$counter]=$value;
         
         $counter++;
        }   
}

public function loadSales(){
  $query = "SELECT * FROM sales  ORDER BY ind ASC  "; 
  $result = $this->query($query);
    $counter=0;
    $_SESSION['all_sales']=null;
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['all_sales'][$counter]=$value;
         
         $counter++;
        }    

 $query = "SELECT * FROM expenditures  ORDER BY ind ASC  "; 
  $result = $this->query($query);
  
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['all_sales'][$counter]=$value;
         
         $counter++;
        }          
print_r($_SESSION['all_sales']);
}

  public function loadRate(){
  $query = "SELECT rate FROM staff WHERE  id= '".$_SESSION['admin_vanizon_user']['id']."' "; 
  $result = $this->query($query);
  $value = mysqli_fetch_assoc($result);
  return $rate=$value['rate']; 
        }  
function loadproduct($item){
$qry="SELECT * FROM inventory WHERE ind='$item' ";
$result=$this->query($qry);
 
return mysqli_fetch_assoc($result);
}

public function selectAdminInactiveBets(){
  $status_id=0;
$query = "SELECT * FROM inactive_bets  WHERE status= 0  ORDER BY ind DESC "; 
  $result = $this->query($query);
    $counter=0;
    $_SESSION['admin_inactive_bets']=null;
   while ($value = mysqli_fetch_assoc($result))
       {
         $_SESSION['admin_inactive_bets'][$counter]=$value;
         
         $counter++;
        }   
}
    
public function namelookup($id){
$query2 = "SELECT username, accuracy FROM users WHERE (unique_id ='".$id."')";
                $result2 = $this->query($query2);
                $object_name = mysqli_fetch_assoc($result2);
                return $object_name;
              }

public function loadAllUsers(){      
          $query1 = "SELECT * FROM users WHERE new = 0 and suspended = 0 ORDER BY ind DESC"; 
          $result = $this->query($query1);
          $_SESSION['admin_all_users']  =array();  
          while($bio_data = mysqli_fetch_assoc($result)){
          if(!empty($bio_data)){
          array_push($_SESSION['admin_all_users'], $bio_data);
              }
          }
              }
 public function loadWallet(){      
          $query1 = "SELECT * FROM wallet WHERE balance != 0 ORDER BY ind DESC"; 
          $result = $this->query($query1);
          $_SESSION['admin_all_wallets']  =array();  
          while($bio_data = mysqli_fetch_assoc($result)){
          if(!empty($bio_data)){
          array_push($_SESSION['admin_all_wallets'], $bio_data);
              }
          }
              }             
 public function loadInactiveUsers(){      
          $query1 = "SELECT * FROM users WHERE new = 0 and suspended = 1 ORDER BY ind DESC"; 
          $result = $this->query($query1);
          $_SESSION['admin_all_users']  =array();  
          while($bio_data = mysqli_fetch_assoc($result)){
          if(!empty($bio_data)){
          array_push($_SESSION['admin_all_users'], $bio_data);
              }
          }
              }              
 public function loadNewUsers(){      
          $query1 = "SELECT * FROM users  WHERE new = 1 ORDER BY ind DESC"; 
          $result = $this->query($query1);
          $_SESSION['admin_new_users']  =array();  
          while($bio_data = mysqli_fetch_assoc($result)){
          if(!empty($bio_data)){
          array_push($_SESSION['admin_new_users'], $bio_data);
              }
          }
              }      

public function doPagination($arr, $step, $url, $current){      
         $arr_count= count($arr);
         $counter=0;
         $page_number=1;
         while ($counter< $arr_count) {
          if($counter== ($current)){
            echo "<a href='".$url."?pg=$counter' style='color: red' > ".$page_number." </a>";
          }else{
          echo "<a href='".$url."?pg=$counter' > ".$page_number." </a>";
        }
           $counter=$counter+ $step;
           $page_number++;
         }
              }   
 public function formatCommas($str){
$arr=explode(",", $str);
foreach ($arr as $x) {
  echo $x."<br>";
  # code...
}
 }

  public function formatPQCommas($str, $qty){
$arr=explode(",", $str);
$arr2=explode(",", $qty);
$counter = 0;
while ($counter < count($arr)){
echo $arr[$counter] * $arr2[$counter]."<br>";
$counter++;
}
 }
  public function formatItemCommas($str){
$arr=explode(",", $str);
foreach ($arr as $x) {
 $qry="SELECT * FROM inventory WHERE ind='$x' ";
$result=$this->query($qry);
 
echo mysqli_fetch_assoc($result)['item']."<br>";
}
 }                                                                 
}
?>