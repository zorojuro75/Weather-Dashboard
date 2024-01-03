<?php
include 'connection.php';

$nitrogenPPM = getLatestNutrientPPM($db, 'N');
$phosphorusPPM = getLatestNutrientPPM($db, 'P');
$potassiumPPM = getLatestNutrientPPM($db, 'K');

function getLatestNutrientPPM($db, $nutrient)
{

    $sql = "SELECT nutrient_ppm FROM SoilNutrients
          WHERE nutrient_type = '$nutrient'  
          ORDER BY reading_time DESC
          LIMIT 1";

    $result = $db->query($sql);

    $row = $result->fetch_assoc();

    return $row['nutrient_ppm'];
}
