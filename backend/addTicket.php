<?php require_once 'partial/header.php'; ?>
  <?php  

  if(isset($_POST['submit'])){
    require_once 'dbconfig.php';

    $title = $conn->real_escape_string($_POST['title']);
    $discription = $conn->real_escape_string($_POST['discription']);
    $priority = $conn->real_escape_string($_POST['priority']);
    $datenow = date("Y,m,d H:i:s");
    
      $sql = "INSERT INTO tickets 
      (title, discription, priority,date_time) 
      VALUES
      ('$title','$discription','$priority', '$datenow')";

      if($conn->query($sql)){
        $title = "Ticket aangemaakt.";
        $short_disc = "Nieuwe ticket gemaakt met prioriteit " . $priority;
        $level = 1;
        require_once 'logsUse.php';
        header("Location: tickets.php?status=0&page=1");
      }else{
        $error = "Ticket kon niet aangemaakt worden." . $conn->error;
      }
    }


  ?>
      <main>

        <form class="form" method="post">
          <label for="title">Titel</label>
          <input type="text" id="title" name="title" 
          value="<?php if(isset($_POST['title'])){ echo $_POST['title'];} else{  echo '';}  ?>" required>
          <label for="discription">Beschrijving</label>
          <textarea name="discription" value="<?php if(isset($_POST['discription'])){ echo $_POST['discription'];} else{  echo '';}  ?>"></textarea>
          <label for="select-style">Prioriteit level</label>
          <select name="priority" id="select-style">
            <option value="0">Laag</option>
            <option value="1">Midden</option>
            <option value="2">Hoog</option>
            <option value="3">Direct</option>
          </select>
          <input type="submit" name="submit" value="Ticket aanmaken">
          <?php if(!empty($feedback)){ ?>
            <p class="success"><?php echo $feedback; ?></p>
          <?php }else if(!empty($error)){
            ?>
            <p class="error"><?php echo $error; ?></p>
          <?php } ?>
        </form>
        
      </main>

<?php require_once 'partial/footer.php'; ?>
