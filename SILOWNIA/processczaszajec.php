<?php

   error_reporting(0);

   session_start();
   require('inc/database.php');

   $id = 0;
   $update = false;
   $datapocz = '';
   $datazak = '';
   $id1 = '';
   $id2 = '';

   if (isset($_POST['save'])){
      $datapocz = $_POST['datapocz'];
      $datazak = $_POST['datazak'];
      $id1 = $_POST['id1'];
      $id2 = $_POST['id2'];
      $polaczenie->query("INSERT INTO czaszajec (Rozpoczecie, Zakonczenie ,ID_Podopiecznego, ID_Treningu) VALUES('$datapocz','$datazak','$id1', '$id2')") or die($polaczenie->error);

      $_SESSION['message'] = "Dodano czas zajęć!";
      $_SESSION['msg_type'] = "success";

      header("location: czaszajec.php");
   }

   if (isset($_GET['delete'])){
      $id = $_GET['delete'];

      $polaczenie->query("DELETE FROM czaszajec WHERE ID_Czasu_zajec= $id") or die($polaczenie->error());

      $_SESSION['message'] = "Usunięto czas zajęć!";
      $_SESSION['msg_type'] = "danger";

      header("location: czaszajec.php");
   }

   if (isset($_POST['update'])){
      $row = $result->fetch_array();
      $id = $_POST['id'];
      $datapocz = $_POST['datapocz'];
      $datazak = $_POST['datazak'];
      $id1 = $_POST['id1'];
      $id2 = $_POST['id2'];


      $polaczenie->query("UPDATE czaszajec SET Rozpoczecie ='$datapocz', Zakonczenie = '$datazak', ID_Podopiecznego = '$id1', ID_Treningu = '$id2' WHERE ID_Czasu_zajec =$id") or die($polaczenie->error);

      $_SESSION['message'] = "Czas zajęć został edytowany!";
      $_SESSION['msg_type'] = "warning";

      header('location: czaszajec.php');
   }
   ?>