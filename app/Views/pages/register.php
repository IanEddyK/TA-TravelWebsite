<?= $this->extend('layout/LoginBg'); ?>

<?= $this->section('content'); ?>

<div class="register-card">
  <h1>Get's started</h3>
  <p>already have an account? <a href="/login">sign in</a></p>
  <?php if (isset($validation)):?>
    <div class="alert">
      <?= $validation->listErrors() ?>
    </div>
    <?php endif; ?>
    <form class="register-form" action="/register/auth" method="post">
        <?= csrf_field(); ?>
        <div class="flex">
            <div class="inputBox">
                <span>name :</span>
                <input type="text" required placeholder="enter your name" name="name" autocomplete="off">
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="text" required placeholder="enter your email" name="email" autocomplete="off">
            </div>
            <div class="inputBox">
                <span>phone :</span>
                <input type="number" required placeholder="enter your number" name="phone">
            </div>
            <div class="inputBox">
                <span>password :</span>
                <input type="password" required placeholder="set your password" name="password">
            </div>
        </div>
        <input type="submit" value="submit" class="btn">
    </form>
  </div>
</div>

<?= $this->endSection(); ?>