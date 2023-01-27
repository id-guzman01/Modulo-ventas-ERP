
        var ctx = document.getElementById('myChart');

        var speedData = {
        labels: 'Speed car',
        labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
        datasets: [{
            label: "Car Speed",
            data: [0, 59, 75, 20, 20, 55, 40],
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
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
        };
        
        var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
            boxWidth: 80,
            fontColor: 'red'
            }
        }
        
        };


        var lineChart = new Chart(ctx, {
        type: 'pie',
        data: speedData,
        options: chartOptions,
            });

        