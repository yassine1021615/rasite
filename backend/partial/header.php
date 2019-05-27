<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset= "utf-8">
      <meta http-equiv="language" content="NL">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Maikel Braas">
      <meta name="keywords" content="html,css-- mijn eigen website">
      <title>Ra site</title>
      <link rel="stylesheet" href="../css/back.css">
  </head>
  <body>
    <header>
      <a href="../index.php"><img src="../image/logo.jpg"></a>
      <p>
      <?php session_start();
        echo 'Welkom ' . $_SESSION['username'] . ', je activiteiten worden bijgehouden.';
       ?>

     </p>
      <a href="logout.php" class="btn-cus">Logout</a>
    </header>
    <section class="container">
      <div id="sidebar">
        <span>
          <h2>Standaard</h2>
          <a href="gebruikers.php?page=1">Gebruikers</a>
          <a href="tickets.php?page=1&status=0">Tickets</a>
        </span>
        <span>
          <?php if($_SESSION['user_rights'] = 1){ ?>
            <h2>Web-Master</h2>
            <a href="add.php">Gebruiker Toevoegen</a>
            <a href="addTicket.php">Ticket Toevoegen</a>
          <?php } ?>
        </span>
        <span>
          <?php if($_SESSION['user_rights'] = 2){ ?>
            <h2>Admin</h2>
            <a href="verweiderdeGebruikers.php?page=1">Verweiderde Gebruikers</a>
            <a href="logs.php?page=1">Logs</a>
          <?php } ?>
        </span>
      </div>