document.addEventListener('DOMContentLoaded', function () {
  // Button Edit Form Daftar
  $('.btn-edit').on('click', function () {
    let id = $(this).data('id');
    console.log('ID LIST:', id);

    let formElement = `  <form method="POST" enctype="multipart/form-data" id="formUpdate-${id}">
                                            <!-- Data Pribadi -->
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    placeholder="Masukkan nama lengkap Anda" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                                                <input type="number" class="form-control" id="nik" name="nik"
                                                    placeholder="Masukkan NIK Anda" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="laki-laki" value="laki-laki" required>
                                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                        id="perempuan" value="perempuan" required>
                                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir"
                                                    name="tanggal_lahir" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir" placeholder="Masukkan tempat lahir Anda" required>
                                            </div>
    
                                            <!-- Data Kontak -->
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                                    placeholder="Masukkan alamat lengkap Anda" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telepon" class="form-label">Nomor Telepon/WA</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon"
                                                    placeholder="Masukkan nomor telepon Anda">
                                            </div>
    
                                            <!-- Informasi Pendaftaran -->
                                            <div class="mb-3">
                                                <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
                                                <select class="form-select" id="jenis_pendaftaran" name="jenis_pendaftaran"
                                                    required>
                                                    <option value="" selected>Pilih jenis pendaftaran</option>
                                                    <option value="penduduk baru">Penduduk Baru</option>
                                                    <option value="migrasi masuk">Migrasi Masuk</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
    
                                                <!-- Tombol Submit -->
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-primary" style="width: 100%;"
                                                        id="updateData">Update Data</button>
                                                </div>
                                        </form>`;

    $('.editModal').html(formElement);
    // Mengambil data dari server
    $.ajax({
      url: '../../PHP/getIdDaftar.php', // URL untuk mengambil data
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
          $('#jk_kelamin').val(data.jk_kelamin || '');
          $('#tanggal_lahir').val(data.tanggal_lahir || '');
          $('#tempat_lahir').val(data.tempat_lahir || '');
          $('#alamat').val(data.alamat || '');
          $('#telepon').val(data.telepon || '');
          $('#jenis_pendaftaran').val(data.jenis_pendaftaran || '');
          $('#alasan').val(data.tanggal || '');

          // Menampilkan gambar jika ada
          //   if (data.dokumen) {
          //     $('#gambar1').attr('src', '../../uploads/' + data.dokumen); // Menampilkan gambar 1
          //   } else {
          //     $('#gambar1').attr('src', ''); // Kosongkan jika tidak ada gambar
          //   }
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

    // Update Data
    $('#updateData').on('click', function () {
      console.log(id);
      const form = document.getElementById(`formUpdate-${id}`);
      var formData = new FormData(form);
      formData.append('idEdit', id); // Tambahkan ID pengaduan ke FormData
      console.log('Data yang dikirim:', Object.fromEntries(formData));
      const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
      if (!jenisKelamin) {
        alert('Pilih jenis kelamin!');
        return;
      }

      $.ajax({
        url: '../../PHP/update_data_warga.php', // Pastikan URL benar
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          //   console.log('Response dari server:', response);

          // Tidak perlu lagi menggunakan JSON.parse jika response sudah otomatis menjadi JSON
          if (response == 'Data updated successfully.') {
            alert('Data updated successfully');
            $('#editModal').modal('hide'); // Menutup modal
            window.location.reload();
          } else {
            alert(response || 'Gagal mengirim feedback.');
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

  // Button Tambahkan Data
  $('#Daftarkan').on('click', async function () {
    const form = document.getElementById('formPendafaran');
    var formData = new FormData(form);
    console.log('Data yang dikirim:', Object.fromEntries(formData));
    $.ajax({
      url: '../../PHP/addWarga.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        // console.log('Response dari server:', response);
        if (response.status == 'success') {
          alert('Data added successfully');
          window.location.reload();
        } else {
          alert(response.status || 'Gagal menambahkan data.');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('Request Error:', errorThrown);
      },
    });
  });

  // Button Delete
  $('.btn-delete').on('click', async function () {
    const id = $(this).data('id');
    $.ajax({
      url: '../../PHP/delWarga.php',
      type: 'POST',
      data: { id: id },
      success: function (response) {
        console.log('Response dari server:', response);
        alert('Data deleted successfully');
        window.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('Request Error:', errorThrown);
      },
    });
  });
});
