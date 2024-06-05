<?php
    require_once 'auth.php';
    require_once 'dbconfig.php';
    if (checkAuth()==0) {
        header("Location: login.php");
        exit;
    }
    if (checkAuthCoord()!=0) {
        header("Location: index.php");
        exit;
    }
    $errore='';

    $conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $idUtente=checkAuth();
    $sql = "SELECT * FROM Utente WHERE id = $idUtente";
    $result = $conn->query($sql);

    // Controlla se  esiste
    if ($result->num_rows > 0) {
        $utente = $result->fetch_assoc();
    } else {
        die('Utente non trovato.');
    }
    $sql = "SELECT u.nome,u.cognome,v.id AS viaggio_id,v.nome AS viaggio_nome,v.luogo,v.descrizione,v.prezzo,v.data_inizio,v.data_fine
      FROM Utente u JOIN Aggiungiviaggio av ON u.id = av.user_id JOIN Viaggio v ON av.viaggio_id = v.id WHERE u.id = $idUtente;";
    $result = $conn->query($sql);

    // Controlla se  esiste
    $viaggi = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $viaggi[] = $row;
        }


    }else {
      $errore = "Non hai viaggi nella tua lista torna alla <a href='index.php'>home<a>";

    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel='stylesheet' href='listaViaggi.css'>
  </head>
  <body>
    <div id="logo" >
      <a href='index.php'><img class="siVolaImg" src="img/sivolablack.png" alt=""></a>
    </div>
    <div>
      <h1 class="scritta1">Lista dei viaggi di <?php echo "$utente[nome] $utente[cognome]"; ?></h1>
    </div>
    <?php

    echo "<div class='container-viaggi'>";

    foreach ($viaggi as $viaggio) {

      echo "<div id='flex-container-viaggio' class='viaggio' style='background-image: url(\"img/{$viaggio['luogo']}.jpg\");'>";
      echo "<div class='flex-item-viaggio'>";
      echo "<h1 class='nomeViaggio'>{$viaggio['viaggio_nome']}</h1>";
      echo "<a class='elimina' href='eliminaViaggio.php?id={$viaggio['viaggio_id']}'>ELIMINA</a>";
      echo "</div>";
      echo "</div>";
    }

    echo "</div>";

     ?>


  </body>
</html>
