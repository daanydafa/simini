<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<?php
session_start();
if (empty($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else { ?>

    <body">
        <nav>
            <div class="brand">
                <a href="index.php"><img src="./logo-no-background.png" alt="" width="80px"></a>
            </div>
            <div class="dropdown">
                <span><?php echo $_SESSION["name"] ?></span>
                <div class="dropdown-content">
                    <a href="logout.php">Log Out</a>
                </div>
            </div>
        </nav>
        <div class="dashboard">
            <h1>Dashboard Minimarket</h1>
            <div class="dashboard-btn">
                <p>
                    <a href="index.barang.php">
                        <input type="submit" name="barang" value="Barang">
                    </a>
                </p>
                <p>
                    <a href="index.pegawai.php">
                        <input type="submit" name="pegawai" value="Pegawai">
                    </a>
                </p>
                <p>
                    <a href="index.member.php">
                        <input type="submit" name="member" value="Member">
                    </a>
                </p>
                <p>
                    <a href="index.pemasok.php">
                        <input type="submit" name="pemasok" value="Pemasok">
                    </a>
                </p>
                <p>
                    <a href="index.transaksi.php">
                        <input type="submit" name="transaksi" value="Transaksi">
                    </a>
                </p>
            </div>
        </div>
        </body>
    <?php } ?>

</html>