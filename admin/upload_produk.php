<?php
    session_start();
    if(!isset($_SESSION["id"])){
        echo '<script>window.location="login.php"</script>';
    }
    include 'koneksi.php';
    if(isset($_POST['simpan'])){
        $folder = './produk/';
        $name_p = $_FILES['foto']['name'];
        $sumber_p = $_FILES['foto']['tmp_name'];
        move_uploaded_file($sumber_p, $folder.$name_p);
        $kategori = $_POST['kategori'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $deskripsi1 = $_POST['deskripsi1'];
        $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES (NULL,'".$kategori."','".$nama."', '".$harga."', '".$name_p."','".$stok."', NULL, '".$deskripsi1."')");
        if($insert){
            header('location: data_produk.php');
        }else{
            echo 'Gagal disimpan';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleupload_produk.css">
    <title>Document</title>
</head>
<body>
<?php include ('header_adm.php'); ?>
    <div class="main_wrapper">
        <div class="form_wrapper">
            <h1>Upload Data Produk</h1>
        </div>
        <form action="upload_produk.php" method="post" enctype="multipart/form-data">
            <p>Pilih Kategori Produk:</p>
            <select name="kategori" id="kategori" placeholder="Kategori Produk">
                <option value="Tenda">Tenda</option>
                <option value="babybox">Baby Box</option>
                <option value="babybathub">Baby Bathub</option>
                <option value="toys">Toys</option>
                <option value="carseat">Car Seat</option>
                <option value="hipseat">Hip Seat</option>
            </select><br><br>
            <input type="text" name="nama" placeholder="Masukkan Nama Produk"><br><br>
            <input type="number" name="harga" placeholder="Harga"><br><br>
            <p>Foto Produk:</p>
            <input type="file" name="foto"><br><br>
            <input type="number" name="stok" placeholder="Stok"><br><br>
            <textarea name="deskripsi1" id="deskripsi1" placeholder="Deskripsi1" cols="30" rows="7"></textarea>
            <input id="submit" type="submit" name="simpan" value="Simpan Produk"><br>
        </form>
    </div>
</body>
</html>