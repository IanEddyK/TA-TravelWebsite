<?= $this->extend('admin/admintemplate'); ?>

<?= $this->section('admin'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?= session()->getFlashdata('msg'); ?>
                            </div>
                        <?php endif; ?>
                        <h1 class="mt-4 mb-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Packages</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" style='text-decoration:none;' href="#packages">
                                            <?= $PTotal; ?>
                                        </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Books</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" style='text-decoration:none;' href="/invoices">
                                            <?= $ITotal; ?>
                                        </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" style='text-decoration:none;' href="/users">
                                            <?= $UTotal; ?>
                                        </a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Books Chart
                                        <div class="col-sm-3 mt-3">
                                            <input type="number" class="form-control" onchange="getTransaction()" id="year" value="<?= date('Y') ?>">
                                        </div>
                                    </div>
                                    <div class="card-body"><canvas id="booksChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Total Customer Chart
                                        <div class="col-sm-3 mt-3">
                                            <input type="number" class="form-control" onchange="getCustomer()" id="customer_year" value="<?= date('Y') ?>">
                                        </div>
                                    </div>
                                    <div class="card-body"><canvas id="customerChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" id="packages">
                                <i class="fas fa-table me-1"></i>
                                Packages
                            </div>
                            <div class="card-body">
                                <a href="/create" class="btn btn-primary mb-3">New Package</a>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($packages as $p) : ?>
                                        <tr>
                                            <td><?= $p['title']; ?></td>
                                            <td><?= $p['location']; ?></td>
                                            <td><img src="/img/<?= $p['image']; ?>" alt=""></td>
                                            <td><?= $p['price']; ?></td>
                                            <td>
                                                <a href="/editpackage/<?= $p['package_id']; ?>" class="btn btn-warning">Edit</a>
                                                <a href="/deletepackage/<?= $p['package_id']; ?>" class="btn btn-danger">Delete</a>
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