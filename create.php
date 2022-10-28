<?php require "config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Produk</title>
</head>
<body>
    <header>
        <div class="wrapper">
            <div class="row">
                <div class="col-0">
                </div>
                <div class="col-5">
                    <ul>
                        <font face="Sans-serif" color="black" size="4">
                        <ul><ul><li> <a href="index.php">Home</a></li>
                        <li> <a href="read.php">Produk</a> </li>
                        <li><a href="create.php">Jual Barang</a> </li></font>
                    </ul>
                </div>
                <div class="col-4">
                <form action="read.php" method="get">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" name="search" id="form1" placeholder="mau cari apa?" class="form-control" />
                        
                        </div>
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </form>
            </div>
        </div>
        </div>
    </header>
    <div class="wrapper">
        <div style="color:red;">
        <?php
        if(isset($_POST['submit'])){
            if(isset($_FILES['foto'])){
               
                $judul = $_POST['judul'];
                $harga = $_POST['harga'];
                $asal = $_POST['asal'];
                $deskripsi = $_POST['deskripsi'];
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $file_tmp = $_FILES['foto']['tmp_name'];
                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                $data = file_get_contents($file_tmp);
                $foto = 'data:image/' . $type . ';base64,' .base64_encode($data);

                $script = "INSERT INTO baju SET judul='$judul',harga=$harga,asal='$asal',deskripsi='$deskripsi',
                nama='$nama',telp='$telp',foto='$foto'";
                $query = mysqli_query($conn,$script);
                if($query){
                    header("location:read.php");
                } else{
                    echo "gagal mengupload data";
                }
            }
        }
        ?>
        <br>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama Produk* </label>
            <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
        <label>Foto Produk* </label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>Harga Produk* </label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Asal Produk* </label>
        <select name="asal" class="form-control">
            <option>Pilih</option>
            <option value="Dalam Negeri">Dalam Negeri</option>
            <option value="Luar Negeri">Luar Negeri</option>
    </select>
    </div>
    <div class="form-group">
    <label>Deskripsi Produk*</label>
    <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
    <label>Nama Lengkap Penjual*</label>
    <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
    <label>Nomor yang bisa dihubungi*</label>
    <input type="number" clas="form-control" name="telp">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Upload"> 
    <a href="read_detail.php" type="submit" class="btn btn-primary">Cancel</a>
    </form>
    <br><br><br>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        <html>