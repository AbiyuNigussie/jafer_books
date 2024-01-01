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


function getCategoryById($conn, $catId)
{
    $sql = "SELECT * FROM categories WHERE CategoryID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $catId);
    mysqli_stmt_execute($stmt);
    $categoryResult = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($categoryResult) > 0) {
        $data = mysqli_fetch_assoc($categoryResult);
        mysqli_free_result($categoryResult);
        mysqli_stmt_close($stmt);
        return $data;
    } else {
        mysqli_stmt_close($stmt);
        return null;
    }
}
