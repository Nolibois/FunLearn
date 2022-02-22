<!-- HEADER -->
<?php
  require_once  "components/header.php";
  echo printHeader("Modules");
?>

<!-- MAIN -->
<main>
  <h1>Liste des modules</h1>
  <?php require_once  "components/tableModuls.php" ?>
</main>


<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
