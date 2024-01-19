<?php
class M_kegiatan extends CI_Model
{

    private $_table = "tbl_kegiatan";

    function tampil_data()
    {
        return $this->db->get('tbl_kegiatan');
    }
    function detail_kegiatan($id_kegiatan)
    {
        $this->db->where('id_kegiatan',$id_kegiatan);
        return $this->db->get('tbl_kegiatan');
    }


    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_kegiatan)
    {
        $hsl = $this->db->query("DELETE FROM tbl_kegiatan WHERE id_kegiatan='$id_kegiatan'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_kegiatan.kode_pegawai) as jumlah');
        $hsl = $this->db->get('tbl_kegiatan');
        return $hsl;
    }
}
