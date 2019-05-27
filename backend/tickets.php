<?php require_once 'partial/header.php'; ?>

      <main>
        <section class="logs-cont">
      	<?php 
      	require_once 'dbconfig.php';
        $limit = 8;
      		$sql = "SELECT * FROM tickets";
  			$result = $conn->query($sql);
        $count = 0;

  			while($ticket = $result->fetch_assoc()){

          if(($count < $limit*$_GET['page'] && $count >= $limit*($_GET['page']-1))){
          	$ticketid = $ticket['id'];
  				?>

         	 	<article class="logs noHover <?php if($ticket['priority'] == 0){echo 'info-green';}else if($ticket['priority'] == 1){echo 'info-orange'; }else{echo 'info-red';} ?>">
  					<p>Titel: <?php echo $ticket['title']; ?></p>
  					<p>Korte Besch.: <?php echo substr($ticket['discription'], 0, 15) . "..."; ?></p>
  					<p>Prioriteit: <?php echo $ticket['priority']; ?></p>
  					<p>Datum/Tijd: <?php echo $ticket['date_time']; ?></p>
          			<button id="view_log_<?php echo$ticket['id']; ?>" onclick="location.href='ticket.php?id=<?php echo$ticketid; ?>';">View</button>

          		</article>
  				<?php

}
          $count++;
  			}
      	 ?>
      	</section>
        <section class="pages">
          <?php $number = 1; $loop_count = 0;?>
          <?php if($_GET['page'] > 1){ ?> <a href="tickets.php?page=<?php echo $_GET['page']-1; ?>"><</a><?php }else{ ?><p><</p><?php } ?>
          <?php $rows = $result->num_rows; while($rows >= 0){ ?>
            <a href="tickets.php?page=<?php echo $number ?>"><?php echo $number ?></a>
            <?php $number++; $rows-=8;$loop_count++;} ?>
          <?php if($_GET['page'] <= floor($result->num_rows / 8)){ ?> <a href="tickets.php?page=<?php echo $_GET['page']+1; ?>">></a><?php }else{ ?><p>></p><?php  } ?>
        </section>
        
      </main>

<?php require_once 'partial/footer.php'; ?>
