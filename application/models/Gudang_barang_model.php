<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_barang_model extends CI_Model {

    public function get_gudang_barang() {
        $this->db->select('gudang_barang.*, barang.kode_barang, barang.nama_barang');
        $this->db->from('gudang_barang');
        $this->db->join('barang', 'barang.id_barang = gudang_barang.id_barang');
        return $this->db->get()->result();
    }

    public function insert_gudang_barang($data) {
	    $this->db->insert('gudang_barang', $data);
	}


    public function update_gudang_barang($id, $data) {
        $this->db->where('id_gudang_barang', $id);
        $this->db->update('gudang_barang', $data);
    }

    public function delete_gudang_barang($id) {
        $this->db->where('id_gudang_barang', $id);
        $this->db->delete('gudang_barang');
    }

    public function get_barang() {
        $query = $this->db->get('barang');
        return $query->result();
    }
}
