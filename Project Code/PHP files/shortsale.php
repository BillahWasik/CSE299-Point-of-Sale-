<?php session_start(); ?>
<?php require 'function.php'; ?>
<?php ob_start();  ?>

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


    <!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->
    <style type="text/css">
        h3,h4{
            color: #333;
            margin-top: 20px;
        }
        .datetimepicker{
            padding: 10px 40px;
            border: 1px solid grey;
            border-radius: 5px;
        }
        span{
            font-size: 15px;
            font-weight: bold;
        }
        .submitbtn{
            padding: 12px 100px;
            background: #e74c3c;
            outline: 0;
            color: #fff;
        }
        .submitbtn:hover{
            background: #333;
            color: #fff;
            transition: .4s;
            outline: 0;
            border: 1px solid #333;
        }
        th{
            text-align: center;
        }
        .table{
            border: 1px solid grey;
        }
        #table-scroll {
            height: 230px;
            overflow: auto;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="main text-center">
    <div class="container">
        <h3>Select A Date Range</h3>
    </div>
    <form method="post">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group" style="float:  right;">
                    <p><span>From:</span></p>
                    <input class="datetimepicker" type="date" name="start">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group" style="float:  left;">
                    <p><span>To:</span></p>
                    <input class="datetimepicker" type="date" name="end">
                </div>
            </div>
        </div>


        <button class="btn btn-default submitbtn" type="submit" name="report">Submit</button>
    </form>
</div>
<div class="container text-center">
    <div class="product-table">

        <?php
        if(isset($_POST['report'])){
            if(!empty($_POST['start']) && !empty($_POST['end'])){
                $startDate=$_POST['start'];
                $endDate=$_POST['end'];
                ?>
                <h4>Your <time><?php echo $startDate; ?></time> To <time><?php echo $endDate; ?></time> Sales Report</h4>
                <?php
            }else{
                ?><h4>Your <time>mm/dd/yyyy</time> to <time>mm/dd/yyyy</time> Sale Report</h4><?php
            }
        }else{
            ?><h4>Your <time>mm/dd/yyyy</time> to <time>mm/dd/yyyy</time> Sale Report</h4><?php
        } ?>

        <div id="table-scroll">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#Item</th>
                    <th>Brand</th>
                    <th>Cost</th>
                    <!-- <th>Discount</th> -->
                    <th>Sale Price</th>
                    <th>Quantity</th>
                    <th>Profit</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Total Cost = <?php echo $total_cost." BDT"; ?></th>
                <th>Total Sale = <?php echo $total_sale." BDT"; ?></th>
                <th>Total Quantity = <?php echo $total_quantity.""; ?></th>
                <th>Total Profit = <?php echo $total_profit." BDT"; ?> </th>
            </tr>
            </thead>
        </table>
    </div>
</div>
</body>
</html>