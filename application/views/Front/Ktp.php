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
<?php include 'Part/Navbar.php';?>
<!-- Navbar End -->

<!-- Page Header Start -->
<div
class="container-fluid page-header py-5 mb-5 wow fadeIn"
data-wow-delay="0.1s"
>
<div class="container text-center py-5">
  <h1 class="display-4 text-white animated slideInDown mb-4">
    Permohonan KTP
  </h1>
  <nav aria-label="breadcrumb animated slideInDown">
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a class="text-white" href="#">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a class="text-white" href="#">Pengajuan Surat</a>
      </li>
      <li class="breadcrumb-item text-primary active" aria-current="page">
        Permohonan KTP
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
          <h6 class="text-body text-uppercase mb-2">Cek Permohonan</h6>
          <h1 class="display-6 mb-0">
            Permohonan KTP BARU
          </h1>

        </div>

      </div>
      <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <form action="<?php echo base_url('Ktp/cek_permohonan') ?>" method="POST">
          <div class="row g-3">
            <div class="col-sm-8">
              <div class="form-floating">
                <input type="text" class="form-control bg-light border-0" name="kode_permohonan" placeholder="Kode Permohonan"
                />
                <label for="gname">Kode Permohonan</label>
              </div>
            </div>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-primary">Cek Permohonan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Appointment Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="border-start border-5 border-primary ps-4 mb-5">
            <h6 class="text-body text-uppercase mb-2">Persyaratan</h6>
            <h1 class="display-6 mb-0">
              Permohonan KTP BARU
            </h1>
          </div>
          <p class="mb-0">
            <ul>
              <li>Warga Kelurahan Karang Timur</li>
              <li>Terdata di aplikasi website kelurahan karang timur</li>
              <!-- <li>Syarat 1</li> -->
            </ul>
          </p>
        </div>
        <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">

          <form action="<?php echo base_url('Ktp/add') ?>" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
    <!--           <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" name="nik" required="">
                  <label for="gname">Nik</label>
                </div>
              </div> -->
              <div class="col-sm-12">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" name="nama_lengkap" >
                  <label for="gname">Nama Pemohon</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                 <?php
                 $angka_acak = mt_rand(1, 999999); 
                 ?>
                 <input type="text" class="form-control bg-light border-0" name="kode_permohonan" value="<?php echo $angka_acak;?>" readonly >
                 <label for="gname">Kode Permohonan</label>
               </div>
             </div>

             <div class="col-sm-6">
              <div class="form-floating">
                <input type="file" class="form-control bg-light border-0" name="file_pemohon" >
                <label for="gname">File Pemohon</label>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-floating">
                <textarea class="form-control bg-light border-0" name="kebutuhan"></textarea>
                <label for="gname">Keperluan</label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-3" type="submit">
                Get Appointment
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- Appointment End -->
<div class="container table">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Kode Permohonan</th>
        <th>Nama Warga</th>
        <th>Tanggal Pengajuan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ktp->result_array() as $row ) :

        $kode_permohonan =  $row['kode_permohonan'];
        $nama_warga      =  $row['nama_lengkap'];
        $tanggal         =  $row['tanggal'];
        $status          =  $row['status'];
        ?>

        <tr>
          <td><?php echo $kode_permohonan;?></td>
          <td><?php echo $nama_warga;?></td>
          <td><?php echo $tanggal;?></td>
          <td>
            <?php if ($status == 1) { ?>
              Dalam Progres
            <?php  } else { ?>
              Selesai
            <?php } ?>
          </td>

        </tr>

      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <th>Kode Permohonan</th>
        <th>Nama Warga</th>
        <th>Tanggal Pengajuan</th>
        <th>Status</th>
      </tr>
    </tfoot>
  </table>
</div>
<!-- Footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>


<!-- datatable -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>
<!-- end -->
<!-- sweetalerts -->
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/main.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/extensions/sweetalert2.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>


<script type="text/javascript">
  $(document).ready(function () {
   new DataTable('#example',{
                  // info: false,
                  ordering: false,
                  paging: false
                });
 });
</script>

<script type="text/javascript">
  function check_nik() {

    var input_check_nik = $('[name="nik"]').val();

    $.ajax({
      url: "<?= site_url('Ktp/cek_warga/') ?>",
      type: "POST",
      dataType: "JSON",
      data: {
        input_check_nik: input_check_nik
      },

      success: function(data) {

        if (data.result != '' ) {
               // alert(data.result[0].nik);
               document.getElementById("tambah_warga").style.display = "block";      
               $('#nik').val(data.result[0].nik);
               $('#nama_lengkap').val(data.result[0].nama_lengkap);
                // console.log(data.result[0].nik);
              }else{
               alert("Nik Tidak Ditemukan");
               
             }
           },
           error: function(jqXHR, textStatus, errorThrown) {

           }
         })
  }
</script>

<!-- msg -->
<?php if ($this->session->flashData('msg') == 'proses') : ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'warning',
      title: 'Perhatian !',
      heading: 'Success',
      text: "Permohonan Masih Dalam Proses",
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
    <?php elseif ($this->session->flashData('msg') == 'warning') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'warning',
          title: 'Perhatian !',
          heading: 'Warning',
          text: "Format File salah, Data tidak terkirim.",
          showHideTransition: 'slide',
          icon: 'warning',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'gagal') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'warning',
            title: 'Perhatian !',
            heading: 'Warning',
            text: "Permohonan Gagal Anda Tidak Terdata / Belum Verif.",
            showHideTransition: 'slide',
            icon: 'warning',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php else : ?>

        <?php endif; ?>


      </body>
      </html>
