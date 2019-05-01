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

      $Mit_Brugernavn=$_POST['Brugernavn']; //'Brugernavn' referere til Login.html's name 'Brugernavn'
      $Mit_Password=$_POST['Password']; //'Password' referere til Login.html's name 'Password'
      $Min_Email=$_POST['Email']; //'Email' referere til Login.html's name 'Email'

      $Log_Ind = "SELECT * FROM $tbl_name WHERE brugernavn='$Mit_Brugernavn' AND password='$Mit_Password' AND email='$Min_Email'";
      $resultat = mysqli_query($conn, $Log_Ind);

      $count = mysqli_num_rows($resultat);

      if ($count == 1) { // Er der én bruger med det Brugernavn, Password & Email, bliver personen sendt videre
        echo "Vent venligst imens vi gør dig klar!";
        $_SESSION['Login'] = true;
        header('location:Hjemmeside.php');
      }
      else { // Er der ingen brugere med det Brugernavn, Password eller Email, bliver de ikke sendt videre, og kan prøve igen ved at klikke på knappen.
        echo "Forkert Brugernavn, Password eller Email!";
      }

      $conn->close();
      ?>

      <br><br>
      <form action="Login.html" method="post">
      <button type="Submit">Prøv Igen!</button>
      </form>

    </body>
</html>
