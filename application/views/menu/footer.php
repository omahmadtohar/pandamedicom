<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Mengatur fungsi ketika tombol "Tambah Barang" diklik
    $('#tambahInputBarang').click(function() {
        // Mengambil elemen input barang dan stok yang telah ada
        var existingInputs = $('#barangInputs').html();
        
        // Menambahkan input barang dan stok baru dengan elemen yang sudah ada
        var newInputs = '<div class="form-group">';
        newInputs += existingInputs;
        newInputs += '</div>';
        
        // Menambahkan input barang dan stok baru ke dalam div barangInputs
        $('#barangInputs').append(newInputs);
    });
});
</script>


<footer class="navbar-fixed-bottom">
    <div class="container">
        <p>&copy; 2023 PandaMedicom. Hak Cipta Dilindungi.</p>
    </div>
</footer>
