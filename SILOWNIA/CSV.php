<?php

include('inc/database.php');

$query = $polaczenie->query("SELECT * FROM pracownicy");

if($query->num_rows > 0){
   $delimiter = ';';
   $filename = "pracownicy " . date('Y-m-d') . ".csv";



   //tworzenie pliku

   $f = fopen('php://memory', 'w');

   //ustawianie kolumn

   $fields = array('ID_Pracownika', 'Imie', 'Nazwisko', 'Data_urodzenia', 'Adres_zamieszkania','Email', 'Status');
   fputcsv($f, $fields, $delimiter);

   while($row = $query->fetch_assoc()){
      $status = ($row['Wlasciciel'] == '1')?'Wlasciciel':'Pracownik';
      $lineData = array($row['ID_Pracownika'], $row['Imie'], $row['Nazwisko'], $row['Data_urodzenia'], $row['Adres_zamieszkania'], $row['Email'], $status);
      fputcsv($f,$lineData,$delimiter);

   }

   fseek($f,0);

   header('Content-Type: text/csv');
   header('Content-Disposition: attachment; filename="' . $filename . '";');

fpassthru($f);
}
exit();

?>