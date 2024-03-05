<html>

<head>
    <title>Pegawai Dalam Minimarket</title>
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
    <div class="warper">
        <h2>Daftar Pegawai</h2>
        <?php
        if (stripos($_SESSION['user'], 's') !== false) { ?>
        <div class="space">
            <div class="btn-add">
                <a href="v_tambahPegawai.php">
                    <input type="submit" name="tambah" value="Tambah Pegawai">
                </a>
            </div>
        </div>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <td><b>Id Pegawai</b></td>
                    <td><b>Nama</b></td>
                    <td><b>Posisi</b></td>
                    <td><b>Alamat</b></td>
                    <td><b>No Telepon</b></td>
                    <?php
                    if (stripos($_SESSION['user'], 's') !== false)
                        echo "<td><b>Aksi</b></td>";
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pegawai as $pegawai) {
                    echo "<tr>",
                    "<td class='text-center'>$pegawai[id_pegawai]</td>",
                    "<td>$pegawai[nama_pegawai]</td>",
                    "<td>$pegawai[posisi]</td>",
                    "<td>$pegawai[alamat]</td>",
                    "<td>$pegawai[no_telp]</td>";
                    if (stripos($_SESSION['user'], 's') !== false) {
                        echo "<td><div class='aksi'>
                            <button class='edit'><a href='v_editPegawai.php?edit=$pegawai[id_pegawai]'>Ubah</button>
                            <button class='delete'><a href='?hapus=$pegawai[id_pegawai]'>Hapus</button>
                            </div></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="btn-back">
            <a href="index.php">
                <input type="submit" name="dashboard" value="< Dashboard">
            </a>
        </div>
    </div>
</body>

</html