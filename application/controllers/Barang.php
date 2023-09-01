
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('barang_model'); // Load model barang
    }

    public function index() {
        $data['barangs'] = $this->barang_model->get_barang();
        $data['kode_barang'] = $this->barang_model->get_last_barang_code(); // Gantilah barang_model dengan nama model yang sesuai
        $this->load->view('menu/header');
        $this->load->view('menu/sidebar');
        $this->load->view('barang/index', $data); // Tampilan list barang
        $this->load->view('menu/footer');
    }

    // Fungsi untuk menampilkan form tambah barang
	    public function tambah() {
	    // Mengambil kode barang otomatis
	    $data['kode_barang'] = $this->barang_model->get_last_barang_code();

	    $this->load->view('menu/header');
	    $this->load->view('menu/sidebar');
	    $this->load->view('barang/tambah', $data); // Mengirimkan data kode_barang ke view
	    $this->load->view('menu/footer');
	}

    // Fungsi untuk menyimpan data barang yang ditambahkan
    public function simpan() {
        // Tangkap data dari form
        $data = array(
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'keterangan' => $this->input->post('keterangan'),
            'harga_beli' => $this->input->post('harga_beli')
        );

        // Simpan data ke database menggunakan model
        $this->barang_model->insert_barang($data);

        // Set flashdata untuk notifikasi
        $this->session->set_flashdata('success', 'Data barang berhasil ditambahkan.');

        // Redirect kembali ke halaman list barang
        redirect('barang');
    }

    public function edit($id) {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'keterangan' => $this->input->post('keterangan'),
            'harga_beli' => $this->input->post('harga_beli')
        );

        $this->barang_model->update_barang($id, $data);
        $this->session->set_flashdata('success', 'Barang berhasil diubah');
        redirect('barang');
    }

    public function delete($id) {
        $this->barang_model->delete_barang($id);
        $this->session->set_flashdata('success', 'Barang berhasil dihapus');
        redirect('barang');
    }
}
?>
