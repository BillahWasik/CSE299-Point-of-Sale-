<?php session_start(); ?>  <!-- Startong previous session -->
<?php require 'function.php'; ?>  <!-- including function -->
<?php ob_start();  ?> <!-- managing output buffer -->

<?php

$db=db_connect();
// checking session validation
if (!isset($_SESSION['pos_admin']) || !isset($_COOKIE['userlog'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>

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

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/tools.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic" <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!--sweetalert lib-->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.min.css">
    <!--angular-->
    <script src="assets/js/angular.min.js"></script>
    <!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->
    <script src="assets/js/jquery-3.2.0.min.js"></script>

    <script src="assets/js/jquery-3.2.0.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body {
            margin: 0;
            background-color: #286090;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Ubuntu;
        }

        .left-table {
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            border-radius: 4px;
            background-color: #ecf0f1;
            height: 300px;
            background-attachment: fixed;
        }

        .right-table {
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            border-radius: 4px;
            background-color: #ecf0f1;
        }

        .popover {
            width: 39%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1060;
            display: none;
            max-width: 276px;
            padding: 1px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            word-wrap: normal;
            white-space: normal;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 6px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            line-break: auto;
        }

        .email {
            padding: 8px;
            border-bottom: 2x solid black;
            background-color: transparent;
            margin-bottom: 5px;
            width: 100%;
            border: none;
            border-bottom: 2px solid #bdc3c7;
            margin-bottom: 10px;
            text-align: center;
            font-size: 16px;
            color: grey;
            outline: 0;
            margin-top: 40px;

        }

        .submit {
            padding: 12px 18px;
            border-radius: 20px;
            background-color: #e74c3c;
            color: #ffffff;
            width: 100%;
            border: none;
            text-align: center;
            font-size: 16px;
            outline: 0;
            margin-top: 20px;
        }

        .submit:hover {
            transition: .3s;
            background-color: #2c3e50;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .conbtn {
            margin-bottom: 20px;
            padding: 15px 40px;
            background: #e74c3c;
            margin-top: 20px;
            outline: 0;
            border-color: #e74c3c;
        }
    </style>
</head>

<body>
<div class="main">
    <div class="container">
        <div class="row">
            <h1 style="text-align:center;color:#FFFFFF "><b>New Sale List<b></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xm-5  col-sm-5 left-table">
                <form class="" action="" method="post">
                    <h4 style="color: #e74c3c; margin-top: 25px;" class="text-center">* Please scan product by Barcode Scanner</h4>
                    <input class="email" id="focus" type="text" Placeholder="UPC / Barcode" name="barcode_" autocomplete="off" autofocus />
                    <button type="submit" name="scan_product" class="submit">Submit</button>
                </form>
                <?php
                if (isset($_POST['scan_product'])) {
                    if (!empty($_POST['barcode_'])) {
                        if (isset($_SESSION['cart'])) {
                            $cart=$_SESSION['cart'];
                        }
                        $cart[]=$_POST['barcode_'];
                        $_SESSION['cart']=$cart;
                    }
                    else {
                        $error="Barcode Cannot Be Blank!" ?>
                        <script>swal("error","<?php echo $error; ?>", "error");</script> <?php
                    }
                }

                ?>

            </div>

            <div class="col-md-offset-2 col-xm-1  col-sm-1 spaces">
                <div class="col-md-5 col-xm-5  col-sm-5 right-table ">
                    <div id="table-scroll" style="margin-top: 5px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>#Item</th>
                                <th><a href="cart_remove_all.php?cartcode=all" class="confirmation-callback"><i class="far fa-trash-alt" style="color: #d9534f;" aria-hidden="true"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                            end($_SESSION['cart']);
                            $key=key($_SESSION['cart']);
                            if (count($_SESSION['cart'])>0) {
                            for ($i=$key; $i >=0 ; $i--) {
                            if (isset($_SESSION['cart'][$i]) && !empty($_SESSION['cart'][$i]) ) {
                            $value=$_SESSION['cart'][$i];
                            ?>
                            <?php
                            $sql="select * from pos_product";
                            $sql1=mysqli_query($db,$sql);
                            $sql2=mysqli_fetch_assoc($sql1);
                            if (mysqli_num_rows($sql1)>0) {
                            while ($sql2=mysqli_fetch_assoc($sql1)) {

                            if ($value==$sql2['barcode']) {
                            ?>

                            <tr>
                                <td><?php echo $value ?></td>
                                <td>
                                    <?php
                                    $product="SELECT * FROM pos_product WHERE barcode='$value'";
                                    $product_sql=mysqli_query($db,$product);
                                    $product_record=mysqli_fetch_assoc($product_sql);
                                    echo $product_record['name'];
                                    ?>

                                </td>
                                <td>
                                    <a href="cart_remove.php?cartcode=<?php echo $i; ?>" class="confirmation-callback"><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                                <?php
                            }
                            }
                            }
                            }
                            }
                            }
                            }

                            ?>




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container text-center">
        <div class="continue">
            <form class="" action="" method="post">
                <button type="submit" name="check" class="btn btn-success conbtn">Continue</button>
            </form>

        </div>
        <?php
        if (isset($_POST['check'])) {


            $date=dateinfo();
            $verify=rand(100,999);
            $sale="INSERT INTO pos_customer VALUES(NULL,'$date',$verify)";
            $sale_sql=mysqli_query($db,$sale);
            //this portion for retriving customer id session to saleproduct2 page
            $customer="SELECT * FROM pos_customer WHERE verify=$verify";
            $customer_query=mysqli_query($db,$customer);
            if (mysqli_num_rows($customer_query)>0) {
                $customer_result=mysqli_fetch_assoc($customer_query);
                $_SESSION['customer_id']=$customer_result['customer_id'];
                $_SESSION['discount_percent']=0;
                $_SESSION['discount_round']=0;
                $_SESSION['final_discount']=0;
                header('Location: saleproduct2.php');
            }
        }

        ?>





        <script src="assets/js/jquery-1.11.3.min" ></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" ></script>
        <script src="assets/js/bootstrap-confirmation.js" ></script>
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
</body>
</html>
