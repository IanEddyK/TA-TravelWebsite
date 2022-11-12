<link rel="stylesheet" href="/chart.js/Chart.min.css">
<script src="'/chart.js/Chart.bundle.min.js'"></script>

<canvas id="myChart" style="height: 50vh; width: 80vh;"></canvas>

<?php 
    $date = '';
    $total = '';

    foreach ($graphic as $row) :
        $dt = $row['date'];
        $date .= "'$dt'".",";

        $totalPrice = $row['price'];
        $total .= "'$totalPrice'".",";
    endforeach;
?>

<script>
    var ctb = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctb,{
        type : "bar",
        responsive : true,
        data : {
            labels: [<?= $date ?>],
            datasets: [{
                label : 'Total Price',
                backgroundColor : ['rgb(255,99,143)'],
                borderColor : ['rgb(255,991,130)'],
                data : [<?= $total; ?>]
            }]
        },
        duration: 1000
    })
</script>