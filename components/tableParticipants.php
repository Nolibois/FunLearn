<?php
  require_once  "Backend/reqParticip.php";
  $tableParticipants = listParticipants();  
  // $listEmailsByParticip = listEmailsByParticip();
?>

<section class="table-moduls">
    <table>
      <thead>
        <tr>
          <th>Civilité</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Email</th>
          <th>Date de naissance</th>
          <th>Adresse 1</th>
          <th>Adresse 2</th>
          <th>Code Postal</th>
          <th>Permis</th>
          <th colspan="2">Actions</th>

        </tr>
      </thead>
      
      <tbody>
        <?php
          
            $nb = count($tableParticipants);

            for ($i=0; $i < $nb; $i++) { 
              print $ligne = '
              <tr>
                <td>' .$tableParticipants[$i]["libelle_court"]. '</td>
                <td>' .$tableParticipants[$i]["nom"]. '</td>
                <td>' .$tableParticipants[$i]["prenom"]. '</td>
                <td>' .$tableParticipants[$i]["adresse"]. '</td>
                <td>' .$tableParticipants[$i]["newDate"]. '</td>
                <td>' .$tableParticipants[$i]["adresse1"]. '</td>
                <td>' .$tableParticipants[$i]["adresse2"]. '</td>
                <td>' .$tableParticipants[$i]["codePostal"]. '</td>
                <td>' .$tableParticipants[$i]["libelle"]. '</td>
                <td class="btn-edit">
                  <a href="participForm.php?id=' .$tableParticipants[$i]["id"].'">Edit</a>
                </td>
                <td class="btn-del">
                  <a href="participants.php?action=delete&id=' .$tableParticipants[$i]["id"].'" class="btnDelParticip" onClick="return confirm(\'Etes-vous sûr de vouloir effacer ce participant?\')">Effacer</a>
                </td>
              </tr>';
            }
          

        ?>

      </tbody>
    </table>

</section>