		 <?php include('header.php') ?> <!-- including header html part -->
		 <?php session_start(); ?>  <!-- Startong previous session -->
		 <?php require 'function.php'; ?>  <!-- including function -->
		 <?php
		 		$db=db_connect();
				// checking session validation
				if (!isset($_SESSION['pos_admin']) || !isset($_COOKIE['userlog'])) {
					header('Location: index.php');
				}

			?>

			<!--  ___________________Body Panel of dashboard__________________________ -->
			<body>
				<div class="main">
					<div class="container">
						<div class="row">
							<div class="header">
								<div class="header-left col-xm-6  col-sm-6  col-md-6">
									<p>
										<button type="button" class="btn btn-primary btn-lg"><i style="padding-right:6px" class="fas fa-tachometer-alt" aria-hidden="true"></i>Dashboard</button>
										<button type="button" class="btn btn-primary btn-lg" onclick="popupCenter('checkprice.php', 'myPop1',936,500);" href="javascript:void(0);"><i style="padding-right:4px" class="fa fa-search" aria-hidden="true"></i> Check</button>
										<button type="button" class="btn btn-primary btn-lg" onclick="popupCenter('saleproduct.php', 'myPop1',1100,500);" href="javascript:void(0);"><i style="padding-right:7px" class="fa fa-paper-plane" aria-hidden="true"></i>New Sale</button>
									</p>
								</div>
								<div class="header-right col-xm-6  col-sm-6  col-md-6">
									<p>
										<!-- <button type="button" class="btn btn-primary btn-lg"><span style="padding-right:4px" class="glyphicon glyphicon-user"></span></i> Welcome Admin</button> -->
										<button type="button" class="btn btn-primary btn-lg"><span style="padding-right:4px" class="glyphicon glyphicon-user"></span></i> <?php echo $_SESSION['pos_admin_name'];  ?></button>
										<button type="button" class="btn btn-primary btn-lg" onclick="popupCenter('shortsale.php', 'myPop1',1100,600);" href="javascript:void(0);"><i style="padding-right:4px" class="fa fa-database" aria-hidden="true"></i> Sales Report</button>
										<?php
											$role=$_SESSION['pos_root'];
											if ($role==true) {
											?>
											<button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='register.php'" href="javascript:void(0);"><i style="padding-right:4px" class="fas fa-user-edit"></i> Register</button>

											<?php
											}
										 ?>

										<button type="button" class="btn btn-primary btn-lg" onClick="parent.location='logout.php'"><i style="padding-right:4px" class="fas fa-sign-out-alt" aria-hidden="true"></i> Sign Out</button>
									</p>
								</div>
							</div>
						</div>
					</div>

		<div class="container" style="padding-top:3%;">
			<div class="row">
				<h1 style="text-align:center;color:#FFFFFF "><b>Welcome to POS<b></h1>
			</div>
		</div>
		<div class="container" style="margin-top:6%">
			<div class="row">
				<div class="col-md-4 col-xm-4  col-sm-4">
					<div class="panel">
						<div class="panel-heading">
							<h4 align="center"><i class="fa fa-cog" style="padding-right:6px;" aria-hidden="true"></i>Entry</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('Category.php', 'myPop1',936,500);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fas fa-plus-square" aria-hidden=" true"> </i>
										<br> Category
									</a>
								</div>
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('brand.php', 'myPop1',936,500);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-bold " aria-hidden="true"> </i>
										<br> Brand
									</a>
								</div>
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('entry.php', 'myPop1',936,370);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-cart-plus " aria-hidden="true"> </i>
										<br> Add Product
									</a>
								</div>
							</div>
							<!--<hr> -->
							<div class="row">
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('vendor.php', 'myPop1',936,500);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-user fa-5x" aria-hidden="true"> </i>
										<br> Add New Supplier
									</a>
								</div>
								<?php
									if ($role==true) {
										?>
										<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
											<a onclick="popupCenter('updateproduct.php', 'myPop1',936,500);" href="javascript:void(0);">
												<i style="color:#ffffff;text-decoration:none" class="fas fa-sync-alt fa-5x" aria-hidden="true"> </i>
												<br> Update Product
											</a>
										</div>
										<?php
									}
								 ?>

								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('generateproduct.php', 'myPop1',936,370);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-barcode fa-5x" aria-hidden="true"> </i>
										<br> Add BarCode & Product
									</a>

								</div>
							</div>
						</div>
						<div class="panel-footer"> </div>
					</div>
				</div>
				<div class="col-md-4 col-xm-4  col-sm-4">
					<div class="panel">
						<div class="panel-heading">
							<h4 align="center"><i class="fa fa-cog" style="padding-right:6px;" aria-hidden="true"></i>Sale</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('saleproduct.php', 'myPop1',1100,500);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none;" class="fa fa-shopping-bag fa-5-1x" aria-hidden="true"> </i>
										<br> New Sale
									</a>
								</div>
								<div class="col-md-4  col-xm-4  col-sm-4 option " align="center">
									<a onclick="popupCenter('return.php', 'myPop1',936,500);" href="javascript:void(0);"><i style="color:#ffffff;text-decoration:none" class="fa fa-history fa-5x" aria-hidden="true"> </i>
										<br> Return
									</a>
								</div>
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('checkprice.php', 'myPop1',936,500);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fas fa-check-square fa-5x" aria-hidden="true"> </i>
										<br> Check Price
									</a>
								</div>
							</div>
							<!--<hr> -->
							<div class="row">
								<?php
									if ($role==true) {
										?>
										<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
											<a onclick="popupCenter('totalcash.php', 'myPop1',1220,601);" href="javascript:void(0);">
												<i style="color:#ffffff;text-decoration:none" class="fas fa-money-bill-alt fa-5x" aria-hidden="true"> </i>
												<br> Account Section
											</a>
										</div>
										<?php
									}
								 ?>

								<!-- Manual -->
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('manuallysale.php', 'myPop1',1100,500);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-bug fa-5x" aria-hidden="true"> </i>
										<br> Manually New Sale
									</a>
								</div>
								<!-- Manual -->
							</div>
						</div>
						<div class="panel-footer"> </div>
					</div>
				</div>
				<div class="col-md-4 col-xm-4  col-sm-4">
					<div class="panel">
						<div class="panel-heading">
							<h4 align="center"><i class="fa fa-cog" style="padding-right:6px;" aria-hidden="true"></i>Report</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('stock.php', 'myPop1',1100,600);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fab fa-stack-exchange fa-5x" aria-hidden="true"> </i>
										<br> Stock Status
									</a>
								</div>
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('dailysale.php', 'myPop1',1100,600);" href="javascript:void(0);"> <i style="color:#ffffff;text-decoration:none" class="fab fa-weibo fa-5x" aria-hidden="true"> </i>
										<br> Today Sale
									</a>
								</div>
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('weeklysale.php', 'myPop1',1100,600);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-print fa-5x" aria-hidden="true"> </i>
										<br> Weekly Sale
									</a>
								</div>
							</div>
							<!--<hr> -->
							<div class="row">
								<?php
									if ($role==true) {
										?>
										<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
											<a onclick="popupCenter('shortsale.php', 'myPop1',1100,600);" href="javascript:void(0);">
												<i style="color:#ffffff;text-decoration:none" class="fa fa-cloud fa-5x" aria-hidden="true"> </i>
												<br> Short Sale Report
											</a>
										</div>

										<?php
									}
								 ?>


								<!-- Customer Invoice -->
								<div class="col-md-4 col-xm-4  col-sm-4 option" align="center">
									<a onclick="popupCenter('checkInvoice.php', 'myPop1',1220,601);" href="javascript:void(0);">
										<i style="color:#ffffff;text-decoration:none" class="fa fa-eye fa-5x" aria-hidden="true"> </i>
										<br> Customer Invoice
									</a>
								</div>
								<!-- Customer Invoice -->

							</div>
						</div>


						<?php include('footer.php') ?>
