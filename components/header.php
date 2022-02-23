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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
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

