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


