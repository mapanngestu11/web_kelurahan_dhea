<!DOCTYPE html>
<html lang="en">
<?php include 'Part/Head.php';?>
<!-- sweetalerts -->
<link rel="stylesheet" href="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.min.css">

<body>
  <!-- Spinner Start -->
<!--   <div
  id="spinner"
  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
  >
  <div class="spinner-grow text-primary" role="status"></div>
</div> -->
<!-- Spinner End -->
<style type="text/css">
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    position: relative;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

</style>
<!-- Topbar Start -->

<!-- Topbar End -->

<!-- Navbar Start -->
<nav
class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0"
>
<a href="index.html" class="navbar-brand d-flex align-items-center">
  <h3 class="m-0">
    Kelurahan Karang Timur
  </h3>
</a>
<button
type="button"
class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#navbarCollapse"
>
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <div class="navbar-nav ms-auto py-3 py-lg-0">
    <a href="<?php echo base_url('Homepage/') ?>" class="nav-item nav-link ">Home</a>
    <a href="<?php echo base_url('Profil/') ?>" class="nav-item nav-link">Profil</a>
    <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Info Kegiatan</a
        >
        <div class="dropdown-menu bg-light m-0">
          <a href="<?php echo base_url('Kegiatan/') ?>" class="dropdown-item">Data Kegiatan</a>
          <a href="<?php echo base_url('Jadwal/') ?>" class="dropdown-item">Jadwal Kegiatan</a>
        </div>
      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pelayanan Publik</a
          >
          <div class="dropdown-menu bg-light m-0">
            <a href="<?php echo base_url('Ktp/') ?>" class="dropdown-item">Pembuatan KTP Baru</a>
            <a href="<?php echo base_url('Kelahiran/') ?>" class="dropdown-item">Surat Kelahiran</a>
            <a href="<?php echo base_url('Pengajuan/') ?>" class="dropdown-item">Surat Pendatang</a>

          </div>
        </div>
        <!-- <a href="<?php echo base_url('Warga/') ?>" class="nav-item nav-link">Daftar Warga</a> -->
        <a href="<?php echo base_url('Contact/') ?>" class="nav-item nav-link">Kontak Kami</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Page Header Start -->
  <div
  class="container-fluid page-header py-5 mb-5 wow fadeIn"
  data-wow-delay="0.1s"
  >
  <div class="container text-center py-5">
    <h1 class="display-4 text-white animated slideInDown mb-4">
      Our Services
    </h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-white" href="#">Pages</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Our Services
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5 align-items-end mb-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="border-start border-5 border-primary ps-4">

        </div>
      </div>

      <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">

      </div>
    </div>

  </div>
</div>
</div>
<!-- Service End -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="border-start border-5 border-primary ps-4 mb-5">
          <h6 class="text-body text-uppercase mb-2">BERHASIL</h6>
          <h1 class="display-6 mb-0">
            INFORMASI TERKAIT PERMOHONAN
          </h1>

        </div>

      </div>
      <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <p>Permohonan Sukses</p>
        <p><?php echo $hasil['keterangan'];?></p>
        <a href="<?php echo base_url() . "assets/upload/"; ?><?php echo $hasil['file_surat'];?>">Download</a>
      </div>
    </div>
  </div>
</div>
<!-- Appointment Start -->

<!-- Appointment End -->

<!-- Footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>
<!-- sweetalerts -->
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/main.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/extensions/sweetalert2.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>





</body>
</html>
