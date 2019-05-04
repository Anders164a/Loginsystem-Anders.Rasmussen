<html>
  <head>
    <title>Logger Ud</title>
    <link rel="stylesheet" type="text/css" href="Startside_Registrerstyle.css">
  </head>

  <body>
    <h2>Vent venligst imens vi logger dig ud...</h2> <!-- Skulle det tage noget tid for dem at logge ud, kan de se denne besked -->
    <?php
      session_start();

      if ($_POST['Logud']) { // 'Logud' referere til Hjemmeside.php's logout knap name 'Logud'
        session_destroy();
        header('location:Startside.html');
      }
    ?>
  </body>
</html>
