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
<!DOCTYPE HTML>
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
            height: 310px;
            overflow: auto;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container text-center">
    <div class="product-table">

        <h4>Today's Sales Report</h4>
        <h4>Date:<b><?php echo $today=onlydate(); ?></b></h4>
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

<div class="main text-center">
    <div class="container">
        <h3 style='color: #333'>POS - A Crony of Point Of Sale</h3>
        <h4 style='color: #333'>Call: +88 01631706287/h4>
        <h5 style='color: #078830; font-weight: 700;' title=''>Developed by WASIK</h5>
    </div>
</div>



<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js" ></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" ></script>
</script>
</body>
</html>
