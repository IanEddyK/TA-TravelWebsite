<?= $this->extend('admin/admintemplate'); ?>

<?= $this->section('admin'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h1 class="mt-4 mb-4">New Package</h1>
                      <div class="card px-4 py-5 shadow-lg ">
                        <form action="/admin/save" method="post" enctype="multipart/form-data">
                          <?= csrf_field() ?>

                          <div class="input-group mb-3">
                            <span class="input-group-text">Title</span>
                            <input name="title" type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" placeholder="Package title">
                            <div class="invalid-feedback">
                                <?= $validation->getError('title'); ?>
                            </div>
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text">Location</span>
                            <input name="location" type="text" class="form-control" placeholder="Package location">
                          </div>

                          <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input name="price" type="text" class="form-control">
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
                          <button class="btn btn-primary" type="submit">Insert</button>
                        </form>
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