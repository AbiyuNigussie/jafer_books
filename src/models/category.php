<?php

function getAllCategories($conn)
{
    $sql = "SELECT * from  categories";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $categories = 0;
    }
    return $categories;
}
