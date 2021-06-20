<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan Tanggal</title>
</head>

<body>
    <center>
        <h2>LAPORAN PENGADUAN PEMKAB JEMBER</h2>
        <h4>Berdasarkan Periode Tanggal</h4>
    </center>

    <br />

    <table border="1">
        <tr>
            <th>Judul</th>
            <!-- <th>Nama Pelapor</th> -->
            <th>Lokasi TKP</th>
            <th>Tanggal Pengaduan</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
        <?php
        foreach ($bytanggal as $bytanggal) {
        ?>
            <tr>
                <td><?= $bytanggal->judul; ?></td>
                <!-- <td><?= $bytanggal->judul; ?></td> -->
                <td><?= $bytanggal->alamat; ?></td>
                <td><?= $bytanggal->tanggal; ?></td>
                <td><?= $bytanggal->deskripsi; ?></td>
                <td>
                    <?php if ($bytahun->status == '1') { ?>
                        <span>Belum Diproses</span>
                    <?php } elseif ($bytahun->status == '2') { ?>
                        <span>Proses Validasi</span>
                    <?php } elseif ($bytahun->status == '3') { ?>
                        <span>Tidak Valid</span>
                    <?php } elseif ($bytahun->status == '4') { ?>
                        <span>Valid</span>
                    <?php } elseif ($bytahun->status == '5') { ?>
                        <span>Tidak Lanjut</span>
                    <?php } elseif ($bytahun->status == '6') { ?>
                        <span>Selesai</span>
                    <?php } elseif ($bytahun->status == '7') { ?>
                        <span>Dibatalkan</span>
                    <?php } ?>
                </td>
            </tr>
        <?php }; ?>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>