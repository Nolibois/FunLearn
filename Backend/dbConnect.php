<?php

/**
 * dbConnect
 * Connect to the database
 * 
 * @return PDO
 */
function dbConnect() :PDO
{
  // Connexion au serveur
  return $dbConnect = new PDO(
    "mysql:host=localhost; port=3306;dbname=evaluation;charset=utf8",
    "root",
    "");
}
