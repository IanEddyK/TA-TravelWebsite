<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="heading" style="background: url(/img/header-bg-3.png) no-repeat;">
    <h1>Book Now</h1>
</div>

<!-- booking section starts -->

<div class="booking">
    <div class="heading-title">Book your trip!</div>
    <h2 style="text-align: center;">Please Re-Enter your booking details!</h2>

    <form class="book-form" action="/Site/delete" method="post">
        <?= csrf_field(); ?>
        <div class="flex">
            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
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
                <span>where to :</span>
                <select name="location" class="product" required>
                    <?php foreach ($packages as $p) : ?>
                        <option value="<?= $p['location'] ?>" data-price="<?= $p['price']; ?>"><?= $p['location']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="inputBox">
                <span>arrivals :</span>
                <input type="date" name="arrivals">
            </div>
            <div class="inputBox">
                <span>leaving :</span>
                <input type="date" name="leaving">
            </div>
        </div>
        
        <input type="submit" value="delete" name="send" class="btn-submit" onclick="return confirm('Are you sure want to cancel this reservation?')">
    </form>
</div>

<?= $this->endSection(); ?>