<?php
    require_once 'auth.php';
    require_once 'dbconfig.php';

    // Connetti al database
    $conn = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    // Controlla la connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM viaggio LIMIT 4";
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
<html >
 <body>

  <head>
    <title>Andrea Leonardi mhw3</title>
    <link rel="stylesheet" href="hw1.css">
    <script src="hw1.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Hind+Vadodara&display=swap" rel="stylesheet">
  </head>


    <div class="hidden" id="divNascosto">

      <section id="flex-container-footer" class="sectionNascosta">

        <div id="flex-container-footer1-0" class="flex-item-footer">

            <div id="flex-container-footer1" class="flex-item-footer1-0">
              <div class="divFoot">

                <h1 class="h1Footer">Il mio account</h1>

                  <p>
                    <a class="aFoot"href="signup.php">Registrati</a>
                    <br>
                    <a class="aFoot"href="login.php">Login</a>
                    <br>
                  </p>

              </div>
              <div class="divFoot">
                <h1 class="h1Footer">Info utili</h1>
                <p>

                  <a class="aFoot"href="">Contattaci</a>
                  <br>
                  <a class="aFoot"href="">Termini e condizioni</a>
                  <br>
                  <a class="aFoot"href="">Condizioni generali di vendita pacchetti turistici</a>
                  <br>
                  <a class="aFoot"href="">Condizioni assicurative Privaci Policy</a>
                </p>

              </div>
            </div>
            <div id="flex-container-footer1" class="flex-item-footer1-0">
              <div class="divFoot">

                <h1 class="h1Footer">Il team</h1>
                <p id="tuttiIcoordinatori">
                  <a class="aFoot"href="">Nicolò Balini</a>
                  <br>
                  <a class="aFoot"href="">Carlo J Laurora</a>
                  <br>
                  <a class="aFoot"href="">Daniel Mazza</a>
                  <br>
                </p>
                <p>
                  <a class="aFoot linkVerdi mostraDiPiu"href="">Mostra di Più </a>
                </p>

              </div>
              <div class="divFoot">
                <h1 class="h1Footer">Seguici</h1>
                <p>
                  <a href=""><img class="socialImg2"src="img/instagramWhite.png"/></a>
                  <br>
                  <a href=""><img class="socialImg2"src="img/facebookWhite.png"/></a>
                  <br>
                  <a href=""><img class="socialImg2"src="img/youtubeWhite.png"/></a>
                  <br>
                  <a href=""><img class="socialImg2"src="img/telegramWhite.png"/></a>
                </p>

              </div>
            </div>
        </div>
      </section>
    </div>

    <section id="modalView" class="hidden">

      <div class="flex-item-header naviga">

        <a data-naviga="dove" href="#">Dove</a>
        <a data-naviga="date" href="#">Date</a>
        <a data-naviga="periodo" href="#">Periodo</a>
        <a data-naviga="budget" href="#">Budget</a>
        <a data-naviga="viaggiEvento" href="#">Viaggi evento</a>
        <a data-naviga="eta" href="#">Età</a>
        <div class="dove divNaviga1">
          <input class="cerca"  type="text" placeholder="   Dove vuoi andare?" required></input>
        </div>
        <div class="date divNaviga1">
          <div id="flex-container-dataHeader">
            <div class="form-group" id="flex-container-dataHeader1">
              <div class="divDataHeader">
                <span class="active spanData" for="dateStandard1">Dal</span>
                <input type="date" id="dateStandard1" name="dateStandard1">
              </div>
              <div class="divDataHeader">
                <span class="active spanData" for="dateStandard2">Al</span>
                <input type="date" id="dateStandard2" name="dateStandard2">
              </div>
            </div>

            <div class="divAcerca">
              <button type="button" name="button" class="bCerca">
                <img class="lenteImg1" src="img/lente.png" alt="">
                <img class="lenteImg2" src="img/lenteBlack.png" alt="">

              </button>
            </div>
          </div>

        </div>
        <div class="periodo divNaviga1">

          <select name="periodo" class="selectHeader">
            <option selected disabled>  Seleziona un periodo...</option>
            <option> Viaggi di gruppo in Primavera</option>
            <option> Viaggi di gruppo in Estate</option>
            <option> Viaggi di gruppo in Autunno</option>
            <option> Viaggi di gruppo in Inverno</option>
          </select>

        </div>
        <div class="budget divNaviga1" >

          <div id="flex-container-btnHeaderBudget">

            <span class="spanHeaderBudget">Budget</span>
            <div class="divBtnHeader">
              <button class="btnHeader"><1000</button>
              <button class="btnHeader">1200|2000</button>
              <button class="btnHeader">2000|2500</button>
              <button class="btnHeader">2500|3000</button>
              <button class="btnHeader">3000+</button>
            </div>

          </div>
          <div id="divBudget">

            <select name="periodo" class="selectBudget">
              <option selected disabled>  Scegli il budget...</option>
              <option> Fino a 1200€</option>
              <option> Da 1200 a 2000€</option>
              <option> Da 2000 a 2500€</option>
              <option> Oltre 3000€</option>
            </select>

          </div>


        </div>
        <div class="viaggiEvento divNaviga1">

          <select name="viaggieEvento" class="selectHeader">
            <option selected disabled>  Scegli un Viaggio Evento</option>
            <option> New York con Davide Patron</option>
            <option> New York con Mocho</option>
          </select>

        </div>
        <div class="eta divNaviga1">

          <select name="eta" class="selectHeader">
            <option selected disabled>  Scegli con chi partire</option>
            <option> Libero</option>
            <option> 18-40 anni</option>
          </select>

        </div>

    </section>

    <div class="navheader">

      <nav id="flex-container-nav" >
        <div id="flex-container-nav1" class="divnav">
            <div class="flex-item-nav hamburgerMenuDiv"  >
                <img class="hamburgerMenuImg"src="img/hamburger.png" />
            </div>
            <a class="flex-item-nav anav" href="viaggi.php">viaggi</a>
            <a class="flex-item-nav anav mediaNav" href="coordinatori.php">coordinatori</a>
            <a class="flex-item-nav anav mediaNav" href="">about</a>
        </div>

        <div class="divnav">
          <a  href="" >
              <img class=" siVolaImg"src="img/sivola.png">
          </a>
        </div>

        <div id="flex-container-nav2" class="divnav">

                <img class="flex-item-nav lenteImg"src="img/lente.png"/>

            <span class="separatore-nav" >|</span>
            <a class="flex-item-nav anav" href="login.php" target="_self">
              <?php

                if (checkAuth()==0 && checkAuthCoord()==0) {

                    echo "<span class='span-nav mediaNav'>login</span>";
                    echo "<img class='profileImg'src='img/profile.png'/>";
                  }else {
                    echo "<a href='logout.php' class='span-nav mediaNav'>logout</a>";
                  }


              ?>
            </a>
            <a class="flex-item-nav anav" href="listaViaggi.php" target="_self">
                <img class='profileImg'src='img/lista.png'/>
            </a>

        </div>
      </nav>

      <header id="flex-container-header">
        <h1 class="flex-item-header scrittaCentrale">Travelling the Human way</h1>

        <div class="flex-item-header naviga">

          <a data-naviga="dove" href="#">Dove</a>
          <a data-naviga="date" href="#">Date</a>
          <a data-naviga="periodo" href="#">Periodo</a>
          <a data-naviga="budget" href="#">Budget</a>
          <a data-naviga="viaggiEvento" href="#">Viaggi evento</a>
          <a data-naviga="eta" href="#">Età</a>
          <div class="dove divNaviga">
            <input class="cerca"  type="text" placeholder="   Dove vuoi andare?" required></input>
          </div>
          <div class="date divNaviga">
            <div id="flex-container-dataHeader">
              <div class="form-group" id="flex-container-dataHeader1">
                <div class="divDataHeader">
                  <span class="active spanData" for="dateStandard1">Dal</span>
                  <input type="date" id="dateStandard1" name="dateStandard1">
                </div>
                <div class="divDataHeader">
                  <span class="active spanData" for="dateStandard2">Al</span>
                  <input type="date" id="dateStandard2" name="dateStandard2">
                </div>
              </div>

              <div class="divAcerca">
                <button type="button" name="button" class="bCerca">
                  <img class="lenteImg1" src="img/lente.png" alt="">
                  <img class="lenteImg2" src="img/lenteBlack.png" alt="">

                </button>

              </div>

            </div>

          </div>
          <div class="periodo divNaviga">

            <select name="periodo" class="selectHeader">
              <option selected disabled>  Seleziona un periodo...</option>
              <option> Viaggi di gruppo in Primavera</div></option>
              <option> Viaggi di gruppo in Estate</option>
              <option> Viaggi di gruppo in Autunno</option>
              <option> Viaggi di gruppo in Inverno</option>
            </select>

          </div>
          <div class="budget divNaviga" >

            <div id="flex-container-btnHeaderBudget">

              <span class="spanHeaderBudget">Budget</span>
              <div class="divBtnHeader">
                <button class="btnHeader"><1000</button>
                <button class="btnHeader">1200|2000</button>
                <button class="btnHeader">2000|2500</button>
                <button class="btnHeader">2500|3000</button>
                <button class="btnHeader">3000+</button>
              </div>

            </div>
            <div id="divBudget">

              <select name="periodo" class="selectBudget">
                <option selected disabled>  Scegli il budget...</option>
                <option> Fino a 1200€</option>
                <option> Da 1200 a 2000€</option>
                <option> Da 2000 a 2500€</option>
                <option> Oltre 3000€</option>
              </select>

            </div>


          </div>
          <div class="viaggiEvento divNaviga">

            <select name="viaggieEvento" class="selectHeader">
              <option selected disabled>  Scegli un Viaggio Evento</option>
              <option> New York con Davide Patron</option>
              <option> New York con Mocho</option>
            </select>

          </div>
          <div class="eta divNaviga">

            <select name="eta" class="selectHeader">
              <option selected disabled>  Scegli con chi partire</option>
              <option> Libero</option>
              <option> 18-40 anni</option>
            </select>

          </div>

        </div>
      </header>
    </div>

    <div class="bigImg"></div>

    <?php
      echo "<section id='flex-container-viaggi'>";
      $counter=0;
              foreach ($viaggi as $viaggio){
                if ($counter==2) {
                  echo "</section>";
                  echo "<section id='flex-container-viaggi'>";
                  $counter=0;
                }
                $data_inizio = $viaggio['data_inizio']; //
                $data_fine = $viaggio['data_fine']; //
                // Converti le stringhe delle date in oggetti DateTime
                $data_inizio_dt = new DateTime($data_inizio);
                $data_fine_dt = new DateTime($data_fine);
                // Calcola la differenza tra le date
                $durata = date_diff($data_inizio_dt, $data_fine_dt);
                // Formatta la durata
                $durata= $durata->format(' %a giorni');

                echo "<a id='flex-container-viaggio' class='container' style='background-image: url(\"img/$viaggio[luogo].jpg\");' href='viaggio.php?id=$viaggio[id]'>";
                echo "<div class='flex-item-viaggio'>";
                echo "<h1 class='nomeViaggio'>$viaggio[nome]</h1>";
                echo "<img src='img/calendario.png' class='imgCalendario'>";
                echo "<span class='durataViaggio'> $durata</span>";
                echo "</div>";
                echo "<h1 class='flex-item-viaggio prezzoViaggio'>$viaggio[prezzo]€</h1>";
                echo "</a>";
                $counter++;
              }
          echo "</section>";
    ?>

    <div class="containerBtn">
      <button class="btnViaggi" id="btnViaggi">Scopri tutti i viaggi</button>
    </div>

    <div class="api">
      <h1 class="scritta2">Cerca album musicali da ascoltare in viaggio</h1>
      <form id="formApiToken">
        <input class="inputApi" type="text" placeholder="  Inserisci Album" required id='album'></input>
        <br>
        <input type='submit' id='submitApi' value='Cerca'>
      </form>

    <section id="album-view">

    </section>


    </div>

    <div class="containerCoordinatori">
      <h1 class="scritta1">I nostri coordinatori</h1>
      <span class="scritta2">Un team di viaggiatori professionisti.</span>
      <div class="containerBtn">
        <button class="btnCoordinatori">Scopri i coordinatori</button>
      </div>
    </div>

    <div class="api">
      <h1 class="scritta2">Controlla il Meteo odierno</h1>

    <form id="formApiKey">
      <input class="inputApi" type="text" placeholder="  Inserisci città" required id='citta'></input>
      <br>
      <input type='submit' id='submitApi' value='Cerca'>
    </form>

    <section id="meteo-view">

    </section>

    </div>

    <section id="flex-container-social">

      <h1 class="scrittaSiVola">#sivola</h1>
      <div >
          <a class="flex-item-nav" href="" >
            <img class="socialImg"src="img/instagram.png"/>
          </a>
          <a class="flex-item-nav" href="" >
            <img class="socialImg"src="img/facebook.png"/>
          </a>
          <a class="flex-item-nav" href="">
            <img class="socialImg"src="img/youtube.png"/>
          </a>
          <a class="flex-item-nav" href="" >
            <img class="socialImg"src="img/telegram.png"/>
          </a>

      </div>

    </section>

  <footer>
        <a  href="" >
            <img class="sivolaFooter"src="img/sivola.png">
        </a>

    <section id="flex-container-footer">

      <div id="flex-container-footer1-0" class="flex-item-footer">

          <div id="flex-container-footer1" class="flex-item-footer1-0">
            <div class="divFoot">

              <h1 class="h1Footer">Quando vuoi partire?</h1>

                <p>
                  <a class="aFoot"href="">Viaggi di gruppo Gennaio</a>
                  <br>
                  <a class="aFoot"href="">Viaggi di gruppo Febbraio</a>
                  <br>
                  <a class="aFoot"href="">Viaggi di gruppo Marzo</a>
                  <br>
                  <a class="aFoot"href="">Viaggi di gruppo Aprile</a>
                  <br>
                  <a class="aFoot"href="">Viaggi di gruppo Maggio</a>
                  <br>
                  <a class="aFoot"href="">Viaggi di gruppo Giugno</a>
                </p>

            </div>
            <div class="divFoot">
              <h1 class="h1Invisible">Invisble h1</h1>
              <p>
                <a class="aFoot"href="">Viaggi di gruppo Luglio</a>
                <br>
                <a class="aFoot"href="">Viaggi di gruppo Agosto</a>
                <br>
                <a class="aFoot"href="">Viaggi di gruppo Settembre</a>
                <br>
                <a class="aFoot"href="">Viaggi di gruppo Ottobre</a>
                <br>
                <a class="aFoot"href="">Viaggi di gruppo Novembre</a>
                <br>
                <a class="aFoot"href="">Viaggi di gruppo Dicembre</a>
              </p>

            </div>
          </div>
          <div id="flex-container-footer1" class="flex-item-footer1-0">
            <div class="divFoot">

              <h1 class="h1Footer">Il team</h1>
              <p>
                <a class="aFoot"href="">Nicolò Balini</a>
                <br>
                <a class="aFoot"href="">Carlo J Laurora</a>
                <br>
                <a class="aFoot"href="">Daniel Mazza</a>
                <br>
                <a class="aFoot"href="">Stefano Cantarini</a>
                <br>
                <a class="aFoot"href="">Claudio Pelizzeni</a>
                <br>
                <a class="aFoot linkVerdi"href="">Tutti i coordinatori ></a>
              </p>

            </div>
            <div class="divFoot">

              <h1 class="h1Footer">Info utili</h1>
              <p>
                <a class="aFoot"href="">Faq</a>
                <br>
                <a class="aFoot"href="">Il Blog</a>
                <br>
                <a class="aFoot"href="">Contattaci</a>
                <br>
                <a class="aFoot"href="">Termini e condizioni</a>
                <br>
                <a class="aFoot"href="">Condizioni generali di vendita pacchetti turistici</a>
                <br>
                <a class="aFoot"href="">Condizioni assicurative Privaci Policy</a>
              </p>

            </div>
          </div>

            <div class="flex-item-footer1-1">

              <h1 class="h1Footer">Seguici</h1>
              <p>
                <a href=""><img class="socialImg2"src="img/instagramWhite.png"/></a>
                <br>
                <a href=""><img class="socialImg2"src="img/facebookWhite.png"/></a>
                <br>
                <a href=""><img class="socialImg2"src="img/youtubeWhite.png"/></a>
                <br>
                <a href=""><img class="socialImg2"src="img/telegramWhite.png"/></a>

              </p>

            </div>

      </div>

      <div id="flex-container-footer2" class="flex-item-footer">
        <p class="infoFooter">© 2019 SiVola S.r.l. - P.I. 08326410720 - Via Gioacchino Rossini, 20 - 76125, Trani (BT)
          - Socio Unico - capitale sociale versato 1.000.000,00 € - Licenza concessa dalla Regione Puglia
          L.r. 15 novembre 2007, n. 34 come modificata dalla L.r. 18 febbraio 2014 n. 6; L. n. 241/1990,
          art. 19 – SCIA Protocollo n. 33779 del 25 Luglio 2019 - Fondo di Garanzia n° A/229.2626/2/2019/R
          - Copertura assicurativa con Compagnia UNIPOLSAI 1/10346/319/176473762 - <a class="linkVerdi"href="">Privacy policy</a> -<a class="linkVerdi" href="#">Preferenze cookie</a> </p>
        <span class="meriti">-Realizzato da Andrea Leonardi-</span>
      </div>

    </section>
  </footer>
  </body>
</html>
