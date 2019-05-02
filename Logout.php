<html>
  <head>
    <title>Logger Ud</title>
  </head>

  <body>
    <h2>Vent venligst imens vi logger dig ud...</h2> <!-- Skulle det tage noget tid for dem at logge ud, popper denne besked op -->
    <?php
    session_start();

    if ($_POST['Logud']) { // 'Logout' referere til Hjemmeside.php's logout knap name 'Logud'
      session_destroy();
      header('location:Login.html');
    }
    ?>
</body>
</html>
