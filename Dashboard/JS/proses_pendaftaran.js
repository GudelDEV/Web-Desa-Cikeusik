document.addEventListener('DOMContentLoaded', function (e) {
  $('.btn-lihat').on('click', function () {
    var id = $(this).data('id');
    console.log(id);

    let formElement = `      <!-- Konten form pendaftaran -->
                                          <form method="POST" enctype="multipart/form-data" id="formDaftar-${id}">
                                              <!-- Data Pribadi -->
                                              <div class="mb-3">
                                                  <label for="nama" class="form-label">Nama Lengkap</label>
                                                  <input type="text" class="form-control" id="nama" name="nama"
                                                      placeholder="Masukkan nama lengkap Anda" readonly>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="nik" class="form-label">NIK (Nomor Induk
                                                      Kependudukan)</label>
                                                  <input type="number" class="form-control" id="nik" name="nik"
                                                      placeholder="Masukkan NIK Anda" readonly>
                                              </div>
                                              <div class="mb-3">
                                                  <label class="form-label">Jenis Kelamin</label>
                                                  <input type="text" class="form-control" id="jk_kelamin"
                                                      name="jk_kelamin" readonly>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                  <input type="date" class="form-control" id="tanggal_lahir"
                                                      name="tanggal_lahir" readonly>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                  <input type="text" class="form-control" id="tempat_lahir"
                                                      name="tempat_lahir" placeholder="Masukkan tempat lahir Anda"
                                                      readonly>
                                              </div>
  
                                              <!-- Data Kontak -->
                                              <div class="mb-3">
                                                  <label for="alamat" class="form-label">Alamat Lengkap</label>
                                                  <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                                      placeholder="Masukkan alamat lengkap Anda" readonly></textarea>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="telepon" class="form-label">Nomor Telepon/WA</label>
                                                  <input type="text" class="form-control" id="telepon" name="telepon"
                                                      readonly>
                                              </div>
  
                                              <!-- Informasi Pendaftaran -->
                                              <div class="mb-3">
                                                  <label for="jenis_pendaftaran" class="form-label">Jenis
                                                      Pendaftaran</label>
                                                  <select class="form-select" id="jenis_pendaftaran"
                                                      name="jenis_pendaftaran" readonly>
                                                      <option value="" selected>Pilih jenis pendaftaran</option>
                                                      <option value="penduduk baru">Penduduk Baru</option>
                                                      <option value="migrasi masuk">Migrasi Masuk</option>
                                                      <option value="lainnya">Lainnya</option>
                                                  </select>
                                              </div>
                                              <div class="mb-3">
                                                  <label for="alasan" class="form-label">Alasan Pendaftaran</label>
                                                  <textarea class="form-control" id="alasan" name="alasan" rows="3"
                                                      placeholder="Jelaskan alasan Anda mendaftar" readonly></textarea>
                                              </div>
  
                                              <!-- Dokumen Pendukung -->
                                              <div class="mb-3">
                                                  <h4 class="h5 fw-bolder">Gambar</h4>
                                                  <img src="" alt="gambar1" id="gambar1" style="max-width: 100%;">
                                              </div>
  
                                              <!-- Tombol Submit -->
                                              <div class="text-center">
                                                  <button type="button" class="btn btn-primary btn-daftar" style="width: 100%;"
                                                      id="Daftarkan">Daftar</button>
                                              </div>
                                          </form>`;

    $('.modal-Lihat').html(formElement);
    $.ajax({
      url: '../../PHP/getIdPendaftar.php', // URL untuk mengambil data
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
          $('#telepon').val(data.telepon || '');
          $('#jenis_pendaftaran').val(data.jenis_pendaftaran || '');
          $('#alasan').val(data.alasan || '');

          // Menampilkan gambar jika ada
          if (data.dokumen) {
            $('#gambar1').attr('src', '../../uploads/' + data.dokumen); // Menampilkan gambar 1
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
    // Button Submit Di klik
    $('#Daftarkan').on('click', async function (e) {
      console.log('Submit');

      try {
        e.preventDefault();
        const form = document.getElementById(`formDaftar-${id}`);
        const formData = new FormData(form);

        const response = await fetch('../../PHP/confirmDaftar.php', {
          method: 'POST',
          body: formData,
        });

        const data = await response.json();
        if (data.status === 'success') {
          alert('Data berhasil disimpan.');
          window.location.reload();
        } else {
          alert('Gagal menyimpan data. Silakan coba lagi.');
        }
      } catch (eror) {
        console.error(eror);
      }
    });
  });

  //   button Feedback Di klik
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
          const response = await fetch('../../PHP/fbDaftar.php', {
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
