document.addEventListener('DOMContentLoaded', function () {
  let selectedId = null;

  // Event delegation untuk tombol confirm
  $(document).on('click', '.btn-confirm', function () {
    selectedId = $(this).data('id'); // Ambil ID dari tombol yang diklik
    console.log('Selected ID:', selectedId);
  });

  // Event listener untuk tombol create di modal
  $('#btn-create').on('click', function () {
    if (!selectedId) {
      alert('Tidak ada ID yang dipilih.');
      return;
    }

    const form = document.getElementById('createAccount');
    const formData = new FormData(form);
    formData.append('id', selectedId);

    $.ajax({
      type: 'POST',
      url: '../../PHP/mitraAccount.php',
      data: formData,
      processData: false,
      contentType: false,

      success: function (data) {
        console.log('Server Response:', data);

        if (data === 'success') {
          alert('Account created successfully');
          $('.btn-confirm[data-id="' + selectedId + '"]').addClass('disabled');
          //   window.location.reload();
        } else {
          alert('Failed to create account');
        }
      },
      error: function (xhr, status, error) {
        console.error('Request Error:', error);
        alert('Gagal mengambil data. Silakan coba lagi.');
      },
    });
  });
});
