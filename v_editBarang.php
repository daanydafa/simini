<?php
session_start();
if (empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} 

include("c_barang.php");
include_once("m_pemasok.php");
if (isset($_GET['edit'])) {
    $model = new m_pemasok();
    $pemasok = $model->getSemuaPemasok();
    $control = new c_barang();
    $barang = $control->getBarang($_GET['edit']);
}

?>
<html>

<head>
    <title>Ubah Data Barang</title>
    <link rel="stylesheet" href="styles.css">
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
        <h3>Ubah Data Barang</h3>
        <div class="add-group">
            <div class="card">
                <div class="card-header">
                    <label>Data Barang</label>
                </div>
                <div class="card-body">
                    <form action="index.barang.php?edit" method="post">
                    <input type="text" name="kode_barang" value="<?php echo $_GET['edit'] ?>" hidden>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" value="<?php echo $barang[0]['nama_barang'] ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" name="harga_barang" placeholder="Harga Barang" value="<?php echo $barang[0]['harga_barang'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="jenis_barang" placeholder="Jenis Barang" value="<?php echo $barang[0]['jenis_barang'] ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="number" name="stok_barang" placeholder="Stok Barang" value="<?php echo $barang[0]['stok_barang'] ?>" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_pemasok" id="" required>
                                <option default disabled>Pemasok</option>
                                <?php if ($pemasok = isset($pemasok) ? $pemasok : null) {
                                    foreach ($pemasok as $row) { ?>
                                        <option value="<?php echo $row['id_pemasok']; ?>"><?php echo $row['nama_pemasok']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group-btn">
                            <div class="btn-cancel">
                                <button class='delete'><a href='index.barang.php'>Batal Ubah</button>
                            </div>
                            <div class="btn-add">
                                <input type="submit" name="add-barang" value="Simpan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>