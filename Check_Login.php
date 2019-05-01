<html>
  <head>
    <title>Finder Bruger</title>
  </head>

    <body>
      <h4>Vent venligst, imens vi gør dig klar!</h4>

      <?php

      session_start();
      $host="Localhost";
      $username = "root";
      $password = "";
      $db_name="Login";
      $tbl_name="Login";

      $conn = mysqli_connect($host, $username, $password, $db_name);

      if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
      }

      $my_username=$_POST["username"];
      $my_password=$_POST["password"];

      $sql = "SELECT * FROM $tbl_name WHERE username='$my_username' AND password='my_password'";
      $resultat = mysqli_query($conn, $sql);

      $count=mysqli_num_rows($resultat);

      if ($count == 1) {
        $_SESSION['Login'] = true;
        header('location:Correct_Login.php');
      }
      else {
        echo "Forkert brugernavn eller password!";
      }

      $conn->close();

      ?>
    </body>
</html>
