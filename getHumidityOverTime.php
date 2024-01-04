<?php
include 'connection.php';
$query = "SELECT reading_time, humidity_percent FROM Humidity ORDER BY reading_time";
$result = $db->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$db->close();

echo json_encode($data);
?>
