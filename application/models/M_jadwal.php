<?php
class M_jadwal extends CI_Model
{

    private $_table = "tbl_jadwal_kegiatan";

    function tampil_data()
    {
        return $this->db->get('tbl_jadwal_kegiatan');
    }
    function detail_kegiatan($id_jadwal)
    {
        $this->db->where('id_jadwal',$id_jadwal);
        return $this->db->get('tbl_jadwal_kegiatan');
    }


    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_jadwal)
    {
        $hsl = $this->db->query("DELETE FROM tbl_jadwal_kegiatan WHERE id_jadwal='$id_jadwal'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_jadwal_kegiatan.kode_pegawai) as jumlah');
        $hsl = $this->db->get('tbl_jadwal_kegiatan');
        return $hsl;
    }
}
