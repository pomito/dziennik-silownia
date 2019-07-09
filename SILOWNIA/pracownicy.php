<?php
   include_once("inc/database.php");
   include_once("inc/headnav.php");

   require_once 'processpracownicy.php';?>

<?php
   if(isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
   <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
</div>
<?php endif ?>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="header">
                  <h4 class="title">Pracownicy</h4>
                  <p class="category">Grono najlepszych trenerów na terenie Śląska</p>
               </div>
               <div class="content table-responsive table-full-width">
                  <?php
                     $sql = "SELECT * FROM pracownicy";

                     $result = $polaczenie->query($sql);

                     if($result->num_rows > 0){
                         echo "<table class='table table-hover table-striped'>";
                         echo "<thead class='thead-dark'>";
                         echo "<th>ID Pracownika</th>";
                         echo "<th>Imię</th>";
                         echo "<th>Nazwisko</th>";
                         echo "<th>Data urodzenia</th>";
                         echo "<th>Adres zamieszkania</th>";
                         echo "<th>Właściciel</th>";
                         echo "<th>Email</th>";
                         echo "<th>Hasło</th>";
                         echo "</thead>";
                         echo "<tbody>";


                         while ($row = $result->fetch_assoc()): ?>
                  <tr>
                     <td><?php echo $row['ID_Pracownika']; ?></td>
                     <td><?php echo $row['Imie']; ?></td>
                     <td><?php echo $row['Nazwisko']; ?></td>
                     <td><?php echo $row['Data_urodzenia']; ?></td>
                     <td><?php echo $row['Adres_zamieszkania']; ?></td>
                     <td><?php echo $row['Wlasciciel']; ?></td>
                     <td><?php echo $row['Email']; ?></td>
                     <td><?php echo $row['Haslo']; ?></td>
                     <td><a href="pracownicy.php?edit=<?php echo $row['ID_Pracownika']; ?>" class="btn btn-info">Edytuj</a>
                        <a href="processpracownicy.php?delete=<?php echo $row['ID_Pracownika']; ?>" class="btn btn-danger">Usuń</a>
                     </td>
                  </tr>
                  <?php endwhile; ?>
                  <?php echo "</tbody>";
                     echo "</table>";
                     }
                         ?>
               </div>
            </div>
            <?php
               //pre_r($result); //wyświetlanie [num_rows] - ilości rekordów i [field_count] - ile kolumn

               //pre_r( $result->fetch_assoc()); //wyświetlenie rekordu
               function pre_r( $array){
                  echo '<pre>';
                  print_r($array);
                  echo '</pre>';
               }

               ?>
               <div class="row col-md-4 px-2"><a href="CSV.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pobierz CSV</a></div>
               <div class="row justify-content-center col-md-4">
         <form action="processpracownicy.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
               <label for="imie">Imię:</label>
               <input type="text" name="imie" class="form-control" required placeholder="Wpisz imię" value="<?php echo $imie; ?>">
            </div>
            <div class="form-group">
               <label for="nazwisko">Nazwisko:</label>
               <input type="text" name="nazwisko" class="form-control" required placeholder="Wpisz nazwisko" value="<?php echo $nazwisko;?>">
            </div>
            <div class="form-group">
               <label for="data">Data urodzenia:</label>
               <input type="date" name="data" class="form-control" required value="<?php echo $data;?>">
            </div>
            <div class="form-group">
               <label for="adres">Adres zamieszkania:</label>
               <textarea name="adres" id="adres" cols="10" rows="2" required class="form-control"  placeholder="Podaj adres" value="<?php echo $adres; ?>"></textarea>
            </div>
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="email" name="email" class="form-control" required placeholder="Wpisz email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
               <label for="haslo">Hasło:</label>
               <input type="password" name="haslo" class="form-control" required placeholder="Wpisz hasło" value="<?php echo $haslo; ?>">
            </div>
            <div class="form-group">
               <?php
                  if($update == true):
                   ?>
               <button type="submit" class="btn btn-info" name="update">Aktualizuj</button>
               <?php else: ?>
               <button type="submit" class="btn btn-primary" name="save">Zapisz</button>
               <?php endif; ?>
            </div>

         </form>
      </div>
      <div class="row col-md-4 px-2"></div>
         </div>
      </div>
   </div>
</div>
<?php
   include_once('inc/footer.php');
   ?>