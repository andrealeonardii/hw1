<?php
    require_once 'auth.php';
    require_once 'dbconfig.php';
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
        die('ID viaggio non valido.');
    }

    // Chiudi la connessione
    $conn->close();
?>
<html>
    <head>
      <link rel='stylesheet' href='viaggio.css'>
      <script src="viaggio.js" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Viaggio</title>
    </head>
    <body>
      <div id="logo" >
        <a href='index.php'><img class="siVolaImg" src="img/sivolablack.png" alt=""></a>
      </div>
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

            <a href="aggiungiViaggio.php?id=<?php echo "$viaggio[id]"; ?>" class="carrello">AGGIUNGI ALLA LISTA DEI VIAGGI</a>


          </div>

        </div>
        <p class="descrizione"><?php echo "$viaggio[descrizione]" ?></p>



        <div class="api">
          <h1 class="scritta2">Controlla il Meteo Odierno in <?php echo "$viaggio[luogo]" ?></h1>

        <form id="formApiKey">

          <input type='submit' value="CERCA" id="<?php echo "$viaggio[luogo]" ?>" >

        </form>

        <section id="meteo-view">

        </section>

        </div>

    </body>
</html>
