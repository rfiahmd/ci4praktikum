<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<!-- Start Body Content Area -->
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Data Jurusan</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Data Jurusan</span>
        </li>
    </ul>
</div>
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-0">List Jurusan</h4>
            <div class="d-sm-flex align-items-center">
                <button class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Tambah Data</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- content -->
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jurusan</th>
                            <th scope="col">Jumlah Mahasiswa</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jurusan as $index => $item) : ?>
                            <tr>
                                <td><?= $index + 1; ?>.</td>
                                <td><?= $item['nama_jurusan']; ?></td>
                                <td><?= $item['jumlah_mhs']; ?></td>
                                <td>
                                    <div class="dropdown action-opt">
                                        <button class="btn bg p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-feather="more-horizontal"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                            <li>
                                                <button class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEdit<?= $item['id']; ?>" aria-controls="offcanvasRight">
                                                    <i data-feather="edit-3"></i>
                                                    Edit
                                                </button>
                                            </li>
                                            <!-- Tombol Hapus -->
                                            <li>
                                                <button class="dropdown-item" id="deleteJurusanBtn" data-id="<?= $item['id']; ?>" data-nama="<?= $item['nama_jurusan']; ?>">
                                                    <i data-feather="trash-2"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- form edit -->
                            <div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="offcanvasEdit<?= $item['id']; ?>" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header border-bottom p-4">
                                    <h5 class="offcanvas-title fs-18 mb-0" id="offcanvasRightLabel">Edit Jurusan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body p-4">
                                    <form action="/jurusan/<?= $item['id']; ?>/edit" method="post" novalidate>
                                        <?= csrf_field(); ?>
                                        <div class="form-group mb-4">
                                            <label class="label">Nama Jurusan</label>
                                            <input name="nama_jurusan" type="text" class="form-control text-dark" value="<?= $item['nama_jurusan']; ?>" placeholder="Masukkan Nama ....">
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- form tambah -->
<div class="offcanvas offcanvas-end bg-white" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom p-4">
        <h5 class="offcanvas-title fs-18 mb-0" id="offcanvasRightLabel">Tambah Jurusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <form action="/jurusan/tambah" method="post" novalidate>
            <?= csrf_field(); ?>
            <div class="form-group mb-4">
                <label class="label">Nama Jurusan</label>
                <input name="nama_jurusan" type="text" class="form-control text-dark" placeholder="Masukkan Nama ....">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- End Body Content Area -->

<?= $this->endSection(); ?>