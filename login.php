<?php
include_once('koneksiMVC.php');
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
    header("Location:index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "call Auth('$username','$password')";
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
        $_SESSION['name'] = $row['nama_pegawai'];

        header("Location:index.php");
    } else {
        $auth = 'salah';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body style="display:flex; align-items:center; justify-content:center ">
    <div class="login-group">
        <div class="login-brand">
            <p>SISTEM INFORMASI MINIMARKET</p>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Username:</label>
                        <input class="form-control" type="text" name="username" placeholder="username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input class="form-control" type="password" name="password" placeholder="password" required>
                    </div>
                    <?php if (isset($auth)) { ?>
                        <div class="form-group">
                            <label style="color: red;">
                                Username atau password yang anda masukkan salah atau anda belum terdaftar</br>
                            </label>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <button class="btn-login" type="submit" name="submit">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>