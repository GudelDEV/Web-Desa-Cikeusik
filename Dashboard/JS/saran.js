document.addEventListener('DOMContentLoaded', function () {
  // Button Lihat Pengaduan
  $('.btn-lihat').on('click', function () {
    var id = $(this).data('id');
    console.log('ID Pengaduan:', id);

    // Mengambil data dari server
    $.ajax({
      url: '../../PHP/getIdSaran.php', // URL untuk mengambil data
      type: 'GET',
      data: { id: id },
      success: function (response) {
        console.log('Raw response:', response); // Debugging respons

        try {
          var data = JSON.parse(response);
          console.log(data);

          // Validasi apakah data berhasil diambil
          if (!data || data.error) {
            alert(data.error || 'Gagal mengambil data.');
            return;
          }

          // Mengisi nilai form
          $('#nama').val(data.nama || '');
          $('#judul').val(data.judul || '');
          $('#kategori').val(data.kategori || '');
          $('#saranDetail').val(data.deskripsi || '');

          // Menampilkan gambar jika ada
          if (data.image_lampiran) {
            $('#gambar1').attr('src', '../../uploads/' + data.image_lampiran); // Menampilkan gambar 1
          } else {
            $('#gambar1').attr('src', ''); // Kosongkan jika tidak ada gambar
          }
        } catch (e) {
          console.error('Error parsing JSON:', e);
          alert('Terjadi kesalahan saat memproses data dari server.');
        }
      },
      error: function (xhr, status, error) {
        console.error('Request Error:', error);
        alert('Gagal mengambil data. Silakan coba lagi.');
      },
    });
  });
  // Jika Button Feedback Diklik

  $('.btn-feedback').on('click', function () {
    const idFeedback = $(this).data('id'); // Mengambil data-id dari tombol
    console.log('ID untuk Feedback:', idFeedback);

    // Form Feedback HTML
    const formFeedback = `
      <form id="saranFeedback" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="penanggungJawab" class="form-label">Penanggung Jawab</label>
          <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab" required>
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" required>
            <option value="">Pilih status</option>
            <option value="pending" selected>pending</option>
            <option value="Saran Diterima">Saran Diterima</option>
            <option value="Sedang Meninjau">Sedang Meninjau</option>
            <option value="Sukses">Sukses</option>
            <option value="Ditolak">Ditolak</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Informasi</label>
          <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
        </div>
      </form>`;

    // Menambahkan form ke dalam modal body
    $('.modal-body').html(formFeedback);
    $('.btn-submit').removeClass('d-none');

    // Event Listener untuk Submit
    $('.btn-submit')
      .off('click')
      .on('click', function () {
        const form = document.getElementById('saranFeedback');
        if (!form.checkValidity()) {
          alert('Harap isi semua field dengan benar.');
          form.reportValidity(); // Menampilkan validasi HTML bawaan
          return;
        }
        console.log(idFeedback);

        var formData = new FormData(form);
        formData.append('id_pengaduan', idFeedback); // Tambahkan ID pengaduan ke FormData
        console.log('Data yang dikirim:', Object.fromEntries(formData));

        // Kirim data ke server
        $.ajax({
          url: '../../PHP/daftarSaran.php', // Pastikan URL benar
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            console.log('Response dari server:', response);

            // Tidak perlu lagi menggunakan JSON.parse jika response sudah otomatis menjadi JSON
            if (response.success) {
              alert(response.message);
              $('#modalLaunch').modal('hide'); // Menutup modal
            } else {
              alert(response.message || 'Gagal mengirim feedback.');
            }
          },
          error: function (xhr, status, error) {
            console.error('Request Error:', error);
            console.log('XHR Response:', xhr.responseText);
            alert('Gagal mengirim feedback. Silakan periksa log console.');
          },
        });
      });
  });
});
