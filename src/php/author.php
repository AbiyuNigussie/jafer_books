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

function getAuthorById($conn, $authId)
{
    $sql = "SELECT * FROM authors WHERE AuthorID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $authId);
    mysqli_stmt_execute($stmt);
    $authorResult = mysqli_stmt_get_result($stmt);

    $data = mysqli_fetch_assoc($authorResult); 

    mysqli_free_result($authorResult);
    mysqli_stmt_close($stmt);

    return $data;
}

