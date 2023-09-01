<!-- application/views/barang/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Daftar Barang</h2>

    <!-- Tombol Tambah Barang - Munculkan Modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Barang</button>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabel Daftar Barang -->
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Harga Beli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach ($barangs as $barang): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $barang->kode_barang ?></td>
                <td><?= $barang->nama_barang ?></td>
                <td><?= $barang->keterangan ?></td>
                <td><?= 'Rp. ' . number_format($barang->harga_beli, 0, ',', '.') ?></td>

                <td>
                    <!-- Tombol Edit Barang - Munculkan Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $barang->id_barang ?>">Edit</button>
                    
                    <!-- Tombol Hapus Barang - Munculkan Modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $barang->id_barang ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Barang -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Barang</h4>
            </div>
            <div class="modal-body">
                <!-- Formulir Tambah Barang -->
				<form action="<?= site_url('barang/simpan') ?>" method="post">
				    <!-- Kode Barang ditampilkan sebagai read-only -->
				    <div class="form-group">
					    <label for="kode_barang">Kode Barang:</label>
					    <input type="text" class="form-control" name="kode_barang" value="<?= $kode_barang ?>" readonly>
					</div>

				    <div class="form-group">
				        <label for="nama_barang">Nama Barang:</label>
				        <input type="text" class="form-control" name="nama_barang" required>
				    </div>
				    <div class="form-group">
				        <label for="keterangan">Keterangan:</label>
				        <textarea class="form-control" name="keterangan"></textarea>
				    </div>
				   <div class="form-group">
					    <label for="harga_beli">Harga Beli (Rp.):</label>
					    <input type="text" class="form-control" name="harga_beli" placeholder="Rp. 0" value="<?= set_value('harga_beli') ?>" required>
					</div>

				    <button type="submit" class="btn btn-success">Simpan</button>
				</form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Barang -->
<?php foreach ($barangs as $barang): ?>
<div class="modal fade" id="editModal<?= $barang->id_barang ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Barang</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('barang/edit/'.$barang->id_barang) ?>" method="post">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang:</label>
                        <input type="text" class="form-control" name="kode_barang" value="<?= $barang->kode_barang ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang:</label>
                        <input type="text" class="form-control" name="nama_barang" value="<?= $barang->nama_barang ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" name="keterangan"><?= $barang->keterangan ?></textarea>
                    </div>
                    <div class="form-group">
					    <label for="harga_beli">Harga Beli (Rp.):</label>
					    <input type="text" class="form-control" name="harga_beli" placeholder="Rp. 0" value="<?= 'Rp. ' . number_format($barang->harga_beli, 0, ',', '.') ?>" required>
					</div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Hapus Barang -->
<?php foreach ($barangs as $barang): ?>
<div class="modal fade" id="deleteModal<?= $barang->id_barang ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Barang</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus barang ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?= site_url('barang/delete/'.$barang->id_barang) ?>" class="btn btn-danger">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</body>
</html>
