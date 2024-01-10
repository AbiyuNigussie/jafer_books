<?php
include 'connection/db_connection.php';
include 'php/event.php';
include 'php/author.php';

$events = getAllEvents($conn);
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
            foreach ($events as $event) {
                $author = getAuthorById($conn, $event['AuthorID']);
            ?>

                <section class="A">
                    <?php if (!empty($event['event_image'])) { ?>
                        <img src="../uploads/event/<?= $event['event_image'] ?>" alt="book" style="width: 350px; height: 200px" />
                    <?php } else { ?>
                        <p>No image available</p>
                    <?php } ?>
                    <div class="abt">
                        <br />
                        <?php if (!empty($event['event_title'])) { ?>
                            <h3><?= $event['event_title'] ?></h3>
                            <br />
                        <?php } ?>

                        <?php if (!empty($author['FirstName'])) { ?>
                            <p><b>Hosted by </b><?= $author['FirstName'] . ' ' . $author['LastName'] ?></p>
                        <?php } else { ?>
                            <p><b>Hosted by </b>Unknown</p>
                        <?php } ?>

                        <?php if (!empty($event['description'])) { ?>
                            <p><?= $event['description'] ?></p>
                        <?php } ?>

                        <?php if (!empty($event['schedule'])) { ?>
                            <p><?= $event['schedule'] ?></p>
                        <?php } ?>
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
