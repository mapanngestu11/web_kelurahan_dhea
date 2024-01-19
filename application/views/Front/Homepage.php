<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>

<!-- sweet alert -->
<!-- sweetalerts -->
<link rel="stylesheet" href="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.min.css">

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

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
    <a href="<?php echo base_url('Homepage/') ?>" class="nav-item nav-link active">Home</a>
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
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pelayanan Publik</a
          >
          <div class="dropdown-menu bg-light m-0">
            <a href="<?php echo base_url('Ktp/') ?>" class="dropdown-item">Pembuatan KTP Baru</a>
            <a href="<?php echo base_url('Kelahiran/') ?>" class="dropdown-item">Surat Kelahiran / Kematian</a>
            <a href="<?php echo base_url('Pengajuan/') ?>" class="dropdown-item">Surat Pendatang / Pindah</a>

          </div>
        </div>
        <!-- <a href="<?php echo base_url('Warga/') ?>" class="nav-item nav-link">Daftar Warga</a> -->
        <a href="<?php echo base_url('Contact/') ?>" class="nav-item nav-link">Kontak Kami</a>
        <a href="<?php echo base_url('Informasi/') ?>" class="nav-item nav-link">Cek Informasi Surat</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Carousel Start -->
  <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="<?php echo base_url() . "assets/Front/img/bg1.jpg"; ?>">
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 col-lg-10">

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- About Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <div
          class="position-relative overflow-hidden ps-5 pt-5 h-100"
          style="min-height: 400px"
          >
          <img
          class="position-absolute w-100 h-100"
          src="<?php echo base_url() . "assets/Front/"; ?>img/iconpurpose.png"
          alt=""
          style="object-fit: cover"
          />
          <div
          class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
          style="width: 200px; height: 200px"
          >
          <div
          class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
          >
          <img src="<?php echo base_url() . "assets/Front/img/logo tangkot.png"; ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="h-100">
      <div class="border-start border-5 border-primary ps-4 mb-5">
        <h6 class="text-body text-uppercase mb-2">Informasi Website</h6>
        <h1 class="display-6 mb-0">
          Permohonan Surat
        </h1>
      </div>
      <p>
       Website permohonan surat merupakan platform digital yang dirancang untuk memfasilitasi proses pengajuan surat-surat resmi atau permohonan secara online.
     </p>
     <p class="mb-4">
      Fungsi utamanya adalah untuk meningkatkan efisiensi, kenyamanan, dan aksesibilitas dalam mengajukan surat atau permohonan kepada instansi yang berwenang. 
    </p>
    <div class="border-top mt-4 pt-4">
      <div class="row g-4">
        <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
          <i
          class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
          ></i>
          <h6 class="mb-0">Kemudahan Akses</h6>
        </div>
        <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s">
          <i
          class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
          ></i>
          <h6 class="mb-0">Efisiensi Proses</h6>
        </div>
        <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s">
          <i
          class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
          ></i>
          <h6 class="mb-0">Dokumentasi Digital</h6>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- About End -->

<!-- Footer Start -->
<?php include 'Part/Footer.php';?>
<!-- JavaScript Libraries -->
<?php include 'Part/Js.php';?>

<!-- sweetalerts -->
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/main.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/extensions/sweetalert2.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>


<!-- msg -->
<?php if ($this->session->flashData('msg') == 'warning') : ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'warning',
      title: 'Perhatian !',
      heading: 'Success',
      text: "Data Sudah ada .",
      showHideTransition: 'slide',
      icon: 'warning',
      hideAfter: false,
      bgColor: '#7EC857'
    });
  </script>

  <?php elseif ($this->session->flashData('msg') == 'success') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'success',
        title: 'Sukses',
        heading: 'Success',
        text: "Data Berhasil Di Tambahkan.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>
    <?php elseif ($this->session->flashData('msg') == 'warning-surat') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'warning',
          title: 'Perhatian !',
          heading: 'Perhatian',
          text: "Data tidak terkirim mohon periksa ulang type file upload.",
          showHideTransition: 'slide',
          icon: 'warning',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'success-hapus') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'success',
            title: 'Sukses',
            heading: 'Success',
            text: "Data Berhasil dihapus.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php else : ?>

        <?php endif; ?>

      </body>
      </html>
