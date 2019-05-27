<?php

require_once 'dbconfig.php';
session_start();  

if(!empty($_SESSION['username'])){
  header("Location: admin.php");
}

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST"){
	$username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);
	$password_hash = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT, array('cost'=>12));
  	$sql = "SELECT password, user_rights FROM users WHERE username = '$username'";
  	$result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(password_verify($password, $row['password'])){
  		$_SESSION['username'] = $username;
  		header('Location: admin.php');
  	}else{
  		$error = "Username or password incorrect.";
  	}
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset= "utf-8">
      <meta http-equiv="language" content="NL">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Maikel Braas">
      <meta name="keywords" content="html,css-- mijn eigen website">
      <title>Ra site</title>
      <link rel="stylesheet" href="../css/global.css">
  </head>
  <body>
    <header>
      <img src="../image/logo.jpg" />
      <nav>
        <a href="#">Home</a>
        <a href="#">Price</a>
        <a href="#">How we work</a>
        <a href="#">About Us</a>
        <a href="#">Contact</a>
      </nav>
    </header>
    <main>
    	<section class="form">
	    	<form method="post">
	    		<label for="username" id="username">Gebruikersnaam: </label>
	    		<input type="text" name="username" required>
	    		<label for="password">Wachtwoord: </label>
	    		<input type="password" name="password" required>
	    		<input type="submit" name="submit" value="Login">
	    	</form>
	    	<?php
	    		if(!empty($error)){
	    			?>
	    				<article class="error">
	    					<?php echo $error; ?>
	    				</article>
	    			<?php
	    		}
	    	?>
    	</section>
    </main>


    <footer>
      <article class="footer-content">
        <h2>Site</h2>
        <?php if(empty($_SESSION['username'])){ ?><a href="backend/login.php">Login</a><?php } ?>
      </article>
      <article class="footer-content">
        <h2>Listings</h2>
        <a href="backend/login.php">Login</a>
      </article>
      <article class="footer-content">
        <h2>Support</h2>
        <a href="backend/login.php">Login</a>
      </article>
      <article class="footer-content">
        <h2>FAQ</h2>
        <a href="backend/login.php">Login</a>
      </article>
    </footer>
    <script src="js/main.js"></script>

    </body>
</html>