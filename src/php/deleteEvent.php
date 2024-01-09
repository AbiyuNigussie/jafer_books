
<?php
session_start();
if (
    isset($_SESSION['userId']) &&
    isset($_SESSION['userEmail'])
) {
    include "../connection/db_connection.php";
    if (isset($_GET['eventId'])) {
        $id = $_GET['eventId'];

        if (empty($id)) {
            $em = "Error Occurred!";
            header("Location: ../adminEvents.php?error=$em");
            exit();
        }

        $sql1 = "SELECT * FROM events WHERE EventID=?";
        $stmt1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($stmt1, 's', $id);
        mysqli_stmt_execute($stmt1);

        $result = mysqli_stmt_get_result($stmt1);

        if (mysqli_num_rows($result) > 0) {
            $theEvent = mysqli_fetch_assoc($result);

            mysqli_free_result($result);

            $sql2 = "DELETE FROM events WHERE EventID = ?";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "s", $id);
            $res = mysqli_stmt_execute($stmt2);

            if ($res) {
                $c_b_c = "../../uploads/event/" . $theEvent['eventImage'];
                unlink($c_b_c);
                $sm = "Successfully removed!";
                header("Location: ../adminEvents.php?success=$sm");
                exit;
            } else {
                $em = "Error Occurred while deleting the book.";
                header("Location: ../adminEvents.php?error=$em");
                exit;
            }
        } else {
            $em = "Event not found!";
            header("Location: ../adminEvents.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../adminEvents.php");
        exit;
    }
} else {
    header('location: ../adminLogin.php');
    exit;
}

?>