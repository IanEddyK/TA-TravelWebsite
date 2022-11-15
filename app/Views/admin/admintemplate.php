<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/adminstyles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/chart.js/Chart.min.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <?= $this->include('admin/adminnavbar'); ?>

        <?= $this->renderSection('admin'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/adminscripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/assets/demo/chart-area-demo.js"></script>
        <script src="/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="/js/datatables-simple-demo.js"></script>
        <script src="/js/highchart.js"></script>
        <script src="/chart.js/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>

        <script>

            $(document).ready(function() {
                getTransaction();
                getCustomer();
            });

            function booksChart(dataset) {
                // Area Chart Example
                var ctx = document.getElementById("booksChart");
                var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],
                    datasets: [{
                    label: "Total",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: dataset,
                    }],
                },
                options: {
                    scales: {
                    xAxes: [{
                        time: {
                        unit: 'date'
                        },
                        gridLines: {
                        display: false
                        },
                        ticks: {
                        maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        maxTicksLimit: 5
                        },
                        gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
            });
            }

            // Access transaction data
            function getTransaction() {
                var year = $('#year').val();
                url: "/chart-transaction",
                $.ajax({
                    method:"post",
                    data: {
                        year: year
                    },
                    success: function(response) {
                        var result = JSON.parse(response);

                        var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                        $.each(result.data, function(i, item) {
                            dataset[item.month - 1] = item.price
                        });
                        booksChart(dataset);
                    }
                })
            }
            
            function customerChart(dataset) {
                // Bar Chart Example
                var ctx = document.getElementById("customerChart");
                var myLineChart = new Chart(ctx, {
                url: "<?= base_url() ?>" + "/admin/showBooksChart",
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],
                    datasets: [
                    {
                        label: "Total",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: dataset,
                    },
                    ],
                },
                options: {
                    scales: {
                    xAxes: [
                        {
                        time: {
                            unit: "month",
                        },
                        gridLines: {
                            display: false,
                        },
                        ticks: {
                            maxTicksLimit: 6,
                        },
                        },
                    ],
                    yAxes: [
                        {
                        ticks: {
                            maxTicksLimit: 5,
                        },
                        gridLines: {
                            display: true,
                        },
                        },
                    ],
                    },
                    legend: {
                    display: false,
                    },
                },
                });
            }


            // Access customer data
            function getCustomer() {
                var year = $('#customer_year').val();
                $.ajax({
                    url: "/chart-customer",
                    method:"post",
                    data: {
                        year: year
                    },
                    success: function(response) {
                        var result = JSON.parse(response);

                        var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                        $.each(result.data, function(i, item) {
                            console.log(item)
                            dataset[item.month - 1] = item.total
                        });
                        console.log(dataset)
                        customerChart(dataset);
                    }
                })
            }
        </script>
    </body>
</html>
