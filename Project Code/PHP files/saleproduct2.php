<?php session_start(); ?>
<!-- Starting previous session -->
<?php require 'function.php'; ?>
<!-- including function -->
<?php ob_start();  ?>
<!-- managing output buffer -->

<?php

$db=db_connect();
// checking session validation
if (!isset($_SESSION['pos_admin']) || !isset($_COOKIE['userlog'])) {
    header('Location: index.php');
}
// defining pricing section
$total_price=0;
$total_product=0;
$cash_back=NULL;
$paid=FALSE;

?>
<!DOCTYPE HTML>
<html lang="en-US" ng-app>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="hand watch, hand watch in bangladesh" />
    <meta name="description" content="we are selling the best quality products and we export all over bangladesh.. " />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>POS - A Crony Of Point Of Sale</title>
    <script>
        window.resizeTo(1500,700);
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic" <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!--sweetalert lib-->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.min.css">
    <!--angular-->
    <script src="assets/js/angular.min.js"></script>
    <!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->
    <script src="assets/js/jquery-3.2.0.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>


    <!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->
    <style type="text/css">
        *{
            font-family: monospace;
        }
        .count-input {
            position: relative;
            width: 100%;
            max-width: 165px;

        }

        .totalcash {
            padding: 20px;
            text-align: center;
            background: #b52424;
            font-size: 40px;
            color: white;
            letter-spacing: 3px;
            font-family: monospace;
        }

        .count-input input {
            width: 100%;
            height: 36.92307692px;
            border: 1px solid #000;
            border-radius: 2px;
            background: none;
            text-align: center;
        }

        .count-input input:focus {
            outline: none;
        }

        .count-input .incr-btn {
            display: block;
            position: absolute;
            width: 30px;
            height: 30px;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            line-height: 30px;
            top: 50%;
            right: 0;
            margin-top: -15px;
            text-decoration: none;
            color: #c12e2a;
        }

        .count-input .incr-btn:first-child {
            right: auto;
            left: 0;
            top: 46%;
        }

        .count-input.count-input-sm {
            max-width: 125px;
        }

        .count-input.count-input-sm input {
            height: 36px;
        }

        .count-input.count-input-lg {
            max-width: 200px;
        }

        .count-input.count-input-lg input {
            height: 70px;
            border-radius: 3px;
        }

        .total {
            font-size: 16px;
            font-weight: bold;
        }

        .conbtn {
            margin-bottom: 20px;
            padding: 15px 40px;
            background: #e74c3c;
            margin-top: 20px;
            outline: 0;
            border-color: #e74c3c;
            color: #fff;
        }

        .container1 {
            width: 100%;
        }

        th {
            text-align: center;
        }

        .print-table {
            border: 1px solid #333;
        }

        .container2 {
            width: 400px;
            float: right;
        }

        .calculate-btn {
            padding: 8px 65px;
            background: #34495e;
            outline: 0;
            border-color: #34495e;
            color: #fff;
        }

        .calculate-btn2 {
            padding: 8px 65px;
            background: #853992;
            outline: 0;
            border-color: unset;
            color: #fff;
        }

        .cash-back {
            font-size: 16px;
            margin-top: 10px;
            padding: 15px;
            margin-bottom: 10px;
            color: #ffffff;
            font-weight: 900;
            background: #F44336;
            display: block;
            font-family: monospace;
        }

        .quantity-left-btn-product {
            display: block;
            position: absolute;
            width: 30px;
            height: 30px;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            line-height: 30px;
            top: 50%;

            margin-top: -15px;
            text-decoration: none;
            color: #c12e2a;
        }

        .quantity-btn-product {
            display: block;
            position: absolute;
            width: 30px;
            height: 30px;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            line-height: 30px;
            top: 50%;
            right: 0;
            margin-top: -15px;
            text-decoration: none;
            color: #c12e2a;
        }

        fieldset {
            min-width: 0;
            padding: 0;
            margin: 0;
            border: 0;
        }

        legend {
            font-size: 14px;
            color: #5cb85c;
            font-weight: 900;
        }

        .form-check img {
            /* height: 31px; */
            height: 45px;
        }
    </style>
</head>

