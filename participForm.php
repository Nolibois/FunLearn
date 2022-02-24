<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Formulaire de Modules");
  require_once  "Backend/requests.php";

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

  }
?>

<!-- MAIN -->
<main>
  <h1><?= $titleParticip?></h1>

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
    <div class="btn">
      <input type="submit" value="Valider">
      <input type="submit" value="Annuler">
    </div>

  </form>
</main>

<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
