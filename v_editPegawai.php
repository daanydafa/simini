<?php
session_start();
if (empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} 

include("c_pegawai.php");
if (isset($_GET['edit'])) {
    $control = new c_pegawai();
    $pegawai = $control->getPegawai($_GET['edit']);
}
?>
<html>

<head>
    <title>Edit Pegawai</title>
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
        <h3>Ubah Data Pegawai</h3>
        <div class="add-group">
            <div class="card">
                <div class="card-header">
                    <label>Data Pegawai</label>
                </div>
                <div class="card-body">
                    <form action="index.pegawai.php?edit" method="post">
                        <input type="text" name="id_pegawai" value="<?php echo $_GET['edit'] ?>" hidden>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $pegawai[0]['nama_pegawai'] ?>" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_posisi" id="" required>
                                <option default disabled>Posisi</option>
                                <option value="1">Supervisor</option>
                                <option value="2">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="kode_akses" placeholder="Kode Akses" value="<?php echo $pegawai[0]['kode_akses'] ?>"  required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat" value="<?php echo $pegawai[0]['alamat'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="no_telp" placeholder="Nomor Telepon" value="<?php echo $pegawai[0]['no_telp'] ?>"  required>
                        </div>
                        <div class="form-group-btn">
                            <div class="btn-cancel">
                                <button class='delete'><a href='index.pegawai.php'>Batal Ubah</button>
                            </div>
                            <div class="btn-add">
                                <input type="submit" name="add-pegawai" value="Simpan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>