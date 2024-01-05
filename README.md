# Weather Dashboard

This is a simple weather dashboard project built with PHP and MySQL. It displays real-time temperature, humidity, pressure, soil moisture, and soil nutrient data on a dashboard page.

## Overview

The project contains the following files:

- `index.php` - The main dashboard page that displays the real-time sensor data in graphical format using Chart.js
- `connection.php` - Connects to the MySQL database to fetch real-time sensor data
- `getTemp.php` - Gets the latest temperature reading from the sensors table
- `getHumidity.php` - Gets the latest humidity reading
- `getPressure.php` - Gets the latest pressure reading
- `getSoilMoisture.php` - Gets the latest soil moisture reading
- `getSoilMoistureData.php` - Gets the latest soil moisture reading and time
- `getSoilNutrients.php` - Gets the latest soil nutrient (N,P,K) readings
- `dummy.php` - Inserts dummy data into the database for testing

Real-time sensor data is collected using Arduino and sent to the MySQL database. The dashboard page fetches the latest readings and displays them in gauge charts using Chart.js.

## Features

- Real-time temperature, humidity, soil moisture, and soil nutrient data
- Gauge chart for temperature
- Line chart soil moisture over time
- Area chart for humidity over time
- Bar chart to show Nutrients PPM levels by Nutrients type
- Scatter diagram to show the relationship between humidity and soil moisture.
- Responsive design
- Auto-refreshes charts with new data every 30 seconds
- Fetches latest data from MySQL database

**As all the data here is auto generated and dummy that's why the relationship between data and their trends is not perfect.**

## Requirements

- PHP 7.0 or higher
- MySQL
- JustGauge for gauge implementation
- Chart.js for charts
- Tailwind CSS for styling

## Usage

1. Configure MySQL database credentials in `connection.php`
2. Run `dummy.php` to insert dummy data for testing
3. Access `index.php` to view the real-time sensor dashboard
