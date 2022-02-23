<?php
  require_once  "Backend/requests.php";
  $table = listModuls();
?>

<section class="table-moduls">
    <table>
      <thead>
        <tr>
          <th>Code</th>
          <th>Libellé</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      
      <tbody>
        <?php
          // Utilisation d'une boucle
          $nb = count($table);

          for ($i=0; $i < $nb; $i++) { 
            print $ligne = '
            <tr>
              <td>' .$table[$i]["code"]. '</td>
              <td>' .$table[$i]["libelle"]. '</td>
              <td class="btn-edit"><a href="modulForm.php?id=' .$table[$i]["id"].'">Edit</a></td>
              <td class="btn-del"><a href="">Effacer</a></td>
            </tr>';
          }

          // $sqlResult->closeCursor();
        ?>
      </tbody>
    </table>

</section>