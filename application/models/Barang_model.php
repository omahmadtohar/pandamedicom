
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

   // Di dalam model Barang_model
	public function get_barang() {
	    $query = $this->db->get('barang');
	    return $query->result();
	}



	public function get_last_barang_code() {
    $this->db->select('kode_barang');
    $this->db->order_by('id_barang', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('barang');

    if ($query->num_rows() > 0) {
        $row = $query->row();
        return $row->kode_barang;
	    } else {
	        // Jika tidak ada data barang di database, Anda bisa mengembalikan kode awal, misalnya 'BR00000'
	        return 'BR00001';
	    }
	}


	public function insert_barang($data) {
	    $last_kode_barang = $this->get_last_barang_code();
	    $last_number = (int) substr($last_kode_barang, 2);
	    $new_number = $last_number + 1;
	    $new_kode_barang = 'BR' . str_pad($new_number, 5, '0', STR_PAD_LEFT);

	    $data['kode_barang'] = $new_kode_barang;
	    $this->db->insert('barang', $data);
	}


    public function update_barang($id, $data) {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }

    public function delete_barang($id) {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }
}
?>
