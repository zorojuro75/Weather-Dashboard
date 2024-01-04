<?php

// Connect to the database
include 'connection.php';


// Temperature table
$query = "CREATE TABLE Temperature (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sensor_id INT,
  temperature_c DECIMAL(5,2),
  temperature_f DECIMAL(5,2),
  reading_time DATETIME
)";

if ($db->query($query) === TRUE) {
  echo "Temperature table created successfully <br>";
} else {
  echo "Error creating Temperature table: " . $db->error . "<br>";
}

// Humidity table  
$query = "CREATE TABLE Humidity (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sensor_id INT, 
  humidity_percent DECIMAL(5,2),
  reading_time DATETIME
)";

if ($db->query($query) === TRUE) {
  echo "Humidity table created successfully <br>"; 
} else {
  echo "Error creating Humidity table: " . $db->error . "<br>";
}

// Pressure table
$query = "CREATE TABLE Pressure (
  id INT AUTO_INCREMENT PRIMARY KEY, 
  sensor_id INT,
  pressure_mb DECIMAL(5,2),
  reading_time DATETIME  
)";

if ($db->query($query) === TRUE) {
  echo "Pressure table created successfully <br>";
} else {
  echo "Error creating Pressure table: " . $db->error . "<br>";
}

// Soil Moisture table
$query = "CREATE TABLE SoilMoisture (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sensor_id INT,
  moisture_percent DECIMAL(5,2),
  reading_time DATETIME
)";

if ($db->query($query) === TRUE) {
  echo "Soil Moisture table created successfully <br>";
} else {
  echo "Error creating Soil Moisture table: " . $db->error . "<br>"; 
}
$query = "CREATE TABLE SoilNutrients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sensor_id INT,
  nutrient_type ENUM('N', 'P', 'K'),
  nutrient_ppm DECIMAL(5,2),
  reading_time DATETIME
)";

if ($db->query($query) === TRUE) {
  echo "Soil Nutrients table created successfully <br>";
} else {
  echo "Error creating Soil Nutrients table: " . $db->error . "<br>";
} 

// Sensor table 
$query = "CREATE TABLE Sensor (
  id INT AUTO_INCREMENT PRIMARY KEY,
  location VARCHAR(100)
)";

if ($db->query($query) === TRUE) {
  echo "Sensor table created successfully";
} else {
  echo "Error creating Sensor table: " . $db->error; 
}

$db->close();

?>