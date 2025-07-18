<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengeluaran</title>
    <style>
        /* Gaya dasar Bootstrap 5 inline */
        body {
            font-family: Arial, sans-serif;
            color: #212529;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .text-center {
            text-align: center;
        }

        .h3 {
            font-size: 1.75rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .text-muted {
            color: #6c757d;
        }

        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            background-color: #6c757d;
            color: #fff;
        }

        .badge-success {
            background-color: #28a745;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="h3 text-center">Laporan Pengeluaran</h3>
        <p class="text-muted text-center">Tanggal Cetak: <?= date('d F Y H:i:s') ?></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengeluaran</th>
                    <th>Kategori</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($expenses)): ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pengeluaran.</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1;
                    foreach ($expenses as $exp): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($exp['nama_pengeluaran']) ?></td>
                            <td><span class="badge badge-success"><?= esc($exp['nama_kategori']) ?></span></td>
                            <td>Rp <?= number_format($exp['nominal'], 0, ',', '.') ?></td>
                            <td><?= date('d M Y', strtotime($exp['tanggal'])) ?></td>
                            <td><?= esc($exp['catatan']) ?: '-' ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="text-muted text-center">Dicetak oleh: <?= session()->get('username') ?? 'Pengguna' ?></p>
    </div>
</body>

</html>