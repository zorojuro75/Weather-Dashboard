<?php

function insertDummyData($db)
{

    $sensorId = rand(1, 2);
    $temperatureC = rand(15, 20);
    $temperatureF = $temperatureC * 1.8 + 32;
    $humidity = rand(60, 80);
    $moisture = rand(10, 20);
    $nutrientTypes = array('N', 'P', 'K');
    $nutrientPPM = rand(80, 220);

    // Insert into Temperature 
    $query = "INSERT INTO Temperature VALUES (NULL, $sensorId, $temperatureC, $temperatureF, NOW())";
    $db->query($query);

    // Insert into Humidity
    $query = "INSERT INTO Humidity VALUES (NULL, $sensorId, $humidity, NOW())";
    $db->query($query);

    // Insert into Soil Moisture
    $query = "INSERT INTO SoilMoisture VALUES (NULL, $sensorId, $moisture, NOW())";
    $db->query($query);

    // Insert into Soil Nutrients
    $nutrientType = $nutrientTypes[array_rand($nutrientTypes)];
    $query = "INSERT INTO SoilNutrients VALUES (NULL, $sensorId, '$nutrientType', $nutrientPPM, NOW())";
    $db->query($query);
}

?>