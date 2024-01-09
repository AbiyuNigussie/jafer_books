<?php


function getAllEvents($conn)
{
    $sql = "SELECT * from  events";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    } else {
        $events = 0;
    }
    return $events;
}
