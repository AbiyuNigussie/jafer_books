<?php
session_start();

if (isset($_SESSION['userId']) && isset($_SESSION['userEmail'])) {

    include '../connection/db_connection.php';
    include '../utility/validation.php';
    include '../utility/fileUpload.php';

    if (
        isset($_POST['eventId']) &&
        isset($_POST['title']) &&
        isset($_POST['schedule']) &&
        isset($_POST['description']) &&
        isset($_POST['author']) &&
        isset($_FILES['eventImage'])
    ) {
        $eventId = $_POST['eventId'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $schedule = $_POST['schedule'];
        $description = $_POST['description'];
        $userInput = 'eventId=' . $eventId . '&title=' . $title . '&desc=' . $description . '&author=' . $author;

        $text = "Event ID";
        $location = "../addEvent.php";
        $ms = "error";
        isEmpty($eventId, $text, $location, $ms, $userInput);
        isEventId($eventId, $text, $location, $ms, $userInput);

        $text = "Event title";
        isEmpty($title, $text, $location, $ms, $userInput);

        $text = "Book author";
        isEmpty($author, $text, $location, $ms, $userInput);

        $text = "Event description";
        isEmpty($description, $text, $location, $ms, $userInput);

        $text = "Event schedule";
        isEmpty($schedule, $text, $location, $ms, $userInput);

        $allowedImageExts = array("jpg", "jpeg", "png");
        $path = "event";
        $eventImage = uploadFiles($_FILES['eventImage'], $allowedImageExts, $path);

        if ($eventImage['status'] == "error") {
            $em = $eventImage['data'];
            header("Location: ../addEvent.php?error=$em&$userInput");
            exit();
        } else {
            $eventImageUrl = $eventImage['data'];
            $sql = "INSERT INTO events(event_id, event_title, schedule, description, event_image, AuthorID) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssi", $eventId, $title, $schedule, $description, $eventImageUrl, $author);
            $res = mysqli_stmt_execute($stmt);

            if ($res) {
                $sm = "The Event successfully created!";
                header("Location: ../addEvent.php?success=$sm");
            } else {
                $em = "Unknown Error Occurred!";
                header("Location: ../addEvent.php?error=$em");
                exit();
            }
        }
    } else {
        header("Location: ../adminLogin.php");
    }
} else {
    header("Location: ../adminLogin.php");
    exit;
}
?>
