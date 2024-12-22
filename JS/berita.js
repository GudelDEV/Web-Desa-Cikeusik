let currentPage = 1; // Halaman saat ini
let rowsPerPage = 10; // Jumlah berita per halaman
let totalPages = 1; // Total halaman, ini akan dihitung

// Fungsi untuk memuat berita dari server
async function loadNews(page) {
  console.log(`Loading news for page: ${page}, rowsPerPage: ${rowsPerPage}`);
  const newsContainer = document.getElementById('news-container');
  newsContainer.innerHTML = ''; // Kosongkan kontainer sebelum memuat data baru

  try {
    // Fetch total news count
    const totalResponse = await fetch('berita.php?getTotalNews=true');
    const totalData = await totalResponse.json();
    const totalNews = totalData.total;

    // Hitung total halaman
    totalPages = Math.ceil(totalNews / rowsPerPage);

    // Fetch data berita berdasarkan halaman
    const response = await fetch(`berita.php?ajax=true&page=${page}&rowsPerPage=${rowsPerPage}`);
    const data = await response.text();
    newsContainer.innerHTML = data; // Masukkan data berita ke dalam kontainer

    updatePageInfo();
  } catch (error) {
    console.error('Error loading news:', error);
  }

  updateNavigationButtons(); // Perbarui tombol navigasi setelah data dimuat
}

// Fungsi untuk memperbarui informasi halaman
function updatePageInfo() {
  const pageInfo = document.getElementById('page-info');
  pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
}

// Fungsi untuk menangani jumlah berita per halaman
function changeRowsPerPage() {
  const rowsSelect = document.getElementById('rows');
  rowsPerPage = parseInt(rowsSelect.value);
  currentPage = 1; // Reset ke halaman pertama
  loadNews(currentPage);
}

// Fungsi navigasi halaman
function goToFirstPage() {
  console.log('First button clicked');
  currentPage = 1;
  loadNews(currentPage);
}

function goToPreviousPage() {
  console.log('Previous button clicked');
  if (currentPage > 1) {
    currentPage--;
    loadNews(currentPage);
  }
}

function goToNextPage() {
  console.log('Next button clicked');
  if (currentPage < totalPages) {
    currentPage++;
    loadNews(currentPage);
  }
}

function goToLastPage() {
  console.log('Last button clicked');
  currentPage = totalPages;
  loadNews(currentPage);
}

// Inisialisasi awal
window.onload = () => {
  console.log('Page loaded');
  loadNews(currentPage); // Memuat data awal
};

// Validasi tombol navigasi
function updateNavigationButtons() {
  const previousButton = document.querySelector('button[onclick="goToPreviousPage()"]');
  const nextButton = document.querySelector('button[onclick="goToNextPage()"]');

  // Disable tombol Previous jika di halaman pertama
  if (currentPage <= 1) {
    previousButton.disabled = true;
  } else {
    previousButton.disabled = false;
  }

  // Disable tombol Next jika di halaman terakhir
  if (currentPage >= totalPages) {
    nextButton.disabled = true;
  } else {
    nextButton.disabled = false;
  }
}
