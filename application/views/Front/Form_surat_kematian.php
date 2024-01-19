<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Surat Kematian</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url() . "assets/Form/"; ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/Form/"; ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url() . "assets/Form/"; ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/Form/"; ?>vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url() . "assets/Form/"; ?>css/main.css" rel="stylesheet" media="all">
</head>


<style type="text/css">
    .data-anak{
        font-weight: bold;
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Pembuatan Surat Kematian</h2>
                    <form action="<?php echo base_url('Kelahiran/input_data_surat_kematian') ?>" method="POST" enctype="multipart/form-data">
                      <div class="input-group">
                        <label>Kode Permohonan</label>
                        <?php
                        $angka_acak = mt_rand(1, 999999); 
                        ?>
                        <input class="input--style-4" type="text" name="kode_permohonan" value="<?php echo $angka_acak;?>" readonly="">
                    </div>
                    <p class="data-anak">Isikan Data Dibawah ini.</p>
                    <div class="input-group">
                        <label>NIK</label>
                        <input class="input--style-4" type="text" name="nik" required="">
                    </div>
                    <div class="row row-space">
                      <div class="col-2">
                        <div class="input-group">
                            <label class="label">Nama</label>
                            <input class="input--style-4" type="text" name="nama" required="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Jenis Kelamin</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="jenis_kelamin" required="">
                                    <option disabled="disabled" selected="selected"> Pilih</option>
                                    <option value="Laki-Laki"> Laki - Laki </option>
                                    <option value="Perempuan"> Perempuan </option>

                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Tanggal Kematian</label>
                            <input class="input--style-4" type="date" name="tgl_kematian" required="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Tanggal Lahir</label>
                            <input class="input--style-4" type="date" name="tgl_lahir" required="">
                        </div>
                    </div>

                </div>


                <p class="data-anak">Data Informasi Keluarga</p>

                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Nik (Keluarga)</label>
                            <input class="input--style-4" type="text" name="nik_pelapor" required="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Nama (Keluarga)</label>
                            <input class="input--style-4" type="text" name="nama_pelapor" required="">
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label>Status dalam Keluarga</label>
                    <input class="input--style-4" type="text" name="status_pelapor" required="">
                </div>


                <div class="row row-space">
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Nomor Handphone</label>
                            <input class="input--style-4" type="text" name="no_telp" required="">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="input-group">
                            <label class="label">Email</label>
                            <input class="input--style-4" type="text" name="email" required="">
                        </div>
                    </div>
                </div>


                <div class="input-group">
                    <label>Alamat</label>
                    <input class="input--style-4" type="text" name="alamat" required="">
                </div>


                <div class="input-group">
                    <label>Upload KK</label>
                    <input class="input--style-4" type="file" name="kk" required="">
                </div>
                <div class="input-group">
                    <label>Upload KTP</label>
                    <input class="input--style-4" type="file" name="ktp" required="">
                </div>
                <div class="input-group">
                    <label>Upload Lampiran Surat Dari Rumah Sakit</label>
                    <input class="input--style-4" type="file" name="lampiran_rs" required="">
                </div>

                <div class="p-t-15">
                    <a href="<?php echo base_url('Pengajuan') ?>" class="btn btn--radius-2 btn--blue" style="background-color:  #808080 !important">Kembali</a>

                    <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Jquery JS-->
<script src="<?php echo base_url() . "assets/Form/"; ?>vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="<?php echo base_url() . "assets/Form/"; ?>vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url() . "assets/Form/"; ?>vendor/datepicker/moment.min.js"></script>
<script src="<?php echo base_url() . "assets/Form/"; ?>vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="<?php echo base_url() . "assets/Form/"; ?>js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->