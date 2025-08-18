@extends('admin.layouts.layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h2>Daily Statistics</h2>
    <canvas id="dailyChart"></canvas>

    <h2>Weekly Statistics</h2>
    <canvas id="weeklyChart"></canvas>

    <script>
        var ctx1 = document.getElementById('dailyChart').getContext('2d');
        var dailyChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: @json($dailyStats->pluck('date')),
                datasets: [{
                    label: 'Records per Day',
                    data: @json($dailyStats->pluck('count')),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(201, 203, 207, 0.7)'
                    ]
                }]
            }
        });

        // Weekly Chart (Bar Chart)
        var ctx2 = document.getElementById('weeklyChart').getContext('2d');
        var weeklyChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($weeklyStats->pluck('week')),
                datasets: [{
                    label: 'Records per Week',
                    data: @json($weeklyStats->pluck('count')),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>

@endsection

