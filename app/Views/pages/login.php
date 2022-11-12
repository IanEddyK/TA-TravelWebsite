<?= $this->extend('layout/LoginBg'); ?>

<?= $this->section('content'); ?>

<div class="login-card">
  <h1>Get's started</h1>
  <p>doesn't have any account? <a href="/register">register</a></p>
  <?php if(session()->getFlashdata('msg')):?>
    <div class="alert">
      <?= session()->getFlashdata('msg') ?>
    </div>
    <?php endif; ?>
    <form class="login-form" action="/login/auth" method="post">
        <?= csrf_field(); ?>
        <div class="flex">
            <div class="inputBox">
                <span>email :</span>
                <input type="text" required placeholder="enter your email" name="email">
            </div>
            <div class="inputBox">
                <span>password :</span>
                <input type="password" required placeholder="set your password" name="password">
            </div>
        </div>
        <input type="submit" value="submit" name="send" class="btn">
    </form>
  </div>
</div>

<?= $this->endSection(); ?>