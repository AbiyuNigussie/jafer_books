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
        isset($_FILES['eventImage'])
    ) {
        $eventId = $_POST['eventId'];
        $title = $_POST['title'];
        $schedule = $_POST['schedule'];
        $description = $_POST['description'];
        $userInput = 'eventId=' . $eventId . 'title=' . $title . '&desc=' . $description;

        $text = "Event ID";
        $location = "../addEvent.php";
        $ms = "error";
        isEmpty($eventId, $text, $location, $ms, $userInput);
        isEventId($eventId, $text, $location, $ms, $userInput);

        $text = "Event title";
        $location = "../addEvent.php";
        $ms = "error";
        isEmpty($title, $text, $location, $ms, $userInput);

        $text = "Event description";
        $location = "../addEvent.php";
        $ms = "error";
        isEmpty($description, $text, $location, $ms, $userInput);


        $text = "Event schedule";
        $location = "../addEvent.php";
        $ms = "error";
        isEmpty($schedule, $text, $location, $ms, $userInput);



        $allowedImageExs = array("jpg", "jpeg", "png");
        $path = "event";
        $eventImage = uploadFiles($_FILES['eventImage'], $allowedImageExs, $path);

        if ($eventImage['status'] == "error") {
            $em = $eventImage['data'];
            header("Location: ../addEvent.php?error=$em&$userInput");
            exit();
        } else {
            $eventImageUrl = $eventImage['data'];
            $sql = "INSERT INTO events(
                EventID,
                Title,
                Schedule,
                Description,
                eventImage
                ) values(?,?,?,?,?);";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $eventId, $title, $schedule, $description, $eventImageUrl);
            $res = mysqli_stmt_execute($stmt);

            if ($res) {
                $sm = "The Event succcessfully created!";
                header("Location: ../addEvent.php?success=$sm");
            } else {
                $em = "Unknown Error Ocurred!";
                header("Location: ../addEvent.php?error=$em");
                exit();
            }
        }
    } else {
        header("Location ../adminLogin.php");
    }
}
