<?php
include_once("inc/database.php");
include_once("inc/headnavpodopieczni.php");
require_once 'processczaszajec.php'; ?>


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
                                $id = $_SESSION["ID_Podopiecznego"];
                                $sql = "SELECT * FROM czaszajec WHERE ID_Podopiecznego = $id";

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
                              </div>
                            </div>
                        </div>
                    </div>

<?php
include_once('inc/footer.php');
?>