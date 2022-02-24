<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Modules");
  require_once  "Backend/reqModul.php";


  if (isset($_GET['action'])){
    if($_GET['action'] === 'delete') {
      delModul($_GET['id']);
    }
  }

?>

<!-- MAIN -->
<main>
  <h1>Liste des modules</h1>
  <div class="btn">
    <a href="modulForm.php">Créer un nouveau module</a>
  </div>
  <?php require_once  "components/tableModuls.php" ?>
</main>


<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
