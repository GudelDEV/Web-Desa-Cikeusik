window.addEventListener('DOMContentLoaded', function () {
  buttonHandler();

  // Fungsi untuk event handler
  function buttonHandler() {
    const btnMitra = document.getElementById('btnMitra');

    if (btnMitra) {
      btnMitra.addEventListener('click', function () {
        const form = document.getElementById('formMitra');
        const formData = new FormData(form);

        fetch('../PHP/mitra.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => handleServerResponse(data))
          .catch((error) => console.log(error.message));
      });
    }
  }

  // Fungsi untuk menangani respons dari server
  function handleServerResponse(data) {
    showPopup(data.status, data.message);
    closeModal();
  }

  // Fungsi untuk menutup modal
  function closeModal() {
    const myModal = bootstrap.Modal.getInstance('#mitraModal');
    if (myModal) myModal.hide();
    removeBackdrop();
  }

  // Fungsi untuk menghapus elemen backdrop modal
  function removeBackdrop() {
    const backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) backdrop.remove();
  }

  // Fungsi untuk menampilkan popup
  function showPopup(status, message) {
    const popup = document.getElementById('parrentPopUp');
    const popupContent = document.getElementById('popUpContent');
    const informarionPopup = document.getElementById('information');
    const titlePopUp = document.getElementById('titlePopup');

    popupContent.classList.add('fadein');
    popup.style.zIndex = '1000';
    popup.style.opacity = '1';
    informarionPopup.textContent = message;

    if (status !== 'success') titlePopUp.style.color = 'red';
  }

  // Event listener untuk tombol close popup
  const closeButton = document.getElementById('close');
  closeButton.addEventListener('click', function () {
    const popup = document.getElementById('parrentPopUp');
    popup.style.zIndex = '-1000';
    popup.style.opacity = '0';
  });
});
