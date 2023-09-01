
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {
    
    public function get_suppliers() {
        return $this->db->get('supplier')->result();
    }

    public function create_supplier($data) {
        $this->db->insert('supplier', $data);
    }

    public function update_supplier($id, $data) {
        $this->db->where('id_supplier', $id);
        $this->db->update('supplier', $data);
    }

    public function delete_supplier($id) {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }

    public function get_last_supplier_code() {
        $this->db->select('id_supplier');
        $this->db->order_by('id_supplier', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('supplier');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_supplier;
        } else {
            // Jika tidak ada data supplier di database, Anda bisa mengembalikan kode awal, misalnya 'SP0000'
            return 'SP0000';
        }
    }
}
?>
