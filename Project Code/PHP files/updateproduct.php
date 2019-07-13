<?php session_start(); ?>
<!-- Startong previous session -->
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


  <!--sweetalert lib-->
  <script src="assets/js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="assets/css/sweetalert.min.css">
  <!--angular-->
  <script src="assets/js/angular.min.js"></script>
  <!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->
  <script src="assets/js/jquery-3.2.0.min.js"></script>
  <script>
    var txt = "";
	function selectBarcode() {
		if (txt != $("#focus").val()) {
			setTimeout('use_rfid()', 1000);
			txt = $("#focus").val();
		}
		$("#focus").select();
		setTimeout('selectBarcode()', 1000);
	}

	$(document).ready(function () {
		setTimeout(selectBarcode(),1000);
	});
	</script>

  <!-- [if lt ie 9]> <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif] -->
  <style type="text/css">
    .selectpicker {
      padding: 10px 20px;
      border-radius: 5px;
    }

    .search-input {
      padding: 19px 13px;
    }

    .searchbtn {
      padding: 9px 50px;
      background: #e74c3c;
      color: #fff;
      border-color: #e74c3c;
      outline: none;
    }

    .delete-heading h2 {
      color: #333;
      margin-top: 20px;
      margin-bottom: 30px;
    }

    .list-heading h4 {
      color: #333;
      margin-top: 20px;
    }

    th {
      text-align: center;
    }

    .table {
      border: 1px solid grey;
    }
  </style>

  <style>
    #table-scroll {
    height: 230px;
    /* overflow: auto; */
    margin-top: 40px;
}
/* tbody {
    height: 120px;
    overflow-y: auto;
} */

.fixed_headers {
  width: 750px;
  table-layout: fixed;
  border-collapse: collapse;
      border: 1px solid #a5a0a0;
}
.fixed_headers th {
  text-decoration: underline;
}
.fixed_headers th,
.fixed_headers td {
  padding: 5px;
  text-align: left;
}
.fixed_headers td:nth-child(1),
.fixed_headers th:nth-child(1) {
  min-width: 200px;
}
.fixed_headers td:nth-child(2),
.fixed_headers th:nth-child(2) {
  min-width: 200px;
}
.fixed_headers td:nth-child(3),
.fixed_headers th:nth-child(3) {
  width: 350px;
}
.fixed_headers td:nth-child(4),
.fixed_headers th:nth-child(4) {
  width: 350px;
}
.fixed_headers thead {
  background-color: #f55959;
  color: #FDFDFD;
}
.fixed_headers thead tr {
  display: block;
  position: relative;
}
.fixed_headers tbody {
  display: block;
  overflow: auto;
  width: 100%;
  height: 300px;
}
.fixed_headers tbody tr:nth-child(even) {
  background-color: #DDD;
}


</style>
</head>

<body>
  <div class="container text-center">
    <div class="delete-heading">
      <h2>Update Product</h2>
    </div>
    <div class="search">
      <form action="" method="POST">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <div class="btn-group" role="group">
            <input type="text" class="form-control search-input" id="focus" aria-describedby="emailHelp" placeholder="Search With Barcode" name="barcode_">
          </div>
          <div class="btn-group" role="group">
            <button class="btn btn-default searchbtn" name="entry">Search</button>
          </div>
        </div>
      </form>
      <?php
        if (isset($_POST['entry']) ) {
          if (!empty($_POST['barcode_'])) {
            if (mysqli_num_rows(product_checker($db,$_POST['barcode_']) ) >0 ) {
              header('Location: updateproduct2.php?entry=true&barcode_='.$_POST['barcode_']);
            }
            else {
              ?>
              <script> swal("Ops..","This Product is not registerd","error")</script>
              <?php
            }
          }
          else {
            ?>
            <script> swal("Ops..","Product barcode cannot be blank","error")</script>
            <?php
          }

        }

       ?>

    </div>
    <div class="product-list">
      <div class="list-heading">
        <h4>Your Available Products</h4>
      </div>
      <div class="product-table">
        <div id="table-scroll">

          <table class="fixed_headers">
            <thead>
              <tr>
                <th>SN</th>
                <th>Barcode</th>
                <th>#Item</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $product=product_picker($db);
                if (mysqli_num_rows($product)>0) {
                  while ($record=mysqli_fetch_assoc($product)) {
                    ?>
                    <tr>
                      <td><?php echo $record['p_id']; ?></td>
                      <td><?php echo $record['barcode']; ?></td>
                      <td><?php echo $record['name']; ?></td>
                      <td><a href="updateproduct2.php?entry=true&barcode_=<?php echo $record['barcode']; ?>" class="btn btn-sm btn-danger">Edit</a></td>
                    </tr>
                    <?php
                  }
                }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap-number-input.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-confirmation.js"></script>
  <script type="text/javascript">
  </script>
</body>

</html>
