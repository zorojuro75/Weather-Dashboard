<?php

include 'dummy.php';
include 'connection.php';
include 'getTemp.php';
include 'getHumidity.php';
include 'getSoilMoisture.php';
include 'getSoilMoistureData.php';
include 'getNutrient.php';

$result = getMoistureData($db);

$moistureData = json_encode($result['moistureData']);
$timeData = json_encode($result['timeData']);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="shortcut icon" href="icons/dashboard.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
    <script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
    <script src="raphael-2.1.4.min.js"></script>
    <script src="justgage.js"></script>

</head>

<body class="bg-gray-600 flex">

    <div class="sidebar w-[15%] h-screen py-5 bg-gray-800 text-white text-xl flex flex-col gap-16 pl-10">
        <div class="text-4xl">
            <span class="bg-gradient-to-r from-blue-500 to-red-500 text-transparent bg-clip-text">
                Weather App
            </span>
        </div>
        <div class='flex flex-col gap-5'>
            <a href="/Weather%20Dashboard" class="flex gap-2 items-center">
                <img src="icons/dashboard.png" alt="" class="h-6 w-6">
                Dashboard
            </a>
            <a href="" class="flex gap-2 items-center text-gray-500">
                <img src="icons/temperature.png" alt="" class="h-6 w-6">
                Temperature
            </a>
            <a href="" class="flex gap-2 items-center text-gray-500">
                <img src="icons/humidity.png" alt="" class="h-6 w-6">
                Humidity
            </a>
            <a href="" class="flex gap-2 items-center text-gray-500">
                <img src="icons/setting.png" alt="" class="h-6 w-6">
                Settings
            </a>
            <a href="" class="flex gap-2 items-center text-gray-500">
                <img src="icons/dark-mode.png" alt="" class="h-6 w-6">
                Dark Mode
            </a>
        </div>
    </div>

    <div class="main">
        <div class="twoAndOne flex">
            <div class="two">
                <div class="w-[500px] h-[280px] bg-gray-800 m-5 rounded-lg shadow-2xl px-2">
                    <div class='text-white text-center font-bold text-xl border-b border-gray-400 py-2'>Soil Moisture VS Humadity</div>
                    <canvas id="scatter"></canvas>
                </div>
                <div class="w-[500px] h-[280px] bg-gray-800 m-5 rounded-lg shadow-2xl px-2">
                    <div id="gauge" class="w-[500px] h-[280px]"></div>
                </div>
            </div>
            <div class="one">
                <div class="w-[1000px] h-[580px] bg-gray-800 m-5 rounded-lg shadow-2xl px-2">
                    <div class='text-white text-center font-bold text-xl border-b border-gray-400 py-2'>Soil Moisture Levels in Recent times</div>
                    <canvas id="soil"></canvas>
                </div>
            </div>
        </div>
        <div class="three flex gap-5">
            <div class="w-[750px] h-[300px] bg-gray-800 mx-5 rounded p-2">
                <canvas id="bar"></canvas>
            </div>
            <div class="w-[750px] h-[300px] bg-gray-800 mx-5 rounded p-2">
                <canvas id="pie"></canvas>
            </div>
        </div>


    </div>

    <script>
        var nutrientChart = new Chart(document.getElementById('bar'), {
            type: 'bar',
            data: {
                labels: ['Nitrogen', 'Phosphorus', 'Potassium'],
                datasets: [{
                    label: 'Nutrient PPM levels by nutrient type',
                    data: [<?php echo $nitrogenPPM; ?>,
                        <?php echo $phosphorusPPM; ?>,
                        <?php echo $potassiumPPM; ?>
                    ],
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, .5)'
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        var moistureData = <?php echo $moistureData; ?>;
        var timeData = <?php echo $timeData; ?>;

        var ctx = document.getElementById('soil').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: timeData,
                datasets: [{
                    label: 'Soil Moisture',
                    data: moistureData,
                }]
            }
        });

        var temp = <?php echo getLatestTemperature($db); ?>;
        var g = new JustGage({
            id: "gauge",
            value: temp,
            min: 0,
            max: 60,
            title: "Temperature"
        });
        var Humidity = <?php echo $humidityJSON; ?>;
        var soilMoistureData = <?php echo $moistureJSON; ?>;
        var dataPoints = [];
        for (var i = 0; i < Humidity.length; i++) {
            var dataPoint = {
                x: parseFloat(Humidity[i]),
                y: parseFloat(soilMoistureData[i])
            };
            dataPoints.push(dataPoint);
        }
        var ctx2 = document.getElementById('scatter').getContext('2d');
        var config2 = {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Humidity vs Soil Moisture',
                    data: dataPoints,
                    backgroundColor: 'rgb(255, 99, 132)'
                }]
            }
        };
        var scatter = new Chart(ctx2, config2);
        setInterval(function() {
            <?php
            insertDummyData($db);
            ?>
            location.reload();
        }, 500000);
    </script>

</body>

</html>