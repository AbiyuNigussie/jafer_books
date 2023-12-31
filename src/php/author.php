<?php

function getAllAuthors($conn)
{
    $sql = "SELECT * from  authors";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $authors = 0;
    }
    return $authors;
}
