document.addEventListener('DOMContentLoaded', function () {
  $('#addProduct').on('click', function (e) {
    e.preventDefault(); // Hindari reload halaman
    let id = $(this).data('id'); // Ambil ID dari data-id button
    const form = document.getElementById(`formProduk`); // Form dengan ID formProduk
    var formData = new FormData(form);
    formData.append('id_produk', id); // Tambahkan ID produk ke FormData

    // Debug data yang dikirim
    console.log('Data yang dikirim:', Object.fromEntries(formData));

    // Kirim data ke produk.php melalui AJAX
    $.ajax({
      type: 'POST',
      url: '../PHP/produk.php',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        // console.log('Response:', response);
        if (response.status == 'success') {
          alert('Berhasil Menambahkan Data Produk');
          window.location.reload();
        } else {
          alert(response.message || 'Gagal Menambahkan Produk.');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error('Request Error:', errorThrown, jqXHR.responseText);
      },
    });
  });

  $('.btn-edit').on('click', function () {
    let id = $(this).data('id');
    console.log('id', id);

    let formElement = `  <form method="POST" enctype="multipart/form-data" id="editProduk-${id}">
                                                  <div class="mb-3">
                                                      <label for="nama" class="form-label">Nama Produk</label>
                                                      <input type="text" class="form-control" id="nama" name="nama"
                                                          placeholder="Masukkan nama Produk">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="judul" class="form-label">Judul</label>
                                                      <input type="text" class="form-control" id="judul" name="judul"
                                                          placeholder="Masukkan Judul Produk">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="harga" class="form-label">harga</label>
                                                      <input type="number" class="form-control" id="harga" name="harga"
                                                          placeholder="Masukkan Harga Produk">
                                                  </div>
                                                  <div class="mb-3">
                                                      <label for="stock" class="form-label">STOCK</label>
                                                      <input type="number" class="form-control" id="stock" name="stock"
                                                          placeholder="Masukkan Jumlah Stok">
                                                  </div>

                                                <div class="mb-3">
                                            <label for="lampiran" class="form-label">Update Gambar Produk</label>
                                            <input class="form-control" type="file" id="lampiran" name="lampiran[]"
                                                multiple>
                                            </div>
                                              <div class="mb-3">
                                            <label for="alasan" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                                placeholder="deskripsi"></textarea>
                                        </div>
                                                <!-- Gambar Pengaduan -->
                                              <div class="mb-3">
                                                  <h4 class="h5 fw-bolder">Gambar</h4>
                                                  <img src="" alt="gambar1" id="gambar1" style="max-width: 100%;">
                                              </div>
                                                  <button class="btn btn-secondary" data-id="<?php echo $id ?>"
                                                      id="editBtn">SIMPAN</button>
                                              </form>`;

    $('.editModal').html(formElement);
    // Mengambil data dari server
    $.ajax({
      url: '../PHP/getidProduct.php', // URL untuk mengambil data
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
          $('#nama').val(data.nama_produk || '');
          $('#judul').val(data.judul_produk || '');
          $('#harga').val(data.harga_produk || '');
          $('#stock').val(data.stock || '');
          $('#deskripsi').val(data.deskripsi_produk || '');

          //   Menampilkan gambar jika ada
          if (data.image_produk) {
            $('#gambar1').attr('src', data.image_produk); // Menampilkan gambar 1
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

    // Update Data
    $('#editBtn').on('click', function (e) {
      e.preventDefault();
      console.log(id);
      const form = document.getElementById(`editProduk-${id}`);
      var formData = new FormData(form);
      formData.append('idEdit', id); // Tambahkan ID pengaduan ke FormData
      console.log('Data yang dikirim:', Object.fromEntries(formData));
      $.ajax({
        url: '../PHP/updateProduk.php', // Pastikan URL benar
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          // console.log('Response dari server:', response);

          // Tidak perlu lagi menggunakan JSON.parse jika response sudah otomatis menjadi JSON
          if (response == 'Data updated successfully') {
            alert('Data updated successfully');
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

  // Ketika tombol delete klik di klik
  const btnDel = document.querySelectorAll('.btnDelete');
  console.log(btnDel);

  btnDel.forEach((button) => {
    button.addEventListener('click', async (event) => {
      event.preventDefault(); // Prevent default link behavior
      console.log('clik');

      const itemId = button.dataset.id;
      console.log(itemId);

      // Send AJAX request to the server
      try {
        const response = await fetch('../PHP/delProduk.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `id=${itemId}`,
        });

        if (response.ok) {
          // Handle successful deletion
          alert('Item deleted successfully');
          // Update the UI or perform other actions
          window.location.reload();
        } else {
          // Handle error
          alert('Error deleting item:', response.status);
          // Display an error message to the user
          window.location.reload();
        }
      } catch (error) {
        alert('Error:', error);
        // Display an error message to the user
      }
    });
  });
});
