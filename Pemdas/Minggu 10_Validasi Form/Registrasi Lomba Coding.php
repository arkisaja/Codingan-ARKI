<?php
declare(strict_types=1);

const KATEGORI = [
    'web'       => 'Web Development',
    'mobile'    => 'Mobile App',
    'algoritma' => 'Algoritma & Struktur Data',
    'game'      => 'Game Development',
];

const PESERTA = [
    'individu' => 'Individu',
    'tim'      => 'Tim (2–3 orang)',
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$fields = [
    'nama'     => '',
    'email'    => '',
    'hp'       => '',
    'umur'     => '',
    'github'   => '',
    'kategori' => '',
    'peserta'  => '',
];

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($fields as $key => $_) {
        $fields[$key] = trim((string)($_POST[$key] ?? ''));
    }

    $panjangNama = mb_strlen($fields['nama']);
    if ($panjangNama < 1 || $panjangNama > 50) {
        $errors['nama'] = 'Nama wajib diisi, panjang 1–50 karakter.';
    }

    if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid.';
    }

    if (!preg_match('/^(?:\+62|62|0)8[1-9][0-9]{6,10}$/', $fields['hp'])) {
        $errors['hp'] = 'Nomor HP tidak valid. Contoh: 081234567890 atau +6281234567890.';
    }

    if (!ctype_digit($fields['umur']) || (int)$fields['umur'] < 17 || (int)$fields['umur'] > 19) {
        $errors['umur'] = 'Umur harus antara 17–19 tahun. Data tidak dapat disimpan.';
    }

    if ($fields['github'] !== '') {
        if (!filter_var($fields['github'], FILTER_VALIDATE_URL) || !preg_match('#^https?://#i', $fields['github'])) {
            $errors['github'] = 'URL repositori GitHub tidak valid. Gunakan format https://github.com...';
        }
    }

    if (!array_key_exists($fields['kategori'], KATEGORI)) {
        $errors['kategori'] = 'Pilih kategori lomba yang tersedia.';
    }

    if (!array_key_exists($fields['peserta'], PESERTA)) {
        $errors['peserta'] = 'Pilih jenis peserta.';
    }

    if ($errors === []) {
        $success = true;
    }
}
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi Lomba Coding</title>
<style>
    body { font-family: system-ui, sans-serif; background: #f4f6f8; margin: 0; padding: 24px; }
    .card { max-width: 520px; margin: 0 auto; background: #fff; padding: 24px; border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    h1 { font-size: 1.4rem; margin-top: 0; }
    .field { margin-bottom: 16px; }
    label, .legend { display: block; font-weight: 600; margin-bottom: 6px; }
    input[type=text], input[type=email], input[type=tel], input[type=number], input[type=url], select {
        width: 100%; box-sizing: border-box; padding: 9px 10px; border: 1px solid #bbb; border-radius: 6px; font-size: 1rem;
    }
    input.invalid, select.invalid { border-color: #d93025; background: #fff5f5; }
    .error { color: #d93025; font-size: .875rem; margin-top: 4px; }
    .warning { color: #b26a00; font-size: .875rem; margin-top: 4px; display: none; }
    fieldset { border: none; padding: 0; margin: 0; }
    .radio-item { margin-right: 16px; }
    button { background: #1a73e8; color: #fff; border: none; padding: 10px 18px; border-radius: 6px; font-size: 1rem; cursor: pointer; }
    .success { background: #e6f4ea; color: #137333; padding: 16px; border-radius: 8px; }
    dl { display: grid; grid-template-columns: max-content 1fr; gap: 6px 12px; }
    dt { font-weight: 600; }
    dd { margin: 0; word-break: break-word; }
</style>
</head>
<body>
<div class="card">

<?php if ($success): ?>
    <div class="success">
        <strong>Registrasi berhasil!</strong> Data kamu sudah tercatat.
    </div>
    <h2 style="font-size:1.1rem">Ringkasan</h2>
    <dl>
        <dt>Nama</dt> <dd><?= e($fields['nama']) ?></dd>
        <dt>Email</dt> <dd><?= e($fields['email']) ?></dd>
        <dt>No. HP</dt> <dd><?= e($fields['hp']) ?></dd>
        <dt>Umur</dt> <dd><?= e($fields['umur']) ?> tahun</dd>
        <dt>GitHub</dt> <dd><?= $fields['github'] !== '' ? e($fields['github']) : '-' ?></dd>
        <dt>Kategori</dt> <dd><?= e(KATEGORI[$fields['kategori']]) ?></dd>
        <dt>Peserta</dt> <dd><?= e(PESERTA[$fields['peserta']]) ?></dd>
    </dl>
    <p><a href="">Daftar lagi</a></p>

<?php else: ?>
    <h1>Registrasi Lomba Coding</h1>
    <form method="post" action="" novalidate>

        <div class="field">
            <label for="nama">Nama <span aria-hidden="true">*</span></label>
            <input type="text" id="nama" name="nama" maxlength="50" required
                value="<?= e($fields['nama']) ?>"
                class="<?= isset($errors['nama']) ? 'invalid' : '' ?>">
            <?php if (isset($errors['nama'])): ?>
                <div class="error"><?= e($errors['nama']) ?></div>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="email">Email <span aria-hidden="true">*</span></label>
            <input type="email" id="email" name="email" required
                value="<?= e($fields['email']) ?>"
                class="<?= isset($errors['email']) ? 'invalid' : '' ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?= e($errors['email']) ?></div>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="hp">Nomor HP <span aria-hidden="true">*</span></label>
            <input type="tel" id="hp" name="hp" required placeholder="081234567890"
                value="<?= e($fields['hp']) ?>"
                class="<?= isset($errors['hp']) ? 'invalid' : '' ?>">
            <?php if (isset($errors['hp'])): ?>
                <div class="error"><?= e($errors['hp']) ?></div>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="umur">Umur (17–19 tahun) <span aria-hidden="true">*</span></label>
            <input type="number" id="umur" name="umur" min="17" max="19" required
                value="<?= e($fields['umur']) ?>"
                class="<?= isset($errors['umur']) ? 'invalid' : '' ?>">
            <div class="warning" id="umur-warning">Umur di luar rentang 17–19 tahun.</div>
            <?php if (isset($errors['umur'])): ?>
                <div class="error"><?= e($errors['umur']) ?></div>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="github">URL Repositori GitHub (opsional)</label>
            <input type="url" id="github" name="github" placeholder="https://github.comusername/repo"
                value="<?= e($fields['github']) ?>"
                class="<?= isset($errors['github']) ? 'invalid' : '' ?>">
            <?php if (isset($errors['github'])): ?>
                <div class="error"><?= e($errors['github']) ?></div>
            <?php endif; ?>
        </div>

        <div class="field">
            <label for="kategori">Kategori Lomba <span aria-hidden="true">*</span></label>
            <select id="kategori" name="kategori" required class="<?= isset($errors['kategori']) ? 'invalid' : '' ?>">
                <option value="">-- Pilih kategori --</option>
                <?php foreach (KATEGORI as $value => $label): ?>
                    <option value="<?= e($value) ?>" <?= $fields['kategori'] === $value ? 'selected' : '' ?>>
                        <?= e($label) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['kategori'])): ?>
                <div class="error"><?= e($errors['kategori']) ?></div>
            <?php endif; ?>
        </div>

        <div class="field">
            <fieldset>
                <legend class="legend">Jenis Peserta <span aria-hidden="true">*</span></legend>
                <?php foreach (PESERTA as $value => $label): ?>
                    <label class="radio-item" style="font-weight:normal">
                        <input type="radio" name="peserta" value="<?= e($value) ?>"
                            <?= $fields['peserta'] === $value ? 'checked' : '' ?>>
                        <?= e($label) ?>
                    </label>
                <?php endforeach; ?>
                <?php if (isset($errors['peserta'])): ?>
                    <div class="error"><?= e($errors['peserta']) ?></div>
                <?php endif; ?>
            </fieldset>
        </div>

        <button type="submit">Daftar</button>
    </form>
<?php endif; ?>

</div>

<script>
(function () {
    const umur = document.getElementById('umur');
    const warn = document.getElementById('umur-warning');
    if (!umur || !warn) return;
    const cek = () => {
        const v = Number(umur.value);
        const di = umur.value !== '' && v >= 17 && v <= 19;
        warn.style.display = (umur.value !== '' && !di) ? 'block' : 'none';
    };
    umur.addEventListener('input', cek);
    cek();
})();
</script>
</body>
</html>
