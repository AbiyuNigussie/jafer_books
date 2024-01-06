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
