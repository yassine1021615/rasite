<?php require_once 'partial/header.php'; ?>
      <main>
        <section class="">
          <?php
            require_once 'dbconfig.php';
            $sql = "SELECT id, firstname, adverb, surname, email FROM users WHERE deleted = 1";
            $result = $conn->query($sql);
            while($user = $result->fetch_assoc()){
              $userid = $user['id'];
          ?>
          <article class="gebruiker">
          <p>id: <?php echo $user['id']; ?></p>
          <p>Naam: <?php if(!empty($user['adverb'])){echo $user['firstname'] . ' ' . $user['adverb'] . ' ' . $user['surname']; }else{ echo $user['firstname'] . ' ' . $user['surname'];}?></p>
          <p>Email: <?php echo $user['email']; ?></p>
          <button id="view_user_<?php echo$user['id']; ?>" onclick="location.href='gebruiker.php?id=<?php echo$userid; ?>';">View</button>
        </article>
        <?php
        }

        ?>
      </section>
        <section class="pages">
          <?php $number = 1; $loop_count = 0;?>
          <?php if($_GET['page'] > 1){ ?> <a href="verweiderdeGebruikers.php?page=<?php echo $_GET['page']-1; ?>"><</a><?php }else{ ?><p><</p><?php } ?>
          <?php $rows = $result->num_rows; while($rows >= 0){ ?>
            <a href="verweiderdeGebruikers.php?page=<?php echo $number ?>"><?php echo $number ?></a>
            <?php $number++; $rows-=8;$loop_count++;} ?>
          <?php if($_GET['page'] <= floor($result->num_rows / 8)){ ?> <a href="verweiderdeGebruikers.php?page=<?php echo $_GET['page']+1; ?>">></a><?php }else{ ?><p>></p><?php  } ?>
        </section>
      </main>
<?php require_once 'partial/footer.php'; ?>