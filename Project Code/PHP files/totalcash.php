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

?>
<!DOCTYPE HTML>
<html lang="en-US" ng-app>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>POS - A Crony Of Point Of Sale</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic" <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>






    <style type="text/css">
        h2,
        h4 {
            color: #333;
        }

        .total {
            color: #8e44ad;
            font-size: 22px;
            text-align: left;

            font-weight: 700;
        }

        .add {
            padding: 9px 50px;
            background: #e74c3c;
            color: #fff;
            border-color: #e74c3c;
            outline: none;
        }

        .add:hover {
            background: #333;
            color: #fff;
            transition: .4s;
            outline: 0;
            border: 1px solid #333;
        }

        .depodit-tnput {
            width: 70%;
        }

        .total-cash {
            margin-top: 30px;
        }

        th {
            text-align: center;
            color: #e35b3b;
        }

        .table {
            border: 1px solid grey;
        }

        input:invalid+span:after {
            position: absolute;
            content: '✖';
            color: #f00;
            padding-left: 5px;
        }

        input:valid+span:after {
            position: absolute;
            content: '✓';
            color: #26b72b;
            padding-left: 5px;
        }

        .cash-table {
            font-weight: bolder;
            font-family: monospace;
        }

        h5,
        .h5 {
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
        <h2 style="margin-top: 10px; font-family: fantasy;">Welcome To Account Section</h2>
        <div class="total-cash">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="total">Total Cash:</h4>
                </div>
                <div class="col-md-6">
                    <form method="post" class="form-inline" style="float: right;">
                        <div class="form-group">

                            <input type="month" id="start" class="form-control" name="short_month" min="2017-01" value="2018-11" />

                        </div>
                        <button type="submit" class="btn btn-default add" style="font-size: 12px; font-weight: normal; line-height: 0.7; padding: 11px 12px;" name="select_">SELECT</button>
                    </form>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <h5>Net Product Sales Cash: </h5>
                </div>
                <div class="col-sm-4">
                    <h5 style="text-align: right; color: #d2079b; font-family: cursive;">Cash On Delivery: </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h5>Management Cash Report: </h5>
                    <hr>
                    <h5 style="/* padding-bottom: 10px; */">Total: </h5>
                    <h5>Total Discount For Sale: </h5>
                </div>
            </div>

        </div>
        <div class="with-depo">
            <table class="table" style="border: 1px solid #ddd;">
                <tr>
                    <td>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="WHY?" name="reason_">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="Deposit (+) BDT" name="amount_">
                            </div>
                            <button type="submit" class="btn btn-default add" name="credit"><i class="fa fa-plus"></i> Deposit</button>
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="WHY?" name="reason_">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="Withdraw (-) BDT" name="amount_">
                            </div>
                            <button type="submit" class="btn btn-default add" name="debit"><i class="fa fa-minus"></i> Withdraw</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="cash-table">
            <h4>Management Report</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#Cause</th>
                    <th>Date</th>
                    <th>Credit/Debit(+/-)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>RETURNED_ITEM # </td>
                    <td>[DATE]</td>
                    <td>Amount</td>
                </tr>


                <tr style="
							background-color: #d2cffb;
							font-weight: 600;
							color: #1b4367;">
                    <td>Total</td>
                    <td>Credit: (+) </td>
                    <td>Debit: (-) </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>
