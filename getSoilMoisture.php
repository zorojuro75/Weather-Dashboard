<?php
include 'connection.php';
function getSoilMoisture($db)
{
    $sql = "SELECT moisture_percent FROM SoilMoisture ORDER BY reading_time DESC LIMIT 50";
    $result = $db->query($sql);

    if ($result) {
        $moistureData = $result->fetch_all(MYSQLI_ASSOC);
        $moistureValues = array_column($moistureData, 'moisture_percent');
        return $moistureValues;
    } else {
        return [];
    }
}
$moistureArray = getSoilMoisture($db);
$moistureJSON = json_encode($moistureArray);
$db->close();