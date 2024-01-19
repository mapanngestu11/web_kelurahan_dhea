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
    <a href="<?php echo base_url('Homepage/') ?>" class="nav-item nav-link">Home</a>
    <a href="<?php echo base_url('Profil/') ?>" class="nav-item nav-link">Profil</a>
    <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Info Kegiatan</a
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
    <h1 class="display-4 text-white animated slideInDown mb-4">Kegiatan</h1>
    <nav aria-label="breadcrumb animated slideInDown">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">
          <a class="text-white" href="#">Home</a>
        </li>
        <li class="breadcrumb-item text-primary active" aria-current="page">
          Kegiatan
        </li>
      </ol>
    </nav>
  </div>
</div>
<!-- Page Header End -->


<!-- data kegiatan -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5 align-items-end mb-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="border-start border-5 border-primary ps-4">
          <h6 class="text-body text-uppercase mb-2">Informasi Kegiatan</h6>
          <h1 class="display-6 mb-0">
            Kelurahan Karang Timur
          </h1>
        </div>
      </div>
      <div class="col-lg-6 text-lg-end wow fadeInUp" data-wow-delay="0.3s">
        <a class="btn btn-primary py-3 px-5" href="<?php echo base_url('Kontak/') ?>">Kontak Kami</a>
      </div>
    </div>
    <div class="row g-4 justify-content-center">
      <?php foreach ($kegiatan->result_array() as $data) {
        $id_kegiatan = $data['id_kegiatan'];
        $nama_kegiatan = $data['nama_kegiatan'];
        $isi_kegiatan  = $data['isi_kegiatan'];
        $gambar = $data['gambar'];
        ?>

        <style type="text/css">
          .gambar_kegiatan{
            height: 300px !important; 
            width : 350px !important;
          }
        </style>
        <style>
          table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
          }

          th, td {
            text-align: left;
            padding: 16px;
          }

          tr:nth-child(even) {
            background-color: #f2f2f2;
          }
        </style>

        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item bg-light overflow-hidden h-100">
            <img class="img-fluid gambar_kegiatan" src="<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar;?>" alt="" />
            <a href="<?php echo base_url('Kegiatan/detail/') ?><?php echo $id_kegiatan;?>">
              <div class="service-text position-relative text-center h-100 p-4">
                <h5 class="mb-3"><?php echo $nama_kegiatan;?></h5>
                <p style="text-align: left;">
                 <?php echo $isi_kegiatan; ?>
               </p>
             </div>
           </a>
         </div>
       </div>

     <?php }?>

   </div>
 </div>
</div>
</div>
<!-- Service End -->
<!-- end data kegiatan -->

<!-- Footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>
</body>
</html>
