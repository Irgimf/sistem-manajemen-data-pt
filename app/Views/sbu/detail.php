<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="mb-4 mt-2">
    <a href="/sbu" class="btn btn-outline-secondary btn-sm mb-3"><i class="bi bi-arrow-left"></i> Kembali ke Daftar PT</a>
    <h3 class="fw-bold" style="color: var(--inkindo-blue);"><?= $title; ?></h3>
</div>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- MASTER: INFORMASI PERUSAHAAN -->
<div class="card card-custom mb-4">
    <div class="card-header bg-light fw-bold text-uppercase" style="color: var(--inkindo-blue);">
        Informasi Perusahaan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-sm table-borderless mb-0">
                    <tr>
                        <td width="35%" class="text-muted">Nama PT</td>
                        <td width="5%">:</td>
                        <td class="fw-semibold"><?= esc($company['nama_pt']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Nama PJBU</td>
                        <td>:</td>
                        <td class="fw-semibold"><?= esc($company['nama_pjbu']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Kualifikasi</td>
                        <td>:</td>
                        <td>
                            <?php 
                                $k = strtolower($company['kualifikasi']);
                                $bg = 'bg-primary';
                                if($k == 'kecil') $bg = 'bg-success';
                                else if($k == 'menengah') $bg = 'bg-warning text-dark';
                                else if($k == 'besar') $bg = 'bg-danger';
                            ?>
                            <span class="badge <?= $bg; ?>"><?= strtoupper($company['kualifikasi']); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Kategori SBU</td>
                        <td>:</td>
                        <td>
                            <?php 
                                $kat = isset($company['kategori_sbu']) && !empty($company['kategori_sbu']) ? $company['kategori_sbu'] : '-';
                            ?>
                            <span class="badge bg-secondary fw-semibold"><?= $kat; ?></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-sm table-borderless mb-0">
                    <tr>
                        <td width="35%" class="text-muted">Nomor KTA</td>
                        <td width="5%">:</td>
                        <td class="fw-semibold"><?= esc($company['no_kta']); ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Alamat PT</td>
                        <td>:</td>
                        <td class="fw-semibold"><?= esc($company['alamat_pt']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SECTION: FORM TAMBAH SBU (INLINE) -->
<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white border-bottom-0 pt-3 pb-0">
        <button class="btn btn-inkindo" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFormSbu" aria-expanded="false">
            + Tambah Data KBLI (SBU)
        </button>
    </div>
    <div class="collapse" id="collapseFormSbu">
        <div class="card-body bg-light rounded mt-3 mx-3 mb-3 border">
            <h5 class="fw-bold mb-3">Formulir SBU Baru</h5>
            <form action="/sbu/store" method="post">
                <input type="hidden" name="company_id" value="<?= $companyId; ?>">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Kode KBLI</label>
                        <select class="form-select" name="kode_kbli" id="kodeKbliSelect" required>
                            <option value="">Pilih Kode KBLI...</option>
                            <option value="AR001">AR001</option>
                            <option value="AR002">AR002</option>
                            <option value="AR003">AR003</option>
                            <option value="RK001">RK001</option>
                            <option value="RK002">RK002</option>
                            <option value="AL001">AL001</option>
                            <option value="AL002">AL002</option>
                            <option value="AL003">AL003</option>
                            <option value="AL004">AL004</option>
                            <option value="PR101">PR101</option>
                            <option value="PR102">PR102</option>
                            <option value="PR103">PR103</option>
                            <option value="PR104">PR104</option>
                            <option value="PR201">PR201</option>
                            <option value="70209">70209</option>
                            <option value="70201">70201</option>
                            <option value="70202">70202</option>
                            <option value="70203">70203</option>
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label fw-semibold">Judul KBLI</label>
                        <input type="text" class="form-control bg-white" name="judul_kbli" id="judulKbliInput" readonly required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Kualifikasi SBU</label>
                        <select class="form-select" name="kualifikasi" required>
                            <option value="">Pilih Kualifikasi...</option>
                            <option value="Kecil">Kecil</option>
                            <option value="Menengah">Menengah</option>
                            <option value="Besar">Besar</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Masa Berlaku</label>
                        <input type="date" class="form-control" name="masa_berlaku" required>
                    </div>
                </div>
                <div class="text-end mt-2">
                    <button type="submit" class="btn btn-primary px-4">Simpan SBU</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DETAIL: DAFTAR SBU -->
<div class="card card-custom">
    <div class="card-header bg-light fw-bold text-uppercase" style="color: var(--inkindo-blue);">
        Daftar KBLI
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead style="background-color: var(--inkindo-blue); color: white;">
                    <tr class="text-center">
                        <th class="py-3" width="5%">No</th>
                        <th class="py-3">Kode KBLI</th>
                        <th class="py-3 text-start">Judul KBLI</th>
                        <th class="py-3">Kualifikasi</th>
                        <th class="py-3">Masa Berlaku</th>
                        <th class="py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($sbus as $s): ?>
                        <tr class="text-center bg-white">
                            <td class="fw-semibold"><?= $i++; ?></td>
                            <td><span class="badge bg-dark fs-6"><?= $s['kode_kbli']; ?></span></td>
                            <td class="text-start fw-semibold"><?= $s['judul_kbli']; ?></td>
                            <td><span class="badge bg-secondary"><?= $s['kualifikasi']; ?></span></td>
                            <td><?= date('d-m-Y', strtotime($s['masa_berlaku'])); ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary px-3 rounded-pill fw-semibold" data-bs-toggle="modal" data-bs-target="#editSbuModal<?= $s['id']; ?>">
                                        Edit
                                    </button>
                                    <a href="/sbu/projects/<?= $s['id']; ?>" class="btn btn-sm btn-warning px-3 rounded-pill text-dark fw-semibold">
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- KUMPULAN MODAL EDIT SBU -->
<?php foreach($sbus as $s): ?>
    <div class="modal fade" id="editSbuModal<?= $s['id']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold">Edit KBLI - <?= $s['kode_kbli']; ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/sbu/update/<?= $s['id']; ?>" method="post">
                    <div class="modal-body text-start">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Kode KBLI</label>
                                <select class="form-select" name="kode_kbli" id="editKodeKbli<?= $s['id']; ?>" required onchange="updateEditJudul(<?= $s['id']; ?>)">
                                    <option value="AR001" <?= ($s['kode_kbli'] == 'AR001') ? 'selected' : ''; ?>>AR001</option>
                                    <option value="AR002" <?= ($s['kode_kbli'] == 'AR002') ? 'selected' : ''; ?>>AR002</option>
                                    <option value="AR003" <?= ($s['kode_kbli'] == 'AR003') ? 'selected' : ''; ?>>AR003</option>
                                    <option value="RK001" <?= ($s['kode_kbli'] == 'RK001') ? 'selected' : ''; ?>>RK001</option>
                                    <option value="RK002" <?= ($s['kode_kbli'] == 'RK002') ? 'selected' : ''; ?>>RK002</option>
                                    <option value="AL001" <?= ($s['kode_kbli'] == 'AL001') ? 'selected' : ''; ?>>AL001</option>
                                    <option value="AL002" <?= ($s['kode_kbli'] == 'AL002') ? 'selected' : ''; ?>>AL002</option>
                                    <option value="AL003" <?= ($s['kode_kbli'] == 'AL003') ? 'selected' : ''; ?>>AL003</option>
                                    <option value="AL004" <?= ($s['kode_kbli'] == 'AL004') ? 'selected' : ''; ?>>AL004</option>
                                    <option value="PR101" <?= ($s['kode_kbli'] == 'PR101') ? 'selected' : ''; ?>>PR101</option>
                                    <option value="PR102" <?= ($s['kode_kbli'] == 'PR102') ? 'selected' : ''; ?>>PR102</option>
                                    <option value="PR103" <?= ($s['kode_kbli'] == 'PR103') ? 'selected' : ''; ?>>PR103</option>
                                    <option value="PR104" <?= ($s['kode_kbli'] == 'PR104') ? 'selected' : ''; ?>>PR104</option>
                                    <option value="PR201" <?= ($s['kode_kbli'] == 'PR201') ? 'selected' : ''; ?>>PR201</option>
                                    <option value="70209" <?= ($s['kode_kbli'] == '70209') ? 'selected' : ''; ?>>70209</option>
                                    <option value="70201" <?= ($s['kode_kbli'] == '70201') ? 'selected' : ''; ?>>70201</option>
                                    <option value="70202" <?= ($s['kode_kbli'] == '70202') ? 'selected' : ''; ?>>70202</option>
                                    <option value="70203" <?= ($s['kode_kbli'] == '70203') ? 'selected' : ''; ?>>70203</option>
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-semibold">Judul KBLI</label>
                                <input type="text" class="form-control bg-light" name="judul_kbli" id="editJudulKbli<?= $s['id']; ?>" value="<?= esc($s['judul_kbli']); ?>" readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Kualifikasi SBU</label>
                                <select class="form-select" name="kualifikasi" required>
                                    <option value="Kecil" <?= ($s['kualifikasi'] == 'Kecil') ? 'selected' : ''; ?>>Kecil</option>
                                    <option value="Menengah" <?= ($s['kualifikasi'] == 'Menengah') ? 'selected' : ''; ?>>Menengah</option>
                                    <option value="Besar" <?= ($s['kualifikasi'] == 'Besar') ? 'selected' : ''; ?>>Besar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Masa Berlaku</label>
                                <input type="date" class="form-control" name="masa_berlaku" value="<?= esc($s['masa_berlaku']); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <a href="/sbu/delete/<?= $s['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus KBLI ini beserta seluruh proyeknya?');">Hapus KBLI</a>
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary px-4">Update KBLI</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    const dataKbli = {
        'AR001': 'Jasa Arsitektural Bangunan Gedung dan non Hunian',
        'AR002': 'Jasa Arsitektural Lainnya',
        'AR003': 'Jasa Desain Interior Pada Bangunan Gedung dan Bangunan Sipil',
        'RK001': 'Jasa Rekayasa Konstruksi Bangunan Gedung Hunian dan Nonhunian',
        'RK002': 'Jasa Rekayasa Pekerjaan Teknik Sipil Sumber Daya Air',
        'AL001': 'Jasa Pengembangan Pemanfaatan Ruang',
        'AL002': 'Jasa Pengembangan Wilayah',
        'AL003': 'Jasa Pengembangan',
        'AL004': 'Jasa Pengembangan Lingkungan Bangunan dan Lanskap',
        'PR101': 'Jasa Perencanaan dan Perancangan Perkotaan',
        'PR102': 'Jasa Perencanaan Wilayah',
        'PR103': 'Jasa Perencanaan dan Perancangan Lingkungan Bangunan dan Lansekap',
        'PR104': 'jasa Pengembangan Pemanfaatan Ruang',
        'PR201': 'Jasa Pengawas dan Pengendali Penataan Ruang',
        '70209': 'Aktivitas Konsultasi Manajemen dan Bisnis Lainnya',
        '70201': 'Aktivitas Konsultasi Manajemen dan Bisnis Pariwisata',
        '70202': 'Aktivitas Konsultasi Manajemen dan Bisnis Industri',
        '70203': 'Aktivitas Konsultasi Manajemen dan Bisnis Perdagangan'
    };

    // Untuk form tambah
    document.getElementById('kodeKbliSelect')?.addEventListener('change', function() {
        const selected = this.value;
        const judulInput = document.getElementById('judulKbliInput');
        if(selected && dataKbli[selected]) {
            judulInput.value = dataKbli[selected];
        } else {
            judulInput.value = '';
        }
    });

    // Untuk form edit (dipanggil via onchange inline pada select)
    function updateEditJudul(id) {
        const selectEl = document.getElementById('editKodeKbli' + id);
        const inputEl = document.getElementById('editJudulKbli' + id);
        if(selectEl && inputEl) {
            const selected = selectEl.value;
            if(selected && dataKbli[selected]) {
                inputEl.value = dataKbli[selected];
            } else {
                inputEl.value = '';
            }
        }
    }
</script>
<?= $this->endSection() ?>
