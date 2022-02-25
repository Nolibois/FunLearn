
<?php
  // HEADER
  require_once  "components/header.php";
  echo printHeader("Formulaire de Modules");

  // Initialize Form
  require_once "Backend/reqParticip.php";
  $listAllInit = initFormParticip();
  $infosParticipant = [];

  // Update participants ($_GET['id'], $_POST)
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (empty($_POST)) {
      $infosParticipant = getParticipById($_GET['id'])[0];

        print('<pre>');
  var_dump($infosParticipant);
  print('</pre>');
  // die;
    }

  // New participants ($_POST)
  }elseif(!isset($_GET['id']) && isset($_POST) && !empty($_POST)){
    $infosNewParticip = [];
    foreach ($_POST as $key => $value) {
      $infosNewParticip[$key] = trim($value);
      $infosNewParticip[$key] = htmlspecialchars($infosNewParticip[$key]);
    }
    createParticip($infosNewParticip);

  // List Participant
  }/* else{

  } */

/*   require_once  "Backend/requests.php";

  $code = "";
  $libelle = "";
  $description = "";

  if (isset($_GET['id']) && !empty($_GET['id']) && empty($_POST)) {
    $idMod = trim($_GET['id']);
    $idMod = htmlspecialchars($_GET['id']);

    $getModul = getModul($idMod);

    $code = $getModul['code'];
    $libelle = $getModul['libelle'];
    $description = $getModul['descMod'];

    $titleParticip = "Modifier le participant \"" .$getParticip['nom']. "\"";

  } elseif(isset($_GET['id']) && !empty($_GET['id']) && isset($_POST) && !empty($_POST)){
    // Sans traitement de la sécurité des données
    updateModul($_GET['id'], $_POST);
    header('Location: moduls.php');
    
  }elseif(!isset($_GET['id']) && isset($_POST) && !empty($_POST)) {
    // Sans traitement de la sécurité des données
    createModul($_POST);
    header('Location: moduls.php');
    
  }else{
    $titleParticip = "Créer un nouveau participant";

  } */
?>

<!-- MAIN -->
<main>
  <h1>Création d'un nouveau participant</h1>

  <form action="participants.php" method="post">
  <div>
      <label for="civilite">Civilite</label>
        <select name="civilite" id="civilite">
          <option value="">-- Choix de la civilité --</option>
          <?php
            foreach ($listAllInit['civilite'] as $value) {
              print("<option value=" .$value['id']. ">" .$value['libelle_court']. "</option>");
            }
          ?>

        </select>
    </div>
    <div>
      <label for="name">Nom</label>
      <input type="text" name="name" value="<?= $infosParticipant['nom'];?>" id="name">
    </div>
    <div>
      <label for="firstName">Prénom</label>
      <input type="text" name="firstName" value="<?= $infosParticipant['prenom'];?>" id="firstName">
    </div>
    <div>
      <label for="dateBirth">Date de naissance</label>
      <input type="date" name="dateBirth" value="<?= $infosParticipant['date_naissance'];?>" id="dateBirth">
    </div>
    <div>
      <label for="address">adresse</label>
      <input type="text" name="address" value="<?= $infosParticipant['adresse1'];?>" id="address">
    </div>
    <div>
      <label for="addAddress">Complément</label>
      <input type="text" name="addAddress" value="<?= $infosParticipant['adresse2'];?>" id="addAddress">
    </div>
    <div>
      <label for="postalCode">Code Postal / Ville</label>
        <select name="postalCode" id="postalCode">
          <option value="">-- Choix du code postal --</option>
          <?php
            foreach ($listAllInit['ville'] as $value) {
              print("<option value=" .$value['id']. ">" .$value['ville']. "</option>");
            }
          ?>
        </select>
    </div>
    <div>
      <label for="license">Permis</label>
      <select name="license" id="license" >
        <option value="">-- Choix du permis --</option>
          <?php
            foreach ($listAllInit['permis'] as $value) {
              print("<option value=" .$value['id']. ">" .$value['libelle']. "</option>");
            }
          ?>
      </select>
    </div>
    
    <div class="btn-container">
      <input type="submit" value="Valider">
      <input type="reset" value="Annuler">
    </div>

  </form>
</main>

<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
