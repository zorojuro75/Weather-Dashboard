<?php
function getLatestTemperature($db)
{

    $sql = "SELECT * FROM Temperature ORDER BY reading_time DESC LIMIT 1";

    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    return $row['temperature_c'];
}