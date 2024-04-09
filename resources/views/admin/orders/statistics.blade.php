@extends('dashboard')

@section('dashboard_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Statistiche dei tuoi piatti:</h1>
                <div class="dish-stats rounded-4">
                    <canvas id="dishChart" class="rounded-top-4"></canvas>
                </div>
            </div>
            <hr class="my-4">
            <div class="col-12">
                <h1>Statistiche fatturato:</h1>
                <div class="sales-stats rounded-4">
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
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true, // Inizia l'asse delle y da zero
                                min: 0, // Imposta il valore minimo sull'asse delle y a zero
                                // Puoi anche impostare un intervallo personalizzato se lo desideri
                                // stepSize: 1 // Imposta l'intervallo desiderato, per esempio, 1 per visualizzare tutti i valori interi
                            }
                        }]
                    },
                    animation: {
                        duration: 1000, // Durata dell'animazione in millisecondi
                        easing: 'easeInOutQuart' // Tipo di easing (opzionale)
                    },
                    layout: {
                        padding: {
                            left: 25,
                            right: 25,
                            top: 25,
                            bottom: 25
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
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return '€ ' + value.toFixed(
                                        2
                                    ); // Aggiunge il simbolo dell'euro e arrotonda a due cifre decimali
                                }
                            }
                        }]
                    },
                    animation: {
                        duration: 1000, // Durata dell'animazione in millisecondi
                        easing: 'easeInOutQuart' // Tipo di easing (opzionale)
                    },
                    layout: {
                        padding: {
                            left: 25,
                            right: 25,
                            top: 25,
                            bottom: 25
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
