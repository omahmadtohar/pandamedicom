<!DOCTYPE html>
<html>
<head>
    <title>Daftar Distributor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Daftar Distributor</h2>

    <!-- Tombol Tambah Distributor - Munculkan Modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Distributor</button>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabel Daftar Distributor -->
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Distributor</th>
                <th>Alamat Distributor</th>
                <th>Contact</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($distributors as $distributor): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $distributor->nama_distributor ?></td>
                <td><?= $distributor->alamat ?></td>
                <td><?= $distributor->telepon ?></td>
                <td>
                    <!-- Tombol Edit Distributor - Munculkan Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $distributor->id_distributor ?>">Edit</button>
                    
                    <!-- Tombol Hapus Distributor - Munculkan Modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $distributor->id_distributor ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Distributor -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Distributor</h4>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Distributor -->
                <form action="<?= site_url('distributor/simpan') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_distributor">Nama Distributor:</label>
                        <input type="text" class="form-control" name="nama_distributor" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telephone:</label>
                        <input type="text" class="form-control" name="telepon" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Distributor -->
<?php foreach ($distributors as $distributor): ?>
<div class="modal fade" id="editModal<?= $distributor->id_distributor ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Distributor</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('distributor/edit/'.$distributor->id_distributor) ?>" method="post">
                    <div class="form-group">
                        <label for="nama_distributor">Nama Distributor:</label>
                        <input type="text" class="form-control" name="nama_distributor" value="<?= $distributor->nama_distributor ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $distributor->alamat ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telephone:</label>
                        <input type="text" class="form-control" name="telepon" value="<?= $distributor->telepon ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Hapus Distributor -->
<?php foreach ($distributors as $distributor): ?>
<div class="modal fade" id="deleteModal<?= $distributor->id_distributor ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Distributor</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus distributor ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?= site_url('distributor/delete/'.$distributor->id_distributor) ?>" class="btn btn-danger">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</body>
</html>
