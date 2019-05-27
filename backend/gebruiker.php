<?php require_once 'partial/header.php'; ?>



      <main>
        <section class="">
          <?php

            require_once 'dbconfig.php';

            $userid = $_GET['id'];

            $sql = "SELECT * FROM users WHERE id = '$userid'";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
            switch($user['user_rights']){
              case 0:
                $rights = "Standaard";
              break;
              case 1:
                $rights = "Webmaster";
              break;
              case 2:
                $rights = "Admin";
              break;
              default:
                $rights = "Unknown";
              break;
            }

            if($user['deleted'] == 1){

              if(isset($_GET['delete']) && $_GET['delete'] == "true"){
                $userid = $_GET['id'];
                $sql = "DELETE FROM users WHERE id = '$userid'";

                $conn->query($sql);

                $title = "Gebruiker permanent verweiderd.";
                $short_disc = "Perm. Verweiderd: " . $user['username'];
                $disc = "De gebruiker is permanent verweiderd. Het is niet mogelijk om de gebruiker weer op actief te zetten.
                De gebruiker zal opnieuw aangemaakt moeten worden indien iemand de gebruiker weer wilt gebruiken.";
                $level = 0;

                require_once 'logsUse.php';


                header("Location: gebruikers.php?page=1");
              }
            }else
              if(isset($_GET['delete']) && $_GET['delete'] == "true"){

                $sql = "UPDATE users SET deleted = 1 WHERE id = $userid";

                $conn->query($sql);

                $title = "Gebruiker verweiderd.";
                $short_disc = "Verweiderd: " . $user['username'];
                $disc = "Gebruiker is op in-actief gezet en nog niet echt verweiderd. 
                Gebruiker kan weer actief gemaakt worden door een admin. 
                Het is ook mogelijk om de gebruiker permanent te verweideren.";
                $level = 0;

                require_once 'logsUse.php';


                header("Location: gebruikers.php?page=1");
              }

            if(isset($_GET['restore']) && $_GET['restore'] == "true"){
              $sql = "UPDATE users SET deleted = 0 WHERE id = $userid";

              $conn->query($sql);

              $title = "Gebruiker herstelt.";
              $short_disc = "Herstelt: " . $user['username'];
              $disc = "Gebruiker is weer op actief gezet.";
              $level = 2;

              require_once 'logsUse.php';


              header("Location: gebruikers.php?page=1");
            }
          ?>
          <article class="single-user">
            <p>id: <?php echo $user['id']; ?></p>
            <p>Naam: <?php if(!empty($user['adverb'])){echo $user['firstname'] . ' ' . $user['adverb'] . ' ' . $user['surname']; }else{ echo $user['firstname'] . ' ' . $user['surname'];}?></p>
            <p>Gebruikersnaam: <?php echo $user['username']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Gebruikers rechten: <?php echo $rights; ?></p>
            <span>
              <?php if($user['deleted'] == 0){ ?>
                  <button name="edit" class="btn-green">Edit</button>
                  <button name="delete" class="btn-red" onclick="confDelete(<?php echo $user['id']; ?>)">Delete</button>
              <?php }else{ ?>
                  <button name="restore" class="btn-green" onclick="confRestore(<?php echo $user['id']; ?>)">Restore</button>
                  <button name="delete" class="btn-red" onclick="confDelete(<?php echo $user['id']; ?>)">Perm delete</button>
              <?php } ?>
            </span>
        </article>
      </section>
      </main>

<?php require_once 'partial/footer.php'; ?>