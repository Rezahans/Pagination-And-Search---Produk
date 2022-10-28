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
                    <form method="get">
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
    <br>
    <ul><a href="create.php" type="submit" class="btn btn-primary" >[+] Tambahkan Produk</a></ul>

    <div class="wrapper">
        <div class="row">
            <?php
                $batas = 3;
                $halaman = @$_GET['halaman'];
                if(empty($halaman)){
                    $posisi = 0;
                    $halaman = 1;
                }
                else{
                    $posisi = ($halaman-1) * $batas;
                }
                if(isset($_GET['search'])){
                    $search = $_GET['search'];
                    $sql="select * from baju WHERE judul LIKE '%$search%' order by id Desc limit $posisi,$batas";
                }else{
                    $sql="select * from baju order by id Desc limit $posisi,$batas";
                }

                $hasil=mysqli_query($conn,$sql);
                while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <div class="col-md-3 produk">
                        <a href="read_detail.php?id=<?= $data['id'] ?>">
                            <img src="<?= $data['foto'] ?>" width="100%" alt="">
                            <h4><?=$data['judul']?></h4>
                            <p class="deskripsi-produk">Rp <?= number_format($data['harga']) ?></p>
                            <p class="asal-produk">Kondisi : <?=$data['asal']?></p>
                        </a>
                    </div>
                    <?php 
                }
            ?>
        </div>
        <?php
            if(isset($_GET['search'])){
                $search= $_GET['search'];
                $query2="select * from baju WHERE judul LIKE '%$search%' order by id Desc";
            }else{
                $query2="select * from baju order by id Desc";
            }
            $result2 = mysqli_query($conn,$query2);
            $jmldata = mysqli_num_rows($result2);
            $jmlhalaman = ceil($jmldata/$batas)
        ?>
        <br>
        <ul class="pagination">
            <?php
            for($i=1;$i<=$jmlhalaman;$i++){
                if ($i != $halaman){
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i&search=$search'>$i</a></li>";
                    } else{
                        echo "<li class='page-item'><a class='page-link' href='read.php?halaman=$i'>$i</a></li>"; 
                    }
                }else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        <html>