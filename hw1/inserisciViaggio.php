<?php
    require_once 'auth.php';

    if (checkAuthCoord()==0) {
        header("Location: index.php");
        exit;
    }


    $controlla=0;
      if (!empty($_POST["nome"]) && !empty($_POST["luogo"]) && !empty($_POST["prezzo"]) && !empty($_POST["dataInizio"]) &&
        !empty($_POST["dataFine"]) && !empty($_POST["descrizione"]))
      {
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


        if (strlen($_POST["nome"]) == 0) {
            $error[] = "Inserisci il nome";
        }
        if (strlen($_POST["luogo"]) ==0) {
            $error[] = "Inserisci la destinazione";
        }
        if ($_POST["prezzo"] <= 0) {
            $error[] = "Prezzo non corretto";
        }
        if ($_POST["dataInizio"] > $_POST["dataFine"]) {
            $error[] = "Controlla le date";
        }
        if (strlen($_POST["descrizione"]) == 0) {
            $error[] = "Inserisci una descrizone";
        }


        if (count($error) == 0) {
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $luogo = mysqli_real_escape_string($conn, $_POST['luogo']);
            $prezzo = mysqli_real_escape_string($conn, $_POST['prezzo']);
            $dataInizio = mysqli_real_escape_string($conn, $_POST['dataInizio']);
            $dataFine = mysqli_real_escape_string($conn, $_POST['dataFine']);
            $descrizione = mysqli_real_escape_string($conn, $_POST['descrizione']);



            $query = "INSERT INTO Viaggio(nome, luogo, prezzo, descrizione, data_inizio, data_fine) VALUES('$nome', '$luogo', '$prezzo', '$descrizione', '$dataInizio', '$dataFine')";

            if (mysqli_query($conn, $query)) {
                mysqli_close($conn);
                $controlla=1;
                header("Location: index.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
      }else if(isset($_POST["nome"])) {
          $error = array('Riempi tutti i campi');
      }
?>


<html>
    <head>
        <link rel='stylesheet' href='inserisciViaggio.css'>
        <script src='inserisciViaggio.js' defer></script>

        <title>InserisciViaggio - SiVola</title>
    </head>
    <body>
      <div id="logo" >
        <a href='index.php'><img class="siVolaImg" src="img/sivolablack.png" alt=""></a>
      </div>
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Inserisci i dati per creare un nuovo viaggio </h1>
            <form name='' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="names">
                    <div class="nome">
                        <label for='nome'>Nome</label>
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con
                            i valori precedentemente inseriti -->
                        <input type='text' name='nome' <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?> >
                        <div><span>Devi inserire il nome del viaggio</span></div>
                    </div>
                    <div class="luogo">
                        <label for='luogo'>Destinazione</label>
                        <input type='text' name='luogo' <?php if(isset($_POST["luogo"])){echo "value=".$_POST["luogo"];} ?> >
                        <div><span>Devi inserire il luogo del viaggio</span></div>
                    </div>
                </div>
                <div class="prezzo">
                    <label for='prezzo'>Prezzo del Viaggio</label>
                    <input type='number' name='prezzo' <?php if(isset($_POST["prezzo"])){echo "value=".$_POST["prezzo"];} ?>>
                    <div><span>Devi inserire il prezzo del viaggio</span></div>
                </div>
                <div class="descrizione">
                    <label for='descrizione'>Descrizione Viaggio</label>
                    <input type='text' name='descrizione' <?php if(isset($_POST["descrizione"])){echo "value=".$_POST["descrizione"];} ?>>
                    <div><span>Inserisci una descrizione</span></div>
                </div>
                <div class="dataInizio">
                    <label for='dataInizio'>Dal: </label>
                    <input type='date' name='dataInizio' <?php if(isset($_POST["dataInizio"])){echo "value=".$_POST["dataInizio"];} ?>>
                    <div><span>Controlla la data</span></div>
                </div>
                <div class="dataFine">
                    <label for='dataFine'>Al: </label>
                    <input type='date' name='dataFine' <?php if(isset($_POST["dataFine"])){echo "value=".$_POST["dataFine"];} ?>>
                    <div><span>Controlla la data</span></div>
                </div>

                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><span>".$err."</span></div>";
                    }
                } ?>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
        </section>
        </main>
    </body>
</html>
