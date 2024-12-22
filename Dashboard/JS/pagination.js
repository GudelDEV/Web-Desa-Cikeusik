document.querySelectorAll('.page-link').forEach((link) => {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    const page = this.getAttribute('href').split('=')[1];
    fetchData(page);
  });
});

// Fungsi untuk memuat data menggunakan AJAX
function fetchData(page) {
  fetch(`?page=${page}`)
    .then((response) => response.text())
    .then((html) => {
      // Parse the HTML response
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, 'text/html');

      // Get the new data rows
      const newRows = doc.querySelectorAll('#table-data tr');

      // Clear the existing table body
      const tableBody = document.querySelector('#table-data');
      tableBody.innerHTML = ''; // Clear existing rows

      // Append new rows to the table body
      newRows.forEach((row) => {
        tableBody.appendChild(row);
      });

      // Update pagination
      const newPagination = doc.querySelector('#pagination');
      document.querySelector('#pagination').innerHTML = newPagination.innerHTML;

      // Re-attach event listeners for pagination
      document.querySelectorAll('.page-link').forEach((link) => {
        link.addEventListener('click', function (e) {
          e.preventDefault();
          const page = this.getAttribute('href').split('=')[1];
          fetchData(page);
        });
      });
    })
    .catch((error) => console.error('Error:', error));
}
