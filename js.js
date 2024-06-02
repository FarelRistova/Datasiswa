function validateForm() {
    var nama = document.getElementById('nama').value;
    var nis = document.getElementById('nis').value;
    var rayon = document.getElementById('rayon').value;
    var rombel = document.getElementById('rombel').value;

    if (nama === '' || nis === '' || rayon === '' || rombel === '') {
        alert('Silakan isi data dengan lengkap!');
        event.preventDefault(); // Prevent form submission if validation fails
   
    }
}