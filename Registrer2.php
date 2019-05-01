<html>
  <head>
    <title>Loginsystem</title>
  </head>

  <body>

      <h2>Din bruger er nu sat op!</h2>

      <form action="Login.html" method="post">
        <button type="Submit">Logind Side</button>
      </form>

            <?php
            session_start();
            $Nyt_Brugernavn=$_POST["BrugernavnRegistrer"];
            $Nyt_Password=$_POST["PasswordRegistrer"];



            $NyBruger = "INSERT INTO 'Brugere'('ID', 'Brugernavn', 'Password') VALUES ('', '$Nyt_Brugernavn', '$Nyt_Password')";

            session_destroy();
            ?>
  </body>
</html>
