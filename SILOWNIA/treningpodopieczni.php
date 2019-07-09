<?php
   include_once("inc/database.php");
   include_once("inc/headnavpodopieczni.php");

   ?>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="header">
                  <h4 class="title">Trening</h4>
                  <p class="category">"Wielkie rezultaty biorą się z wielkich ambicji"</p>
               </div>
               <div class="content table-responsive table-full-width">
                  <?php
                     $sql = "SELECT * FROM trening";

                     $result = $polaczenie->query($sql);

                     if($result->num_rows > 0){
                         echo "<table class='table table-hover table-striped'>";
                         echo "<thead>";
                         echo "<th>ID Treningu</th>";
                         echo "<th>ID Zajęć</th>";
                         echo "<th>Typ treningu</th>";
                         echo "<th>Sprzęt</th>";
                         echo "<th>Korzyści</th>";
                         echo "<th>Czas trwania (min)</th>";
                         echo "<th>Ilość spalanych kalorii (kcal)</th>";
                         echo "<th>Poziom</th>";
                         echo "</thead>";
                         echo "<tbody>";

                         while($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $row["ID_Treningu"] . "</td>";
                              echo "<td>" . $row["ID_Zajec"] . "</td>";
                              echo "<td>" . $row["Typ_treningu"] . "</td>";
                              echo "<td>" . $row["Sprzet"] . "</td>";
                              echo "<td>" . $row["Korzysci"] . "</td>";
                              echo "<td>" . $row["Czas_trwania"] . "</td>";
                              echo "<td>" . $row["Ilosc_spalonych_kalorii"] . "</td>";
                              echo "<td>" . $row["Poziom"] . "</td>";
                              echo "</tr>";

                         }
                         echo "</tbody>";
                         echo "</table>";
                     }



                     ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   include_once('inc/footer.php');
   ?>