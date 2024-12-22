document.addEventListener('DOMContentLoaded', function () {
  const btnAddBerita = document.getElementById('addBerita');
  const btnLogout = document.getElementById('btnLogout');
  const btnKirimBerita = document.getElementById('kirimBerita');
  const modalContent = document.getElementById('modalContent');
  const modalTitle = document.getElementById('titleModal');

  btnAddBerita.addEventListener('click', function () {
    btnLogout.classList.add('d-none');
    btnKirimBerita.classList.remove('d-none');
    let content = ` <form id="formBerita" method="POST" enctype="multipart/form-data">
    <section class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" class="form-control" id="judul" name="judul" required placeholder="Masukan Judul">
    </section>
    <section class="mb-3">
      <label for="penulis" class="form-label">Penulis</label>
      <input type="text" class="form-control" id="penulis" name="penulis" required placeholder="Masukan Nama">
    </section>
    <section class="mb-3">
      <label for="formFileMultiple" class="form-label">Lampiran</label>
      <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
    </section>
    <section class="mb-3">
      <label for="text" class="form-label">Isi Berita</label>
      <textarea class="form-control" id="text" name="message" rows="5" placeholder="Tuliskan text"></textarea>
    </section>
    </form>`;
    modalTitle.textContent = 'Tambahkan Berita';
    modalContent.innerHTML = content;
  });

  btnKirimBerita.addEventListener('click', function () {
    let form = document.getElementById('formBerita');
    const formData = new FormData(form);
    fetch('../../PHP/proses_berita.php', {
      method: 'POST',
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        alert(data.message);
        clearFormInputs('formBerita');
      })
      .catch((error) => alert(`Terjadi Kesalahan ${error.message}`));
  });

  function clearFormInputs(formId) {
    const form = document.getElementById(formId);
    if (!form) {
      console.error(`Form dengan ID "${formId}" tidak ditemukan.`);
      return;
    }

    // Reset semua input di dalam form
    form.reset();

    // Jika ada input file, kita harus mengatur ulang manual karena `form.reset()` tidak membersihkan file
    const fileInputs = form.querySelectorAll('input[type="file"]');
    fileInputs.forEach((fileInput) => {
      fileInput.value = ''; // Hapus nilai file
    });

    console.log(`Form "${formId}" berhasil di-reset.`);
  }

  // Ketika button edit di klik
  $('.btn-edit').on('click', function () {
    var id = $(this).data('id');

    // Mengambil data dari server
    $.ajax({
      url: '../../PHP/getIdBerita.php', // URL untuk mengambil data
      type: 'GET',
      data: { id: id },
      success: function (response) {
        // Mengisi form dengan data yang diterima
        var data = JSON.parse(response);
        console.log(data);

        $('#editId').val(data.id);
        $('#editJudul').val(data.judul);
        $('#editPenulis').val(data.penulis);
        $('#editTanggal').val(data.tanggal);
        $('#text').val(data.artikel);
      },
      error: function () {
        alert('Error retrieving data.');
      },
    });
  });

  // Update Berita
  document.getElementById('saveEdit').addEventListener('click', function () {
    var formData = new FormData(document.getElementById('editForm')); // Mengambil data dari form
    $.ajax({
      url: '../../PHP/updateBerita.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        alert('Update Berita Berhasil');
        window.location.reload(); // Reload halaman setelah update
      },
      error: function () {
        alert('Error updating data.');
      },
    });
  });

  // Ketika tombol klik di klik
  const btnDel = document.querySelectorAll('.btnDelete');
  console.log(btnDel);

  btnDel.forEach((button) => {
    button.addEventListener('click', async (event) => {
      event.preventDefault(); // Prevent default link behavior
      console.log('clik');

      const itemId = button.dataset.id;

      // Send AJAX request to the server
      try {
        const response = await fetch('../../PHP/delBerita.php', {
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
