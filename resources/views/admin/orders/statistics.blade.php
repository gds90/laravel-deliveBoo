@extends('dashboard')

@section('dashboard_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Statistiche dei tuoi piatti:</h1>
                <div class="dish-stats">
                    <canvas id="dishChart"></canvas>
                </div>
            </div>
            <hr class="my-4">
            <div class="col-12">
                <h1>Statistiche fatturato:</h1>
                <div class="sales-stats">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dopo aver caricato il documento HTML
        document.addEventListener("DOMContentLoaded", function() {
            // Imposta la larghezza dei canvas dei grafici in base alla larghezza dei loro contenitori
            var dishChartCanvas = document.getElementById("dishChart");
            var salesChartCanvas = document.getElementById("salesChart");
            var dishStatsWidth = document.querySelector(".dish-stats").clientWidth;
            var salesStatsWidth = document.querySelector(".sales-stats").clientWidth;

            dishChartCanvas.width = dishStatsWidth;
            salesChartCanvas.width = salesStatsWidth;

            var xValues = @json($labels);
            var yValues = @json($quantity);
            var barColors = [];

            let months = @json($months);
            let sales = @json($sales);

            // Ciclo attraverso i valori e assegno colori alternati
            for (var i = 0; i < yValues.length; i++) {
                barColors.push(i % 2 === 0 ? 'rgb(245, 195, 68)' : 'rgb(32, 92, 195)');
            }

            new Chart(dishChartCanvas, {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 10,
                            bottom: 10
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            });

            new Chart(salesChartCanvas, {
                type: "bar",
                data: {
                    labels: months,
                    datasets: [{
                        backgroundColor: barColors,
                        data: sales
                    }]
                },
                options: {
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 10,
                            bottom: 10
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            });
        });
    </script>
@endsection
