<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
<!-- <link type="text/css" rel="stylesheet" href="{{ public_path('public/assets/paper.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ public_path('public/assets/print.css') }}"> -->
<style>
    /* @page {
            size: A4
        } */
</style>
</head>

<body>
    <style>
        html,
        body {
            /* min-height: 842px; */
            /* font-family: Arial, sans-serif; */
            /* font-size: 16px; */
            /* font-weight: bold; */
            margin-top: -20px;
        }

        .border {
            /* padding-top: 100%;
            min-height: 100%;
            width: 5%;
            /* background-image: url('../images/tak/bg.jpg');
        background-repeat: repeat-y; */
            /* background-size: 100%; */
        }

        .border-left {
            float: left;
        }

        .border-right {
            float: right;
        }

        .content {
            min-height: 100%;
        }

        .header {
            /* margin-top: 5%;
            margin-left: 10%;
            width: 70%; */
        }

        .param {
            text-align: right;
            width: 50%;
        }

        .value {
            text-align: left;
            width: 50%;
        }

        table {
            width: 100%;
        }

        .tak {
            padding-left: 5%;
            padding-right: 5%;
            border-collapse: collapse;
        }

        .tak th {
            background-color: #b22e30;
            color: white;
            text-align: center;
            border-color: black;
            border-style: solid;
            border-width: thin;
        }

        .tak td {
            border-left: thin solid black;
            border-right: thin solid black;
            font-weight: normal;
        }

        .tak tfoot {
            border-bottom: thin solid black;
        }

        .pengesahan {
            padding-left: 5%;
            padding-right: 5%;
            border-collapse: collapse;
        }

        .foto-top {
            border: 1px solid black !important;
            border-left: 1px solid black !important;
            border-right: 1px solid black !important;
        }

        .foto-bottom {
            border-bottom: thin solid black;
            border-left: thin solid black;
            border-right: thin solid black;
        }

        .barcode {
            width: 50%
        }

        .center {
            text-align: center;
        }

        .english_phrase {
            font-style: italic;
        }

        .ok_table td {
            font-weight: thin !important;
            border: none;
            font-size: 16px;
        }

        p {
            font-weight: thin !important;
        }
    </style>

    <body>
        <!-- <div class="sheet padding-10mm"> -->
        <div style="margin-top: 37px; margin-left: 30px; margin-right: 30px">
            <!-- <div class="content"> -->
            <div>
                <table class="ok_table"
                    style="border-top:none; border-left:none; border-right:none; border-bottom: 5px solid black; margin-bottom:0px !important;"
                    border="0">
                    <tr>
                        <td style="text-align: center">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/logo-provinsi.png'))) }}"
                                style="width: 100px">
                        </td>
                        <td>
                            <h3 align="center"
                                style="font-family: 'Times New Roman', Times, serif; font-weight:thin; margin-bottom: 0">
                                <br><span style="font-size:15px">PEMERINTAH PROVINSI JAWA TIMUR
                                    <br>DINAS PENDIDIKAN</span>
                                <br><span style="font-size:21px;font-weight:bold">CABANG DINAS PENDIDIKAN WILAYAH MALANG
                                    <br>(KOTA MALANG – KOTA BATU)</span>
                                <br><span style="font-size:15px">Jl. Anjasmoro No. 40 Telp.0341-353155 Fax. 353155 Kode
                                    Pos : 65112
                                    <br>Email : cabdinmalangbatu@gmail.com
                                    <br>MALANG</span>
                            </h3>
                        </td>
                    </tr>
                </table>

                <p style="text-align:right; font-family: Arial, sans-serif">Malang, 15 Januari 2024</p>
                <table class="ok_table" style="border:none; font-family: Arial, sans-serif">
                    <tr>
                        <td>Nomor</td>
                        </td>
                        <td>: </td>
                        <td>421.6/105/101.6.10/2024</td>
                        <td>
                            Kepada,
                        </td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        </td>
                        <td>: </td>
                        <td>Biasa</td>
                        <td>
                            Yth. Sdr. Kepala {{ $pengajuan['tempat_pelaksanaan'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        </td>
                        <td>: </td>
                        <td style="text-decoration: underline;">Rekomendasi Ijin Penelitian/Survey
                        </td>
                        <td>
                            di <strong>{{ $pengajuan['kota_pelaksanaan'] }}</strong>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>

                <div style="margin-left:82px">
                    <p style="font-size:16px;line-height:22px;text-indent: 64px; font-family: Arial, sans-serif;">
                        Memperhatikan surat dari Dekan {{ $pengajuan['lembaga_pengajuan'] }} nomor:
                        {{ $pengajuan['nomor_surat_pengajuan'] }}
                        tanggal {{ $pengajuan['tgl_surat_pengajuan'] }} perihal {{ $pengajuan['perihal'] }} dalam rangka
                        penulisan skripsi mahasiswa:
                    </p>

                    <table border="0" style="border:none; margin-bottom:0px; font-family: Arial, sans-serif;"
                        class="ok_table">
                        <tr>
                            <td width="100">Nama</td>
                            <td width="10">:</td>
                            <td><strong style="text-transform: uppercase;">{{ $pengajuan['nama_lengkap'] }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{ $pengajuan['nim'] }}</td>
                        </tr>
                        <tr>
                            <td>Prodi / Jurusan</td>
                            <td>:</td>
                            <td>{{ $pengajuan['program_studi'] }}</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:text-top">Judul Skripsi</td>
                            <td style="vertical-align:text-top">:</td>
                            <td style="vertical-align:text-top">{{ $pengajuan['judul_penelitian'] }}</td>
                        </tr>
                    </table>

                    <p style="font-size:16px;line-height:22px;text-indent: 64px; font-family: Arial, sans-serif;">
                        Dengan ini Cabang Dinas Pendidikan Wilayah Malang (Kota Malang – Kota Batu) memberikan ijin
                        penelitian/survey yang dilaksanakan secara
                        <i>{{ strtolower($pengajuan['online_offline']) }}</i> pada tanggal
                        {{ $pengajuan['tgl_pelaksanaan'] }} di {{ $pengajuan['tempat_pelaksanaan'] }}
                        dengan syarat tidak mengganggu proses kegiatan belajar mengajar dan menerapkan protokol
                        kesehatan sesuai dengan peraturan yang
                        berlaku.
                    </p>

                    <p style="font-size:16px;line-height:22px;text-indent: 64px; font-family: Arial, sans-serif;">
                        Demikian atas perhatian dan kerjasamanya disampaikan terima kasih.
                    </p>

                    <table class="ok_table" style="border:none; font-size:16px; font-family: Arial, sans-serif;">
                        <tr>
                            <td width="250">
                                &nbsp;
                            </td>
                            <td>
                                <p style="text-align:center">Kepala Cabang Dinas Pendidikan
                                    <br>Wilayah Malang
                                    <br>(Kota Malang - Kota Batu)
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <strong style="text-decoration: underline;">Dr. Dra. EMA SUMIARTI, M.Si</strong>
                                    <br>Pembina Tingkat I
                                    <br>NIP 19670326 199303 2 007
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <p style="font-size: 16px; font-family: Arial, sans-serif;">
                    Tembusan:<br>
                    Yth. 1. Dekan {{ $pengajuan['lembaga_pengajuan'] }}<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Sdr. {{ $pengajuan['nama_lengkap'] }}
                </p>
                <hr>
                <table class="ok_table" style="border:none">
                    <tr>
                        <td style="font-size:12px; font-family: 'Times New Roman', Times, serif;">
                            <ul>
                                <li>UU ITE no 11 Tahun 2008 Pasal 5 Ayat 1<br>
                                    “Informasi Elektronik dan/atau Dokumen Elektronik dan/atau hasil cetaknya merupakan alat bukti hukum yang sah.”
                                </li>
                                <li>Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan BSrE
                                </li>
                            </ul>
                        </td>
                        <td width="150" style="text-align: right">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/logo.jpg'))) }}"style="width:110px"
                                alt="">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>