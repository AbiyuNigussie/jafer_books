<?php

function DelBook($conn, $bookId)
{
    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM books
            WHERE BookID = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $bookId);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting book: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

?>