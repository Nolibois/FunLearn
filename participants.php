<?php
  // HEADER
  require_once  "components/header.php";
  echo printHeader("Particpants");

  // Init page
  require_once "Backend/reqParticip.php";

/*   print('<pre>');
  var_dump($_POST);
  print('</pre>'); */
  // die;

?>

<!-- MAIN -->
<main>
  <h1>Liste des participants</h1>
  <div class="btn">
    <a href="participForm.php">Créer un nouveau participant</a>
  </div>
  <?php require_once  "components/tableParticipants.php" ?>
</main>

<!-- FOOTER -->
<?php require_once  "components/footer.php" ?>
