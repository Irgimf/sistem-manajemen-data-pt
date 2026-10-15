<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 mt-2">
    <h3 class="fw-bold" style="color: var(--inkindo-blue);"><?= $title; ?></h3>
</div>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="table-custom-wrap">
    <div class="table-responsive" style="overflow-x: visible;">
        <table class="table-custom text-center align-middle">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th class="text-start" width="30%">Username</th>
                    <th width="20%">Role</th>
                    <th width="25%">Tanggal Dibuat</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($users as $u) : ?>
                <tr>
                    <td class="text-muted"><?= $i++; ?></td>
                    <td class="text-start fw-semibold text-dark"><?= $u['username']; ?></td>
                    <td><span class="badge rounded-pill badge-soft-secondary px-3 py-2"><?= $u['role']; ?></span></td>
                    <td class="text-muted small"><?= date('d-m-Y H:i', strtotime($u['created_at'])); ?></td>
                    <td>
                        <a href="/users/delete/<?= $u['id']; ?>" class="btn btn-sm btn-danger px-3 rounded-pill fw-semibold" onclick="return confirm('Menghapus akun ini akan menghapus semua data Perusahaan dan SBU miliknya. Apakah Anda yakin?');">Hapus Akun</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($users)): ?>
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted border-0">Belum ada akun user yang terdaftar.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
