<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <h4 class="mb-4 fw-bold" style="color: var(--inkindo-blue);"><?= $title; ?></h4>
            <form action="/perusahaan/update/<?= $company['id']; ?>" method="post">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-semibold">Nama PT</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pt" value="<?= $company['nama_pt']; ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-semibold">Nama PJBU</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_pjbu" value="<?= $company['nama_pjbu']; ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-semibold">No KTA</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_kta" value="<?= $company['no_kta']; ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-semibold">Kualifikasi</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="kualifikasi" required>
                            <option value="Kecil" <?= ($company['kualifikasi'] == 'Kecil' || strtolower($company['kualifikasi']) == 'kecil') ? 'selected' : ''; ?>>Kecil</option>
                            <option value="Menengah" <?= ($company['kualifikasi'] == 'Menengah' || strtolower($company['kualifikasi']) == 'menengah') ? 'selected' : ''; ?>>Menengah</option>
                            <option value="Besar" <?= ($company['kualifikasi'] == 'Besar' || strtolower($company['kualifikasi']) == 'besar') ? 'selected' : ''; ?>>Besar</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-semibold">Kategori SBU</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="kategori_sbu" required>
                            <option value="Non Jasa Konstruksi" <?= (isset($company['kategori_sbu']) && $company['kategori_sbu'] == 'Non Jasa Konstruksi') ? 'selected' : ''; ?>>Non Jasa Konstruksi</option>
                            <option value="Jasa Konstruksi" <?= (isset($company['kategori_sbu']) && $company['kategori_sbu'] == 'Jasa Konstruksi') ? 'selected' : ''; ?>>Jasa Konstruksi</option>
                            <option value="NJK dan JK" <?= (isset($company['kategori_sbu']) && $company['kategori_sbu'] == 'NJK dan JK') ? 'selected' : ''; ?>>NJK dan JK (Keduanya)</option>
                            <option value="Tidak Punya NJK dan JK" <?= (isset($company['kategori_sbu']) && $company['kategori_sbu'] == 'Tidak Punya NJK dan JK') ? 'selected' : ''; ?>>Tidak Punya NJK dan JK</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 row">
                    <label class="col-sm-3 col-form-label fw-semibold">Alamat PT</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="alamat_pt" rows="3" required><?= $company['alamat_pt']; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-inkindo px-4">Update Data</button>
                        <a href="/perusahaan" class="btn btn-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
