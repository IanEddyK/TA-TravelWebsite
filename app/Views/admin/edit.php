<?= $this->extend('admin/admintemplate'); ?>

<?= $this->section('admin'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4 mb-4"><?= $package['title']; ?></h1>
                      <div class="card px-4 py-5 shadow-lg ">
                        <form action="/admin/updatepackage/<?= $package['package_id']; ?>" method="post" enctype="multipart/form-data">
                          <?= csrf_field() ?>
                          <input type="hidden" name="package_id" value="<?= $package['package_id']; ?>">
                          <input type="hidden" name="OldImage" value="<?= $package['image']; ?>">

                          <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input name="title" type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" placeholder="Package title" value="<?= $package['title'] ?>">
                            <div class="invalid-feedback">
                                  <?= $validation->getError('title'); ?>
                                </div>
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text">Location</span>
                            <input name="location" type="text" class="form-control" placeholder="Package location" value="<?= $package['location'] ?>">
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input name="price" type="text" class="form-control" value="<?= $package['price']; ?>">
                            <span class="input-group-text">.00</span>
                          </div>

                          <div class="col-sm-8">
                            <div class="mb-3">
                                <input class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" type="file" id="image" name="image">
                                <div class="invalid-feedback">
                                  <?= $validation->getError('image'); ?>
                                </div>
                            </div>
                          </div>
                          <button class="btn btn-warning" type="submit">Update</button>
                        </form>
                        <a href="/admin" class="mt-2" style="text-decoration: none; text-transform: capitalize;">back to dashboard</a>
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