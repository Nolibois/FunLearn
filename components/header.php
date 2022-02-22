<?php
  function printHeader(string $title):string
  {
    return '
      <!DOCTYPE html>
      <html lang="fr">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/css/style.css">
        <title>'.$title.'</title>
      </head>
      <body>


      <header>
        <nav>
          <div class="logo">
            <img src="src/img/studying.png" alt="Logo FunLearn">
            <p>Tu participes, tu gagnes.</p>
          </div>
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="participants.php">Participants</a></li>
            <li><a href="moduls.php">Modules</a></li>
            <li><a href="exports.php">Exports</a></li>
          </ul>
        </nav>
      </header>
    
    ';
  }

