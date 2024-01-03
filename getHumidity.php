<?php
include 'connection.php';
function getHumidity($db)
{
    $sql = "SELECT humidity_percent FROM Humidity ORDER BY reading_time DESC LIMIT 50";
    $result = $db->query($sql);

    if ($result) {
        $humidityData = $result->fetch_all(MYSQLI_ASSOC);
        $humidityValues = array_column($humidityData, 'humidity_percent');
        return $humidityValues;
    } else {
        return [];
    }
}
$humidityArray = getHumidity($db);
$humidityJSON = json_encode($humidityArray);