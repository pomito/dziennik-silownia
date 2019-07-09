<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Logowanie</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/login.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
<style>
  html {
  background: url("assets/img/tlo5.jpg") no-repeat center center fixed;
  background-size: cover;
  height: 100%;
  overflow: hidden;
  display:inline-block;

}
body{
   background-color:transparent !important;
}

   </style>
</head>
<body>

<?require_once 'processczaszajec.php'?>
<?require_once 'processpracownicy.php'?>
<?require_once 'processpodopieczni.php'?>
<?php

if (isset($_SESSION['message'])): ?>

<div class="alert-<?=$_SESSION['msg_type']?>">

      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
</div>
<?php endif ?>

<div class="container login-container">
<div class="logo"><b><p style="border:4px solid black; text-align: center; padding: 33px; margin:20px 360px;letter-spacing: 16px;font-size:50px; font-family:Quicksand;">pakernia</p></b></div>
   <div class="row">
      <div class="col-md-6 login-form-1">
         <h3>Logowanie dla pracowników:</h3>
         <form action="zalogujpracownika.php" method="POST">

            <div class="form-group">
            <label for="email">Email:</label>
         <input type="email" name="email" id="email" class="form-control">
            </div>

         <div class="form-group">
         <label for="haslo">Hasło:</label>
         <input type="password" name="haslo" id="haslo" class="form-control">

         </div>

         <div class="form-group">
         <button type="submit" class="btn btn-success">Zaloguj</button>
         </div>
      </form>
      <?php
         if(isset($_SESSION['blad']))
         echo $_SESSION['blad'];
         ?>
      </div>



      <div class="col-md-6 login-form-2">
         <h3>Logowanie dla podopiecznych:</h3>
         <form action="zalogujpodopieczni.php" method="POST">

            <div class="form-group">
            <label for="email2" class="label-2">Email:</label>
         <input type="email" name="email2" id="email2" class="form-control">
            </div>

         <div class="form-group">
         <label for="haslo2" class="label-2">Hasło:</label>
         <input type="password" name="haslo2" id="haslo2" class="form-control">

         </div>

         <div class="form-group">
         <button type="submit" class="btn btn-light">Zaloguj</button>
         </div>
      </form>
      <?php
         if(isset($_SESSION['blad2']))
         echo $_SESSION['blad2'];
         ?>
      </div>

</div>





</body>
</html>