<html>
  <head>
    <title>Hjemmeside</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('button').click(function() {
          $('ul').toggleClass('active')
        })
      })
    </script>

  </head>
  <header>
    <div class="dropdown">
      <button>Shortcuts!</button>
      <ul>
        <li><a href="https://www.ordbogen.com/da/" target="_blank">Ordbogen</a></li>
        <li><a href="http://gmail.com" target="_blank">Gmail</a></li>
        <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
      </ul>
    </div>
  </header>
    <?php
    session_start();

    if (!isset($_SESSION['Login'])) {
      header('location:Login.html');
    }
    ?>





    <br><br>
    <form action="Logout.php" method="post"> <!-- Har de lyst til at logge ud kan de det -->
      <input type="submit" name="Logout" value="Log Ud">
    </form>

<footer>
  <p>Har du spørgsmål el. lign. Er du velkommen til at kontakte mig!</p>
  <a href="mailto:Anders164a@gmail.com">Send Mail</a>
  <br>

</footer>

  </body>
</html>
