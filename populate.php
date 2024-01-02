<?php

// Connect to the database
include 'connection.php';

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// Populate Temperature table  
$query = "INSERT INTO Temperature (sensor_id, temperature_c, temperature_f, reading_time)
          VALUES
          (1, 18.5, 65.3, NOW()),
          (1, 18.7, 65.7, DATE_SUB(NOW(), INTERVAL 1 MINUTE)),
          (2, 16.2, 61.2, NOW()),
          (2, 16.0, 60.8, DATE_SUB(NOW(), INTERVAL 2 MINUTE))";
          
if ($db->query($query) === TRUE) {
  echo "Dummy data inserted into Temperature table <br>"; 
} else {
  echo "Error inserting dummy data into Temperature table: " . $db->error . "<br>";
}

// Populate Humidity table
$query = "INSERT INTO Humidity (sensor_id, humidity_percent, reading_time) 
          VALUES
          (1, 62.5, NOW()),
          (1, 63.1, DATE_SUB(NOW(), INTERVAL 3 MINUTE)),
          (2, 68.2, NOW()),
          (2, 67.5, DATE_SUB(NOW(), INTERVAL 1 MINUTE))";
          
if ($db->query($query) === TRUE) {
  echo "Dummy data inserted into Humidity table <br>";
} else {
  echo "Error inserting dummy data into Humidity table: " . $db->error . "<br>"; 
}

// Populate Pressure table
$query = "INSERT INTO Pressure (sensor_id, pressure_mb, reading_time)
          VALUES
          (1, 1012.25, NOW()), 
          (1, 1012.15, DATE_SUB(NOW(), INTERVAL 5 MINUTE)),
          (2, 1008.56, NOW()),
          (2, 1008.61, DATE_SUB(NOW(), INTERVAL 2 MINUTE))";
          
if ($db->query($query) === TRUE) {
  echo "Dummy data inserted into Pressure table <br>";
} else {
  echo "Error inserting dummy data into Pressure table: " . $db->error . "<br>";
}

// Populate Soil Moisture table
$query = "INSERT INTO SoilMoisture (sensor_id, moisture_percent, reading_time)
          VALUES
          (1, 15.5, NOW()),
          (1, 14.2, DATE_SUB(NOW(), INTERVAL 10 MINUTE)),
          (2, 18.7, NOW()),
          (2, 19.1, DATE_SUB(NOW(), INTERVAL 4 MINUTE))";
          
if ($db->query($query) === TRUE) {
  echo "Dummy data inserted into Soil Moisture table <br>";
} else {
  echo "Error inserting dummy data into Soil Moisture table: " . $db->error . "<br>";
}

// Populate Soil Nutrients table  
$query = "INSERT INTO SoilNutrients (sensor_id, nutrient_type, nutrient_ppm, reading_time)
          VALUES
          (1, 'N', 105, NOW()),
          (1, 'P', 22, NOW()),
          (1, 'K', 180, NOW()),
          (2, 'N', 82, NOW()),
          (2, 'P', 18, NOW()),  
          (2, 'K', 210, NOW())";
          
if ($db->query($query) === TRUE) {
  echo "Dummy data inserted into Soil Nutrients table";
} else {
  echo "Error inserting dummy data into Soil Nutrients table: " . $db->error;
}
          
// Populate Sensor table
$query = "INSERT INTO Sensor (id, location)
          VALUES
          (1, 'Farm 1'),
          (2, 'Farm 2')";
          
if ($db->query($query) === TRUE) {
  echo "Dummy data inserted into Sensor table";
} else {
  echo "Error inserting dummy data into Sensor table: " . $db->error;
}

$db->close();