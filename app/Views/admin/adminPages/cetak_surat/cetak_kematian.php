<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <style>
        .nama {
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <h4 style="font-family:courier;text-align: center;"><u>SURAT KETERANGAN KEMATIAN</u><br><small>Nomor : 474.4/<?= date('d-m') ?>/AR/XI/<?= date('Y') ?></small></h4>

    <p style="font-size: 10px;">Yang Bertanda Tangan Dibawah Ini :</p>
    <table border="0" cellpadding="1">
        <tbody>
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="1" style="width: 400px">
                        <tbody>
                            <tr>
                                <td width="120"><span style="font-size: 10px">Nama Lengkap</span></td>
                                <td width="8"><span style="font-size: 10px">:</span></td>
                                <td width="200"><span style="font-size: 10px" class="nama"><b><?= strtoupper('Widdy Arfiansyah') ?></b></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Jabatan</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px">Kepala Kelurahan Kota Sukabumi</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="font-size: 10px;">Dengan Ini Menerangkan Bahwa :</p>
    <table border="0" cellpadding="1">
        <tbody>
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="1" style="width: 400px">
                        <tbody>
                            <tr>
                                <td width="120"><span style="font-size: 10px">Nama Lengkap</span></td>
                                <td width="8"><span style="font-size: 10px">:</span></td>
                                <td width="200"><span style="font-size: 10px" class="nama"><b><?= strtoupper($penduduk['nama']) ?></b></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Umur</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['umur'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Tanggal Lahir</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['tanggal_lahir'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Kewarganegaraan</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['kewarganegaraan'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Agama</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['agama'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Pekerjaan Terakhir</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['pekerjaan'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Alamat</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['alamat'] ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="font-size: 10px;">Yang bertempat tinggal di <?= $penduduk['alamat'] ?>, Provinsi Jawa Barat.</p>
    <p style="font-size: 10px;">Menurut sepengetahuan kami bahwa nama tersebut diatas telah Meninggal Dunia pada :</p>
    <table border="0" cellpadding="1">
        <tbody>
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="1" style="width: 400px">
                        <tbody>
                            <tr>
                                <td width="120"><span style="font-size: 10px">Tanggal</span></td>
                                <td width="8"><span style="font-size: 10px">:</span></td>
                                <td width="200"><span style="font-size: 10px"><?= $penduduk['tanggal_kematian'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Penyebab</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['penyebab'] ?></span></td>
                            </tr>
                            <tr>
                                <td><span style="font-size: 10px">Tempat Pemakaman</span></td>
                                <td><span style="font-size: 10px">:</span></td>
                                <td><span style="font-size: 10px"><?= $penduduk['tempat_pemakaman'] ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="font-size: 10px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan Kematian ini perbuat dengan sebenarnya untuk dapat dipergunakan sebagaimana perlunya.</p>
    <table>
        <tbody>
            <tr>
                <td>
                    <div align="center">
                    </div>
                    <div align="center"></div>
                    <div align="center">
                    </div>
                </td>
                <td></td>
                <td valign="top">
                    <div align="center">
                        <span style="font-size: 10px">Sukabumi, <?= date_format(date_create(date('Y-m-d')), 'd F Y') ?></span><br>
                        <span style="font-size: 10px">Kepala Kelurahan Kota Sukabumi </span>
                    </div>
                    <div align="center"></div>
                    <div align="center">
                        <span style="font-size: 10px">Widdy Arfiansyah</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>