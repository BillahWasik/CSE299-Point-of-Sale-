<!DOCTYPE HTML>
<html lang="en-US" ng-app>

<head>
	<meta charset="UTF-8">
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<title>POS - A Crony of Point Of Sale</title>
	

	<!-- Font Awesome Icone -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="font/css/fontawesome.css"> -->
	<!-- Google Font -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
	<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css" media="all" />

	<!-- Custom Css -->
	<link rel="stylesheet" type="text/css" href="assets/css/tools.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all" />

	<!--sweetalert lib-->
	<script src="assets/js/sweetalert.min.js"></script>
	<link rel="stylesheet" href="assets/css/sweetalert.min.css">

	<!--angular-->
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/jquery-3.2.0.min.js"></script>




	<!-- Script for Popup with fixed size in center-->
	<script>
		function popupCenter(url, title, w, h) {
				  var left = (screen.width/2)-(w/2);
				  var top = (screen.height/2)-(h/2);
				  return window.open(url, title, 'width='+w+', height='+h+', top='+top+', left='+left);
				}
		</script>
	<style>
		.none{
		display:none;
		}</style>
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

</head>
