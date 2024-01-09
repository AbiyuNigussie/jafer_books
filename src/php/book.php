<?php
function getAllBooks($conn)
{
    $sql = "SELECT * from  books";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    } else {
        $books = 0;
    }
    return $books;
}

function getBookByCategory($conn, $catId)
{
    $sql = "SELECT * FROM BOOKS WHERE CategoryId=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $catId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($res) {
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        mysqli_free_result($res);
        mysqli_stmt_close($stmt);
        return $data;
    } else {
        $data = 0;
        return $data;
    }
}

function deleteBook($conn, $bookId)
{
    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM books
            WHERE BookID = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $bookId);

    if (mysqli_stmt_execute($stmt)) {
        $sm = "Book deleted successfully";
        header("Location: ./adminBooks.php?success=$$sm");
    } else {
        $em = "Error deleting book: " . mysqli_error($conn);
        header("Location: ./adminBooks.php?error=$$em");
    }

    mysqli_stmt_close($stmt);
}

function getBookDetailsById($conn, $bookId)
{
    $sql = "SELECT * FROM books WHERE BookID=?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        // Log or handle the SQL preparation error
        error_log("SQL Prepare Error: " . mysqli_error($conn));
        return null;
    }

    mysqli_stmt_bind_param($stmt, "s", $bookId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if (!$res) {
        // Log or handle the SQL execution error
        error_log("SQL Execution Error: " . mysqli_error($conn));
        mysqli_stmt_close($stmt);
        return null;
    }

    $bookDetails = mysqli_fetch_assoc($res);
    mysqli_free_result($res);

    if (!$bookDetails) {
        // Handle the case where no record is found
        return null;
    }

    mysqli_stmt_close($stmt);

    return $bookDetails;
}

