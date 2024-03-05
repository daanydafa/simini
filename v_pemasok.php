<html>

<head>
    <title>Daftar Pemasok</title>
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
        <h2>Daftar Pemasok</h2>
        <?php
        if (stripos($_SESSION['user'], 's') !== false) { ?>
        <div class="space">
            <div class="btn-add">
                <a href="v_tambahPemasok.php">
                    <input type="submit" name="tambah" value=" +  Tambah Pemasok ">
                </a>
            </div>
        </div>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <td><b>Id Pemasok</b></td>
                    <td><b>Nama Pemasok</b></td>
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
                foreach ($pemasok as $pemasok) {
                    echo "<tr>",
                    "<td class='text-center'>$pemasok[id_pemasok]</td>",
                    "<td>$pemasok[nama_pemasok]</td>",
                    "<td>$pemasok[alamat]</td>",
                    "<td>$pemasok[telp]</td>";
                    if (stripos($_SESSION['user'], 's') !== false) {
                        echo "<td>  <div class='aksi'>
                        <button class='delete'><a href='?hapus=$pemasok[id_pemasok]'>Hapus</button>
                        </div>  </td>";
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