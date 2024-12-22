document.addEventListener('DOMContentLoaded', function (e) {
  // Button Lihat Form Daftar
  $('.btn-lihat').on('click', function () {
    var id = $(this).data('id');
    console.log('ID Pengaduan:', id);

    // Mengambil data dari server
    $.ajax({
      url: '../../PHP/getIdektp.php', // URL untuk mengambil data
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

          //   // Mengisi nilai form
          $('#nama').val(data.nama || '');
          $('#nik').val(data.nik || '');
          $('#jk_kelamin').val(data.jenis_kelamin || '');
          $('#tanggal_lahir').val(data.tanggal_lahir || '');
          $('#tempat_lahir').val(data.tempat_lahir || '');
          $('#alamat').val(data.alamat || '');
          $('#nomor_telepon').val(data.telepon || '');
          $('#agama').val(data.agama || '');
          $('#status_perkawinan').val(data.status_perkawinan || '');
          $('#pekerjaan').val(data.pekerjaan || '');
          $('#kewarganegaraan').val(data.kewarganegaraan || '');
          $('#kk').val(data.no_kk || '');

          // Menampilkan gambar jika ada
          if (data.foto_diri) {
            $('#gambar1').attr('src', '../../uploads/' + data.foto_diri); // Menampilkan gambar 1
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

  // Button Submit Di klik
  //   $('#btnDaftar').on('click', async function (e) {
  //     try {
  //       e.preventDefault();
  //       const form = document.getElementById('formktp');
  //       const formData = new FormData(form);

  //       const response = await fetch('../../PHP/daftarWarga.php', {
  //         method: 'POST',
  //         body: formData,
  //       });

  //       const data = await response.json();
  //       if (data.status === 'success') {
  //         alert('Data berhasil disimpan.');
  //         window.location.reload();
  //       } else {
  //         alert('Gagal menyimpan data. Silakan coba lagi.');
  //       }
  //     } catch (eror) {
  //       console.error(eror);
  //     }
  //   });

  // button Feedback Di klik
  $('.btn-feedback').on('click', function () {
    // Ambil ID pengaduan dari tombol
    const dataId = $(this).data('id');

    // Isi form feedback ke dalam modal-body
    const formFeedback = `
        <form id="feedbackForm-${dataId}" method="POST" enctype="multipart/form-data">
          <!-- Nama Penanggung Jawab -->
          <div class="mb-3">
            <label for="penanggungJawab" class="form-label">Penanggung Jawab</label>
            <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab">
          </div>
          <!-- Status -->
          <section class="mb-3">
            <label for="kategori" class="form-label">Kategori Pengaduan</label>
            <select class="form-select" id="status" name="status">
              <option value="">Pilih kategori</option>
              <option value="Pengaduan Diterima">Pengaduan Diterima</option>
              <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
              <option value="Sukses">Sukses</option>
            </select>
          </section>
          <!-- Detail Pengaduan -->
          <section class="mb-3">
            <label for="message" class="form-label">Informasi</label>
            <textarea class="form-control" id="message" rows="3" name="message"></textarea>
          </section>
        </form>
      `;
    $('.feedbackModal').html(formFeedback);
    $('#feedbackModal').modal('show'); // Tampilkan modal feedback

    // Hapus event handler sebelumnya untuk tombol confirm
    $('.btn-confirm')
      .off('click')
      .on('click', async function () {
        try {
          // Ambil form berdasarkan ID dinamis
          const formElem = document.getElementById(`feedbackForm-${dataId}`);
          const formData = new FormData(formElem);
          formData.append('id_pengaduan', dataId);

          console.log('Data FormData:', Object.fromEntries(formData)); // Debugging data FormData

          // Kirim data ke server menggunakan Fetch API
          const response = await fetch('../../PHP/daftarktp.php', {
            method: 'POST',
            body: formData,
          });

          const data = await response.json();
          console.log(data); // Debugging respons server

          // Tampilkan pesan berdasarkan status respons
          if (data.status === 'success') {
            alert('Pengaduan berhasil dikirim');
            $('#feedbackModal').modal('hide'); // Sembunyikan modal
            window.location.reload(); // Refresh halaman
          } else {
            alert('Pengaduan gagal dikirim: ' + (data.message || 'Terjadi kesalahan'));
          }
        } catch (error) {
          console.error('Error:', error);
          alert('Gagal mengirim pengaduan. Silakan coba lagi.');
        }
      });
  });
});
