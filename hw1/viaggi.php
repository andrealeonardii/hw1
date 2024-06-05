<?php
    include 'auth.php';


        require_once 'dbconfig.php';

        // Connetti al database
        $conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        // Controlla la connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM viaggio";
        $result = $conn->query($sql);

        $viaggi = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $viaggi[] = $row;
            }
        } else {
            die('Nessun viaggio trovato.');
        }

        // Chiudi la connessione
        $conn->close();

?>

<html>
    <head>
      <link rel='stylesheet' href='viaggi.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Viaggio</title>
    </head>
    <body>
      <div id="logo" >
        <a href='index.php'><img class="siVolaImg" src="img/sivolablack.png" alt=""></a>
      </div>

        <?php

        if (checkAuthCoord()) {
            echo "<div class='divCoor'>";
            echo "<a href='inserisciViaggio.php' class='coor'>INSERISCI UN NUOVO VIAGGIO</a>";
            echo "</div>";
        }

         ?>

          <div class="main">
            <h1>Ecco la lista delle esperienze che proponiamo</h1>
          </div>



          <?php

            echo "<div class='container-viaggi'>";
            foreach ($viaggi as $viaggio) {
                $data_inizio = $viaggio['data_inizio'];
                $data_fine = $viaggio['data_fine'];
                $data_inizio_dt = new DateTime($data_inizio);
                $data_fine_dt = new DateTime($data_fine);
                $durata = date_diff($data_inizio_dt, $data_fine_dt);
                $durata_formattata = $durata->format('%a giorni');

                echo "<a id='flex-container-viaggio' class='viaggio' style='background-image: url(\"img/{$viaggio['luogo']}.jpg\");' href='viaggio.php?id={$viaggio['id']}'>";
                echo "<div class='flex-item-viaggio'>";
                echo "<h1 class='nomeViaggio'>{$viaggio['nome']}</h1>";
                echo "<img src='img/calendario.png' class='imgCalendario'>";
                echo "<span class='durataViaggio'> $durata_formattata</span>";
                echo "</div>";
                echo "<h1 class='flex-item-viaggio prezzoViaggio'>{$viaggio['prezzo']}€</h1>";
                echo "</a>";
            }
            echo "</div>";

           ?>


    </body>
</html>
