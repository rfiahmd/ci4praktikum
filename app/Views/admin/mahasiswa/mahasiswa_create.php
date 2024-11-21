<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<!-- Start Body Content Area -->
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Edit Mahasiswa</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Edit Mahasiswa</span>
        </li>
    </ul>
</div>
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-0">Form Edit</h4>
            <div class="d-sm-flex align-items-center">
                <a href="/tambah_mahasiswa" class="border-0 btn btn-info py-1 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i data-feather="align-justify"></i>
                        <span>Data</span>
                    </span>
                </a>
            </div>
        </div>

        <!-- content -->
        <form class="row g-3 needs-validation" action="/mahasiswa/tambah" method="post" enctype="multipart/form-data" novalidate>
            <?= csrf_field(); ?>

            <div class="col-md-8">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label label">Nama</label>
                    <div class="position-relative">
                        <input type="text" name="nama" class="form-control h-58 ps-5 <?= session('validation') ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            <?= session('validation.nama') ?>
                        </div>
                        <i class="ri-user-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20" style="top: 13px !important;"></i>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label label" style="margin-top: 8px">NIM</label>
                    <div class="position-relative">
                        <input name="nim" type="text" class="form-control h-58 ps-5 <?= session('validation') ? 'is-invalid' : '' ?>" value="<?= old('nim') ?>" id="validationCustom03" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            <?= session('validation.nim') ?>
                        </div>
                        <i class="ri-mail-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20" style="top: 13px !important;"></i>
                    </div>
                </div>

                <!-- Input No. Telepon -->
                <div class="col-md-12">
                    <label for="validationCustomTelepon" style="margin-top: 8px" class="form-label label">No. Telepon</label>
                    <div class="position-relative">
                        <input name="no_telepon" type="text" class="form-control h-58 ps-5 <?= session('validation') ? 'is-invalid' : '' ?>" value="<?= old('no_telepon') ?>" id="validationCustomTelepon" required>
                        <div class="invalid-feedback">
                            <?= session('validation.no_telepon') ?>
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <i class="ri-phone-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20" style="top: 13px !important;"></i>
                    </div>
                </div>

                <!-- Input Alamat -->
                <div class="col-md-12">
                    <label for="validationCustom05" style="margin-top: 8px" class="form-label label">Address</label>
                    <div class="position-relative">
                        <input name="alamat" type="text" class="form-control h-58 ps-5 <?= session('validation') ? 'is-invalid' : '' ?>" value="<?= old('alamat') ?>" id="validationCustom05" placeholder="Your location" required>
                        <div class="invalid-feedback">
                            <?= session('validation.alamat') ?>
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <i class="ri-map-pin-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20" style="top: 13px !important;"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 45vh; margin-top: 30px; margin-bottom: -10px">
                    <div class="cardd">
                        <div class="imagesss">
                            <img class="imgg" id="imgContainer" src="<?= base_url('admin') ?>/assets/uploadImg/upload.jpg" width="400" alt="">
                            <p class="imgName"></p>
                        </div>
                        <label class="labell" for="inputGambar">
                            <span class="tmbl">Pilih Foto Profil</span>
                        </label>
                        <input class="inputt" name="foto" type="file" id="inputGambar" accept="image/*" required>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom06" class="form-label label">Jurusan</label>
                <div class="position-relative">
                    <select name="jurusan_id" class="form-select form-control h-58 ps-5 <?= session('validation') ? 'is-invalid' : '' ?>" value="<?= old('jurusan') ?>" id="validationCustom06" required>
                        <option selected disabled value="">Pilih...</option>
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <i class="ri-building-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20" style="top: 13px !important;"></i>
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom06" class="form-label label">Jenis Kelamin</label>
                <div class="position-relative">
                    <select name="jenis_kelamin" class="form-select form-control h-58 ps-5 <?= session('validation') ? 'is-invalid' : '' ?>" value="<?= old('jenis_kelamin') ?>" id="validationCustom06" required>
                        <option selected disabled value="">Pilih...</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('validation.jenis_kelamin') ?>
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <i class="ri-building-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20" style="top: 13px !important;"></i>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary fw-semibold text-white py-2 px-3" type="submit">Submit Form</button>
            </div>
        </form>


    </div>
</div>
<!-- End Body Content Area -->

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection(); ?>