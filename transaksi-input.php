<?php
include 'koneksi.php';

$result = mysqli_query($koneksi, "SELECT id_transaksi FROM transaksi");
$max = 0;
while ($row = mysqli_fetch_assoc($result)) {
    if (preg_match('/(\d+)/', $row['id_transaksi'], $m)) {
        $max = max($max, (int) $m[1]);
    }
}
$idBaru = 'T' . min($max + 1, 1000);

$barangList = [];
$result = mysqli_query($koneksi, "SELECT id_barang, nama_barang, harga, stock FROM barang ORDER BY id_barang");
while ($b = mysqli_fetch_assoc($result)) {
    $barangList[] = $b;
}

$error = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'stok':
            $error = 'Qty melebihi stok barang yang tersedia.';
            break;
        case 'barang':
            $error = 'Barang tidak ditemukan.';
            break;
        case 'validasi':
            $error = 'Pilih barang dan isi qty dengan benar.';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Input Data Transaksi</h2>
        <p class="page-sub">Catat transaksi penjualan untuk pelanggan.</p>

        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="card">
            <form action="transaksi-input-aksi.php" method="POST" id="form-transaksi">
                <label>ID Transaksi</label>
                <input type="text" name="id_transaksi" value="<?php echo $idBaru; ?>" readonly>

                <label>Barang</label>
                <div class="combo">
                    <input type="text" id="cari-barang" placeholder="Ketik id atau nama barang..." autocomplete="off">
                    <input type="hidden" name="id_barang" id="id_barang">
                    <div class="combo-list" id="combo-list"></div>
                </div>

                <label>Harga</label>
                <input type="text" id="harga" placeholder="Pilih barang dulu" readonly>

                <label>Qty</label>
                <input type="number" name="qty" id="qty" min="1" value="1">

                <label>Total Harga</label>
                <input type="text" id="total" value="Rp 0" readonly>

                <input type="submit" value="Simpan Transaksi">
            </form>
        </div>
    </div>

    <script>
        const barangList = <?php echo json_encode($barangList); ?>;
        const inputCari = document.getElementById('cari-barang');
        const comboList = document.getElementById('combo-list');
        const inputId = document.getElementById('id_barang');
        const inputHarga = document.getElementById('harga');
        const inputQty = document.getElementById('qty');
        const inputTotal = document.getElementById('total');

        let terpilih = null;

        function formatRp(angka) {
            return 'Rp ' + Number(angka).toLocaleString('id-ID');
        }

        function hitungTotal() {
            const harga = terpilih ? Number(terpilih.harga) : 0;
            const qty = parseInt(inputQty.value) || 0;
            inputTotal.value = formatRp(harga * qty);
        }

        function renderList(kataKunci) {
            const kata = kataKunci.trim().toLowerCase();
            const hasil = barangList.filter(b =>
                b.id_barang.toLowerCase().includes(kata) ||
                b.nama_barang.toLowerCase().includes(kata)
            );

            comboList.innerHTML = '';

            if (hasil.length === 0) {
                comboList.innerHTML = '<div class="combo-empty">Barang tidak ditemukan</div>';
                comboList.classList.add('open');
                return;
            }

            hasil.forEach(b => {
                const item = document.createElement('div');
                item.className = 'combo-item';
                item.innerHTML =
                    '<span class="combo-name">' + b.nama_barang + '</span>' +
                    '<span class="combo-meta">' + b.id_barang + ' · Stok ' + b.stock + '</span>';
                item.addEventListener('click', () => pilihBarang(b));
                comboList.appendChild(item);
            });

            comboList.classList.add('open');
        }

        function pilihBarang(b) {
            terpilih = b;
            inputId.value = b.id_barang;
            inputCari.value = b.id_barang + ' — ' + b.nama_barang;
            inputHarga.value = formatRp(b.harga);
            inputQty.max = b.stock;
            hitungTotal();
            comboList.classList.remove('open');
        }

        inputCari.addEventListener('focus', () => renderList(inputCari.value));
        inputCari.addEventListener('input', () => {
            terpilih = null;
            inputId.value = '';
            inputHarga.value = '';
            inputTotal.value = formatRp(0);
            renderList(inputCari.value);
        });
        inputCari.addEventListener('blur', () => {
            setTimeout(() => comboList.classList.remove('open'), 150);
        });
        inputQty.addEventListener('input', () => {
            if (terpilih && parseInt(inputQty.value) > Number(terpilih.stock)) {
                inputQty.value = terpilih.stock;
            }
            hitungTotal();
        });

        document.getElementById('form-transaksi').addEventListener('submit', (e) => {
            if (!terpilih) {
                e.preventDefault();
                alert('Silakan pilih barang terlebih dahulu.');
                inputCari.focus();
                return;
            }
            const qty = parseInt(inputQty.value);
            if (!qty || qty < 1) {
                e.preventDefault();
                alert('Qty minimal 1.');
                inputQty.focus();
            }
        });
    </script>
</body>
</html>
