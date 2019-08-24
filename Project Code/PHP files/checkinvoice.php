<?php session_start(); ?>  <!-- Starting previous session -->
<?php require 'function.php'; ?>  <!-- including function -->
<?php ob_start();  ?> <!-- managing output buffer -->

<?php

$db=db_connect();
// checking session validation
if (!isset($_SESSION['pos_admin']) || !isset($_COOKIE['userlog'])) {
    header('Location: index.php');
}

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

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic"

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>




    <style type="text/css">
        h2, h4{
            color: #333;
        }
        .total-amount{
            padding: 20px;
            text-align: center;
            background: #b52424;
            font-size: 40px;
            color: white;
        }
        .total{
            color: #8e44ad;
            font-size: 22px;
            text-align: left;

            font-weight: 700;
        }
        .add{
            padding: 9px 50px;
            background: #e74c3c;
            color: #fff;
            border-color: #e74c3c;
            outline: none;
        }
        .add:hover{
            background: #333;
            color: #fff;
            transition: .4s;
            outline: 0;
            border: 1px solid #333;
        }
        .depodit-tnput{
            width: 70%;
        }
        .total-cash{
            margin-top: 30px;
        }
        th{
            text-align: center;
            color: #e35b3b;
        }
        .table{
            border: 1px solid grey;
        }

        input:invalid + span:after {
            position: absolute;
            content: '✖';
            color: #f00;
            padding-left: 5px;
        }

        input:valid + span:after {
            position: absolute;
            content: '✓';
            color: #26b72b;
            padding-left: 5px;
        }
        .cash-table {
            font-weight: bolder;
            font-family: monospace;
        }
        h5, .h5 {
            font-size: 14px;
            color: #333;
            font-weight: bold;
            font-family: monospace;
            text-align: left;
        }
    </style>

</head>
<body>
<div class="main">
    <div class="container text-center" style="padding-top:0%;">
        <h2 style="margin-top: 10px; font-family: fantasy;">Customer Invoice</h2>

        <div class="total-cash">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="total">

                        <?php if(isset($_POST['select_']) && !empty($_POST['invoice'])  && intval($_POST['invoice']) > 0){
                            $invoice=intval($_POST['invoice']);
                            echo "Invoice Number #".$invoice;}
                        else{
                            echo dateinfo();
                        } ?>

                    </h4>

                </div>
                <div class="col-md-6">
                    <form method="post" class="form-inline" style="float: right;">
                        <div class="form-group">

                            <input type="text" id="start" class="form-control" name="invoice" placeholder="Enter An Invoice Number">

                        </div>
                        <button type="submit" class="btn btn-default add" style="font-size: 12px; font-weight: normal; line-height: 0.7; padding: 11px 12px;" name="select_">Check Invoice</button>
                    </form>
                </div>
            </div>

            <div class="cash-table">
                <h4></h4>
                <table class="table table-striped" style="border: 1px solid #ddd;">
                    <thead>
                    <tr>
                        <th>#Item</th>
                        <th>Barcode</th>
                        <th>Sale Price</th>
                        <th>Q</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $credit = 0.0;
                    $debit =0.0;
                    $total_price = 0.0;
                    if(isset($_POST['select_']) && !empty($_POST['invoice']) && intval($_POST['invoice']) > 0){
                    $invoice=intval($_POST['invoice']);
                    $sql = "SELECT * FROM pos_order WHERE customer_id = $invoice";


                    $result = mysqli_query($db, $sql);

                    if(mysqli_num_rows($result) > 0){

                    while($record = mysqli_fetch_assoc($result)){
                    $date = $record['date'];
                    $query = "SELECT * FROM pos_product WHERE p_id={$record['p_id']}";
                    $result2 = mysqli_query($db, $query);
                    $record2 = mysqli_fetch_assoc($result2);

                    ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <h5>Total Price:  BDT</h5>
                    <h5>VAT: 0%</h5>
                    <h5>Total Dicount: BDT</h5>
                </div>
                <div class="col-sm-8">
                    <h5 style="text-align: center; color: #d2079b; font-family: monospace; font-size: 16px;">Cash On Delivery </h5>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                    <h5 style=" padding-bottom: 10px; " class="total-amount">Total: BDT</h5>

                </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>