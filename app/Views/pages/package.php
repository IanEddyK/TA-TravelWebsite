<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="heading" style="background: url(/img/header-bg-2.png) no-repeat;">
    <h1>Package</h1>
</div>

<!-- packages section starts -->

<section class="packages">
    <h1 class="heading-title">our packages</h1>
    <div class="box-container">
        <?php foreach($packages as $p) : ?>
        <?= csrf_field() ?>
        <div class="box">
            <div class="image">
                <img src="img/<?= $p['image']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?= $p['title']; ?></h3>
                <p><?= $p['location']; ?><br>Rp. <?= number_format($p['price'], 2, ',', '.'); ?></p>
                <a href="<?= (isset($_SESSION['email'])) ? '/bookpackage/'.$p['package_id'] : 'login'; ?>" class="btn">book now</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="load-more"><span class="btn">load more</span></div>

</section>

<!-- packages section ends -->

<?= $this->endSection(); ?>