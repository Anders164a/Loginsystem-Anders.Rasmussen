<html>
  <head>
    <title>Logger ind...</title>
    <link rel="stylesheet" type="text/css" href="Startside_Registrerstyle.css">
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

      $row = mysqli_fetch_assoc($resultat);
        $Check_Brugernavn = $row['Brugernavn']; //Den tjekker alle værdier under databasen's kolonne 'Brugernavn'
        $Check_Password = $row['Password']; //Den tjekker alle værdier under databasen's kolonne 'Password'
        $Check_Email = $row['Email']; //Den tjekker alle værdier under databasen's kolonne 'Email'


      if (($Mit_Brugernavn === $Check_Brugernavn || $Mit_Brugernavn === $Check_Email) && $Mit_Password === $Check_Password) { // Her sikre vi os, at Brugernavnet eller Emailen, hører til det samme password. Så man ikke kan logge ind med éns brugernavn men en andens password
        if (mysqli_num_rows($resultat) > 0) { // Er der én bruger med det Brugernavn/Email & Password, bliver personen sendt videre
          echo "Vent venligst imens vi gør dig klar!";
          $_SESSION['Login'] = true;
          header('location:Hjemmeside.php');
        }
      }
      else { // Er der ingen brugere med det Brugernavn/Email, Password, bliver de ikke sendt videre, og kan prøve igen ved at klikke på knappen, eller gå hend til registrer.
        echo "Forkert Brugernavn, Password eller Email!";
        echo "<form action=" . 'Startside.html' . " method=" . 'post' . ">";
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
