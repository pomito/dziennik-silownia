<?php
include_once("inc/database.php");
include_once("inc/headnav.php");

require_once 'processczaszajec.php'; ?>
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
                                <h4 class="title">Czas zajęć</h4>
                                <p class="category">Identyfikacja zajęć, od kiedy do kiedy, identyfikacja podopiecznego i jego treningu</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <?php
                                $sql = "SELECT * FROM czaszajec";

                                $result = $polaczenie->query($sql);

                                if($result->num_rows > 0){
                                    echo "<table class='table table-hover table-striped'>";
                                    echo "<thead>";
                                    echo "<th>ID Czasu zajęć</th>";
                                    echo "<th>Rozpoczęcie</th>";
                                    echo "<th>Zakończenie</th>";
                                    echo "<th>ID Podopiecznego</th>";
                                    echo "<th>ID Treningu</th>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                    while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                       <td><?php echo $row['ID_Czasu_zajec']; ?></td>
                                       <td><?php echo $row['Rozpoczecie']; ?></td>
                                       <td><?php echo $row['Zakonczenie']; ?></td>
                                       <td><?php echo $row['ID_Podopiecznego']; ?></td>
                                       <td><?php echo $row['ID_Treningu']; ?></td>
                                       <td>
                                          <a href="processczaszajec.php?delete=<?php echo $row['ID_Czasu_zajec']; ?>" class="btn btn-danger">Usuń</a>
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

                                ?><div class="row col-md-4 px-2 text-center"></div>
                                <div class="row justify-content-center col-md-4">
                                   <form action="processczaszajec.php" method="POST">
                                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                                      <div class="form-group">
                                         <label for="datapocz">Rozpoczęcie:</label>
                                         <input type="datetime-local" name="datapocz" class="form-control" required value="<?php echo $datapocz; ?>">
                                      </div>
                                      <div class="form-group">
                                         <label for="datazak">Zakończenie:</label>
                                         <input type="datetime-local" name="datazak" class="form-control" required value="<?php echo $datazak;?>">
                            </div>
                                      <?php

                                      require('inc/database.php');


                                         $query1 = "SELECT DISTINCT ID_Podopiecznego FROM podopieczni";
                                         $result1 = mysqli_query($polaczenie, $query1);

                                         $query2 = "SELECT DISTINCT ID_Treningu FROM trening";
                                         $result2 = mysqli_query($polaczenie, $query2);?>

                                      <div class="form-group">
                                         <label for="id1">ID_Podopiecznego:</label>
                                         <select name="id1" id="id1">
                                            <?php while($row = mysqli_fetch_array($result1)):;?>
                                            <option value="<?php echo $row['ID_Podopiecznego']?>"><?php echo $row['ID_Podopiecznego']?></option>
                                            <?php endwhile;?>
                                         </select>
                                         <label for="id2">ID Treningu:</label>
                                         <select name="id2" id="id2">
                                            <?php while($row = mysqli_fetch_array($result2)):;?>
                                            <option value="<?php echo $row['ID_Treningu']?>"><?php echo $row['ID_Treningu']?></option>
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
                                <div class="row col-md-4 px-2"></div>
                                </div>

                            </div>
                        </div>
                    </div>

<?php
include_once('inc/footer.php');
?>