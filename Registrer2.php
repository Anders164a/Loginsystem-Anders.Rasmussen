<html>
  <head>
    <title>Registrer!</title>
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
          if (strstr($Ny_Email, ".dk") == ".dk") {
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
          elseif (strstr($Ny_Email, ".com") == ".com") {
            if (mysqli_num_rows($conn_Email) > 0) { // Er der flere der har samme Email med .com, vil den sige "Email er allerede taget!";
              echo "Email er allerede taget!";
              echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
              echo "<button type=" . 'submit' . ">Tilbage</button>";
              echo "</form>";
            }
            else {
              $NyBruger = "INSERT INTO Brugere (Brugernavn, Password, Email) VALUES ('$Nyt_Brugernavn', '$Nyt_Password', '$Ny_Email')";
              $results = mysqli_query($conn, $NyBruger);
              echo "Din bruger er nu sat op!";
              echo "<form action=" . 'Login.html' . " method=" . 'post' . ">";
              echo "<button type=" . 'submit' . ">Log-ind Side</button>";
              echo "</form>";
            }
          }
          else {
            echo "Email ikke tilladt. Skal slutte på .dk eller .com";
            echo "<form action=" . 'Registrer.html'." method=" . 'post' . ">";
            echo "<button type=" . 'submit' . ">Tilbage</button>";
            echo "</form>";
          }
        }
        else {
          echo "Email ikke tilladt. Der skal være præcis 1 @";
          echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
          echo "<button type=" . 'submit' . ">Tilbage</button>";
          echo "</form>";
        }
      }
      else {
        echo "Email ikke tilladt. 7-35 tegn";
        echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
        echo "<button type=" . 'submit' . ">Tilbage</button>";
        echo "</form>";
      }

      mysqli_close($conn);
    ?>
  </body>
</html>
