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
 * updateModul
 * update datas to a modul
 *
 * @param  mixed $id
 * @param  mixed $newModul
 * @return void
 */
function updateModul(int $id, array $dataModul) :void
{

  $dbConnect = dbConnect();

  $sqlReq = "UPDATE module SET
    code = :code,
    libelle = :libelle,
    description = :description
    WHERE id = $id";

    
  $req = $dbConnect->prepare($sqlReq);
  $req->execute($dataModul);

  $req->closeCursor();
  
}


/**
 * createModul
 * Create a new module
 *
 * @param  mixed $newModul
 * @return void
 */
function createModul(array $newModul) :void
{

  $dbConnect = dbConnect();

  $id = newId("module");
  $code = $newModul['code'];
  $libelle = $newModul['libelle'];
  $description = $newModul['description'];

  $sqlReq = "INSERT INTO module (id, code, libelle, description) VALUES(
    $id,
    '$code',
    '$libelle',
    '$description')";

  if($dbConnect->query($sqlReq)){
    header('Location: moduls.php');
  }

  // OU
/*   $req = $dbConnect->prepare($sqlReq);
  $req->execute([
    "id" => $id ,
    "code" => $code,
    "libelle" => $libelle,
    "description" => $description
  ]); */

}


/**
 * maxId
 * Get biggest id for
 * @return int
 */
function newId($tableName):int
{
  $dbConnect = dbConnect();

  // COALESCE => Cherche si un élément est NULL
  // Si MAX(id) = NULL, alors COALESCE s'arrête sur 0
  // Renvoie 0, et ajoute 1
  $sqlReq = "SELECT COALESCE(MAX(id), 0) + 1 FROM $tableName";

  $sqlResult = $dbConnect->query($sqlReq);
  $newId = $sqlResult->fetch(PDO::FETCH_NUM);

  $sqlResult->closeCursor();
  return $newId[0];
}


/**
 * delModul
 * DELETE the module choosen
 *
 * @param  mixed $id
 * @return void
 */
function delModul(int $id) :void
{
  $dbConnect = dbConnect();

  $sqlReq = "DELETE FROM module WHERE id = $id";

  $result = $dbConnect->query($sqlReq);
}