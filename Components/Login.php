<?php  
session_start(); // Memulai sesi
include 'conection.php';

if (isset($_GET['submit'])) {
    $username = trim($_GET['username']);
    $password = trim($_GET['password']);

    // Validasi format input
    if (empty($username) || empty($password)) {
        echo '<script>alert("Username dan password tidak boleh kosong!")</script>';
        exit();
    }

    if (!ctype_alnum($username)) {
        echo '<script>alert("Username hanya boleh berisi huruf dan angka!")</script>';
        exit();
    }

    // Escape input untuk menghindari SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query ke tabel pengakses
    $queryPengakses = "SELECT * FROM pengakses WHERE username='$username' AND password='$password'";
    $resultPengakses = mysqli_query($conn, $queryPengakses);

    if (mysqli_num_rows($resultPengakses) > 0) {
        $pengakses = mysqli_fetch_assoc($resultPengakses);

        // Simpan informasi ke sesi
        $_SESSION['username'] = $pengakses['username'];
        $_SESSION['status'] = $pengakses['status'];

        // Ambil ID dari tabel pengurus atau mitra
        $id = $pengakses['id']; // Ganti dengan nama kolom ID yang sesuai
        $username = $pengakses['username'];

        // Redirect berdasarkan status
        if ($pengakses['status'] == 'admin') {
            header("Location: ../Dashboard/admin.php?id=" . urlencode($id));
            exit();
        } elseif ($pengakses['status'] == 'developer') {
            header("Location: ../Dashboard/dev.php?id=" . urlencode($id));
            exit();
        }
    } else {
        // Query ke tabel user
        $queryUser = "SELECT * FROM user WHERE username='$username'";
        $resultUser = mysqli_query($conn, $queryUser);

        if (mysqli_num_rows($resultUser) > 0) {
            $user = mysqli_fetch_assoc($resultUser);

            // Verifikasi password dengan password_hash()
            if (password_verify($password, $user['password_acount'])) {
                // Login berhasil
                $_SESSION['username'] = $user['username'];
                $_SESSION['status'] = 'user'; // Status default untuk tabel user
                $id = $user['id_account']; // Ganti dengan nama kolom ID yang sesuai
                header("Location: ../Dashboard/panel_user.php?id=" . urlencode($id));
                exit();
            } else {
                echo '<script>alert("Username atau password salah!")</script>';
            }

        } else {
            // Jika tidak ditemukan di kedua tabel
            echo '<script>alert("Login gagal! Username atau password salah.")</script>';
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/login.css">
</head>

<body>
    <main id="main" class="d-flex justify-content-center align-items-center">
        <section class="box shadow p-3 d-flex justify-content-center rounded-2 fadein position-relative"
            style="width: 800px; background-color: white;">
            <section class="logo position-relative " style="margin-left: -300px;">
                <img src="../Asset/logo.png" alt="" width="500px" class="img-fluid ">
            </section>
            <section class="form position-absolute" style="margin-left: 200px;">
                <Form method="GET">
                    <fieldset class="fw-bold h4 " style="color: #1599A3;">Login</fieldset>
                    <section class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </section>
                    <section class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </section>
                    <section class="mb-3 w-100">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </section>
                </Form>
            </section>
        </section>
    </main>
    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>