<?php
include 'conection.php';
if (isset($_GET['getTotalNews'])) {
    $query = "SELECT COUNT(*) AS total FROM news";
    $result = $conn->query($query);

    if (!$result) {
        die(json_encode(['error' => $conn->error]));
    }

    $row = $result->fetch_assoc();
    echo json_encode(['total' => $row['total']]);
    exit;
}




// Jika permintaan data menggunakan AJAX
if (isset($_GET['ajax']) && $_GET['ajax'] == 'true') {
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $rowsPerPage = isset($_GET['rowsPerPage']) ? intval($_GET['rowsPerPage']) : 10;
    $offset = ($page - 1) * $rowsPerPage;

    // Modifikasi query untuk mengurutkan berita berdasarkan tanggal terbaru
    $query = "SELECT * FROM news ORDER BY tanggal DESC LIMIT $offset, $rowsPerPage";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<section class="row row-cols-1 row-cols-md-3 g-4">'; // Bootstrap Grid
        while ($row = $result->fetch_assoc()) {
            $image = htmlspecialchars($row['image_list']); // Ambil URL gambar dari database
            $newsId = htmlspecialchars($row['id']); // Ambil ID berita
            echo '    
            <section class="col"> <!-- Kolom card -->
                <section class="card h-100" style="width: 400px;"> <!-- Card dengan tinggi fleksibel -->
                    <img src="../uploads/' . htmlspecialchars($image) . '" alt="Card image" class="card-img-top" style="object-fit: cover; height: 200px;">
                    <section class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($row['judul']) . '</h5>
                        <p class="card-text">' . htmlspecialchars(substr($row['artikel'], 0, 100)) . '...</p>
                    </section>
                    <section class="card-footer d-flex justify-content-between align-items-center">
                        <a href="Detailberita.php?id=' . htmlspecialchars($newsId) . '" class="text-decoration-underline">Baca Lebih Lanjut</a>
                        <span>' . htmlspecialchars($row['penulis']) . '</span>
                        <section class="d-flex align-items-center gap-2"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#1599A3" class="bi bi-calendar3" viewBox="0 0 16 16">
                              <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                              <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 ```php
                1 0 0 0 0 2"/>
                            </svg>
                            <p class="h6 mt-2" style="color: blue">' . date('d-m-Y', strtotime($row['tanggal'])) . '</p>
                        </section>
                    </section>
                </section>
            </section>';
        }
        echo '</section>'; // Tutup row grid
    } else {
        echo '<p>No news available</p>';
    }

    exit; // Jangan render bagian HTML lainnya untuk AJAX
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/berita.css">
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
            <h1 class="h1 fw-bolder" style="color: #1599A3;">BERITA DESA CIKEUSIK</h1>
            <p style="font-size: 20px;">Menyajikan informasi terbaru tentang peristiwa, berita terkini, <br>
                artikel-artikel jurnalistik dari Desa Cikeusik
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
                <!-- Untuk Page Berita -->
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
    <script src="../JS/berita.js"></script>
</body>

</html>