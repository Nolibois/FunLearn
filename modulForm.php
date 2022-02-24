<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Formulaire de Modules");
  require_once  "Backend/reqModul.php";


  $code = "";
  $libelle = "";
  $description = "";

if (!isset($_GET['action'])) {
    if (isset($_GET['id']) && !empty($_GET['id']) ) {
    $idMod = trim($_GET['id']);
    $idMod = htmlspecialchars($_GET['id']);

    // Display the modul to update it
    if (empty($_POST)) {
      $getModul = getModul($idMod);

      $code = $getModul['code'];
      $libelle = $getModul['libelle'];
      $description = $getModul['descMod'];

      $titleModul = "Modifier le module \"" .$getModul['libelle']. "\"";

    // Update the selected modul
    }elseif(isset($_POST) && !empty($_POST)){
      $infosModul = [];
      foreach($_POST as $key => $value){
        $infosModul[$key] = trim($value);
        $infosModul[$key] = htmlentities($value);
      }
      updateModul($idMod, $infosModul);
      header('Location: moduls.php');
    }
  
  // Create a new modul
  }elseif(isset($_POST) && !empty($_POST)) {
    $infosModul = [];
    foreach($_POST as $key => $value){
      $infosModul[$key] = trim($value);
      $infosModul[$key] = htmlentities($value);
    }

    createModul($infosModul);
    
  // Display an empty form to create a new modul
  }else{
    $titleModul = "Créer un nouveau module";

  }
}

?>

<!-- MAIN -->
<main>
  <h1><?= $titleModul?></h1>

  <form action="" method="post">
    <div>
      <label for="code">Code</label>
      <input type="text" name="code" value="<?= $code; ?>" id="code"/>
    </div>
    <div>
      <label for="tag">Libellé</label>
      <input type="text" name="libelle" value="<?= $libelle; ?>" id="tag">
    </div>
    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" type="text"><?= $description; ?></textarea>
    </div>
    <div class="btn-container">
      <input type="submit" value="Valider" id="btnSend">
      <input type="button" value="Annuler" id="btnReset">
    </div>

  </form>
</main>

<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
