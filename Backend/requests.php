<?php
require_once "dbConnect.php";

/**
 * listModuls
 * return list of all moduls
 * 
 * @return array
 */
function listModuls() :array
{

  $dbConnect = dbConnect();

  // Exécution de la requête
  $sqlReq = "SELECT * FROM module";
  $sqlResult = $dbConnect->query($sqlReq);

  // Exploitation des données
  $listModul = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();
  return $listModul;

}


/**
 * listParticipants
 *
 * @return array
 */
function listParticipants() :array
{
  $dbConnect = dbConnect();

  $sqlReq = "SELECT 
  libelle_court,
  nom,
  prenom,
  adresse,
  adresse1,
  adresse2,
  codePostal,
  libelle,
  DATE_FORMAT(date_naissance, '%d/%m/%Y') AS newDate
   FROM participant
    INNER JOIN civilite ON participant.idCivilite = civilite.id
    INNER JOIN cpville ON participant.idCpVille = cpville.id
    INNER JOIN email ON participant.id = email.idParticipant
    LEFT JOIN permis ON permis.id = participant.idPermis
  ORDER BY nom";

  $sqlResult = $dbConnect->query($sqlReq);

  $listPermis = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();
  return $listPermis;
}


/**
 * getModul
 * Get modul by id
 * 
 * @param  int $id
 * @return array
 */
function getModul(int $id) :array
{
  $dbConnect = dbConnect();

  $sqlReq = "SELECT code, libelle, module.description AS descMod FROM module
    WHERE id = $id";

  $sqlResult = $dbConnect->query($sqlReq);

  $getModul = $sqlResult->fetch(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();
  return $getModul;
}