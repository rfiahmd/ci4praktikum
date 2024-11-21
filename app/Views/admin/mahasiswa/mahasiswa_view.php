<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<!-- Start Body Content Area -->
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Data Mahasiswa</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Data Mahasiswa</span>
        </li>
    </ul>
</div>
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-0">List Mahasiswa</h4>
            <div class="d-sm-flex align-items-center">
                <a href="/mahasiswa/tambah" class="border-0 btn btn-primary py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Tambah Data</span>
                    </span>
                </a>
            </div>
        </div>

        <!-- content -->
        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Jenil Kelamin</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $index => $item) : ?>

                            <tr>
                                <td><?= $index + 1; ?>.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 lh-1">
                                                <img src="<?= base_url('') ?>/uploads/foto/<?= $item['foto']; ?>" class="wh-44 rounded-circle" alt="user">
                                            </div>
                                            <div class="flex-grow-1 ms-10">
                                                <h4 class="fw-semibold fs-16 mb-0"><?= $item['nama']; ?></h4>
                                                <!-- <span class="text-gray-light">@jstevenson5c</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $item['nim']; ?></td>
                                <td><?= $item['jenis_kelamin'] === 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                <td><?= $item['nama_jurusan']; ?></td>
                                <td>
                                    <div class="dropdown action-opt">
                                        <button class="btn bg p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-feather="more-horizontal"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                            <li>
                                                <a class="dropdown-item" href="/mahasiswa/<?= $item['id']; ?>/detail">
                                                    <i data-feather="search"></i>
                                                    Detail
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/mahasiswa/<?= $item['id']; ?>/edit">
                                                    <i data-feather="edit-3"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/mahasiswa/<?= $item['id']; ?>/hapus">
                                                    <i data-feather="trash-2"></i>
                                                    Hapus
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- End Body Content Area -->

<?= $this->endSection(); ?>