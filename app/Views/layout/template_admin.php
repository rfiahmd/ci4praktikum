<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/farol/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Sep 2024 02:11:44 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">

    <?= $this->include('components/link') ?>

    <style>
        /* Animasi untuk toast yang masuk dari kanan */
        @keyframes slideInRight {
            0% {
                transform: translateX(100%);
                /* Mulai dari luar layar (kanan) */
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                /* Posisikan di tempatnya */
                opacity: 1;
            }
        }

        /* Animasi untuk toast yang keluar ke kanan (lebih lambat) */
        @keyframes slideOutRight {
            0% {
                transform: translateX(0);
                /* Toast mulai dari posisi normal */
                opacity: 1;
            }

            100% {
                transform: translateX(100%);
                /* Toast bergerak ke kanan */
                opacity: 0;
            }
        }

        /* Terapkan animasi masuk pada elemen toast */
        .toast.slide-in-right {
            animation: slideInRight 0.5s ease-out forwards;
            /* Durasi masuk */
        }

        /* Terapkan animasi keluar ke kanan dengan durasi lebih lama */
        .toast.slide-out-right {
            animation: slideOutRight 1s ease-in forwards;
            /* Durasi keluar lebih lama */
            visibility: visible;
            /* Pastikan toast tetap terlihat selama animasi keluar */
        }

        /* Penataan posisi stacking toast */
        .toast-container {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 1rem;
            z-index: 9999;
            /* Pastikan toast di atas elemen lainnya */
            display: flex;
            flex-direction: column-reverse;
            /* Agar toast yang pertama masuk di bawah */
        }

        /* Tambahkan jarak antar toast */
        .toast-container .toast {
            margin-bottom: 10px;
        }

        /* Default styling untuk toast (sebelum animasi dimulai) */
        .toast {
            visibility: hidden;
            /* Hide toast pada awalnya */
            opacity: 0;
            /* Pastikan toast tidak terlihat pada awalnya */
            transition: opacity 2s ease;
            /* Transisi opacity secara lembut */
        }

        /* Menampilkan toast setelah animasi dimulai */
        .toast.show {
            visibility: visible;
            opacity: 1;
            transition: opacity 2s ease;
            /* Menjaga efek transisi */
        }

        /* Styling untuk close button pada toast */
        .toast .btn-close {
            /* position: absolute; */
            top: 10px;
            right: 10px;
            opacity: 0.5;
            transition: opacity 0.3s ease;
            /* Memberikan jarak antara tombol close dan tepi kanan */
            margin-right: 10px;
            /* Memberikan jarak ke kanan */
            margin-top: 5px;
            /* Memberikan jarak ke atas */
        }

        .toast .btn-close:hover {
            opacity: 1;
        }

        /* Tambahkan padding atau margin pada body toast agar elemen tidak terlalu rapat */
        .toast-body {
            padding-right: 30px;
            /* Menambahkan ruang di sebelah kanan agar tombol close tidak menempel */
        }
    </style>

    <title><?= $title; ?></title>
</head>

<body>

    <div class="preloader" id="preloader">
        <div class="preloader">
            <div class="waviy position-relative">
                <span class="d-inline-block">F</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">R</span>
                <span class="d-inline-block">O</span>
                <span class="d-inline-block">L</span>
            </div>
        </div>
    </div>

    <?= $this->include('components/seeder') ?>

    <div class="container-fluid">
        <div class="main-content d-flex flex-column">

            <?= $this->include('components/header') ?>

            <div class="content">
                <?= $this->renderSection('content'); ?>
            </div>

            <div class="flex-grow-1"></div>

            <?= $this->include('components/footer') ?>

        </div>
    </div>

    <?= $this->include('components/toast') ?>

    <?= $this->include('components/themes') ?>

    <?= $this->include('components/script') ?>

</body>

<!-- Mirrored from templates.hibootstrap.com/farol/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Sep 2024 02:12:58 GMT -->

</html>