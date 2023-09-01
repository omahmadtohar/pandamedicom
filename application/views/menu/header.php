<!DOCTYPE html>
<html>
<head>
    <title>Header</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">PANDAMEDICOM</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Beranda</a></li>
                <li><a href="<?php echo base_url('supplier');?>">Supplier</a></li>
                <li><a href="#">Menu 2</a></li>
                <li><a href="#">Menu 3</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>

