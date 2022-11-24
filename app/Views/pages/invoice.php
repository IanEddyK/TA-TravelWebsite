<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="heading" style="background: url(/img/header-bg-3.png) no-repeat;">
    <h1>Invoice</h1>
</div>

<!-- Invoice -->
<div class="heading-title">Invoice</div>
<?php if (session()->getFlashdata('msg')) : ?>
    <div style="text-align: center;" class="alert">
        <h2><?= session()->getFlashdata('msg'); ?></h2>
    </div>
<?php endif; ?>
<?php if ($details == null) : ?>
    <div class="invoice">
        <h1>You Don't have any reservation yet</h1>
        <h2>book <a href="/book">Here!</a></h2>
    <?php endif; ?>
    <?php if ($details != null) : ?>
        <div class="booking">
            <form class="book-form" action="/site/delete/<?= $_SESSION['email']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="flex">
                    <!-- <div class="inputBox"> -->
                    <!-- <span>id book :</span> -->
                    <input type="hidden" name="id" value="<?= $details['id_book']; ?>">
                    <!-- </div> -->
                    <div class="inputBox">
                        <span>name :</span>
                        <input type="text" disabled name="name" value="<?= $details['name']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="text" disabled name="email" value="<?= $details['email']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>phone :</span>
                        <input type="number" disabled name="phone" value="<?= $details['phone']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" disabled name="address" value="<?= $details['address']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>where to :</span>
                        <select name="location" disabled>
                            <option value="<?= $details['location']; ?>"><?= $details['location']; ?></option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>how many :</span>
                        <input type="number" disabled name="guests" value="<?= $details['guests']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>arrivals :</span>
                        <input type="date" disabled name="arrivals" value="<?= $details['arrivals']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>leaving :</span>
                        <input type="date" disabled name="leaving" value="<?= $details['leaving']; ?>">
                    </div>
                </div>
                <h2>Total Price: Rp. <?= number_format($price * $details['guests'], 2, ',', '.'); ?></h2>
                <input type="submit" value="Cancel" name="send" class="btn-submit" onclick="return confirm('Are you sure cancel this reservation?')">
            </form>
        <?php endif; ?>
        </div>
        <?= $this->endSection(); ?>