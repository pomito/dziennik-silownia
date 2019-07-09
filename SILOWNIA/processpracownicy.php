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

$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);


if (isset($_POST['save'])){
   $imie = $_POST['imie'];
   $nazwisko = $_POST['nazwisko'];
   $data = $_POST['data'];
   $adres = $_POST['adres'];
   $email = $_POST['email'];
   $haslo = $_POST['haslo'];
   $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);

   $polaczenie->query("INSERT INTO pracownicy (Imie, Nazwisko, Data_urodzenia, Adres_zamieszkania, Email, Haslo) VALUES('$imie', '$nazwisko', '$data','$adres', '$email', '$haslo_hash')") or die($polaczenie->error);

   $_SESSION['message'] = "Dodano pracownika!";
   $_SESSION['msg_type'] = "success";

   header("location: pracownicy.php");
}

if (isset($_GET['delete'])){
   $id = $_GET['delete'];

   $polaczenie->query("DELETE FROM pracownicy WHERE ID_Pracownika= $id") or die($polaczenie->error());

   $_SESSION['message'] = "Usunięto pracownika!";
   $_SESSION['msg_type'] = "danger";

   header("location: pracownicy.php");
}


if (isset($_GET['edit'])){
   $id = $_GET["edit"];
   $update = true;

   $result = $polaczenie->query("SELECT * FROM pracownicy WHERE ID_Pracownika = $id") or die($polaczenie->error);

   if (count($result)==1){
     $row = $result->fetch_array();
     $imie = $row['Imie'];
     $nazwisko = $row['Nazwisko'];
     $data = $row['Data_urodzenia'];
     $adres = $row['Adres_zamieszkania'];
     $email = $row['Email'];
     $haslo = $row['Haslo'];
   }

}


if (isset($_POST['update'])){
   $id = $_POST['id'];
   $imie = $_POST['imie'];
   $nazwisko = $_POST['nazwisko'];
   $data = $_POST['data'];
   $adres = $_POST['adres'];
   $email = $_POST['email'];
   $haslo = $_POST['haslo'];
   $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);

   $polaczenie->query("UPDATE pracownicy SET Imie= '$imie', Nazwisko= '$nazwisko', Data_urodzenia ='$data',Adres_zamieszkania = '$adres', Email ='$email', Haslo = '$haslo_hash' WHERE ID_Pracownika =$id") or die($polaczenie->error);

   $_SESSION['message'] = "Pracownik został edytowany!";
   $_SESSION['msg_type'] = "warning";

   header('location: pracownicy.php');
}
?>