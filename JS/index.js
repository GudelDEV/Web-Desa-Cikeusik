// Mendapatkan navbar
const navbar = document.getElementById('navbar');
const header = document.getElementById('header');
const banner = document.getElementById('banner');
// Menambahkan event listener untuk mendeteksi scroll
window.onscroll = function () {
  if (window.scrollY > 50) {
    // Jika scroll lebih dari 50px
    navbar.classList.add('sticky-navbar', 'scrolled', 'container-fluid'); // Menambahkan class sticky-navbar dan scrolled
    header.classList.remove('container');
    banner.classList.add('container');
  } else {
    navbar.classList.remove('sticky-navbar', 'scrolled'); // Menghapus class ketika scroll kembali ke atas
    header.classList.add('container');
    banner.classList.remove('container');
  }
};
