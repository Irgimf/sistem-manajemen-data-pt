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
                    <th width="5%">No</th>
                    <th class="text-start" width="25%">Nama PT</th>
                    <th width="20%">Nama PJBU</th>
                    <th width="15%">No KTA</th>
                    <th width="15%">Kualifikasi</th>
                    <th width="10%">Kategori SBU</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($companies as $c): ?>
                <tr>
                    <td class="text-muted"><?= $i++; ?></td>
                    <td class="text-start fw-semibold text-dark"><?= esc($c['nama_pt']); ?></td>
                    <td class="text-muted"><?= esc($c['nama_pjbu']); ?></td>
                    <td><span class="badge rounded-pill badge-soft-secondary px-3 py-2"><?= esc($c['no_kta']); ?></span></td>
                    <td>
                        <?php 
                            $k = strtolower($c['kualifikasi'] ?? '');
                            $bg = 'badge-soft-primary';
                            if($k == 'kecil') $bg = 'badge-soft-success';
                            else if($k == 'menengah') $bg = 'badge-soft-warning';
                            else if($k == 'besar') $bg = 'badge-soft-danger';
                        ?>
                        <span class="badge rounded-pill <?= $bg; ?> px-3 py-2"><?= strtoupper($c['kualifikasi'] ?? ''); ?></span>
                    </td>
                    <td>
                        <?php 
                            $kat = isset($c['kategori_sbu']) && !empty($c['kategori_sbu']) ? $c['kategori_sbu'] : '-';
                        ?>
                        <span class="badge rounded-pill badge-soft-secondary px-3 py-2"><?= esc($kat); ?></span>
                    </td>
                    <td>
                        <a href="/sbu/detail/<?= $c['id']; ?>" class="btn btn-sm px-3 rounded-pill fw-semibold" style="background-color: var(--inkindo-blue); color: white;">Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        
    <?php if(empty($companies)): ?>
        <div class="text-center py-5 text-muted">Belum ada data PT terdaftar. Pastikan data Perusahaan telah diisi terlebih dahulu.</div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
