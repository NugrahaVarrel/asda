<?php
    session_start();
    if(!isset($_SESSION["id"])){
        echo '<script>window.location="login.php"</script>';
    }
?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
</head>
<body>
    <?php include ('header_adm.php'); ?>
    <div class="main">
        <?php 
            if (@$_GET['status']!==NULL) {
            $status = $_GET['status'];
            if ($status=='ok') {
                echo 'Update Penyewaan Sukses';
            }
            elseif($status=='err'){
                echo 'Update Penyewaan Gagal';
            }
            }
        ?>
        <div class="table">
            <table>
                    <thead>
                        <th>Id</th>
                        <th>Id User</th>
                        <th>Id Produk</th>
                        <th>Tipe Durasi</th>
                        <th>Harga</th>
                        <th>Metode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Email</th>
                        <th>Note</th>
                        <th>KTP</th>
                        <th>Status</th>
                        <th>Tgl Diambil</th>
                        <th>Tgl Dikembalikan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                            $query =  mysqli_query ($koneksi, "SELECT * FROM transaksi");
                            while ($data = mysqli_fetch_array($query)){ ?>

                            <tr>
                            <td><?= $data['id']; ?></td>
                            <td><?= $data['id_user']; ?></td>
                            <td><?= $data['id_produk']; ?></td>
                            <td><?= $data['tipe']; ?></td>
                            <td><?= $data['amount']; ?></td>
                            <td><?= $data['metode']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['nomor']; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['note']; ?></td>
                            <td><img src="../uploads/<?php echo $data['ktp']; ?>" style="width: 200px;"></td>
                            <td><?= $data['status']; ?></td>
                            <td><?= $data['tgl_diambil']; ?></td>
                            <td><?= $data['tgl_dikembalikan']; ?></td>
                            <td>
                                <a href="<?php echo "update_pesanan.php?id=".$data['id']; ?>"><button>Update</button></a>
                                <a href="<?php echo "delete_pesanan.php?id=".$data['id']; ?>"><button>Hapus</button></a>
                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>














    <h1 class="text-center mt-4">Dashboard</h1>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="mt-4 mb-2 mx-auto">
                        <a href="data_member.php"> <!-- link member page -->
                            <img src="../resource/img-member.png" style="width: 160px; height: auto" alt="">
                    </div>
                            <h3 class="text-center mb-4" style="color:black;">Data Member</h3>
                        </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="mt-4 mb-2 mx-auto">
                        <a href="data_admin.php"> <!-- link admin page -->
                            <img src="../resource/img-admin.png" style="width: 160px; height: auto" alt="">
                    </div>
                            <h3 class="text-center mb-4" style="color:black;">Data Admin</h3>
                        </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="mt-4 mb-2 mx-auto">
                        <a href="data_produk.php"> <!-- link produk page -->
                            <img src="../resource/img-produk.png" style="width: 160px; height: auto" alt="">
                    </div>
                            <h3 class="text-center mb-4" style="color:black;">Data Produk</h3>
                        </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="mt-4 mb-2 mx-auto">
                        <a href="data_pesanan.php"> <!-- link pesanan page -->
                            <img src="../resource/img-pesanan.png" style="width: 160px; height: auto" alt="">
                    </div>
                            <h3 class="text-center mb-4" style="color:black;">Data Pesanan</h3>
                        </a>
                </div>
            </div>
        </div>
        
    </div>
    
</body>
</html>