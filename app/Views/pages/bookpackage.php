<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="heading" style="background: url(/img/header-bg-3.png) no-repeat;">
    <h1>Book Now</h1>
</div>

<!-- booking section starts -->

<div class="booking">
    <div class="heading-title">Book your trip!</div>
    <?php if(session()->getFlashdata('msg')):?>
        <div style="text-align: center;" class="alert">
          <h2><?= session()->getFlashdata('msg'); ?></h2>
        </div>
    <?php endif; ?>
    <form class="book-form" action="/Site/savebook/<?= $_SESSION['email']; ?>" method="post">
        <?= csrf_field(); ?>
        <div class="flex">
            <div class="inputBox">
                <span>name :</span>
                <input type="text" required placeholder="enter your name" name="name" value="<?= $_SESSION['nama']; ?>">
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="text" required placeholder="enter your email" name="email" value="<?= $_SESSION['email']; ?>">
            </div>
            <div class="inputBox">
                <span>phone :</span>
                <input type="number" required placeholder="enter your number" name="phone" value="<?= $_SESSION['phone']; ?>">
            </div>
            <div class="inputBox">
                <span>address :</span>
                <input type="text" required placeholder="enter your address" name="address">
            </div>
            <div class="inputBox">
                <span>where to :</span>
                <select name="location" required>
                    <?php foreach ($packages as $p) : ?>
                        <option value="<?= $p['location'] ?>" <?php if ($p['location'] == $selected['location']) {echo "selected";} ?>><?= $p['location']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="inputBox">
                <span>how many :</span>
                <input type="number" required placeholder="number of guests" name="guests">
            </div>
            <div class="inputBox">
                <span>arrivals/flight date:</span>
                <input type="date" id="arrivals" name="arrivals">
            </div>
            <div class="inputBox">
                <span>leaving :</span>
                <input type="date" id="leaving" name="leaving">
            </div>
            <?php if(session()->getFlashdata('error')):?>
                <div style="text-align: center;" class="alert">
                <h2><?= session()->getFlashdata('error'); ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <input type="submit" value="submit" name="send" class="btn">
        <div>
            <h2>Check your invoice <a href="/site/details/<?= $_SESSION['email']; ?>">Here!</a></h2>
        </div>
    </form>
</div>

<!-- booking section ends -->

<?= $this->endSection(); ?>