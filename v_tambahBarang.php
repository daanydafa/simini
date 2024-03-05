<?php
include_once("m_pemasok.php");
$model = new m_pemasok();
$pemasok = $model->getSemuaPemasok();
?>
<html>

<head>
    <title>Tambah Daftar Barang</title>
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
        <h3>Tambah Daftar Barang</h3>
        <div class="add-group">
            <div class="card">
                <div class="card-header">
                    <label>Data Barang</label>
                </div>
                <div class="card-body">
                    <form action="index.barang.php?tambah" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" required autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" name="harga_barang" placeholder="Harga Barang" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="jenis_barang" placeholder="Jenis Barang" required autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" name="stok_barang" placeholder="Stok Barang" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_pemasok" id="" required>
                                <option default>Pemasok</option>
                                <?php if ($pemasok = isset($pemasok) ? $pemasok : null) {
                                    foreach ($pemasok as $row) { ?>
                                        <option value="<?php echo $row['id_pemasok']; ?>"><?php echo $row['nama_pemasok']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group-btn">
                            <div class="btn-cancel">
                                <button class='delete'><a href='index.barang.php'>Batal Tambah</button>
                            </div>
                            <div class="btn-add">
                                <input type="submit" name="add-barang" value="Simpan Barang">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>