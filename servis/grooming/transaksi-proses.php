<?php
include '../../koneksi.php';
if (isset($_POST['add'])) {
    $nama_pemilik = $_POST['nama_pemilik'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $nama_hewan = $_POST['nama_hewan'];
    $tipe_perawatan = $_POST['tipe_perawatan']; 

    $sql = "INSERT INTO tb_perawatan VALUES (
                '$',
                '$nama_pemilik',
                '$jenis_hewan',
                '$nama_hewan',
                '$tipe_perawatan'
            )";
    if (empty($nama_pemilik) || empty($jenis_hewan) || empty($nama_hewan) || empty($tipe_perawatan)) {
        echo "
            <script>
                alert('Pastikan anda mengisi semua data');
                window.location = 'grooming.html';
            </script>
        ";
    }
    elseif (mysqli_query($koneksi, $sql)){
        echo "
            <script>
                alert('Data berhasil ditambahkan');
				  window.location = 'grooming.html';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'grooming.html';
            </script>
        ";
    }
}
