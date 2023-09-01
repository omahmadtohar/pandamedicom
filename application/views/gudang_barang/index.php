
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Gudang Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Daftar Gudang Barang</h2>

    <!-- Tombol Tambah Gudang Barang - Munculkan Modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Gudang Barang</button>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabel Daftar Gudang Barang -->
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($gudang_barang as $item): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $item->kode_barang ?></td>
                <td><?= $item->nama_barang ?></td>
                <td><?= $item->stok ?></td>
                <td><?= $item->date_created ?></td>
                <td>
                    <!-- Tombol Edit Gudang Barang - Munculkan Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $item->id_gudang_barang ?>">Edit</button>
                    
                    <!-- Tombol Hapus Gudang Barang - Munculkan Modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $item->id_gudang_barang ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Gudang Barang -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Gudang Barang</h4>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Gudang Barang -->
                <form action="<?= site_url('gudang_barang/simpan') ?>" method="post">
                    <div id="barangInputs">
                        <div class="form-group">
                            <label for="id_barang">Barang:</label>
                            <select class="form-control" name="id_barang[]" required>
                                <?php foreach ($barang as $item): ?>
                                    <option value="<?= $item->id_barang ?>"><?= $item->nama_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="text" class="form-control" name="stok[]" required>
                        </div>
                    </div>
                    <!-- Tambah button untuk menambahkan input barang dan stok -->
                    <button type="button" class="btn btn-primary" id="tambahInputBarang">Tambah Barang</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Notifikasi -->
<div class="modal fade" id="errorModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Notifikasi</h4>
            </div>
            <div class="modal-body">
                <p id="errorMessage">Barang yang sama tidak dapat diinputkan pada tanggal yang sama.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Gudang Barang -->
<?php foreach ($gudang_barang as $item): ?>
<div class="modal fade" id="editModal<?= $item->id_gudang_barang ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Gudang Barang</h4>
            </div>
            <div class="modal-body">
                <!-- Form Edit Gudang Barang -->
                <form action="<?= site_url('gudang_barang/edit/'.$item->id_gudang_barang) ?>" method="post">
                    <div class="form-group">
                        <label for="id_barang">Barang:</label>
                        <select class="form-control" name="id_barang" required>
                            <?php foreach ($barang as $barang_item): ?>
                            <option value="<?= $barang_item->id_barang ?>" <?= ($item->id_barang == $barang_item->id_barang) ? 'selected' : '' ?>><?= $barang_item->kode_barang ?> - <?= $barang_item->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok:</label>
                        <input type="text" class="form-control" name="stok" value="<?= $item->stok ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Hapus Gudang Barang -->
<?php foreach ($gudang_barang as $item): ?>
<div class="modal fade" id="deleteModal<?= $item->id_gudang_barang ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Gudang Barang</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus gudang barang ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?= site_url('gudang_barang/delete/'.$item->id_gudang_barang) ?>" class="btn btn-danger">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</body>
</html>
