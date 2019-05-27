<?php require_once 'partial/header.php'; ?>
  <?php  

  if(isset($_POST['submit'])){
    require_once 'dbconfig.php';

    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT, array('cost'=>12));
    $email = $conn->real_escape_string($_POST['email']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $adverb = $conn->real_escape_string($_POST['adverb']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $user_rights = $_POST['user_rights'];

    $sqlCheck = "SELECT username, email, deleted FROM users WHERE email = '$email' OR (username = '$username' AND deleted = 0)";
    $result = $conn->query($sqlCheck);
    $user = $result->fetch_assoc();

    if($user['username'] == $username){
        $error = "Gebruiker bestaat al.";
    }else if($user['email'] == $email){
        $error = "Email bestaat al.";
    }else if(strlen($conn->real_escape_string($_POST['password'])) < 8 || !preg_match("/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/", $conn->real_escape_string($_POST['password']))) {
      $error = "Wachtwoord moet langer zijn dan 8 tekens en moet minimaal een nummer en letter bevatten.";
    }else{
      $sql = "INSERT INTO users 
      (username, password, email, firstname, adverb, surname, user_rights) 
      VALUES
      ('$username','$password','$email','$firstname','$adverb','$surname','$user_rights')";

      if($conn->query($sql)){
        $feedback = "Gebruiker is successvol toegevoegd.";
        $title = "Gebruiker toegevoegt.";
        $level = 1;
        require_once 'logsUse.php';
        header("Location: gebruikers.php?page=1");
      }else{
        $error = "Gebruiker kon niet toegevoegd worden." . $conn->error;
      }
    }


  }
  ?>
      <main>

        <form class="form" method="post">
          <label for="username">Gebruikersnaam</label>
          <input type="text" id="username" name="username" 
          value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} else{  echo '';}  ?>" required>
          <label for="password">Wachtwoord</label>
          <input type="password" id="password" name="password" required>
          <label for="conf-password">Wachtwoord Verifieren</label>
          <input type="password" name="conf-password" id="conf-password" required>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" 
          value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} else{  echo '';}  ?>"required>
          <label for="firstname">Voornaam</label>
          <input type="text" id="firstname" name="firstname" 
          value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname'];} else{  echo '';}  ?>"required>
          <label for="adverb">Tussenvoegsel</label>
          <input type="text" id="adverb" name="adverb"
          value="<?php if(isset($_POST['adverb'])){ echo $_POST['adverb'];} else{  echo '';}  ?>">
          <label for="surname">Achternaam</label>
          <input type="text" id="surname" name="surname"
          value="<?php if(isset($_POST['surname'])){ echo $_POST['surname'];} else{  echo '';}  ?>" required>
          <label for="user_rights">Rechten</label>
          <select name="user_rights" id="select-style">
            <option value="0">Standaard</option>
            <option value="1">Web-master</option>
            <option value="2">Admin</option>
          </select>
          <input type="submit" name="submit" value="Gebruiker Toevoegen">
          <?php if(!empty($feedback)){ ?>
            <p class="success"><?php echo $feedback; ?></p>
          <?php }else if(!empty($error)){
            ?>
            <p class="error"><?php echo $error; ?></p>
          <?php } ?>
        </form>
        
      </main>

<?php require_once 'partial/footer.php'; ?>
