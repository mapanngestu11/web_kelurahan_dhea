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
    <title>Pendaftaran KTP</title>

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

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Informasi</h2>
                    <form action="<?php echo base_url('Ktp/input_data') ?>" method="POST" enctype="multipart/form-data">
                        <p>Terima Kasih  <strong><?php echo $informasi['nama'];?></strong>, Informasi anda sudah dikirmkan ke dalam database kami, Mohon untuk menunggu 2 - 3 Hari untuk proses pengajuan. Anda bisa melihat status pada pengajuan surat pada kode <strong><?php echo $informasi['kode_permohonan'];?></strong> dan kami akan menghubungi melalui email / nomor handphone yang sudah ada cantumkan.</p>
                        
                        <div class="p-t-15">
                            <a href ="<?php echo base_url('Homepage/') ?>" class="btn btn--radius-2 btn--blue">Ok</a>
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