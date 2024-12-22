<?php
// header('Content-Type: application/json');

include 'conection.php';
if (isset($_GET['getTotalProduk'])) {
    $query = "SELECT COUNT(*) AS total FROM produk";
    $result = $conn->query($query);

    if (!$result) {
        die(json_encode(['error' => $conn->error]));
    }

    $row = $result->fetch_assoc();
    echo json_encode(['total' => $row['total']]);
    exit; // Mencegah HTML dirender
}





// Jika permintaan data menggunakan AJAX
if (isset($_GET['ajax']) && $_GET['ajax'] == 'true') {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $rowsPerPage = isset($_GET['rowsPerPage']) ? intval($_GET['rowsPerPage']) : 10;
    $offset = ($page - 1) * $rowsPerPage;

    // Modifikasi query untuk mengurutkan berita berdasarkan tanggal terbaru
    $query = "SELECT * FROM produk ORDER BY id DESC LIMIT $offset, $rowsPerPage";
$result = $conn->query($query);
if (!$result) {
    die('Query failed: ' . $conn->error);
}

if ($result->num_rows > 0) {
    echo '<section class="row row-cols-1 row-cols-md-3 g-4">'; // Bootstrap Grid
    while ($row = $result->fetch_assoc()) {
        $image = htmlspecialchars($row['image_produk']); // Ambil URL gambar dari database
        $id_product = htmlspecialchars($row['id']); // Ambil ID Product
        $price = htmlspecialchars($row['harga_produk']); // Ambil harga produk

        echo '    
        <section class="col"> <!-- Kolom card -->
            <section class="card h-100" style="width: 400px;"> <!-- Card dengan tinggi fleksibel -->
                <img src="../uploads/' . $image . '" alt="Card image" class="card-img-top" style="object-fit: cover; height: 200px;">
                <section class="card-body">
                    <h5 class="card-title">' . htmlspecialchars($row['judul_produk']) . '</h5>
                    <p class="card-text">' . htmlspecialchars(substr($row['deskripsi_produk'], 0, 100)) . '...</p>
                </section>
                <section class="card-footer d-flex justify-content-between align-items-center">
                    <a href="Detail_produk.php?id=' . $id_product . '" class="text-decoration-underline">Views Detail Produk</a>
                    <p class="card-text"> Rp' . $price . '</p> <!-- Menampilkan harga produk -->
                </section>
            </section>
        </section>';
    }
    echo '</section>'; // Tutup row grid
} else {
    echo '<p>No products available</p>';
}


    exit; // Jangan render bagian HTML lainnya untuk AJAX
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/belanja.css">
</head>

<body>
    <!-- Navbar-Start -->
    <?php 
        include "./Navbar.php"
    ?>
    <!-- Navbar-End -->
    <!-- Main Start -->
    <main class="mt-5">
        <!-- Text-Start -->
        <section class="text container">
            <h1 class="h1 fw-bolder" style="color: #1599A3;">Cari Berbagai Produk Masyarakat</h1>
            <p style="font-size: 20px;">Temukan berbagai produk lokal hasil karya masyarakat, berkualitas dan penuh
                makna
            </p>
        </section>
        <!-- Text-End -->
        <!-- Berita-Start  -->
        <section class="container mt-3">
            <div class="pagination-container">
                <label for="rows" class="h6">Show rows:</label>
                <select id="rows" onchange="changeRowsPerPage()" style="width: 100px;">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>

                <button onclick="goToFirstPage()" class="btn">First</button>
                <button onclick="goToPreviousPage()" class="btn">&#8249;</button>
                <span id="page-info" class="h6">Page 1 of 1</span>
                <button onclick="goToNextPage()" class="btn">&#8250;</button>
                <button onclick="goToLastPage()" class="btn">Last</button>

            </div>

            <div id="news-container" class="news-cards mt-4">
                <!-- Untuk Page Produk -->
            </div>


        </section>
        <!-- Berita-End  -->
    </main>
    <!-- Main-End -->
    <!-- Footer-Start -->
    <?php include
      "./Footer.php"?>
    <!-- Footer-End -->

    <script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../JS/belanja.js"></script>
</body>

</html>