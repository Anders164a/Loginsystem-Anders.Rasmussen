<html>
  <head>
    <title>Loginsystem</title>
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

            $NyBruger = "INSERT INTO Brugere (Brugernavn, Password) VALUES ('$Nyt_Brugernavn', '$Nyt_Password')";

            if (mysqli_query($conn, $NyBruger)) {
              echo "Din bruger er nu sat op!";
            }
            elseif ($Nyt_Brugernavn ==  && $Nyt_Password == "'Brugere' (Password)" {
              echo "Brugernavn eller Password kan ikke godkendes, du bedes vælge et andet!";
            }
            else {
              echo "Noget gik galt, prøv igen om lidt!" . "<br>" . $NyBruger . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
            ?>
            <form action="Login.html" method="post">
              <button type="Submit">Logind Side</button>
            </form>
  </body>
</html>
