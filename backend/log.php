<?php require_once 'partial/header.php'; ?>

      <main>
        <section>
      	<?php 
      	require_once 'dbconfig.php';


          $logid = $_GET['id'];
      		$sql = "SELECT * FROM logs WHERE id = $logid";
  			   $result = $conn->query($sql);

  			   $log = $result->fetch_assoc();
  				?>

         	 	<article class="single-user">
    					<p>Titel: <b><?php echo $log['title']; ?></b></p>
    					<p>Beschrijving: <b><?php echo $log['disc']; ?></b></p>
              <p>Gebruiker: <b><?php echo $log['username']; ?></b></p>
    					<p>Datum/tijd: <b><?php echo $log['date_time']; ?></b></p>

        		</article>
      	</section>
        
      </main>

<?php require_once 'partial/footer.php'; ?>
