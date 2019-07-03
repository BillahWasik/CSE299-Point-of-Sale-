<?php
  // creating database connection
function db_connect(){
   $connection=mysqli_connect("localhost", "root", "", "pos");
  return $connection;
}
if (!db_connect()) {
    die("Connection failed: " . mysqli_connect_error());
}

function brand_picker($db){
  $brand="SELECT * FROM pos_brand ";
  $brand_sql=mysqli_query($db,$brand);
  return $brand_sql;
}
function vendor_picker($db){
  $vendor="SELECT * FROM pos_vendor ORDER BY vendor_id desc";
  $vendor_sql=mysqli_query($db,$vendor);
  return $vendor_sql;
}

function Category_picker($db){
  $category="SELECT * FROM pos_category";
  $category_sql=mysqli_query($db,$category);
  return $category_sql;
}
function makeBarcode(){
  //$code = chr(rand(65,90)); //upper case
  $code = rand(10000000,99999999); //number
  //$code .= chr(rand(65,90)); //upper case
  return $code;
}
function product_checker($db,$barcode){
 $check="SELECT * FROM pos_product WHERE barcode='{$barcode}' ";
 $check_result=mysqli_query($db,$check);
 return $check_result;
}
function product_picker($db){
 $check="SELECT * FROM pos_product ";
 $check_result=mysqli_query($db,$check);
 return $check_result;
}

function dateinfo()
{
  date_default_timezone_set('Asia/Dhaka');
  return $date= date('m-d-Y h:i:s a') ;
}
function onlydate()
{
  date_default_timezone_set('Asia/Dhaka');
  return $date= date('Y-m-d') ;
}
function brand_name($db,$id)
{
  $query = "SELECT brand_title FROM pos_brand WHERE brand_id={$id}";
  $result = mysqli_query($db, $query);
  $record = mysqli_fetch_assoc($result);
  return $record['brand_title'];
}
function cash($db)
{
            $sql3 = "SELECT * FROM pos_ex ORDER BY id DESC";
              $result3 = mysqli_query($db, $sql3);
              $shop_cash = 0.00;
							if(mysqli_num_rows($result3) > 0){
								while($record3 = mysqli_fetch_assoc($result3)){
                  if($record3['status']==FALSE){
                    //echo "(+) ";
                    $shop_cash = $shop_cash + floatval($record3['amount']);
                  }else{
                    //echo "(-) ";
                    $shop_cash = $shop_cash - floatval($record3['amount']);
                  }

                }
              }

              $sql = "SELECT * FROM pos_sale ORDER BY sale_id DESC";
              $result = mysqli_query($db, $sql);

							if(mysqli_num_rows($result) > 0){
								while($record = mysqli_fetch_assoc($result)){


                    $shop_cash = $shop_cash + floatval($record['net_price']);


                }
              }
              return $shop_cash;

}



 ?>
