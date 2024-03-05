<html>

<head>
    <title>Member Dalam Minimarket</title>
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
        <h2>Daftar Member</h2>
        <?php
        if (stripos($_SESSION['user'], 's') !== false) { ?>
        <div class="space">
            <div class="btn-add">
                <a href="v_tambahMember.php">
                    <input type="submit" name="tambah" value=" + Tambah Member">
                </a>
            </div>
        </div>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <td><b>Id Member</b></td>
                    <td><b>Nama Member</b></td>
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
                foreach ($member as $member) {
                    echo "<tr>",
                    "<td class='text-center'>$member[id_member]</td>",
                    "<td>$member[nama_member]</td>",
                    "<td>$member[alamat]</td>",
                    "<td>$member[telp]</td>";
                    if (stripos($_SESSION['user'], 's') !== false) {
                        echo "<td> <div class='aksi'>
                            <button class='edit'><a href='v_editMember.php?edit=$member[id_member]'>Ubah</button>
                            <button class='delete'><a href='?hapus=$member[id_member]'>Hapus</button>
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