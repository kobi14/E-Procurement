<!DOCTYPE html>
<?php include 'connection.php'; ?>


<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
  </head>
  <body>
    <?php
      $sql = "SELECT * FROM bidder";
      $result = mysqli_query($link, $sql);
      if($result){
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <h3>PASINDU : <?php echo $row["BidderID"];?> </h3>

          <?php
        }
      }
        ?>

      

  </body>
</html>
