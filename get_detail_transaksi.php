<?php
include_once("m_transaksi.php");
$noTransaksi = $_GET['no_transaksi'];
$model = new m_transaksi();
$detail = $model->getDetailTransaksi($noTransaksi);
$no=1;
foreach ($detail as $row) {
    $detailRows[] = array(
        'no' => $no++,
        'kode_barang' => $row['kode_barang'],
        'nama_barang' => $row['nama_barang'],
        'harga_barang' => $row['harga_barang'],
        'jml_barang' => $row['jml_barang'],
        'total_harga' => $row['harga_barang'] * $row['jml_barang']
    );
}
echo json_encode($detailRows);
