<!-- application/views/supplier/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Daftar Supplier</h2>

    <!-- Tombol Tambah Supplier - Munculkan Modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Supplier</button>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Tabel Daftar Supplier -->
    <table class="table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Contact</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach ($suppliers as $supplier): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $supplier->nama_supplier ?></td>
                <td><?= $supplier->alamat ?></td>
                <td><?= $supplier->telepon ?></td>
                <td>
                    <!-- Tombol Edit Supplier - Munculkan Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $supplier->id_supplier ?>">Edit</button>
                    
                    <!-- Tombol Hapus Supplier - Munculkan Modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $supplier->id_supplier ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Supplier -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Supplier</h4>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Supplier -->
                <!-- Form Tambah Supplier -->
				<form action="<?= site_url('supplier/simpan') ?>" method="post">
				    <div class="form-group">
				        <label for="supplier_name">Nama Supplier:</label>
				        <input type="text" class="form-control" name="nama_supplier" required>
				    </div>
				    <div class="form-group">
				        <label for="supplier_name">Alamat:</label>
				        <input type="text" class="form-control" name="alamat" required>
				    </div>
				    <div class="form-group">
				        <label for="supplier_name">Telephone:</label>
				        <input type="text" class="form-control" name="telepon" required>
				    </div>
				    <button type="submit" class="btn btn-success">Simpan</button>
				</form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Supplier -->
<?php foreach ($suppliers as $supplier): ?>
<div class="modal fade" id="editModal<?= $supplier->id_supplier ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Supplier</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('supplier/edit/'.$supplier->id_supplier) ?>" method="post">
                    <div class="form-group">
                        <label for="supplier_name">Nama Supplier:</label>
                        <input type="text" class="form-control" name="nama_supplier" value="<?= $supplier->nama_supplier ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier_name">Alamat:</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $supplier->alamat ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="supplier_name">Telephone:</label>
                        <input type="text" class="form-control" name="telepon" value="<?= $supplier->telepon ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Hapus Supplier -->
<?php foreach ($suppliers as $supplier): ?>
<div class="modal fade" id="deleteModal<?= $supplier->id_supplier ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Supplier</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus supplier ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?= site_url('supplier/delete/'.$supplier->id_supplier) ?>" class="btn btn-danger">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</body>
</html>
