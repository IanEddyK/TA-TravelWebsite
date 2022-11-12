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
    <?= $this->renderSection('content'); ?>

    <!-- SwiperJS -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

</body>
</html>