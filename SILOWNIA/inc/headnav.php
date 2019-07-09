<?php

session_start();

?>

<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/p.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Siłownia</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar"  data-image="assets/img/sidebar.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    PAKERNIA
                </a>
            </div>

            <ul class="nav">
                <?php

                if ($_SESSION["Rola"] == "Wlasciciel") {
                echo "<li>";
                    echo "<a href='pracownicy.php'>";
                        echo "<i class='pe-7s-user'></i>";
                        echo "<p>Pracownicy</p>";
                    echo "</a>";
                echo "</li>";
                }
                ?>
                <li>
                    <a href="podopieczni.php">
                        <i class="pe-7s-users"></i>
                        <p>Podopieczni</p>
                    </a>
                </li>
                <li>
                    <a href="czaszajec.php">
                        <i class="pe-7s-timer"></i>
                        <p>Czas zajęć</p>
                    </a>
                </li>
                <li>
                    <a href="zajecia.php">
                        <i class="pe-7s-note2"></i>
                        <p>Zajęcia</p>
                    </a>
                </li>
                <li>
                    <a href="trening.php">
                        <i class="pe-7s-gym"></i>
                        <p>Trening</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo "Witaj ". $_SESSION['Imie'] ."!"?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php  echo "<a href='logout.php'>" ?>
                                <p style=color:red;>WYLOGUJ</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