<body>
<div class="container container1 text-center">
    <div class="heading">
        <h3 style="color: #333">Your Chosen Products</h3>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Barcode</th>
            <th>#Item</th>
            <th>Catagory</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <!-- php script to create dynamic row -->
        <?php
        if (isset($_SESSION['cart']) ) {
            end($_SESSION['cart']);
            $key=key($_SESSION['cart']);
            if (count($_SESSION['cart'])>0) {
                for ($i=$key; $i>=0 ; $i--) {
                    if (isset($_SESSION['cart'][$i]) && !empty($_SESSION['cart'][$i]) ) {
                        $value=$_SESSION['cart'][$i];
                        ?>
                        <tr>
                            <td>
                                <?php echo $value; ?>
                            </td>
                            <td>
                                <?php
                                $product="SELECT * FROM pos_product WHERE barcode='$value'";
                                $product_sql=mysqli_query($db,$product);
                                $product_record=mysqli_fetch_assoc($product_sql);
                                echo $product_record['name'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $product="SELECT * FROM pos_product NATURAL JOIN pos_category WHERE barcode='$value'";
                                $product_sql=mysqli_query($db,$product);
                                $product_record=mysqli_fetch_assoc($product_sql);
                                echo $product_record['category_title'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $product="SELECT * FROM pos_product NATURAL JOIN pos_brand WHERE barcode='$value'";
                                $product_sql=mysqli_query($db,$product);
                                $product_record=mysqli_fetch_assoc($product_sql);
                                echo $product_record['brand_title'];
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="count-input space-bottom">
                                    <?php
                                    // $q for product quantity
                                    if(isset($_SESSION['quantity'][$i]) && $_SESSION['quantity'][$i] >1){
                                        $q = $_SESSION['quantity'][$i];
                                    }else {
                                        $q = 1;
                                        //error solved
                                        $_SESSION['quantity'][$i] = $q;
                                    }
                                    ?>
                                    <a class="quantity-left-btn-product" href="pm.php?cart=<?php echo $i; ?>&before=<?php echo $q; ?>">–</a>
                                    <input class="quantity" type="text" name="quantity" value="<?php echo $q; ?>" />
                                    <a class="quantity-btn-product" href="pp.php?cart=<?php echo $i; ?>&before=<?php echo $q; ?>">&plus;</a>
                                </div>
                            </td>
                            <td>
                                <?php
                                $product="SELECT * FROM pos_product WHERE barcode='$value'";
                                $product_sql=mysqli_query($db,$product);
                                $product_record=mysqli_fetch_assoc($product_sql);
                                $p_result=$q*$product_record['price'];
                                echo $p_result."BDT";
                                $total_price = $total_price + $p_result;
                                $total_product = $total_product +1;
                                ?>
                            </td>
                            <td><a href="cart_remove2.php?cartcode=<?php echo $i; ?>"><button class="btn btn-sm btn-danger confirmation-callback">Delete</button></a></td>
                        </tr>

                        <?php
                    }
                }
            }
        }
        ?>

        </tbody>
    </table>
    <div class="container container2 text-center">
        <div class="total-price">
            <table class="table">
                <tr>
                    <td>Total Product: <label>
                            <?php echo "$total_product"; $_SESSION['total_price']=$total_price;?></label></td>
                    <td>Total Price: <label>
                            <?php echo "$total_price"; ?></label></td>
                </tr>
                <!-- <tr>
                  <td>VAT: <label>0%</label></td>
                  <td>Net Price:
                    <label></label></td>
                </tr> -->
                <tr>
                </tr>
            </table>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="percent" class="form-control" id="email" placeholder="Discount in Percentage %">
                </div>
                <div class="form-group">
                    <input type="text" name="round" class="form-control" id="email" placeholder="Discount With Round Figure">
                </div>
                <button type="submit" name="discount" class="btn btn-default calculate-btn"> Add Discount</button>
            </form>
            <!-- programm for discoun and round -->

            <?php
            if (isset($_POST['percent']) && isset($_POST['discount']) ){
                $_POST['percent']=floatval($_POST['percent']);
                $_SESSION['discount_percent']=$_POST['percent'];
            }
            if (isset($_POST['discount']) && isset($_POST['round']) ){
                $_POST['round']=floatval($_POST['round']);
                $_SESSION['discount_round']=$_POST['round'];
            }

            if (isset($_SESSION['discount_percent']) && $_SESSION['discount_percent']>0) {
                $_SESSION['final_discount']=($total_price/100)*$_SESSION['discount_percent'];
                $total_price=$total_price-$_SESSION['final_discount'];
                ?>
                <label class="cash-back">Price With
                    <?php echo $_SESSION['discount_percent']."%"; ?> Discount:
                    <?php echo $total_price." BDT" ?></label>
                <?php
                $_SESSION['end_price']=$total_price;
            }
            if (isset($_SESSION['discount_round']) && $_SESSION['discount_round']>0 ) {
                $_SESSION['final_discount_round']=$_SESSION['discount_round'];
                $total_price=$total_price-$_SESSION['final_discount_round'];
                ?>
                <label class="cash-back">Price With
                    <?php echo $_SESSION['discount_round']." BDT"; ?> Discount:
                    <?php echo $total_price." BDT" ?></label>
                <?php
                $_SESSION['end_price']=$total_price;
            }
            $_SESSION['end_price']=$total_price;
            ?>
            <br>
            <!-- <label class="cash-back"></label> -->
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="received" class="form-control" id="email" placeholder="Enter Received Amount From Customer">
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-4 pt-0" style="text-align: left !important;">Payment Method</legend>
                        <div class="col-sm-8" style="text-align: left !important;">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ge" id="gridRadios1" value="0" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    <img src="assets/images/cash.png" alt="" srcset="">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="get" id="gridRadios2" value="1">
                                <label class="form-check-label" for="gridRadios2">
                                    <img src="assets/images/card-icon.png" alt="" srcset="">
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <button type="submit" name="payment" class="btn btn-default calculate-btn2">Add Payment</button>
            </form>
            <?php
            $cash_back=0;
            if (isset($_POST['payment']) && isset($_POST['received']) && ($total_product>0) ) {
                if (!empty($_POST['received']) && $_POST['received'] >= $_SESSION['end_price']) {
                    $_SESSION['cash_received']=$_POST['received'];
                    $cash_back=$_POST['received'] - $_SESSION['end_price'];
                    $_SESSION['cash_back']=$cash_back;


                    $date=onlydate();

                    foreach ($_SESSION['cart'] as $key1 => $value1) {
                        $sql2= "SELECT * FROM pos_product WHERE barcode= '{$value1}' ";
                        $result2 = mysqli_query($db,$sql2);

                        if(mysqli_num_rows($result2) > 0){
                            $record2 = mysqli_fetch_assoc($result2);
                            for ($i=0; $i <1 ; $i++) {
                                $product_id = $record2['p_id'];
                                //entry product one by one order table
                                $quantity = $_SESSION['quantity'][$key1];

                                // minus quantity from main product list table
                                $quantity00 = $record2['quantity']-$quantity;
                                $sql00= "UPDATE pos_product SET quantity={$quantity00} WHERE p_id={$product_id}";
                                $result00 = mysqli_query($db,$sql00);
                                $discount_by_product = $_SESSION['final_discount']/$total_product;
                                $sql3= "INSERT INTO pos_order (p_id,quantity, product_discount, customer_id, date) VALUES ( $product_id,{$quantity}, {$discount_by_product}, {$_SESSION['customer_id']}, '{$date}')";
                                $result3 = mysqli_query($db,$sql3);
                                if (!$result3) {
                                    echo ' maraa';
                                }


                            }
                        }
                    }
                    $sql4="INSERT INTO pos_sale (sale_id,customer_id,total_price,discount_percent,final_discount,net_price,date,discount_round) VALUES
           (NULL,{$_SESSION['customer_id']},{$_SESSION['total_price']},{$_SESSION['discount_percent']},{$_SESSION['final_discount']},{$_SESSION['end_price']},'$date',{$_SESSION['discount_round']})";
                    $result4 = mysqli_query($db,$sql4);
                    $paid=TRUE;
                }
            }


            ?>
            <label class="cash-back">Cash Back: <?php echo $cash_back." BDT"; ?></label>
        </div>
    </div>
</div>
<!-- <h2 class="totalcash">
  .BDT</h1> -->
<div class="container text-center">
    <!-- <button class="btn btn-default conbtn">Print Cash Receipt</button> -->
    <?php if($paid==TRUE){
        ?>
        <a href="receipt.php" class="btn btn-default conbtn">Print Cash Receipt</a>
    <?php } ?>
</div>


<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-number-input.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-confirmation.js"></script>
<script type="text/javascript">
    $('.confirmation-callback').confirmation({
        onConfirm: function() {
            var confirm = 'yes';

            return confirm;
        },
        onCancel: function() {

            var confirm = 'no';
            return confirm;
        }
    });
</script>
<script type="text/javascript">
    var data = JSON.stringify(false);

    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            console.log(this.responseText);
        }
    });

    xhr.open("POST", "https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/create");
    xhr.setRequestHeader("authorization", "Authorization");
    xhr.setRequestHeader("x-app-key", "X-APP-Key");

    xhr.send(data);
</script>

</body>

</html>
