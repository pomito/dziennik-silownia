<?php
   session_start();

       header("Content-Type:application/msword");
       $nazwa_pliku='analiza.rtf';

       $id = $_SESSION["ID_Podopiecznego"];
       $imie = $_SESSION["Imie"];
        $nazwisko = $_SESSION["Nazwisko"];

       $plik = fopen($nazwa_pliku,'r');
       $dane = fread($plik, filesize($nazwa_pliku));
       $dane = str_replace('<<id>>',$id,$dane);
       $dane = str_replace('<<imie>>',$imie,$dane);
       $dane = str_replace('<<nazwisko>>',$nazwisko,$dane);
       $dane = str_replace('<<wzrost>>',rand(150,210),$dane);
       $dane = str_replace('<<wiek>>',rand(16,67),$dane);
       $dane = str_replace('<<waga>>',rand(40,110),$dane);
       $dane = str_replace('<<fat>>',rand(11,28),$dane);
       $dane = str_replace('<<bmi>>',rand(19,27),$dane);
       $dane = str_replace('<<age>>',rand(15,67),$dane);


       echo $dane;

   ?>