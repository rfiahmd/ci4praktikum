<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <?php if (session()->getFlashdata('success')) : ?>
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i data-feather="check-circle" class="text-success"></i>
                <strong class="me-auto text-success">Sukses</strong>
                <small>
                    <?php
                        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Asia/Jakarta (WIB)
                        echo date('H:i'); // Menampilkan waktu WIB
                        ?>
                    , Sekarang
                </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <?php if (session()->getFlashdata('error')) : ?>
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i data-feather="x-circle" class="text-error"></i>
                <strong class="me-auto text-error">Gagal</strong>
                <small>
                    <?php
                        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Asia/Jakarta (WIB)
                        echo date('H:i'); // Menampilkan waktu WIB
                        ?>
                    , Sekarang
                </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <?php if (session()->getFlashdata('info')) : ?>
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i data-feather="info" class="text-info"></i>
                <strong class="me-auto text-info">Informasi</strong>
                <small>
                    <?php
                        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Asia/Jakarta (WIB)
                        echo date('H:i'); // Menampilkan waktu WIB
                        ?>
                    , Sekarang
                </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('info'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <?php if (session()->getFlashdata('warning')) : ?>
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
            <i data-feather="alert-circle" class="text-warning"></i>
            <strong class="me-auto text-warning">Peringatan</strong>
                <small>
                    <?php
                        date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Asia/Jakarta (WIB)
                        echo date('H:i'); // Menampilkan waktu WIB
                        ?>
                    , Sekarang
                </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= session()->getFlashdata('warning'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($validation)): ?>
    <?php foreach ($validation->getErrors() as $error): ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast slide-in-right" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-danger">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-danger">
                    <?= $error; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
