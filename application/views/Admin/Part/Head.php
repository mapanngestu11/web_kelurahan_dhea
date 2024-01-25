<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <?php if($this->session->userdata('hak_akses')==='admin' ):?> 
    <title>Admin - Dashboard</title>
    <?php elseif($this->session->userdata('hak_akses')==='lurah'):?> 
      <title>Lurah - Dashboard</title>
    <?php endif;?>
    <link href="<?php echo base_url()."assets/Admin/"; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."assets/Admin/"; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."assets/Admin/"; ?>css/ruang-admin.min.css" rel="stylesheet">

    <!-- datatable -->
    <link href="<?php echo base_url()."assets/Admin/"; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- sweetalerts -->
    <link rel="stylesheet" href="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.min.css">
  </head>
