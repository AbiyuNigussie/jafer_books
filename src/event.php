<?php

include 'connection/db_connection.php';
include 'php/event.php';

$events = getAllEvent($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Events | Jafer Books</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/event.css" />
</head>

<body>
  <?php
  include 'layout/header.php';
  ?>

  <div class="wrapper">
    <div class="cont">
      <h2>Upcoming Events</h2>
      <?php
      foreach ($events as $event) { ?>
        <section class="A">
          <img src="../uploads/event/<?= $event['eventImage'] ?>" alt="book" style="width: 350px; height: 200px" />
          <div class="abt">
            <br />
            <h3><?= $event['Title'] ?></h3>
            <br />
            <p><?= $event['Description'] ?></p>
            <p><?= $event['Schedule'] ?></p>
          </div>
        </section>
        <br /><br />


      <?php }
      ?>
    </div>
  </div>
  <br />

  <?php
  include 'layout/footer.php';
  ?>
</body>

</html>