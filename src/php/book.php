<?php
function getAllBooks($conn)
{
    $sql = "SELECT * from  books";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $books = 0;
    }
    return $books;
}

function deleteBook($conn, $bookId)
{
    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM books
            WHERE BookID = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $bookId);

    if (mysqli_stmt_execute($stmt)) {
        $sm = "Book deleted successfully";
        header("Location: ./adminBooks.php?success=$$sm");
    } else {
        $em = "Error deleting book: " . mysqli_error($conn);
        header("Location: ./adminBooks.php?error=$$em");
    }

    mysqli_stmt_close($stmt);
}
