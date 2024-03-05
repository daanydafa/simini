<?php
include_once("m_member.php");
$prep = $no_transaksi = isset($no_transaksi) ? $no_transaksi : null;
$model_member = new m_member();
$member = $model_member->getSemuaMember();

function formatRupiah($amount) {
    $rupiah = "Rp. " . number_format($amount, 0, ',', '.');
    return $rupiah;
}

if (!$prep) {
    session_start();
    if (empty($_SESSION["user"])) {
        header("Location: login.php");
        exit;
    }
} else {
    $model_barang = new m_barang();
    $barang = $model_barang->getSemuaBarang();
    $model = new m_transaksi();
    $detail = $model->getDetailTransaksi($no_transaksi);
}
?>
<html>

<head>
    <title>Tambah Daftar Transaksi</title>
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
        <h2>Tambah Transaksi</h2>
        <?php if (!$prep) { ?>
            <div class="container">
                <form action="index.transaksi.php?tambah" method="post">
                    <div class="add-transaksi">
                        <label for="id_member">Member :</label>
                        <select name="id_member" id="">
                        <option value="1">Non Member</option>
                            <?php if ($member = isset($member) ? $member : null) {
                                foreach ($member as $row) { ?>
                                    <option value="<?php echo $row['id_member']; ?>"><?php echo $row['nama_member']; ?></option>
                            <?php }
                            } ?>
                        </select>
                        <div class="space"></div>
                        <div class="btn-add">
                            <input type="submit" name="add-transaksi" value="Buat Transaksi">
                        </div>
                    </div>
                </form>
            </div>
        <?php } else { ?>
            <form action="index.transaksi.php?tambahDetail" method="post">
                <div class="add-detail">
                    <input type="text" name="no_transaksi" placeholder="No Transaksi" value="<?php echo $no_transaksi ?>" hidden>
                    <select name="kode_barang" id="">
                        <?php if ($barang = isset($barang) ? $barang : null) {
                            foreach ($barang as $row) { ?>
                                <option value="<?php echo $row['kode_barang']; ?>"><?php echo $row['nama_barang']; ?></option>
                        <?php }
                        } ?>
                    </select>
                    <div class="space"></div>
                    <input type="number" name="jml_barang" placeholder="Jumlah Barang" value="" required>
                    <div class="btn-add">
                        <input type="submit" name="add-detail" value="Tambah">
                    </div>
                </div>
            </form>
        <?php } ?>


        <table>
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Kode Barang</b></td>
                    <td><b>Nama Barang</b></td>
                    <td><b>Harga Barang</b></td>
                    <td><b>Jumlah Barang</b></td>
                    <td><b>Total Harga</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($detail = isset($detail) ? $detail : null) {
                    $no = 1;
                    $total_harga = 0;
                    foreach ($detail as $row) { ?>
                        <tr>
                            <td class='text-center'><?php echo $no++; ?></td>
                            <td class='text-center'><?php echo $row['kode_barang']; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td class='text-right'><?php echo formatRupiah($row['harga_barang']); ?></td>
                            <td class='text-right'><?php echo $row['jml_barang']; ?></td>
                            <td class='text-right'><?php echo formatRupiah($row['harga_barang'] * $row['jml_barang']); ?></td>
                        </tr>
                <?php $total_harga += $row['harga_barang'] * $row['jml_barang'];
                    }
                } else {
                    echo "<tr style='text-align:center'><td colspan='6'> Belum ada barang </td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        if ($detail = isset($detail) ? $detail : null) { ?>
            <div class="btn-back">
                <a href="index.transaksi.php">
                    <input type="submit" name="save" value="Simpan">
                </a>
            </div>
        <?php } elseif (!$prep) { ?>
            <div class="btn-cancel">
                <button  class='delete'><a href='index.transaksi.php'>Batal Tambah</button>
            </div>
        <?php } ?>
    </div>
</body>

</html>