<html>
  <head>
    <title>Logger Ud</title>
  </head>

  <body>
    <h2>Vi logger dig ud...</h2>
    <?php
    session_start();

    if ($_POST['Logout']) {
      session_destroy();
      header('location:Login.html');
    }
    ?>
</body>
</html>