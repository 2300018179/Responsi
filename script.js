function validateForm() {
    var nama = document.getElementById('nama').value.trim();
    var tanggal = document.getElementById('tanggal').value;
    var jam = document.getElementById('jam').value;

    if (nama === '' || tanggal === '' || jam === '') {
        alert('Semua kolom harus diisi!');
        return false;
    }

    return true;
}
