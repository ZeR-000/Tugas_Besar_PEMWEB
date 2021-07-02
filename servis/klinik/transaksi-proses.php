<?php
include '../koneksi.php';
if (isset($_POST['add'])) {
    $id_perawatan = $_POST['id_perawatan'];
    $id_member = $_POST['id_member'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $nama_hewan = $_POST['nama_hewan'];
    $tipe_perawatan = $_POST['tipe_perawatan']; 

    $sql = "INSERT INTO tb_perawatan VALUES (
                '$id_perawatan',
                '$id_member',
                '$nama_pemilik',
                '$jenis_hewan',
                '$nama_hewan',
                '$tipe_perawatan'
            )";
    if (empty($id_perawatan) || empty($id_member) || empty($nama_pemilik) || empty($jenis_hewan) || empty($nama_hewan) || empty($tipe_perawatan)) {
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

elseif (isset($_POST['edit'])){
    $id = $_POST['id'];
    $peminjam = $_POST['nama'];
    $buku = $_POST['buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $status = $_POST['status']; 

    $sql = "UPDATE tb_transaksi SET 
                peminjam = '$peminjam' , 
                buku = '$buku' , 
                tgl_pinjam = '$tgl_pinjam' ,
                tgl_kembali = '$tgl_kembali',
                status = '$status'
                WHERE id_transaksi = '$id'
            ";

    if (mysqli_query($koneksi, $sql)){
        echo "
            <script>
                alert('Data berhasil diubah');
                window.location = 'transaksi.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'transaksi-edit.php?id=$id';
            </script>
        ";
    }

}
elseif (isset($_POST['delete'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id'";
    if (mysqli_query($koneksi, $sql)){
        echo "
            <script>
                alert('Data berhasil dihapus');
                window.location = 'transaksi.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'transaksi.php';
            </script>
        ";
    }
}
else{
    header('location: transaksi.php');
}
?>