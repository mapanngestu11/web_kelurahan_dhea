<!DOCTYPE html>
<html lang="en">
<?php include 'Part/Head.php';?>

<body>
  <!-- Spinner Start -->
  <div
  id="spinner"
  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
  >
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
    <a href="<?php echo base_url('Homepage/') ?>" class="nav-item nav-link ">Home</a>
    <a href="<?php echo base_url('Profil/') ?>" class="nav-item nav-link active">Profil</a>
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

  <!-- Page Header Start -->
  <div
  class="container-fluid page-header py-5 mb-5 wow fadeIn"
  data-wow-delay="0.1s"
  >
  <div class="container text-center py-5">
    <h1 class="display-4 text-white animated slideInDown mb-4">Profil</h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-white" href="#">Profil</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Kelurahan Karang Timur
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->

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
        src="<?php echo base_url() . "assets/Front/"; ?>img/kantor karang timur.jpg"
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
      <h6 class="text-body text-uppercase mb-2">Profil Kelurahan</h6>
      <h1 class="display-6 mb-0">
        Kelurahan Karang Timur
      </h1>
    </div>
    <p>
      Kelurahan Karang Timur adalah kelurahan yang berada di Kecamatan Karang Tengah, Kota Tangerang, Banten, Indonesia. Kelurahan ini terbagi atas 44 Rukun Tetangga dan 14 Rukun Warga. Jumlah penduduk di Kelurahan Karang timur sebanyak 14.303 jiwa. Luas wilayah Kelurahan Karang Timur 1,1 km2, 
    </p>
    <p class="mb-4">
      Jumlah kepadatan 13.003 jiwa/km2. Alamat kantor; Kelurahan Karang Timur berada di RT.002/RW.014. Kelurahan Karang Timur Kecamatan: Karang Tengah Kota: Tangerang, Banten. Kode pos: 15157.
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
<!-- data kegiatan -->

</div>
<!-- Service End -->
<!-- end data kegiatan -->

<!-- Footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>
</body>
</html>
