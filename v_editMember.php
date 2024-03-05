<?php
session_start();
if (empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} 

include("c_member.php");
if (isset($_GET['edit'])) {
    $control = new c_member();
    $member = $control->getMember($_GET['edit']);
}
?>
<html>

<head>
    <title>Ubah Data Member</title>
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
        <h3>Ubah Data Member</h3>
        <div class="add-group">
            <div class="card">
                <div class="card-header">
                    <label>Data Member</label>
                </div>
                <div class="card-body">
                    <form action="index.member.php?edit" method="post">
                        <input type="text" name="id_member" value="<?php echo $_GET['edit'] ?>" hidden>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama_member" placeholder="Nama Member" value="<?php echo $member[0]['nama_member'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat" value="<?php echo $member[0]['alamat'] ?>" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="telp" placeholder="Nomor Telepon" value="<?php echo $member[0]['telp'] ?>" required>
                        </div>
                        <div class="form-group-btn">
                            <div class="btn-cancel">
                                <button class='delete'><a href='index.member.php'>Batal Tambah</button>
                            </div>
                            <div class="btn-add">
                                <input type="submit" name="add-member" value="Simpan Member">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>