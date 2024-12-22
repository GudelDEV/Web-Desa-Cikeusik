document.addEventListener('DOMContentLoaded', function () {
  // Ambil elemen canvas
  var ctx = document.getElementById('pieChart').getContext('2d');

  // Data untuk chart
  var data = {
    labels: ['Laki-Laki', 'Perempuan', 'Migrasi', 'Kepala Keluarga', 'Pelajar'],
    datasets: [
      {
        data: [1100, 1100, 300, 500, 500], // Data sesuai kategori
        backgroundColor: [
          '#f56954', // Warna Laki-Laki
          '#00a65a', // Warna Perempuan
          '#f39c12', // Warna Migrasi
          '#00c0ef', // Warna Kepala Keluarga
          '#3c8dbc', // Warna Pelajar
        ],
      },
    ],
  };

  // Opsi untuk chart
  var options = {
    maintainAspectRatio: false,
    responsive: true,
    plugins: {
      legend: {
        display: true,
        position: 'bottom',
      },
    },
  };

  // Buat chart
  new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options,
  });
});
