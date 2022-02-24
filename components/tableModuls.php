<?php
  require_once  "Backend/reqModul.php";
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
              <td class="btn-del"><a href="moduls.php?action=delete&id=' .$table[$i]["id"].'" class="btnDelMod" onClick="return confirm(\'Etes-vous sûr de vouloir effacer ce module?\')">Effacer</a></td>
            </tr>';

            // onClick="return confirm(\'Etes-vous sûr de vouloir effacer ce module?\')"
            // => Crée une fenêtre de confirmation
          }


        ?>
      </tbody>
    </table>

</section>