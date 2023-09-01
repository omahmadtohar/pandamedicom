
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('supplier_model'); // Load model supplier
    }

    public function index() {
        $data['suppliers'] = $this->supplier_model->get_suppliers();
        $this->load->view('menu/header');
        $this->load->view('menu/sidebar');
        $this->load->view('supplier/index', $data);
        $this->load->view('menu/footer');
    }


    // Fungsi untuk menampilkan form tambah supplier
    public function tambah() {
        $data['kode_supplier'] = $this->generate_kode_supplier();
        $this->load->view('supplier/tambah', $data);
    }

    // Fungsi untuk menyimpan data supplier yang ditambahkan
    public function simpan() {
        $data = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        );

        $this->supplier_model->create_supplier($data);
        $this->session->set_flashdata('success', 'Data supplier berhasil ditambahkan.');
        redirect('supplier');
    }

    // Fungsi untuk mengedit data supplier
    public function edit($id) {
        $data = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        );

        $this->supplier_model->update_supplier($id, $data);
        $this->session->set_flashdata('success', 'Data supplier berhasil diubah.');
        redirect('supplier');
    }

    // Fungsi untuk menghapus data supplier
    public function delete($id) {
        $this->supplier_model->delete_supplier($id);
        $this->session->set_flashdata('success', 'Data supplier berhasil dihapus.');
        redirect('supplier');
    }
}
?>
