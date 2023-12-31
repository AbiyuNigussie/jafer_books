
<?php
session_start();
if (
    isset($_SESSION['userId']) &&
    isset($_SESSION['userEmail'])
) {
    include "../connection/db_connection.php";
    if (isset($_GET['bookId'])) {
        $id = $_GET['bookId'];

        if (empty($id)) {
            $em = "Error Occurred!";
            header("Location: ../adminBooks.php?error=$em");
            exit();
        }

        $sql1 = "SELECT * FROM books WHERE BookID=?";
        $stmt1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($stmt1, 'i', $id);
        mysqli_stmt_execute($stmt1);

        $result = mysqli_stmt_get_result($stmt1);

        if (mysqli_num_rows($result) > 0) {
            $theBook = mysqli_fetch_assoc($result);

            mysqli_free_result($result);

            $sql2 = "DELETE FROM books WHERE BookID = ?";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "i", $id);
            $res = mysqli_stmt_execute($stmt2);

            if ($res) {
                $c_b_c = "../../uploads/cover/" . $theBook['CoverImageURL'];
                unlink($c_b_c);
                $sm = "Successfully removed!";
                header("Location: ../adminBooks.php?success=$sm");
                exit;
            } else {
                $em = "Error Occurred while deleting the book.";
                header("Location: ../adminBooks.php?error=$em");
                exit;
            }
        } else {
            $em = "Book not found!";
            header("Location: ../adminBooks.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../adminBooks.php");
        exit;
    }
} else {
    header('location: ../adminLogin.php');
    exit;
}

?>