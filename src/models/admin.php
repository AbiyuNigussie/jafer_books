<?php

function getAllAdmin($conn)
{
    $sql = "SELECT * from  admin";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $admin = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $admin = 0;
    }
    return $admin;
}
