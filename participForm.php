<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Formulaire de Modules");
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

  <form action="" method="post">
    <div>
      <label for="civilite">Civilite</label>
      <input type="text" name="civilite" value="" id="civilite"/>
    </div>
    <div>
      <label for="name">Nom</label>
      <input type="text" name="name" value="" id="name">
    </div>
    <div>
      <label for="firstName">Prénom</label>
      <input type="text" name="firstName" value="" id="firstName">
    </div>
    <div>
      <label for="dateBirth">Date de naissance</label>
      <input type="date" name="dateBirth" value="" id="dateBirth">
    </div>
    <div>
      <label for="address">adresse</label>
      <input type="text" name="address" value="" id="address">
    </div>
    <div>
      <label for="addAddress">Complément</label>
      <input type="text" name="addAddress" value="" id="addAddress">
    </div>
    <div>
      <label for="postalCode">Code Postal</label>
        <select name="postalCode" id="postalCode">
          <option value="">-- Choix du code postal --</option>
          <option value="33460">33460</option>
          <option value="40200">40200</option>
          <option value="29000">29000</option>
          <option value="51210">51210</option>
          <option value="64000">64000</option>
        </select>
    </div>
    <div>
      <label for="license">Permis</label>
      <select name="license" id="license" >
        <option value="">-- Choix du permis --</option>
        <option value="A">Permis A</option>
        <option value="B">Permis B</option>
        <option value="E">Permis E</option>
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
