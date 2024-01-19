<?php
class M_kelahiran extends CI_Model
{

  private $_table = "tbl_surat_kelahiran";

  function tampil_data()
  {
   $cek_akses = $this->session->userdata('hak_akses');
   if ($cek_akses == 'lurah') {
     $this->db->select('*');
     $this->db->from('tbl_surat_kelahiran');
     $this->db->where('status','1');
     $query = $this->db->get();
     return $query;
   }else{
    $this->db->select('*');
    $this->db->from('tbl_surat_kelahiran');
    $query = $this->db->get();
    return $query;
  }

}


function cek_data_surat($id_surat_kelahiran)
{ 

  $this->db->select('*');
  $this->db->from('tbl_surat_kelahiran');
  $this->db->where('id_surat_kelahiran',$id_surat_kelahiran);
  $query = $this->db->get();
  return $query;

}

function tampil_data_1()
{
  $this->db->select('
    a.id_surat_kelahiran,
    a.nik,
    b.nama_lengkap,
    a.status,
    a.kode_permohonan,
    a.kebutuhan,
    a.file_pemohon,
    a.keterangan,
    a.tanggal');
  $this->db->from('tbl_surat_kelahiran as a');
  $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
  $query = $this->db->get();
  return $query;
}

function tampil_data_warga($nama)
{
  $this->db->select('
    a.id_surat_kelahiran,
    a.nik,
    b.nama_lengkap,
    a.status,
    a.kode_permohonan,
    a.kebutuhan,
    a.file_pemohon,
    a.keterangan');
  $this->db->from('tbl_surat_kelahiran as a');
  $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
  $this->db->where('b.nama_lengkap',$nama);
  $query = $this->db->get();
  return $query;
}

function input_data($data, $table)
{
  $this->db->insert($table, $data);
}

function input_data_surat_kelahiran($data,$table)
{
  $this->db->insert($table, $data);
}

function input_data_surat_kematian($data,$table)
{
  $this->db->insert($table, $data);
}


function delete_data($id_surat_kelahiran)
{
  $hsl = $this->db->query("DELETE FROM tbl_surat_kelahiran WHERE id_surat_kelahiran='$id_surat_kelahiran'");
  return $hsl;
}

function update_data($where, $data, $table)
{
  $this->db->where($where);
  $this->db->update($table, $data);
}

function cek_kodepermohonan_kelahiran($kode_permohonan)
{
  $this->db->select('*');
  $this->db->from('tbl_surat_kelahiran');
  $this->db->where('kode_permohonan',$kode_permohonan);
  $query = $this->db->get();
  return $query;
}

function cek_kodepermohonan_kematian($kode_permohonan)
{
  $this->db->select('*');
  $this->db->from('tbl_surat_kematian');
  $this->db->where('kode_permohonan',$kode_permohonan);
  $query = $this->db->get();
  return $query;
}
function jumlah_data()
{
  $this->db->select('count(tbl_surat_kelahiran.id_surat_kelahiran) as jumlah');
  $hsl = $this->db->get('tbl_surat_kelahiran');
  return $hsl;
}
function cek_kode_permohonan($kode_permohonan)
{
 $this->db->select('
  a.id_surat_kelahiran,
  a.nik,
  b.nama_lengkap,
  a.status,
  a.kode_permohonan,
  a.kebutuhan,
  a.file_pemohon,
  a.keterangan,
  a.file_surat');
 $this->db->from('tbl_surat_kelahiran as a');
 $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
 $this->db->where('kode_permohonan',$kode_permohonan);
 $query = $this->db->get();
 return $query;
}
function cek_ktp($nik)
{
  $this->db->select('*');
  $this->db->from('tbl_warga');
  $this->db->where('status','1');
  $this->db->where('nik',$nik);
  $query = $this->db->get();
  return $query;

}
function cetak_laporan($bulan)
{
  $this->db->select('*');
  $this->db->from('tbl_surat_kelahiran');
  // $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
  $this->db->where('MONTH(tanggal)',$bulan);
  $query = $this->db->get()->result();
  return $query;
}
function cetak_laporan_jumlah($bulan)
{
  $this->db->select('Count(id_surat_kelahiran) as jumlah ');
  $this->db->from('tbl_surat_kelahiran');

  $this->db->where('MONTH(tanggal)',$bulan);
  $this->db->order_by('id_surat_kelahiran');

  $query = $this->db->get()->result();
  return $query;
}

function cetak_laporan_setuju($bulan)
{
  $this->db->select('Count(id_surat_kelahiran) as jumlah_setuju ');
  $this->db->from('tbl_surat_kelahiran');

  $this->db->where('MONTH(tanggal)',$bulan);
  $this->db->where('status','1');
  $this->db->order_by('id_surat_kelahiran');

  $query = $this->db->get()->result();
  return $query;
}

function cetak_laporan_proses($bulan)
{
  $this->db->select('Count(id_surat_kelahiran) as jumlah_proses ');
  $this->db->from('tbl_surat_kelahiran');

  $this->db->where('MONTH(tanggal)',$bulan);
  $this->db->where('status','0');
  $this->db->order_by('id_surat_kelahiran');

  $query = $this->db->get()->result();
  return $query;
}
function cetak_laporan_tolak($bulan)
{
  $this->db->select('Count(id_surat_kelahiran) as jumlah_tolak ');
  $this->db->from('tbl_surat_kelahiran');

  $this->db->where('MONTH(tanggal)',$bulan);
  $this->db->where('status','2');
  $this->db->order_by('id_surat_kelahiran');

  $query = $this->db->get()->result();
  return $query;
}

}
