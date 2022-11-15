<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

    <!-- custom css file -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- font awesome from cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

</head>
<body>
    
    <?php if(isset($_SESSION['email'])) {
        echo $this->include('layout/navbar-logged');
    }else{
        echo $this->include('layout/navbar');
    } ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('layout/footer');; ?>
    <!-- custom js file -->
    <script type="module" src="/js/myscript.js"></script>

    <!-- SwiperJS -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>

    <script>
        function addDays() {
            var arrivals = new Date($('#arrivals').val());
            arrivals.setDate(arrivals.getDate() +3);
            var leaving = arrivals.toISOString().split('T')[0];
            document.getElementById('leaving').value = leaving;
        }
        
        // var arrivals = $('#arrivals').val;

        // console.log(arrivals.addDays(2));
        
    </script>
</body>
</html>