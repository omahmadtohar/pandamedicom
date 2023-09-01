<?php

// Fungsi untuk menghasilkan kode suplier otomatis
function generate_kode_suplier() {
    $last_supplier = $this->supplier_model->get_last_supplier(); // Mengambil data supplier terakhir dari database

    if (!$last_supplier) {
        // Jika tidak ada supplier sebelumnya, mulai dari SP0001
        return 'SP0001';
    }

    $last_kode_suplier = $last_supplier->supplier_code;
    $last_number = (int) substr($last_kode_suplier, 2); // Mengambil angka dari kode suplier terakhir

    // Membuat kode suplier baru dengan format SPXXXX (contoh: SP0001)
    $new_number = $last_number + 1;
    $new_kode_suplier = 'SP' . str_pad($new_number, 4, '0', STR_PAD_LEFT);

    return $new_kode_suplier;
}

