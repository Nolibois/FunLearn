<?php

  require_once "dbConnect.php";
  require_once "reqModul.php";

/**
 * listParticipants
 *
 * @return array
 */
function listParticipants() :array
{
  $dbConnect = dbConnect();

  $sqlReq = "SELECT 
  participant.id,
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
    LEFT JOIN email ON participant.id = email.idParticipant
    LEFT JOIN permis ON permis.id = participant.idPermis
  ORDER BY nom";

  $sqlResult = $dbConnect->query($sqlReq);

  $listPermis = $sqlResult->fetchAll(PDO::FETCH_ASSOC);

  $sqlResult->closeCursor();
  return $listPermis;
}


/**
 * listEmailsByParticip
 * Get the list of emails for a participant
 * 
 * @param  mixed $id
 * @return array
 */
function listEmailsByParticip(int $id) :array
{

  $dbConnect = dbConnect();

  $sqlReq = "SELECT adresse, idParticipant FROM email WHERE idParticipant = $id";
  $sqlResult = $dbConnect->query($sqlReq);

  $listEmailsByParticip = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();
  return $listEmailsByParticip;

}


/**
 * initFormParticip
 * Get the civilite, the driver's license, and the town
 *
 * @return array
 */
function initFormParticip() :array
{
  $dbConnect = dbConnect();
  $listAllInit = [];

  $sqlReqCivil = "SELECT id, libelle_court FROM civilite";
  $sqlResult = $dbConnect->query($sqlReqCivil);
  $listAllInit['civilite'] = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();
  
  $sqlReqCp = "SELECT id, CONCAT(codePostal, ' - ',ville) AS ville FROM cpVille ORDER BY codePostal, ville";
  $sqlResult = $dbConnect->query($sqlReqCp);
  $listAllInit['ville'] = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();
  

  $sqlReqCivil = "SELECT id, libelle FROM permis";
  $sqlResult = $dbConnect->query($sqlReqCivil);
  $listAllInit['permis'] = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();

  return $listAllInit;
}


/**
 * createParticip
 * Add a new participant
 *
 * @param  mixed $infos
 * @return void
 */
function createParticip(array $infos) :void
{

  $dbConnect = dbConnect();

  $sqlReq = "INSERT INTO participant 
    (id,
    nom, 
    prenom, 
    date_naissance, 
    adresse1, 
    adresse2, 
    idCivilite, 
    idCpVille, 
    idPermis) 
  VALUES(
    :id,
    :nom, 
    :prenom, 
    :date_naissance, 
    :adresse1, 
    :adresse2, 
    :idCivilite, 
    :idCpVille, 
    :idPermis
  )";

  $sqlResult = $dbConnect->prepare($sqlReq);

  try {
    $sqlResult->execute([
    "id" => newId("participant"),
    "nom" => $infos['name'],
    "prenom" => $infos['firstName'], 
    "date_naissance" => $infos['dateBirth'], 
    "adresse1" => $infos['address'], 
    "adresse2" => $infos['addAddress'], 
    "idCivilite" => $infos['civilite'], 
    "idCpVille" => $infos['postalCode'], 
    "idPermis" => $infos['license']
    ]);

  } catch (\Throwable $th) {
    echo "Error: ", $th->getMessage(), "\n";
  }

  // header('Location: participants.php');

  $sqlResult->closeCursor();
}

function getParticipById(int $id) :array
{
  $dbConnect = dbConnect();

  $sqlReq = "SELECT 
    libelle_court,
    nom,
    prenom,
    adresse1,
    adresse2,
    codePostal,
    libelle,
    date_naissance,
  FROM participant
    INNER JOIN civilite ON participant.idCivilite = civilite.id
    INNER JOIN cpville ON participant.idCpVille = cpville.id
    LEFT JOIN permis ON permis.id = participant.idPermis
  WHERE participant.id = $id";

  $sqlResult = $dbConnect->query($sqlReq);
  $getParticipById = $sqlResult->fetchAll(PDO::FETCH_ASSOC);
  $sqlResult->closeCursor();

  return $getParticipById;
}