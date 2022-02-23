<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Formulaire de Modules");
  require_once  "Backend/requests.php";

  if (isset($_GET['id'])) {
    $idMod = trim($_GET['id']);
    $idMod = htmlspecialchars($_GET['id']);

    $getModul = getModul($idMod);

    $titleModul = "Modifier le module \"" .$getModul['libelle']. "\"";

  } else {
    $getModul = [
      'code' => "",
      'libelle' => "",
      'descMod' => ""
    ];
    $titleModul = "Créer un nouveau module";
  }
?>

<!-- MAIN -->
<main>
  <h1><?= $titleModul?></h1>

  <form action="">
    <div>
      <label for="code">Code</label>
      <input type="text" name="" value="<?= $getModul['code'];?>" id="code"/>
    </div>
    <div>
      <label for="tag">Libellé</label>
      <input type="text" name="" value="<?= $getModul['libelle'];?>" id="tag">
    </div>
    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" type="text"><?= $getModul['descMod'];?></textarea>
    </div>
    <div class="btn">
      <input type="submit" value="Valider">
      <input type="submit" value="Annuler">
    </div>

  </form>
</main>

<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
