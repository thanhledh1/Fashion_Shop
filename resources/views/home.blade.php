@extends('master')

@section('content')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>



    <body>
            <div id="myChart" style="width: 100%; max-width: 600px; height: 500px;"></div>
            <div  style="width: 100%; max-width: 600px; height: 500px;">
                <canvas id="myChart1" style="width:100%;max-width:600px"></canvas></div>

        <script>
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                // Set Data
                const data = google.visualization.arrayToDataTable(@json($data));

                // Set Options
                const options = {
                    title: 'Tỷ lệ sản phẩm'
                };

                // Draw
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);
            }
        </script>

<script>
    const xValues = {!! json_encode($products->pluck('name')->toArray()) !!};
    const yValues = {!! json_encode($products->map(function($product) { return $product->quantity * $product->price; })->toArray()) !!};
    const barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("myChart1", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Tổng giá trị sản phẩm"
            }
        }
    });
</script>
    </body>



@endsection
