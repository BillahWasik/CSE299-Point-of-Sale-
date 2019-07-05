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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" media="all" /> -->
  <link rel="stylesheet" type="text/css" href="assets/css/tools.css" media="all" />
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
</head>

<body>
  <div class="main">
    <div class="container" style="padding-top:3%;">
      <div class="row">
        <h1 style="text-align:center;color:#FFFFFF "><b>Welcome to POS<b></h1>
      </div>
    </div>
    <div class="container" style="margin-top:6%">
      <div class="row">
        <div class="col-md-5 col-xm-5  col-sm-5 left-table" style="margin-right: 16.65%;">
          <form class="" action="" method="post">
            <h4 style="color: #34495e;" class="text-center">Add Category</h4>
            <input class="email" type="text" Placeholder="Category" name="category_" autocomplete="off" />
            <button class="submit" type="submit" name="add_category">Submit</button>
          </form>
        </div>

        <!-- making category dynamic with php-->
        <?php

          if (isset($_POST['add_category'])) {
            if (empty($_POST['category_'])) {
              $error="Please Fillout Category Name!" ?>
    					<script>swal("Opss.....","<?php echo $error; ?>", "error");</script> <?php
            }
            else {
              // define $username and $password
              $category=$_POST['category_'];
              // to protect injection
              $category = stripslashes($category);
              $category = mysqli_real_escape_string($db, $category);
              $add_category="INSERT INTO pos_category (category_id,category_title)VALUES (NULL,'$category')";
              $category_run=mysqli_query($db,$add_category);
              if ($category_run) {
                $error="Category Added!" ?>
      					<script>swal("Success","<?php echo $error; ?>", "success");</script> <?php
              }
              else {
                $error="Category Added Failed!" ?>
      					<script>swal("Something Wrong","<?php echo $error; ?>", "error");</script> <?php
              }

            }
          }
        ?>

        <div class="col-md-offset-2 col-xm-2  col-sm-2"></div>
        <div class="col-md-5 col-xm-5  col-sm-5 right-table ">
          <div id="table-wrapper">
            <h4 class="text-center">Category</h4>
            <div id="table-scroll">
              <table class="table">
                <tbody>
              <!-- showing Category item -->
              <?php
                $show_Category="SELECT category_title FROM pos_category ORDER BY category_id desc";
                $show_result=mysqli_query($db,$show_Category);
                if (mysqli_num_rows($show_result)>0) {
                  while ($category_record=mysqli_fetch_assoc($show_result)) {
                    ?>
                    <tr>
                      <td><?php echo $category_record['category_title']; ?></td>
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
    </div>
