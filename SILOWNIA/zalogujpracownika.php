<?php
   session_start();

   require('inc/database.php');

   if($polaczenie->connect_errno!=0){
      echo "Error:".$polaczenie->connect_errno . "Opis:" . $polaczenie-connect_error;
   }
   else{
      $email = $_POST["email"];
      $haslo = $_POST["haslo"];


      $sql = "SELECT * FROM pracownicy WHERE Email='$email'";

      if($result = $polaczenie->query($sql)){
         $ilu_userow = $result->num_rows;
         if($ilu_userow>0){

            $row = $result->fetch_assoc();

            if(password_verify($haslo,$row['Haslo']))
            {
            $_SESSION['zalogowany'] = true;


            $_SESSION['ID_Pracownika'] = $row['ID_Pracownika'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Imie'] = $row['Imie'];
            $_SESSION['Rola'] = $row['Wlasciciel'] == 0 ? "Pracownik" : "Wlasciciel";  //jeżeli 0 to pracownik, 1 to właściciel

           unset($_SESSION['blad']);
            $result->close();

            if ($_SESSION["Rola"] == "Wlasciciel") {
            header('Location: pracownicy.php');
            } else {
               header('Location: podopieczni.php');

            }

            }
            else{
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: index.php');
         }
         }
         else{
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: index.php');
         }
      };


      $polaczenie->close();
   }


   ?>