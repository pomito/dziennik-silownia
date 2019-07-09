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
                  <h4 class="title">Zajęcia</h4>
                  <p class="category">Identyfikacja oraz opis rodzaju zajęć</p>
               </div>
               <div class="content table-responsive table-full-width">
                  <?php
                     $sql = "SELECT * FROM zajecia";

                     $result = $polaczenie->query($sql);

                     if($result->num_rows > 0){
                         echo "<table class='table table-hover table-striped'>";
                         echo "<thead>";
                         echo "<th>ID</th>";
                         echo "<th>Rodzaj zajęć</th>";
                         echo "<th>Opis</th>";
                         echo "</thead>";
                         echo "<tbody>";

                         while($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $row["ID_Zajec"] . "</td>";
                              echo "<td>" . $row["Rodzaj_zajec"] . "</td>";
                              echo "<td>" . $row["Opis"] . "</td>";
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