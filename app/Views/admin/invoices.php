<?= $this->extend('admin/admintemplate'); ?>

<?= $this->section('admin'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1>CRUD Invoices</h1>
                        <div class="card mb-4">
                            <div class="card-header" id="packages">
                                <i class="fas fa-table me-1"></i>
                                Invoices
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>User</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Guests</th>
                                            <th>Arrivals</th>
                                            <th>Leaving</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Location</th>
                                            <th>User</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Guests</th>
                                            <th>Arrivals</th>
                                            <th>Leaving</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($invoices as $i) : ?>
                                        <tr>
                                            <td><?= $i['location']; ?></td>
                                            <td><?= $i['name']; ?></td>
                                            <td><?= $i['phone']; ?></td>
                                            <td><?= $i['email']; ?></td>
                                            <td><?= $i['guests']; ?></td>
                                            <td><?= $i['arrivals']; ?></td>
                                            <td><?= $i['leaving']; ?></td>
                                            <td>
                                                <a href="/deleteinvoice/<?= $i['id_book']; ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<?= $this->endSection(); ?>