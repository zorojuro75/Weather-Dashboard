<?php

// Connect to database 
include 'connection.php';

// Get soil moisture data
function getMoistureData($db) {

  $sql = "SELECT moisture_percent, reading_time  
          FROM SoilMoisture 
          ORDER BY reading_time DESC LIMIT 30";

  $result = $db->query($sql);

  $data = array();

  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }

  $moistureData = array();
  $timeData = array();

  foreach ($data as $row) {
    $moistureData[] = $row['moisture_percent'];
    $timeData[] = $row['reading_time'];
  }

  return array(
    'moistureData' => $moistureData,
    'timeData' => $timeData
  );

}
?>