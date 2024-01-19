<!DOCTYPE html>
<html lang="en">
<?php include 'Part/Head.php';?>
<!-- sweetalerts -->
<link rel="stylesheet" href="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">



<body>

  <!-- Spinner Start -->
  <div
  id="spinner"
  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
  >
  <div class="spinner-grow text-primary" role="status"></div>
</div>
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
    Data Warga
  </h1>
  <nav aria-label="breadcrumb animated slideInDown">
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item">
        <a class="text-white" href="#">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a class="text-white" href="#">Data Warga</a>
      </li>
      <li class="breadcrumb-item text-primary active" aria-current="page">
        Data Warga
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
<div class="container-xxl">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>No.</th>
        <th>NIK</th>
        <th>Nama Lengkap</th>
        <th>Status</th>
        <th>Nama Petugas</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 0;
      foreach ($warga->result_array() as $row) :

        $no++;
        $nik           = $row['nik'];
        $nama_lengkap = $row['nama_lengkap'];
        $status     = $row['status'];
        $nama_user = $row['nama_user'];

        ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo $nik ?></td>
          <td><?php echo $nama_lengkap ?></td>
          <td>
            <?php if ($status == '0') { ?>
              <p>Di Tolak</p>
            <?php }elseif ( $status == '1') {?>
              <p>Terdaftar</p>
            <?php }else{ ?>
              <p>Dalam Proses</p>
            <?php } ?>
          </td>
          <td><?php echo $nama_user ?></td>

        <?php endforeach; ?>


      </tbody>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>NIK</th>
          <th>Nama Lengkap</th>
          <th>Status</th>
          <th>Nama Petugas</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- Appointment Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="border-start border-5 border-primary ps-4 mb-5">
            <h6 class="text-body text-uppercase mb-2">Persyaratan</h6>
            <h1 class="display-6 mb-0">
              Pendataan Warga BARU
            </h1>
          </div>
          <p class="mb-0">
            <ul>
              <li>Warga Kelurahan Karang Timur</li>
              <li>Terdata di aplikasi website kelurahan karang timur</li>

            </ul>
          </p>
        </div>
        <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.5s">

          <form action="<?php echo base_url('Ktp/add') ?>" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" name="nik" required="">
                  <label for="gname">Nik</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" name="nama_lengkap" >
                  <label for="gname">Nama Lengkap</label>
                </div>
              </div>
            </div>
            <br>
            <div class="row g-3 mt-8">
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" class="form-control bg-light border-0" name="alamat" >
                  <label for="gname">Alamat</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-control bg-light border-0" required="" name="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <label for="gname">Jenis Kelamin</label>
                </div>
              </div>
            </div>

            <div class="row g-3 mt-8">
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" name="rt" class="form-control bg-light border-0" required="">
                  <label>RT</label>
                </div>
              </div>
            </div>
            <br>
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
<!-- Appointment End -->

<!-- Footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>
<!-- sweetalerts -->
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/main.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>js/extensions/sweetalert2.js"></script>
<script src="<?php echo base_url() . "assets/Admin/"; ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>

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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
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
