<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('distributor_model'); // Load model distributor
    }

    public function index() {
        $data['distributors'] = $this->distributor_model->get_distributors();
        $this->load->view('menu/header');
        $this->load->view('menu/sidebar');
        $this->load->view('distributor/index', $data); // Tampilan list distributor
        $this->load->view('menu/footer');
    }

    public function tambah() {
        // Mengambil kode distributor otomatis
        $last_distributor_code = $this->distributor_model->get_last_distributor_code();
        $new_code = $last_distributor_code + 1;
        $data['kode_distributor'] = $new_code;

        $this->load->view('menu/header');
        $this->load->view('menu/sidebar');
        $this->load->view('distributor/tambah', $data); // Tampilan form tambah distributor
        $this->load->view('menu/footer');
    }

    public function simpan() {
        // Tangkap data dari form
        $data = array(
            'id_distributor' => $this->input->post('kode_distributor'),
            'nama_distributor' => $this->input->post('nama_distributor'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        );

        // Simpan data ke database menggunakan model
        $this->distributor_model->create_distributor($data);

        // Set flashdata untuk notifikasi
        $this->session->set_flashdata('success', 'Data distributor berhasil ditambahkan.');

        // Redirect kembali ke halaman list distributor
        redirect('distributor');
    }

    public function edit($id) {
        $data = array(
            'nama_distributor' => $this->input->post('nama_distributor'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon')
        );

        $this->distributor_model->update_distributor($id, $data);
        $this->session->set_flashdata('success', 'Distributor berhasil diubah');
        redirect('distributor');
    }

    public function delete($id) {
        $this->distributor_model->delete_distributor($id);
        $this->session->set_flashdata('success', 'Distributor berhasil dihapus');
        redirect('distributor');
    }
}
