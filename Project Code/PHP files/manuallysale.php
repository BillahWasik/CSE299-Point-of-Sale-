<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>POS - A Crony Of Point Of Sale</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/tools.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />

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
    <h1><b>New Sale List<b></h1><br>
    <form class="" action="" method="post">
        <h4>* Please scan product by Barcode Scanner</h4>
        <input class="email" id="focus" type="text" Placeholder="UPC / Barcode" name="barcode_" autocomplete="off" autofocus />
        <button type="submit" name="scan_product" class="submit">Submit</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>Barcode</th>
            <th>#Item</th>
            <th><a href="#"></a></th>
        </tr>
        </thead>
        </table>
</body>

</html>