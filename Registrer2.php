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

      $Nyt_Brugernavn=$_POST["BrugernavnRegistrer"];
      $Nyt_Password=$_POST["PasswordRegistrer"];
      $Ny_Email=$_POST["EmailRegistrer"];

      $db_E = "SELECT * FROM Brugere WHERE Email='$Ny_Email'";
      $conn_E = mysqli_query($conn, $db_E);

      if (strlen($Ny_Email) >= 7 && strlen($Ny_Email) <= 65){
        if (substr_count($Ny_Email, '@') == 1) {
          if (strstr($Ny_Email, ".dk") == ".dk") {
            if (mysqli_num_rows($conn_E) > 0) { // Er der flere der har samme Email, vil den sige "Email er allerede taget!";
              echo "Email er allerede taget!";
            }
            else {
              $NyBruger = "INSERT INTO Brugere (Brugernavn, Password, Email) VALUES ('$Nyt_Brugernavn', '$Nyt_Password', '$Ny_Email')";
              $results = mysqli_query($conn, $NyBruger);
              echo "Din bruger er nu sat op!";
            }
          }
          elseif (strstr($Ny_Email, ".com") == ".com") {
            if (mysqli_num_rows($conn_E) > 0) { // Er der flere der har samme Email, vil den sige "Email er allerede taget!";
              echo "Email er allerede taget!";
            }
            else {
              $NyBruger = "INSERT INTO Brugere (Brugernavn, Password, Email) VALUES ('$Nyt_Brugernavn', '$Nyt_Password', '$Ny_Email')";
              $results = mysqli_query($conn, $NyBruger);
              echo "Din bruger er nu sat op!";
            }
          }
          else {
            echo "Email ikke tilladt. Skal slutte på .dk eller .com";
          }
        }
        else {
          echo "Email ikke tilladt. Der skal være præcist 1 @";
        }
      }
      else {
        echo "Email ikke tilladt. 7-65 tegn";
      }

      mysqli_close($conn);
    ?>

    <form action="Registrer.php" method="post">
      <button type="Submit">Tilbage</button>
    </form>

  </body>
</html>
