// Fungsi utama yang dieksekusi setelah DOM dimuat
window.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('button[data-layanan]');
  const modalTitle = document.querySelector('.modal-title');
  const modalContent = document.getElementById('modalContent');

  // Tambahkan event listener ke setiap tombol
  buttons.forEach((button) => {
    button.addEventListener('click', function () {
      const layanan = button.getAttribute('data-layanan');
      handleButtonClick(layanan);
    });
  });

  // Fungsi untuk menangani klik tombol
  function handleButtonClick(layanan) {
    const content = generateModalContent(layanan);
    modalContent.innerHTML = content;

    // Set judul modal jika perlu
    if (layanan === 'saran') modalTitle.textContent = 'Form Pemberian Saran';
    if (layanan === 'pendaftaran') modalTitle.textContent = 'Form Pendaftaran';
    if (layanan === 'ktp') modalTitle.textContent = 'Form Pembuatan KTP';

    addPengaduanSubmitListener();
  }

  // Fungsi untuk menghasilkan konten modal berdasarkan layanan
  function generateModalContent(layanan) {
    switch (layanan) {
      case 'pengaduan':
        return `
            <form method="POST" enctype="multipart/form-data" id="formPengaduan">
<section class="mb-3">
    <label for="username" class="form-label">Nama</label>
    <input type="text" class="form-control" id="username" name="username" required placeholder="Masukan Nama">
</section>
<section class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="jhoneDae@gmail.com" name="email">
</section>
<section class="mb-3">
    <label for="telephone" class="form-label">Nomor Telephone/WA</label>
    <input type="text" class="form-control" id="telephone" name="telphone" placeholder="089748839940">
</section>
<section class="mb-3">
    <label for="kategori" class="form-label">Kategori Pengaduan</label>
    <select class="form-select" aria-label="Default select example" id="kategori" name="kategori">
        <option selected value="">Open this select menu</option>
        <option value="Umum">Umum</option>
        <option value="Sosial">Sosial</option>
        <option value="Keamanan">Keamanan</option>
        <option value="Kebersihan">Kebersihan</option>
        <option value="Kesehatan">Kesehatan</option>
    </select>
</section>
<section class="mb-3">
    <label for="formFileMultiple" class="form-label">Lampiran</label>
    <input class="form-control" type="file" id="formFileMultiple" multiple name="lampiran[]">
</section>
<section class="mb-3">
    <label for="pengaduan" class="form-label">Pengaduan Detail</label>
    <textarea class="form-control" id="pengaduan" rows="3" name="message" placeholder="Tuliskan Pengaduan"></textarea>
</section>
<section class="mb-3">
    <button type="button" class="btn btn-primary" style="width: 100%;" id="btnPengaduan">Kirim</button>
</section>
        </form>
          `;
      case 'saran':
        return `
            <!-- Konten form saran -->
            <form method="POST" enctype="multipart/form-data" id="formSaran">
<!-- Data Pribadi -->
<div class="mb-3">
<label for="nama" class="form-label">Nama Lengkap (Opsional)</label>
<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
</div>
<div class="mb-3">
<label for="alamat" class="form-label">Alamat Lengkap</label>
<textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda"></textarea>
</div>
<div class="mb-3">
<label for="telepon" class="form-label">Nomor Telepon/WA (Opsional)</label>
<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon">
</div>

<!-- Informasi Saran -->
<div class="mb-3">
<label for="judul" class="form-label">Judul Saran</label>
<input type="text" class="form-control" id="judul" name="judul" placeholder="Tuliskan judul singkat saran Anda">
</div>
<div class="mb-3">
<label for="deskripsi" class="form-label">Deskripsi Saran</label>
<textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" placeholder="Jelaskan secara rinci saran Anda"></textarea>
</div>

<!-- Kategori Saran -->
<div class="mb-3">
<label for="kategori" class="form-label">Kategori Saran</label>
<select class="form-select" id="kategori" name="kategori">
  <option value="">Pilih Kategori</option>
  <option value="Peningkatan Pelayanan Publik">Peningkatan Pelayanan Publik</option>
  <option value="Pengelolaan Lingkungan">Pengelolaan Lingkungan</option>
  <option value="Pengembangan Infrastruktur">Pengembangan Infrastruktur</option>
  <option value="Pemberdayaan Masyarakat">Pemberdayaan Masyarakat</option>
  <option value="lainnya">Lainnya</option>
</select>
</div>

<!-- Dokumentasi Pendukung -->
<div class="mb-3">
<label for="lampiran" class="form-label">Upload File Pendukung (Opsional)</label>
<input class="form-control" type="file" id="lampiran" name="lampiran[]" multiple>
</div>

<!-- Privasi -->
<div class="mb-3">
<label class="form-label">Privasi Saran</label><br>
<div class="form-check">
  <input class="form-check-input" type="radio" name="privasi" id="privasi1" value="tampilkan" checked>
  <label class="form-check-label" for="privasi1">Tampilkan Nama Saya</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="privasi" id="privasi2" value="anonim">
  <label class="form-check-label" for="privasi2">Tetap Anonim</label>
</div>
</div>

<!-- Tombol -->
<section class="mb-3">
    <button type="button" class="btn btn-primary"
    style="width: 100%;" id="btnSaran">Kirim Saran</button>
</section>
</form>
          `;
      case 'pendaftaran':
        return `
            <!-- Konten form pendaftaran -->
            <form method="POST" enctype="multipart/form-data" id="formDaftar">
        <!-- Data Pribadi -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anda" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" required>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir Anda" required>
        </div>

        <!-- Data Kontak -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda" required></textarea>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon/WA</label>
            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon Anda">
        </div>

        <!-- Informasi Pendaftaran -->
        <div class="mb-3">
            <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
            <select class="form-select" id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                <option value="" selected>Pilih jenis pendaftaran</option>
                <option value="penduduk baru">Penduduk Baru</option>
                <option value="migrasi masuk">Migrasi Masuk</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alasan" class="form-label">Alasan Pendaftaran</label>
            <textarea class="form-control" id="alasan" name="alasan" rows="3" placeholder="Jelaskan alasan Anda mendaftar"></textarea>
        </div>

        <!-- Dokumen Pendukung -->
        <div class="mb-3">
            <label for="dokumen" class="form-label">Upload Dokumen Pendukung</label>
            <input class="form-control" type="file" id="dokumen" name="lampiran[]">
        </div>

        <!-- Tombol Submit -->
        <div class="text-center">
            <button type="button" class="btn btn-primary"
    style="width: 100%;" id="btnDaftar">Daftar</button>
        </div>
    </form>
          `;
      case 'ktp':
        return `
            <!-- Konten form KTP -->
            <form method="POST" enctype="multipart/form-data" id="formktp">
        <!-- Nama Lengkap -->
        <section class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </section>

        <!-- Nomor Induk Kependudukan (NIK) -->
        <section class="mb-3">
            <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </section>

        <!-- Tempat Lahir -->
        <section class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </section>

        <!-- Tanggal Lahir -->
        <section class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </section>

        <!-- Jenis Kelamin -->
        <section class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="laki_laki" name="jenis_kelamin" value="laki-laki" required>
                <label class="form-check-label" for="laki_laki">Laki-laki</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="perempuan" name="jenis_kelamin" value="perempuan" required>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </section>

        <!-- Alamat -->
        <section class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </section>

        <!-- Nomor Telepon -->
        <section class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon">
        </section>

        <!-- Agama -->
        <section class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select class="form-select" id="agama" name="agama" required>
                <option selected>Open this select menu</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </section>

        <!-- Status Perkawinan -->
        <section class="mb-3">
            <label class="form-label">Status Perkawinan</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="belum_menikah" name="status_perkawinan" value="Belum Menikah" required>
                <label class="form-check-label" for="belum_menikah">Belum Menikah</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="sudah_menikah" name="status_perkawinan" value="Sudah Menikah" required>
                <label class="form-check-label" for="sudah_menikah">Sudah Menikah</label>
            </div>
        </section>

        <!-- Pekerjaan -->
        <section class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
        </section>

        <!-- Kewarganegaraan -->
        <section class="mb-3">
            <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
            <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
        </section>

        <!-- Foto Diri -->
        <section class="mb-3">
            <label for="foto" class="form-label">Foto Diri</label>
            <input class="form-control" type="file" id="foto" name="lampiran[]" required>
        </section>

        <!-- Nomor Kartu Keluarga (KK) -->
        <section class="mb-3">
            <label for="kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
            <input type="text" class="form-control" id="kk" name="no_kk" required>
        </section>

        <!-- Tombol Kirim -->
        <section class="mb-3 text-center">
            <button type="button" class="btn btn-primary" name="btn-ktp"
    style="width: 100%;" id="btnKtp">Buat KTP</button>
        </section>
    </form>
          `;
      default:
        return 'Konten tidak tersedia.';
    }
  }

  // Tambahkan event listener untuk pengiriman form pengaduan
  function addPengaduanSubmitListener() {
    const btnPengaduan = document.getElementById('btnPengaduan');
    const btnSaran = document.getElementById('btnSaran');
    const btnDaftar = document.getElementById('btnDaftar');
    const btnKtp = document.getElementById('btnKtp');

    // Jika button kirim untuk pengaduan di klik
    if (btnPengaduan) {
      btnPengaduan.addEventListener('click', function () {
        const form = document.getElementById('formPengaduan');
        const formData = new FormData(form);

        fetch('../PHP/pengaduan.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => handleServerResponse(data))
          .catch((error) => alert(`Terjadi Kesalahan ${error.message}`));
      });
    }

    // Jika button kirim untuk saran di klik
    if (btnSaran) {
      btnSaran.addEventListener('click', function () {
        const form = document.getElementById('formSaran');
        const formData = new FormData(form);
        fetch('../PHP/saran.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => handleServerResponse(data))
          .catch((error) => alert(`Terjadi Kesalahan ${error.message}`));
      });
    }

    // Jika button kirim untuk pendaftaran warga di klik
    if (btnDaftar) {
      btnDaftar.addEventListener('click', function () {
        const form = document.getElementById('formDaftar');
        const formData = new FormData(form);
        fetch('../PHP/daftar.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            handleServerResponse(data);
            const ask = confirm('Pendaftaran berhasil');
            if (ask) {
              window.location.reload();
            }
          })
          .catch((error) => alert(`Terjadi Kesalahan ${error.message}`));
      });
    }

    // Jika button kirim untuk pendaftaran ktp di klik
    if (btnKtp) {
      btnKtp.addEventListener('click', function () {
        const form = document.getElementById('formktp');
        const formData = new FormData(form);
        fetch('../PHP/ktp.php', {
          method: 'POST',
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => handleServerResponse(data))
          .catch((error) => alert(`Terjadi Kesalahan ${error.message}`));
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
    const myModal = bootstrap.Modal.getInstance('#modalLayanan');
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
    const myModal = bootstrap.Modal.getInstance('#modalLayanan');
    if (myModal) myModal.show();
    const popup = document.getElementById('parrentPopUp');
    popup.style.zIndex = '-1000';
    popup.style.opacity = '0';
  });
});
