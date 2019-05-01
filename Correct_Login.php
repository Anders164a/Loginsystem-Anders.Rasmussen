<html>
  <head>
    <title></title>
  </head>

  <body>
    <?php
    session_start();

    if (!isset($_SESSION['Login'])) {
      header('location:Login.html');
    }

    echo "Velkommen!";
    ?>

    <br>
    <br>
    <form action="Logout.php" method="post"> // Har de lyst til at logge ud kan de det
      <input type="submit" name="Logout" value="Log Ud">
    </form>
  </body>
</html>
