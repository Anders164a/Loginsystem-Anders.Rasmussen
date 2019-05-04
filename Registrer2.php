<html>
  <head>
    <title>Registrer!</title>
    <link rel="stylesheet" type="text/css" href="Startside_Registrerstyle.css">
  </head>

  <body>
    <?php
      session_start();
      $host="localhost";
      $username = "root";
      $password = "";
      $db_name="Hjemmeside";
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

      if (strlen($Ny_Email) >= 7 && strlen($Ny_Email) <= 40) {
        if (substr_count($Ny_Email, "@") == 1) {
          if (strstr($Ny_Email, ".dk") == ".dk" || strstr($Ny_Email, ".com") == ".com" || strstr($Ny_Email, ".net") == ".net" || strstr($Ny_Email, ".org") == ".org") { //Emailen skal slutte på én af de 4 valgmuligheder
            if (mysqli_num_rows($conn_Email) > 0) { //Findes Emailen allerede i databasen, vil den sige "Email er allerede taget!";
              echo "Email er allerede taget!", "<br>", "<br>";
              echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
              echo "<button type=" . 'submit' . ">Tilbage</button>";
              echo "</form>";
            }
            else {
              $NyBruger = "INSERT INTO Brugere (Brugernavn, Password, Email) VALUES ('$Nyt_Brugernavn', '$Nyt_Password', '$Ny_Email')";
              $results = mysqli_query($conn, $NyBruger);
              echo "Din bruger er nu sat op!", "<br>", "<br>";
              echo "<form action=" . 'Startside.html' . " method=" . 'post' . ">";
              echo "<button type=" . 'submit' . ">Log-ind Side</button>";
              echo "</form>";
            }
          }
          else {
            echo "Din Email skal slutte på én af de her .dk, .com, .net eller .org", "<br>", "<br>";
            echo "<form action=" . 'Registrer.html'." method=" . 'post' . ">";
            echo "<button type=" . 'submit' . ">Tilbage</button>";
            echo "</form>";
          }
        }
        else {
          echo "Der skal være ét @ i din Email", "<br>", "<br>";
          echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
          echo "<button type=" . 'submit' . ">Tilbage</button>";
          echo "</form>";
        }
      }
      else {
        echo "Din Email skal være på 7-40 tegn", "<br>", "<br>";
        echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
        echo "<button type=" . 'submit' . ">Tilbage</button>";
        echo "</form>";
      }

      mysqli_close($conn);
    ?>
  </body>
</html>
