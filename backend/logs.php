<?php require_once 'partial/header.php'; ?>

      <main>
        <section>
      	<?php 
      	require_once 'dbconfig.php';
        $limit = 8;
      		$sql = "SELECT * FROM logs";
  			$result = $conn->query($sql);
        $count = 0;

  			while($log = $result->fetch_assoc()){
  				$logid = $log['id'];
          if(($count < $limit*$_GET['page'] && $count >= $limit*($_GET['page']-1))){
  				?>

         	 	<article class="logs noHover <?php if($log['level'] == 0){echo 'info-red';}else if($log['level'] == 1){echo 'info-green'; }else{echo 'info-orange';} ?>">
  					<p>Titel: <?php echo $log['title']; ?></p>
  					<p>Korte Besch.: <?php echo $log['short_disc']; ?></p>
  					<p>Gebruiker: <?php echo $log['username']; ?></p>
  					<p>Datum/tijd: <?php echo $log['date_time']; ?></p>
          			<button id="view_log_<?php echo$log['id']; ?>" onclick="location.href='log.php?id=<?php echo$logid; ?>';">View</button>

          		</article>
  				<?php

}
          $count++;
  			}
      	 ?>
      	</section>
        <section class="pages">
          <?php $number = 1; $loop_count = 0;?>
          <?php if($_GET['page'] > 1){ ?> <a href="logs.php?page=<?php echo $_GET['page']-1; ?>"><</a><?php }else{ ?><p><</p><?php } ?>
          <?php $rows = $result->num_rows; while($rows >= 0){ ?>
            <a href="logs.php?page=<?php echo $number ?>"><?php echo $number ?></a>
            <?php $number++; $rows-=8;$loop_count++;} ?>
          <?php if($_GET['page'] <= floor($result->num_rows / 8)){ ?> <a href="logs.php?page=<?php echo $_GET['page']+1; ?>">></a><?php }else{ ?><p>></p><?php  } ?>
        </section>
        
      </main>

<?php require_once 'partial/footer.php'; ?>
