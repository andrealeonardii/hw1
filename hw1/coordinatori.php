<?php
    include 'auth.php';
    if (checkAuth() || checkAuthCoord()) {
        header('Location: index.php');
        exit;
    }

    if (!empty($_POST["username_coor"]) && !empty($_POST["password_coor"]) )
    {

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username_coor']);
        $password = mysqli_real_escape_string($conn, $_POST['password_coor']);

        $query = "SELECT * FROM coordinatore WHERE username = '".$username."' AND password = '".$password."' ";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;

        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
                $_SESSION["_agora_username_coordinatore"] = $entry['username'];
                $_SESSION["_agora_coordinatore_id"] = $entry['id'];
                header("Location: index.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username_coor"]) || isset($_POST["password_coor"])) {
        $error = "Inserisci username e password.";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='coordinatori.css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi</title>
    </head>
    <body>
      <div id="logo" >
        <a href='index.php'><img class="siVolaImg" src="img/sivolablack.png" alt=""></a>
      </div>
        <main class="login">
        <section class="main">
            <h5>Sei un coordinatore, Accedi</h5>
            <?php
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }

            ?>
            <form name='login' method='post'>
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username_coor' <?php if(isset($_POST["username_coor"])){echo "value=".$_POST["username_coor"];} ?>>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password_coor' <?php if(isset($_POST["password_coor"])){echo "value=".$_POST["password_coor"];} ?>>
                </div>
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>
            </form>
            <h4>Se vuoi diventare un coordinatore contattaci sui social</h4>
        </section>
        </main>
    </body>
</html>
