
<?php
function formatRupiah($amount) {
    $rupiah = "Rp. " . number_format($amount, 0, ',', '.');
    return $rupiah;
}
?>

<html>

<head>
    <title>Transaksi Dalam Minimarket</title>
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
        <h2>Daftar Transaksi</h2>
        <div class="space">
            <div class="btn-add">
                <a href="v_tambahTransaksi.php">
                    <input type="submit" name="tambah" value="+ Tambah Transaksi">
                </a>
            </div>
        </div>

        <div class="overflow-auto">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <td><b>Nomer Transaksi</b></td>
                            <td><b>Pegawai</b></td>
                            <td><b>Member</b></td>
                            <td><b>Tanggal Transaksi</b></td>
                            <td><b>Total harga</b></td>
                            <?php
                            if (stripos($_SESSION['user'], 's') !== false)
                                echo "<td><b>Aksi</b></td>";
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transaksi as $transaksi) {
                            echo "<tr>",
                            "<td class='text-center'>$transaksi[no_transaksi]</td>",
                            "<td>$transaksi[id_pegawai]</td>",
                            "<td>$transaksi[nama_member]</td>",
                            "<td class='text-center'>$transaksi[tgl_transaksi]</td>",
                            "<td class='text-right'>".formatRupiah($transaksi['total_harga'])."</td>";
                            if (stripos($_SESSION['user'], 's') !== false) {
                                echo "<td> <div class='aksi'>
                                    <button class='vie' onclick='toggleDetail(\"$transaksi[no_transaksi]\")' id='toggleDetailButton'>Lihat Detail</button>
                                    <button class='delete'><a href='?hapus=$transaksi[no_transaksi]'>Hapus</button>
                                    </div></td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="btn-back">
            <a href="index.php">
                <input type="submit" name="dashboard" value="< Dashboard">
            </a>
        </div>

        <script>
            function formatRupiah(amount) {
                var rupiah = "";
                var amountString = amount.toString();

                var splitAmount = amountString.split(".");
                var digits = splitAmount[0].split("").reverse();

                for (var i = 0; i < digits.length; i++) {
                    rupiah += digits[i];
                    if ((i + 1) % 3 === 0 && (i + 1) !== digits.length) {
                        rupiah += ".";
                    }
                }

                rupiah = rupiah.split("").reverse().join("");

                if (splitAmount.length > 1) {
                    rupiah += "," + splitAmount[1];
                }

                return "Rp. " + rupiah;
            }

            var detail = false;
            function toggleDetail(noTransaksi) {
                detail = !detail;

                if (detail) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'get_detail_transaksi.php?no_transaksi=' + noTransaksi, true);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            var detailRows = JSON.parse(xhr.responseText);
                            var html = "<h4>Daftar Barang</h4>" +
                                "<table class='space'>" +
                                "<thead>" +
                                "<tr>" +
                                "<td><b>#</b></td>" +
                                "<td><b>Kode Barang</b></td>" +
                                "<td><b>Nama Barang</b></td>" +
                                "<td><b>Harga Barang</b></td>" +
                                "<td><b>Jumlah Barang</b></td>" +
                                "<td><b>Total Harga</b></td>" +
                                "</tr>" +
                                "</thead>" +
                                "<tbody>";

                            for (var i = 0; i < detailRows.length; i++) {
                                html +=
                                    "<tr>" +
                                    "<td class='text-center'>" + detailRows[i].no + "</td>" +
                                    "<td class='text-center'>" + detailRows[i].kode_barang + "</td>" +
                                    "<td>" + detailRows[i].nama_barang + "</td>" +
                                    "<td class='text-right'>" + formatRupiah(detailRows[i].harga_barang) + "</td>" +
                                    "<td class='text-center'>" + detailRows[i].jml_barang + "</td>" +
                                    "<td class='text-right'>" + formatRupiah(detailRows[i].total_harga) + "</td>" +
                                    "</tr>";
                            }

                            html +=
                                "</tbody>" +
                                "</table>" +
                                "<div class='btn-cancel text-right'>" +
                                "<button class='delete' onClick=\"toggleDetail()\">Close</button>" +
                                "</div>";
                            document.getElementById("detail-content").innerHTML = html;
                        } else {
                            console.error('Terjadi kesalahan. Status respons: ' + xhr.status);
                        }
                    };
                    xhr.send();
                    document.getElementById("detail").style.display = "block";
                } else {
                    document.getElementById("detail").style.display = "none";
                }
            }
        </script>
        <div id="detail">
            <div onClick="toggleDetail()" id="overlay"></div>
            <div id="detail-content"></div>
        </div>
    </div>
</body>

</html