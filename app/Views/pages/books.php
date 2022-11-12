<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<h1>Cancel Reservation</h1>
<select name="reservations" required>
<option value="<?= $id_book['id_book']; ?>"><?= $id_book['id_book']; ?></option>
</select>
<?= $this->endSection(); ?>