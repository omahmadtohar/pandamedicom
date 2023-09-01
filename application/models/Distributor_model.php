<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor_model extends CI_Model {

    public function get_distributors() {
        return $this->db->get('distributor')->result();
    }

    public function create_distributor($data) {
        $this->db->insert('distributor', $data);
    }

    public function update_distributor($id, $data) {
        $this->db->where('id_distributor', $id);
        $this->db->update('distributor', $data);
    }

    public function delete_distributor($id) {
        $this->db->where('id_distributor', $id);
        $this->db->delete('distributor');
    }

    public function get_last_distributor_code() {
        $this->db->select('id_distributor');
        $this->db->order_by('id_distributor', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('distributor');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_distributor;
        } else {
            return 0;
        }
    }
}
