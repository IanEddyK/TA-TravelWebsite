<?= $this->extend('/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- jumbotron -->
<?php if(!session()) {
   redirect()->to('/login');
} ?>
<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(img/home-slide-1.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>travel arround the world</h3>
               <a href="/package" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(img/home-slide-2.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>discover the new places</h3>
               <a href="/package" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(img/home-slide-3.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>make your tour worthwhile</h3>
               <a href="/package" class="btn">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>
<!-- jumbotron ends -->

<!-- services section start -->
<section class="services">

    <h1 class="heading-title">our services</h1>

    <div class="box-container">
        <div class="box">
            <a href="/about">
            <img src="/img/icon-1.png" alt="">
            <h3>adventures</h3>
            </a>
        </div>

        <div class="box">
            <a href="/about">
            <img src="/img/icon-2.png" alt="">
            <h3>tour guide</h3>
            </a>
        </div>
        
        <div class="box">
            <a href="/about">
            <img src="/img/icon-3.png" alt="">
            <h3>trekking</h3>
            </a>
        </div>

        <div class="box">
            <a href="/about">
            <img src="/img/icon-4.png" alt="">
            <h3>camp fire</h3>
            </a>
        </div>

        <div class="box">
            <a href="/about">
            <img src="/img/icon-5.png" alt="">
            <h3>off road</h3>
            </a>
        </div>

        <div class="box">
            <a href="/about">
            <img src="/img/icon-6.png" alt="">
            <h3>Camping</h3>
            </a>
        </div>
        
    </div>

</section>
<!-- services section ends -->

<!-- section home about starts -->
<section class="home-about">

   <div class="image">
      <img src="img/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3>About us</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro officiis culpa quia. Porro dignissimos possimus necessitatibus quas debitis cum explicabo accusantium quam incidunt perspiciatis esse sint, veniam soluta ut consectetur.</p>
      <a href="/about" class="btn">read more</a>
   </div>

</section>
<!-- section home about ends -->

<!-- section home package starts -->
<section class="home-packages">

   <h1 class="heading-title">Top Destinations</h1>

   <div class="box-container">

      <?php foreach ($TP as $p ) : ?>
         <div class="box">
            <div class="image">
               <img src="img/<?= $p['image'] ?>" alt="">
            </div>
            <div class="content">
               <h3><?= $p['title']; ?></h3>
               <p><?= $p['location']; ?>
            </div>
         </div>
      <?php endforeach; ?>

   </div>

   <div class="load-more">
      <a href="/package" class="btn">more packages</a>
   </div>

</section>
<!-- section home package ends -->

<!-- home offer section starts -->
<section class="home-offer">
   <div class="content">
      <h3>up to 50% off</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor optio ullam excepturi sunt laudantium. Voluptates?</p>
   </div>
</section>
<!-- home offer section ends -->
<?= $this->endSection(); ?>