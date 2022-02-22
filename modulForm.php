<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Formulaire de Modules");
?>

<!-- MAIN -->
<main>
  <h1>Créer un nouveau module</h1>

  <form action="">
    <div>
      <label for="code">Code</label>
      <input type="text" name="" id="code"/>
    </div>
    <div>
      <label for="tag">Libellé</label>
      <input type="text" name="" id="tag">
    </div>
    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" type="text"></textarea>
    </div>
    <div class="btn">
      <input type="submit" value="Valider">
      <input type="submit" value="Annuler">
    </div>

  </form>
</main>

<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
