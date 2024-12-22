document.addEventListener('DOMContentLoaded', function () {
  const dataPengadu = '';
  // Button Lihat Pengaduan
  $('.btn-lihat').on('click', function () {
    var id = $(this).data('id');

    // Mengambil data dari server
    $.ajax({
      url: '../../PHP/getIdPengadu.php', // URL untuk mengambil data
      type: 'GET',
      data: { id: id },
      success: function (response) {
        console.log('Raw response:', response); // Tambahkan ini untuk melihat respons sebenarnya
        try {
          var data = JSON.parse(response);
          console.log(data);

          // Mengisi nilai form
          $('#nama').val(data.nama);
          $('#kategori').val(data.kategori);
          $('#pengaduan').val(data.pengaduan);

          // Menampilkan gambar jika ada
          if (data.image_list) {
            $('#gambar1').attr('src', '../../uploads/' + data.image_list); // Menampilkan gambar 1
          }
        } catch (e) {
          console.error('Error parsing JSON:', e);
          alert('Error parsing data from server. Check console for details.');
        }
      },
      error: function () {
        alert('Error retrieving data.');
      },
    });
  });

  // Jika Button Feedback Di klik
  $('.btn-feedback').on('click', function () {
    var id = $(this).data('id'); // Mengambil data-id dari tombol
    console.log(id);
    const formFeedback = `
        <form id="pengaduanForm" method="POST" enctype="multipart/form-data"">
            <!-- Nama Penanggung Jawab -->
            <div class="mb-3">
                <label for="penanggungJawab" class="form-label">Penanggung Jawab</label>
                <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab">
            </div>
            <!-- Status -->
            <section class="mb-3">
                <label for="kategori" class="form-label">Kategori Pengaduan</label>
                <select class="form-select" id="kategori" name="status">
                    <option selected value="">Pilih kategori</option>
                    <option value="Pengaduan Diterima">Pengaduan Diterima</option>
                    <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                    <option value="Sukses">Sukses</option>
                </select>
            </section>
            <!-- Lampiran -->
            <section class="mb-3">
                <label for="formFileMultiple" class="form-label">Lampiran</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple name="lampiran[]">
            </section>
            <!-- Detail Pengaduan -->
            <section class="mb-3">
                <label for="pengaduan" class="form-label">Informasi</label>
                <textarea class="form-control" id="pengaduan" rows="3" name="message"></textarea>
            </section>
        </form>`;

    // Menambahkan form ke dalam modal body
    $('.modal-body').html(formFeedback);
    $('.btn-submit').removeClass('d-none');

    // Event Listener untuk Submit
    $('.btn-submit').on('click', function () {
      const form = document.getElementById('pengaduanForm');
      var formData = new FormData(form);
      console.log('Sending data:', formData);
      // Tambahkan ID pengaduan ke FormData
      formData.append('id_pengaduan', id);

      // Kirim data ke ulasan.php
      $.ajax({
        url: '../../PHP/ulasan.php', // Ganti dengan path file PHP yang sesuai
        type: 'POST',
        data: formData, // Pastikan data yang dikirim benar
        processData: false,
        contentType: false,
        success: function (response) {
          alert('Feedback Berhasil Terkirim'); // Menampilkan response dari server
        },
        error: function (xhr, status, error) {
          alert('Request failed: ' + error);
        },
      });
    });
  });
});

// // Menutup modal
// $('#modalLaunch').modal('hide');
