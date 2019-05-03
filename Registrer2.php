<html>
  <head>
    <title>Registrer!</title>
    <link rel="stylesheet" type="text/css" href="Login_Registrerstyle.css">
  </head>

  <body>
    <?php
      session_start();
      $host="localhost";
      $username = "root";
      $password = "";
      $db_name="Ordbogen";
      $tbl_name="Brugere";
      $conn = mysqli_connect($host, $username, $password, $db_name);

      if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
      }

      $Nyt_Brugernavn=$_POST["BrugernavnRegistrer"]; //'BrugernavnRegistrer' referere til Registrer.html's name 'BrugernavnRegistrer'
      $Nyt_Password=$_POST["PasswordRegistrer"]; //'PasswordRegistrer' referere til Registrer.html's name 'PasswordRegistrer'
      $Ny_Email=$_POST["EmailRegistrer"]; //'Emailregistrer' referere til Registrer.html's name 'Emailregistrer'

      $db_Email = "SELECT * FROM Brugere WHERE Email='$Ny_Email'";
      $conn_Email = mysqli_query($conn, $db_Email);

      if (strlen($Ny_Email) >= 7 && strlen($Ny_Email) <= 35){
        if (substr_count($Ny_Email, "@") == 1) {
          if (strstr($Ny_Email, "@") == "gmail.dk" || strstr($Ny_Email, "@") == "gmail.com" || strstr($Ny_Email, "@") == "gmail.net" || strstr($Ny_Email, "@") == "gmail.org") { //Emailen skal være gmail, og skal slukke på én af de 4 valgmuligheder (Dette kan gøres anerledes, så det er mere effektivt. Dette var dog den mest sikre måde pt.)
            if (mysqli_num_rows($conn_Email) > 0) { // Er der flere der har samme Email .dk, vil den sige "Email er allerede taget!";
              echo "Email er allerede taget!";
              echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
              echo "<button type=" . 'submit' . ">Tilbage</button>";
              echo "</form>";
            }
            else {
              $NyBruger = "INSERT INTO Brugere (Brugernavn, Password, Email) VALUES ('$Nyt_Brugernavn', '$Nyt_Password', '$Ny_Email')";
              $results = mysqli_query($conn, $NyBruger);
              echo "Din bruger er nu sat op!", "<br>", "<br>";
              echo "<form action=" . 'Login.html' . " method=" . 'post' . ">";
              echo "<button type=" . 'submit' . ">Log-ind Side</button>";
              echo "</form>";
            }
          }
          else {
            echo "Din Email skal være gmail og skal slutte på f.x. én af de her .dk, .com, .net el. .org";
            echo "<form action=" . 'Registrer.html'." method=" . 'post' . ">";
            echo "<button type=" . 'submit' . ">Tilbage</button>";
            echo "</form>";
          }
        }
        else {
          echo "Der skal være præcis 1 @ i din Email";
          echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
          echo "<button type=" . 'submit' . ">Tilbage</button>";
          echo "</form>";
        }
      }
      else {
        echo "Din Email skal være på 7-35 tegn";
        echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
        echo "<button type=" . 'submit' . ">Tilbage</button>";
        echo "</form>";
      }

      mysqli_close($conn);
    ?>
  </body>

  <footer>
    <p>Har du spørgsmål el. lign. Er du velkommen til at kontakte mig!</p>
    <a href="mailto:Anders164a@gmail.com">Send Mail</a>
  </footer>
</html>
