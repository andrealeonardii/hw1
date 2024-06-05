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
    $errore=0;
    // Connetti al database
    $conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    // Controlla la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $viaggio_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($viaggio_id > 0) {
        // Prepara la query
        $sql = "SELECT * FROM viaggio WHERE id = $viaggio_id";
        $result = $conn->query($sql);

        // Controlla se  esiste
        if ($result->num_rows > 0) {
            $viaggio = $result->fetch_assoc();
        } else {
            die('Viaggio non trovato.');
        }
    } else {
        die('ID Viaggio non valido.');
    }

    // Chiudi la connessione
    $conn->close();
    $conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $idUtente=checkAuth();
    $sql = "SELECT * FROM aggiungiViaggio WHERE user_id = $idUtente AND viaggio_id=$viaggio_id";
    $result = $conn->query($sql);

    // Controlla se  esiste
    if ($result->num_rows > 0) {
        $errore = 'Hai già aggiunto questo viaggio nella tua lista';
    }else {

      $query = "INSERT INTO aggiungiviaggio(user_id, viaggio_id) VALUES('$idUtente', '$viaggio_id')";

      if (mysqli_query($conn, $query)) {
          mysqli_close($conn);
          $errore ="Hai aggiunto un viaggio nella tua lista, in seguito troverai le informazioni:";
      }else {
        $errore = 'Errore nel caricamento del DB';
      }
    }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel='stylesheet' href='aggiungiViaggio.css'>
    <meta charset="utf-8">
    <title>Aggiungi Viaggio</title>
  </head>
  <body>
    <div id="logo" >
      <a href='index.php'><img class="siVolaImg" src="img/sivolablack.png" alt=""></a>
    </div>
    <h1 class="esito"><?php echo "$errore"; ?></h1>

    <div class="container">

      <?php
      echo "<a class='img item-container' style='background-image: url(\"img/$viaggio[luogo].jpg\");' href=''>";
      echo "<h1 class='nomeViaggio'>$viaggio[nome]</h1>";
      echo "</a>";

      ?>

      <div class="item-container">
        <h1 class=''><?php echo "$viaggio[nome]" ?></h1>
        <p>Destinazione: <?php echo "$viaggio[luogo]" ?></p>
        <p>Prezzo: <?php echo "$viaggio[prezzo]" ?> €</p>
        <p>Data Inizio: <?php echo "$viaggio[data_inizio]" ?></p>
        <p>Data Fine: <?php echo "$viaggio[data_fine]" ?></p>

        <a href="listaViaggi.php" class="lista">VAI NELLA TUA LISTA</a>


      </div>

    </div>
    <main>
  </body>
</html>
