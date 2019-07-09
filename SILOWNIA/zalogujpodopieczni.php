<?php
   session_start();

   require('inc/database.php');

   if($polaczenie->connect_errno!=0){
      echo "Error:".$polaczenie->connect_errno . "Opis:" . $polaczenie->connect_error;
   }
   else{
      $email = $_POST["email2"];
      $haslo = $_POST["haslo2"];

      $sql = "SELECT * FROM podopieczni WHERE Email='$email'";

      if($result = $polaczenie->query($sql)){
         $ilu_userow = $result->num_rows;
         if($ilu_userow>0){

            $row = $result->fetch_assoc();

            if(password_verify($haslo,$row['Haslo']))
            {
            $_SESSION['zalogowany'] = true;

            $_SESSION['ID_Podopiecznego'] = $row['ID_Podopiecznego'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Imie'] = $row['Imie'];
            $_SESSION['Haslo'] = $row['Haslo'];
            $_SESSION['Nazwisko'] = $row['Nazwisko'];

            unset($_SESSION['blad2']);
            $result->close();

            header('Location: treningpodopieczni.php');

            }
         else{

            $_SESSION['blad2'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: index.php');
            }
         }

      };


      $polaczenie->close();

   }

   ?>