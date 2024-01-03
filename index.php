<?php

include 'dummy.php';
include 'connection.php';
include 'getTemp.php';

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

</head>

<body class="bg-gray-600 flex">

    <div class="sidebar w-[15%] h-screen py-5 bg-gray-800 text-white text-xl flex flex-col gap-5 pl-10">
        <div class="flex gap-2 items-center">
            <img src="icons/dashboard.png" alt="" class="h-6 w-6">
            <span>
                Dashboard
            </span>
        </div>
        <div class="flex gap-2 items-center">
            <img src="icons/dashboard.png" alt="" class="h-6 w-6">
            <span>
                Temperature
            </span>
        </div>
        <div class="flex gap-2 items-center">
            <img src="icons/dashboard.png" alt="" class="h-6 w-6">
            <span>
                Humadity
            </span>
        </div>
        <div class="flex gap-2 items-center">
            <img src="icons/dashboard.png" alt="" class="h-6 w-6">
            <span>
                Settings
            </span>
        </div>
        <div class="flex gap-2 items-center">
            <img src="icons/dashboard.png" alt="" class="h-6 w-6">
            <span>
                Dark Mode
            </span>
        </div>
    </div>
    <div class="main">

        <div class="w-[500px] h-[300px] bg-gray-800 m-5 rounded-lg shadow-2xl px-2">
            <div class='text-white text-center font-bold text-xl border-b border-gray-400 py-2'>Temperature</div>
            <canvas id="tempGauge"></canvas>
        </div>
        <div class="w-[500px] h-[300px] bg-gray-800 m-5 rounded-lg shadow-2xl px-2">
            <div class='text-white text-center font-bold text-xl border-b border-gray-400 py-2'>Soil Moisture VS Humadity</div>
            <canvas id="scatter"></canvas>
        </div>
    </div>

    <script>
        var temp = <?php echo getLatestTemperature($db); ?>;

        var ctx = document.getElementById('tempGauge').getContext('2d');
        var config = {
            type: 'gauge',
            data: {
                datasets: [{
                    data: [5, 10, 15, 20, 25, 30, 35, 40],
                    value: temp,
                    backgroundColor: ['#f7b267', '#f79d65', '#f4845f', '#f27059', '#ef5953', '#ed434d', '#e92d47', '#e61741'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Temperature in Celsius'
                },
                needle: {
                    radiusPercentage: 2,
                    widthPercentage: 3.2,
                    lengthPercentage: 80,
                    color: 'rgba(0, 0, 0, 1)'
                },
            }
        };
        var chart = new Chart(ctx, config);

        var rainfallData = [1, 2, 3, 4];
        var soilMoistureData = [10, 20, 30, 40];
        var dataPoints = [];
        for (var i = 0; i < rainfallData.length; i++) {
            var dataPoint = {
                x: rainfallData[i],
                y: soilMoistureData[i] 
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
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ]
                }]
            },
        };
        var scatter = new Chart(ctx2, config2);
        setInterval(function() {
            <?php
            insertDummyData($db);
            ?>
            location.reload();
        }, 50000);
    </script>

</body>

</html>