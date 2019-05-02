<html>
  <head>
    <title>Logger ind...</title>
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

      $Mit_Brugernavn=$_POST['Brugernavn/Email']; //'Brugernavn/Email' referere til Login.html's name 'Brugernavn/Email'
      $Mit_Password=$_POST['Password']; //'Password' referere til Login.html's name 'Password'

      $Log_Ind = "SELECT * FROM $tbl_name WHERE brugernavn='$Mit_Brugernavn' OR Email='$Mit_Brugernavn' AND password='$Mit_Password'";
      $resultat = mysqli_query($conn, $Log_Ind);

      $count = mysqli_num_rows($resultat);

      if ($count == 1) { // Er der én bruger med det Brugernavn/Email & Password, bliver personen sendt videre
        echo "Vent venligst imens vi gør dig klar!";
        $_SESSION['Login'] = true;
        header('location:Hjemmeside.php');
      }
      else { // Er der ingen brugere med det Brugernavn/Email, Password, bliver de ikke sendt videre, og kan prøve igen ved at klikke på knappen, eller gå hend til registrer.
        echo "Forkert Brugernavn, Password eller Email!";
        echo "<form action=" . 'Login.html' . " method=" . 'post' . ">";
        echo "<button type=" . 'submit' . ">Prøv Igen!</button>";
        echo "</form>", "<br>", "<br>";
        echo "Har du ikke nogen bruger kan du registrere her!";
        echo "<form action=" . 'Registrer.html' . " method=" . 'post' . ">";
        echo "<button type=" . 'submit' . ">Registrer Her!</button>";
        echo "</form>";
      }

      $conn->close();
      ?>
    </body>
</html>
