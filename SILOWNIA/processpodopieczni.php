<?php
   error_reporting(0);

   session_start();

 require('inc/database.php');

   $id = 0;
   $update = false;
   $imie = '';
   $nazwisko = '';
   $data = '';
   $email = '';
   $haslo = '';
   $adres ='';
   $tel = '';
   $id1 = '';
   $id2 = '';
   $id3 = '';

   if (isset($_POST['save'])){
      $imie = $_POST['imie'];
      $nazwisko = $_POST['nazwisko'];
      $data = $_POST['data'];
      $adres = $_POST['adres'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $haslo = $_POST['haslo'];
      $id1 = $_POST['id1'];
      $id2 = $_POST['id2'];
      $id3 = $_POST['id3'];
      $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
      $polaczenie->query("INSERT INTO podopieczni (Imie, Nazwisko, Data_urodzenia,Adres_zamieszkania,Numer_telefonu, Email, Haslo,ID_Pracownika, ID_Zajec, ID_Analizy_skladu_ciala) VALUES('$imie', '$nazwisko', '$data','$adres','$tel', '$email', '$haslo_hash', '$id1', '$id2', '$id3')") or die($polaczenie->error);

      $_SESSION['message'] = "Dodano podopiecznego!";
      $_SESSION['msg_type'] = "success";

      header("location: podopieczni.php");
   }

   if (isset($_GET['delete'])){
      $id = $_GET['delete'];

      $polaczenie->query("DELETE FROM podopieczni WHERE ID_Podopiecznego= $id") or die($polaczenie->error());

      $_SESSION['message'] = "Usunięto podopiecznego!";
      $_SESSION['msg_type'] = "danger";

      header("location: podopieczni.php");
   }


   if (isset($_GET['edit'])){
      $id = $_GET["edit"];
      $update = true;

      $result = $polaczenie->query("SELECT * FROM podopieczni WHERE ID_Podopiecznego = $id") or die($polaczenie->error);

      if (count($result)==1){
        $row = $result->fetch_array();
        $imie = $row['Imie'];
        $nazwisko = $row['Nazwisko'];
        $data = $row['Data_urodzenia'];
        $adres = $row['Adres_zamieszkania'];
        $tel = $row['Numer_telefonu'];
        $email = $row['Email'];
        $haslo = $row['Haslo'];
        $id1 = $row['ID_Pracownika'];
        $id2 = $row['ID_Zajec'];
        $id3 = $row['ID_Analizy_skladu_ciala'];

      }

   }


   if (isset($_POST['update'])){
      $id = $_POST['id'];
      $imie = $_POST['imie'];
      $nazwisko = $_POST['nazwisko'];
      $data = $_POST['data'];
      $adres = $_POST['adres'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $haslo = $_POST['haslo'];
      $id1 = $_POST['id1'];
      $id2 = $_POST['id2'];
      $id3 = $_POST['id3'];
      $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);


      $polaczenie->query("UPDATE podopieczni SET Imie= '$imie', Nazwisko= '$nazwisko', Data_urodzenia ='$data', Adres_zamieszkania = '$adres', Numer_telefonu = '$tel', Email ='$email', Haslo = '$haslo_hash', ID_Pracownika = '$id1', ID_Zajec = '$id2', ID_Analizy_skladu_ciala = '$id3' WHERE ID_Podopiecznego =$id") or die($polaczenie->error);

      $_SESSION['message'] = "Podopieczny został edytowany!";
      $_SESSION['msg_type'] = "warning";

      header('location: podopieczni.php');
   }
   ?>