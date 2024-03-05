<html>

<head>
    <title>Tambah Daftar Pemasok</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    session_start();
    if (empty($_SESSION["user"])) {
        header("Location: login.php");
        exit;
    } 
    ?>
</head>

<body>
    <nav>
        <div class="brand">
            <a href="index.php"> <img src="./logo-no-background.png" alt="" width="80px"></a>
        </div>
        <div class="dropdown">
            <span><?php echo $_SESSION["name"] ?></span>
            <div class="dropdown-content">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </nav>
    <div style="display:flex; align-items:center; justify-content:center; flex-direction:column">
        <h3>Tambah Daftar Pemasok</h3>
        <div class="add-group">
            <div class="card">
                <div class="card-header">
                    <label>Data Pemasok</label>
                </div>
                <div class="card-body">
                    <form action="index.pemasok.php?tambah" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama_pemasok" placeholder="Nama Pemasok" required autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat Pemasok" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="telp" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="form-group-btn">
                            <div class="btn-cancel">
                                <button class='delete'><a href='index.pemasok.php'>Batal Tambah</button>
                            </div>
                            <div class="btn-add">
                                <input type="submit" name="add-barang" value="Simpan Pemasok">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>