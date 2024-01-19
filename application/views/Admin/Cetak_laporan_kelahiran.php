<html>
<head>
	<title>Data Permohonan Surat</title>
</head>
<body>
	
	<div class="container">
		<table width="100%" style="border: none !important   border-collapse: collapse;;">
			<tr>
				<td width="30%" align="center"><img src="<?php echo base_url()."assets/front/img/logo tangkot.png"; ?>" width="60%"></td>
				<td width="70%" align="center">
					<center>
						<h1>Laporan Surat Kelahiran</h1>
					</center>
					<center>
						<h2><br>Kelurahan Karang Timur</h2>
					</center>
				</td>
				<!-- <td width="25" align="center"><img src="Logo DN.jpg" width="100%"></td> -->
			</tr>
		</table>
	</div>

	<hr>
	<style type="text/css">
		.tanggal{
			text-align: right;
			margin-right: 30px;
		}

		.table-isi {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		.td-isi, .th-isi {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		.tr-isi:nth-child(even) {
			background-color: #dddddd;
		}

		.table_info{
			margin-bottom: 20px;
			font-size: 16px;
		}

	</style>
	<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
	<center>
		<h3> Data Permohonan </h3>
	</center>

	
	<table class="table_info">
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo $informasi['bulan']?></td>
		</tr>
		<tr>
			<td>Jumlah Permohonan</td>
			<td>:</td>
			<td><?php echo $informasi['jumlah'][0]->jumlah ;?></td>
		</tr>
		<tr>
			<td>Jumlah Di Setujui</td>
			<td>:</td>
			<td><?php echo $informasi['setuju'][0]->jumlah_setuju ;?></td>
		</tr>
		<tr>
			<td>Jumlah Di Proses</td>
			<td>:</td>
			<td><?php echo $informasi['proses'][0]->jumlah_proses ;?></td>
		</tr>
		<tr>
			<td>Jumlah Di Tolak</td>
			<td>:</td>
			<td><?php echo $informasi['tolak'][0]->jumlah_tolak ;?></td>
		</tr>
	</table>

	<table class="table-isi">
		<tr class="tr-isi">
			<th class="th-isi">No</th>
			<th class="th-isi">Kode Permohonan</th>
			<th class="th-isi">Nama Anak</th>
			<th class="th-isi">Jenis Kelamin</th>
			<th class="th-isi">Nama Ayah</th>
			<th class="th-isi">Nama Ibu</th>

			<th class="th-isi">Status</th>
			<th class="th-isi">Tanggal</th>

		</tr>
		<?php 
		$no = 0 ;
		foreach ($laporan as $data) { 
			$no++;
			$nama = $data->nama_anak;
			$kode_permohonan = $data->kode_permohonan;
			$tanggal = $data->tanggal;
			$jenis_kelamin = $data->jenis_kelamin;
			$nama_ayah = $data->nama_ayah;
			$nama_ibu = $data->nama_ibu;
			$status = $data->status;

			if ($status == '1') {
				$keterangan = 'Selesai';
			}else{
				$keterangan = 'Masih Dalam Proses';
			}

			?>
			<tr class="tr-isi">
				<td class="td-isi"><?php echo $no ?></td>
				<td class="td-isi"><?php echo $kode_permohonan ?></td>
				<td class="td-isi"><?php echo $nama ?></td>
				<td class="td-isi"><?php echo $jenis_kelamin ?></td>
				<td class="td-isi"><?php echo $nama_ayah ?></td>
				<td class="td-isi"><?php echo $nama_ibu ?></td>
				<td class="td-isi"><?php echo $keterangan;?>
				<td class="td-isi"><?php echo $tanggal;?></td>
			</tr>
		<?php } ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>


</body>
</html>