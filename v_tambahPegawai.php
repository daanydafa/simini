<html>

<head>
    <title>Tambah Daftar Pegawai</title>
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
        <h3>Tambah Daftar Pegawai</h3>
        <div class="add-group">
            <div class="card">
                <div class="card-header">
                    <label>Data Pegawai</label>
                </div>
                <div class="card-body">
                    <form action="index.pegawai.php?tambah" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id_pegawai" placeholder="Id Pegawai" required autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama Pegawai" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_posisi" id="" required>
                                <option>Posisi</option>
                                <option value="1">Supervisor</option>
                                <option value="2">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="kode_akses" placeholder="Kode Akses" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="no_telp" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="form-group-btn">
                            <div class="btn-cancel">
                                <button class='delete'><a href='index.pegawai.php'>Batal Tambah</button>
                            </div>
                            <div class="btn-add">
                                <input type="submit" name="add-barang" value="Simpan Pegawai">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>