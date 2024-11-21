<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Detail Mahasiswa</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="/" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Detail Mahasiswa</span>
        </li>
    </ul>
</div>

<div class="row justify-content-center">
    <div class="col-xxl-8">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                    <h4 class="fw-semibold fs-18 mb-0">Profile</h4>
                </div>
                <!-- Konten -->
                <style>
                    /* Kontainer untuk Batik dan Foto */
                    .centered-container {
                        position: relative;
                        display: flex;
                        justify-content: center;
                        /* Tengah horizontal */
                        align-items: center;
                        /* Tengah vertikal */
                        margin-bottom: 20px;
                        /* Jarak ke teks */
                        padding: 20px;
                        /* Ruang di dalam kotak */
                        background-image: url('<?= base_url("admin") ?>/assets/images/wp.jpg');
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        border-radius: 10px;
                        /* Sudut kotak */
                        width: 100%;
                        /* Lebar penuh */
                        height: 200px;
                        /* Tinggi background */
                    }

                    /* Foto Bundar */
                    .profile-photo {
                        width: 150px;
                        height: 150px;
                        border-radius: 50%;
                        object-fit: cover;
                        border: 4px solid white;
                        z-index: 2;
                        /* Di atas background */
                    }

                    /* Nama dan Role */
                    .text-center-content {
                        text-align: center;
                    }
                </style>

                <!-- Profil -->
                <div class="stats-box style-six style-five bg-white card border-0 rounded-10 mb-4 overflow-hidden text-center-content">
                    <!-- Kontainer Tengah -->
                    <div class="centered-container">
                        <!-- Foto -->
                        <img src="<?= base_url('') ?>/uploads/foto/<?= $mahasiswa['foto']; ?>" class="profile-photo" alt="user">
                    </div>
                    <!-- Nama dan Role -->
                    <span class="fs-14">Hallo, Saya</span>
                    <h2 class="fs-32 fw-semibold mb-1"><?= $mahasiswa['nama']; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                    <h4 class="fw-bold fs-18 mb-0">About Me</h4>
                </div>
                <!-- content -->
                <p class="mb-4">Hi I'm Andrew Burns,has been the industry's standard dummy text ever since
                    the 1500s, when an unknown printer took.</p>
                <ul class="ps-0 mb-0 list-unstyled">
                    <li class="border-bottom border-color-gray mb-3 pb-3">
                        <span class="fw-semibold text-dark w-130 d-inline-block">Nama :</span>
                        <span><?= $mahasiswa['nama']; ?></span>
                    </li>
                    <li class="border-bottom border-color-gray mb-3 pb-3">
                        <span class="fw-semibold text-dark w-130 d-inline-block">NIM :</span>
                        <span><?= $mahasiswa['nim']; ?></span>
                    </li>
                    <li class="border-bottom border-color-gray mb-3 pb-3">
                        <span class="fw-semibold text-dark w-130 d-inline-block">Jurusan :</span>
                        <span><?= $mahasiswa['nama_jurusan']; ?></span>
                    </li>
                    <li class="border-bottom border-color-gray mb-3 pb-3">
                        <span class="fw-semibold text-dark w-130 d-inline-block">Jenis Kelamin :</span>
                        <span><?= $mahasiswa['jenis_kelamin'] === 'L' ? 'Laki-Laki' : 'Perempuan'; ?></span>
                    </li>
                    <li class="border-bottom border-color-gray mb-3 pb-3">
                        <span class="fw-semibold text-dark w-130 d-inline-block">Alamat :</span>
                        <span><?= $mahasiswa['alamat']; ?></span>
                    </li>
                    <li>
                        <span class="fw-semibold text-dark w-130 d-inline-block">No. Telepon :</span>
                        <span><?= $mahasiswa['no_telepon']; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>