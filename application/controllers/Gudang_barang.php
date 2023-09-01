<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_barang extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('gudang_barang_model'); // Load model gudang_barang
        $this->load->model('barang_model'); // Load model gudang_barang
    }

    public function index() {
        $data['gudang_barang'] = $this->gudang_barang_model->get_gudang_barang();
         $data['barang'] = $this->barang_model->get_barang();
        $this->load->view('menu/header');
        $this->load->view('menu/sidebar');
        $this->load->view('gudang_barang/index', $data); // Tampilan daftar gudang barang
        $this->load->view('menu/footer');
    }

    public function tambah() {
	    $data['barang'] = $this->barang_model->get_barang();
	    $this->load->view('menu/header');
	    $this->load->view('menu/sidebar');
	    $this->load->view('gudang_barang/tambah', $data); // Tampilan form tambah gudang barang
	    $this->load->view('menu/footer');
	}




    public function simpan() {
	    // Tangkap data dari form
	    $id_barang = $this->input->post('id_barang');
	    $stok = $this->input->post('stok');
	    
	    // Lakukan perulangan untuk menyimpan setiap pasangan id_barang dan stok
	    for ($i = 0; $i < count($id_barang); $i++) {
	        $data = array(
	            'id_barang' => $id_barang[$i], // Gunakan index $i untuk mengambil id_barang yang sesuai
	            'stok' => $stok[$i], // Gunakan index $i untuk mengambil stok yang sesuai
	            'date_created' => date('Y-m-d H:i:s') // Ini akan mengisi tanggal dan waktu saat ini.
	        );

	        // Simpan data ke database menggunakan model
	        $this->gudang_barang_model->insert_gudang_barang($data);
	    }

	    // Set flashdata untuk notifikasi
	    $this->session->set_flashdata('success', 'Data gudang barang berhasil ditambahkan.');

	    // Redirect kembali ke halaman list gudang barang
	    redirect('gudang_barang');
	}



    public function edit($id) {
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'stok' => $this->input->post('stok')
        );

        $this->gudang_barang_model->update_gudang_barang($id, $data);
        $this->session->set_flashdata('success', 'Data gudang barang berhasil diubah');
        redirect('gudang_barang');
    }

    public function delete($id) {
        $this->gudang_barang_model->delete_gudang_barang($id);
        $this->session->set_flashdata('success', 'Data gudang barang berhasil dihapus');
        redirect('gudang_barang');
    }
}
