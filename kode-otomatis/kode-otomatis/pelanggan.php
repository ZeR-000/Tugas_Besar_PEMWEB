<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kode Otomatis</title>
</head>

<?php
mysql_connect("localhost","root","");
mysql_select_db("tes_dumet");

$cari_kd=mysql_query("select max(id)as kode from pelanggan"); //mencari kode yang paling besar atau kode yang baru masuk
$tm_cari=mysql_fetch_array($cari_kd);
$kode=substr($tm_cari['kode'],1,4); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
$tambah=$kode+1; //kode yang sudah di pecah di tambah 1
	if($tambah<10){ //jika kode lebih kecil dari 10 (9,8,7,6 dst) maka
    $id="P000".$tambah;
    }else{
    $id="P00".$tambah;
    }

if(isset($_POST['simpan'])){
	mysql_query("INSERT INTO  `tes_dumet`.`pelanggan` (`id` ,`nama` ,`alamat`) VALUES ( '$_POST[id]',  '$_POST[nama]',  '$_POST[alamat]' );"); 
	}
?>

<body>
<form method="post">
	<table>
    	<tr>
        	<td>ID</td>
            <td>:</td>
            <td><input type="text" name="id" value="<?php echo $id;?>" readonly="readonly"/></td>
        </tr>
    	<tr>
        	<td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" /></td>
        </tr>
        <tr>
        	<td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat"></textarea></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
            <td><input type="submit" name="simpan" value="SIMPAN" /></td>
        </tr>
    </table>
</form>
</body>
</html>