<?php session_start(); ?>  <!-- Startong previous session -->
<?php ob_start();  ?>
<?php require 'function.php'; ?>  <!-- including function -->
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

	<script>
		window.resizeTo(936,1024);
  </script>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="all" />
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

	<link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>


	<!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->

	<style type="text/css">
		body {
			margin: 0;
			background-color: #286090;
			background-repeat: no-repeat;
			background-attachment: fixed;
			font-family: Ubuntu;
		}

		.email {
			padding: 8px;
			border-bottom: 2x solid black;
			background-color: transparent;
			margin-top: 50px;
			margin-bottom: 5px;
			width: 100%;
			border: none;
			border-bottom: 2px solid #bdc3c7;
			margin-bottom: 10px;
			text-align: center;
			font-size: 16px;
			color: grey;
			outline: 0;

		}

		.submit {
			margin-top: 20px;
			padding: 12px 18px;
			border-radius: 20px;
			background-color: #e74c3c;
			color: #ffffff;
			width: 100%;
			border: none;
			text-align: center;
			font-size: 16px;
			outline: 0;
		}

		.submit:hover {
			transition: .3s;
			background-color: #2c3e50;
			box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}


		#scanpdt {
			background: #ecf0f1;
			width: 500px;
			border-radius: 10px;
		}

		select {
			padding: 8px 75px;
			margin-bottom: 10px;
			background: #ecf0f1;
			border-radius: 20px;
			outline: 0;
		}

		#selectId {
			padding: 8px 85px;
			margin-bottom: 10px;
			background: #ecf0f1;
			border-radius: 20px;
			outline: 0;
		}

		#productinfo {
			padding: 30px;
		}

		.addproduct {
			margin-top: 20px;
			padding: 12px 50px;
			font-family: monospace;
		}
	</style>
</head>

<body>
	<div class="main">
		<div class="container" style="padding-top:3%;">
			<div class="row">
				<h1 style="text-align:center;color:#FFFFFF; font-family: monospace; font-size: 1.6em;"><b>Add New Product With BarCode<b></h1>
			</div>
		</div>
		<div id="scanpdt" class="container text-center" style="margin-top:1%">
			<div id="productinfo" class="row">
				<!--- Form Start -->

				<form class="" action="" method="post">

					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Name</label>
						<div class="input-group">
							<div class="input-group-addon">Name</div>
							<input type="text" name="name_" class="form-control" id="exampleInputAmount" placeholder="Product Name">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Barcode</label>
						<div class="input-group">
							<?php
							$barcode=makeBarcode();
							 ?>

							<div class="input-group-addon">|||| ||</div>
							<input type="text" name="barcode_" onmouseover="this.focus();" class="form-control" id="exampleInputAmount" placeholder="<?php echo $barcode; ?>" value="<?php echo $barcode; ?>" disabled>



						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Cost Price</label>
						<div class="input-group">
							<div class="input-group-addon">BDT</div>
							<input type="text" name="cost_price_" class="form-control" id="exampleInputAmount" placeholder="Cost Price">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Sale Price</label>
						<div class="input-group">
							<div class="input-group-addon">BDT</div>
							<input type="text" name="sale_price_" class="form-control" id="exampleInputAmount" placeholder="Sale Price">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Quantity</label>
						<div class="input-group">
							<div class="input-group-addon">Quantity</div>
							<input type="text" name="quantity_" class="form-control" id="exampleInputAmount" placeholder="Quantity">
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Category</label>
						<div class="input-group">
							<div class="selectOpt">
								<select name="category_">
									<option value="">Select Category</option>
									 <!-- picking and printing category item -->
									<?php
									 $category=Category_picker($db);
									 if (mysqli_num_rows($category)>0) {
									 	while ($category_result=mysqli_fetch_assoc($category)) {
											?>
									 		<option value="<?php echo $category_result['category_id']; ?>"><?php echo $category_result['category_title']; ?></option>
											<?php
									 	}
									 }
									 ?>
							</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="sr-only" for="exampleInputAmount">Brand</label>
						<div class="input-group">
							<div class="selectOpt">
								<select name="brand_" id="selectId">
									<option value="">Select Brand</option>
									<?php
										$brand_sql="SELECT * FROM pos_brand ORDER BY brand_title ASC";
										$brand=mysqli_query($db,$brand_sql);
										if (mysqli_num_rows($brand)>0) {
											while ($record_brand=mysqli_fetch_assoc($brand)) {
												?>
												<option value="<?php echo $record_brand['brand_id']; ?>"><?php echo $record_brand['brand_title']; ?></option>
												<?php
											}
										}
										?>
								</select>
							</div>
						</div>
					</div>
					<textarea name="comment_" class="form-control" rows="3" placeholder="Comment (Optional)"></textarea>

					<button type="submit" name="add_product2" class="btn btn-primary addproduct">Save BarCode</button>

				</form>
			<?php

			if (isset($_POST['add_product2'])) {
        $name=$_POST['name_'];
        $cost=floatval($_POST['cost_price_']);
        $sale=floatval($_POST['sale_price_']);
        $quantity=intval($_POST['quantity_']);
        $category_pick=$_POST['category_'];
        $brand_pick=$_POST['brand_'];
        $comment=$_POST['comment_'];
        $date=dateinfo();
				if (!is_float($cost) || empty($_POST['cost_price_'])) {
					?> <script> swal("Opss..","Invalid Cost Price!","error") </script> <?php
				}
				elseif (!is_float($sale) || empty($_POST['sale_price_'])) {
					?> <script> swal("Opss..","Invalid sale Price!","error") </script> <?php
				}
				elseif (!is_int($quantity) || $quantity==0 || empty($_POST['quantity_'])) {
					?> <script> swal("Opss..","Invalid Cost Price!","error") </script> <?php
				}
				elseif(empty($_POST['name_']) ||  empty($barcode)  || $_POST['category_']==NULL  || $_POST['brand_']==NULL )
					{
						 $error = "Invalid Information!";
						 ?> <script>swal("Opss...","<?php echo $error; ?>", "error");</script> <?php
					}
					else {

						$add_product="INSERT INTO pos_product (p_id,name,barcode,cost,price,in_quantity,quantity,category_id,brand_id,comment,created_date) VALUES (NULL,'$name','$barcode',$cost,$sale,$quantity,$quantity,$category_pick,$brand_pick,'$comment','$date')";
						$product_result=mysqli_query($db,$add_product);
					if ($product_result) {
            $_SESSION['makeBarcode'] = $barcode;
						 ?> <script>swal("Opss...","Product added successfully", "success");</script> <?php

             header("Location: generateproduct.php?code=".$_SESSION['makeBarcode']);
					}
					}


			}

			 ?>

				<!-- Form End -->


			</div>
		</div>
</body>
</html>
