<?php
   include_once("inc/database.php");
   include_once("inc/headnav.php");

   require_once 'processpodopieczni.php'; ?>
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
                  <h4 class="title">Podopieczni</h4>
                  <p class="category">"Liczy się każdy krok, nawet ten najmniejszy!"</p>
               </div>
               <div class="content table-responsive table-full-width">
                  <?php
                     $id = $_SESSION["ID_Pracownika"];
                     $sql = "SELECT * FROM podopieczni WHERE ID_Pracownika = $id";

                     $result = $polaczenie->query($sql);

                     if($result->num_rows > 0){
                         echo "<table class='table table-hover table-striped'>";
                         echo "<thead>";
                         echo "<th>ID Podopiecznego</th>";
                         echo "<th>Imię</th>";
                         echo "<th>Nazwisko</th>";
                         echo "<th>Data urodzenia</th>";
                         echo "<th>Adres zamieszkania</th>";
                         echo "<th>Nr telefonu</th>";
                         echo "<th>Email</th>";
                         echo "<th>Hasło</th>";
                         echo "<th>ID Pracownika</th>";
                         echo "<th>ID Zajęć</th>";
                         echo "<th>ID Analizy składu ciała</th>";
                         echo "</thead>";
                         echo "<tbody>";



                                 while ($row = $result->fetch_assoc()): ?>
                  <tr>
                     <td><?php echo $row['ID_Podopiecznego']; ?></td>
                     <td><?php echo $row['Imie']; ?></td>
                     <td><?php echo $row['Nazwisko']; ?></td>
                     <td><?php echo $row['Data_urodzenia']; ?></td>
                     <td><?php echo $row['Adres_zamieszkania']; ?></td>
                     <td><?php echo $row['Numer_telefonu']; ?></td>
                     <td><?php echo $row['Email']; ?></td>
                     <td><?php echo $row['Haslo']; ?></td>
                     <td><?php echo $row['ID_Pracownika']; ?></td>
                     <td><?php echo $row['ID_Zajec']; ?></td>
                     <td><?php echo $row['ID_Analizy_skladu_ciala']; ?></td>
                     <td>
                        <a href="processpodopieczni.php?delete=<?php echo $row['ID_Podopiecznego']; ?>" class="btn btn-danger">Usuń</a>
                     </td>
                  </tr>
                  <?php endwhile; ?>
                  <?php echo "</tbody>";
                     echo "</table>";
                                 }
                         ?>
               </div>
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
         <div class="row col-md-4 px-2 text-center"></div>
         <div class="row justify-content-center col-md-4">
            <form action="processpodopieczni.php" method="POST">
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
                  <textarea name="adres" id="adres" cols="10" rows="2" class="form-control" required placeholder="Podaj adres" value="<?php echo $adres; ?>"></textarea>
               </div>
               <div class="form-group">
                  <label for="tel">Numer telefonu:</label>
                  <input type="tel" name="tel" class="form-control" required placeholder="9 cyfr" value="<?php echo $tel; ?>">
               </div>
               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" name="email" class="form-control" required placeholder="Wpisz email" value="<?php echo $email; ?>">
               </div>
               <div class="form-group">
                  <label for="haslo">Hasło:</label>
                  <input type="password" name="haslo" class="form-control" required placeholder="Wpisz hasło" value="<?php echo $haslo; ?>">
               </div>
               <?php
               require('inc/database.php');
                  $query1 = "SELECT DISTINCT ID_Pracownika FROM pracownicy";

                  $result1 = mysqli_query($polaczenie, $query1);
                  $query2 = "SELECT DISTINCT ID_Zajec FROM zajecia";

                  $result2 = mysqli_query($polaczenie, $query2);
                  $query3 = "SELECT  DISTINCT ID_Analizy_skladu_ciala FROM analiza";

                  $result3 = mysqli_query($polaczenie, $query3);?>
               <div class="form-group">
                  <label for="id1">ID_Pracownika:</label>
                  <select name="id1" id="id1">
                     <?php while($row = mysqli_fetch_array($result1)):;?>
                     <option value="<?php echo $row['ID_Pracownika']?>"><?php echo $row['ID_Pracownika']?></option>
                     <?php endwhile;?>
                  </select>
                  <label for="id2">ID Zajęć:</label>
                  <select name="id2" id="id2">
                     <?php while($row = mysqli_fetch_array($result2)):;?>
                     <option value="<?php echo $row['ID_Zajec']?>"><?php echo $row['ID_Zajec']?></option>
                     <?php endwhile;?>
                  </select>
                  <label for="id3">ID Analizy składu ciała:</label>
                  <select name="id3" id="id3">
                     <?php while($row = mysqli_fetch_array($result3)):;?>
                     <option value="<?php echo $row['ID_Analizy_skladu_ciala']?>"><?php echo $row['ID_Analizy_skladu_ciala']?></option>
                     <?php endwhile;?>
                  </select>
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
         <div class="row col-md-4 px-2">
         </div>
      </div>
   </div>
</div>
<?php
   include_once('inc/footer.php');
   ?>