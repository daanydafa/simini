<?php
include_once("m_pemasok.php");
$model = new m_pemasok();
$pemasok = $model->getSemuaPemasok();

function formatRupiah($amount) {
    $rupiah = "Rp. " . number_format($amount, 0, ',', '.');
    return $rupiah;
}
?>

<html>

<head>
    <title>Daftar Barang</title>
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
        <h2>Daftar Barang</h2>
        <?php
        if (stripos($_SESSION['user'], 's') !== false) { ?>
            <div class="space">
                <div class="btn-add">
                    <a href="v_tambahBarang.php">
                        <input type="submit" name="tambah" value=" + Tambah Barang ">
                    </a>
                </div>
            </div>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <td><b>Kode Barang</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Barang</b></td>
                    <td><b>Jenis Barang</b></td>
                    <td><b>Stok Barang</b></td>
                    <td><b>Pemasok</b></td>
                    <?php
                    if (stripos($_SESSION['user'], 's') !== false)
                        echo "<td><b>Aksi</b></td>";
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($barang as $barang) {
                    echo "<tr>",
                    "<td style='text-align:center;'>$barang[kode_barang]</td>",
                    "<td>$barang[nama_barang]</td>",
                    "<td class='text-right'>".formatRupiah($barang['harga_barang'])."</td>",
                    "<td>$barang[jenis_barang]</td>",
                    "<td class='text-right'>$barang[stok_barang]</td>",
                    "<td>$barang[nama_pemasok]</td>";
                    if (stripos($_SESSION['user'], 's') !== false) {
                        echo " <td> <div class='aksi'>
                        <button class='edit'><a href='v_editBarang.php?edit=$barang[kode_barang]'>Ubah</button>
                        <button class='delete'><a href='?hapus=$barang[kode_barang]'>Hapus</button>
                        </div> </td> ";
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