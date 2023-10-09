<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php if(session()->get('level')== 1) { ?>
                <a href="<?= base_url('/home/add_users/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add</button></a>
            <?php }else{} ?>
            <div class="table-responsive">
                <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <?php if(session()->get('level')== 1) { ?>
                                <th class="text-center">No</th>
                                <th class="text-center">Full Name</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Maker</th>
                                <th class="text-center">Action</th>
                            <?php }else{} ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($duar as $gas){
                          ?>
                          <tr>
                            <?php if(session()->get('level')== 1) { ?>
                                <th class="text-center"><?php echo $no++ ?></th>
                                <td class="text-capitalize text-center text-dark"><?php echo $gas->nama_pengguna?></td>
                                <td class="text-center text-dark"><?php echo $gas->email?></td>
                                <td class="text-capitalize text-center text-dark"><?php echo $gas->jk?></td>
                                <td class="text-capitalize text-center text-dark"><?php echo $gas->username?> / <?php echo $gas->tanggal_pengguna?></td>
                                <td>
                                    <div class="col-12 center-column">
                                      <a href="<?= base_url('/home/detail_users/'.$gas->id_user_pengguna)?>"><button class="btn btn-info"><i class="fa fa-bars"></i> Details</button></a>
                                  </div>

                              </td>
                          <?php }else{} ?>     
                      </tr>
                  <?php }?>
              </tbody>
          </table>
      </div>
      <div class="pagination">
        <nav>
            <ul class="pagination pagination-sm">
                <li class="page-item page-indicator" id="previousPageButton">
                    <a class="page-link" href="javascript:void(0)">
                        <i class="la la-angle-left"></i></a>
                    </li>
                    <li class="page-item" id="currentPageNumber">1</li>
                    <li class="page-item page-indicator" id="nextPageButton">
                        <a class="page-link" href="javascript:void(0)">
                            <i class="la la-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <style>
             .pagination {
                display: flex;
                justify-content: flex-end; /* Mengatur angka ke kanan */
                align-items: center; /* Memusatkan elemen vertikal */
            }

            .page-numbers button {
                margin-left: 5px; /* Jarak antara tombol nomor halaman */
                font-size: 14px; /* Ukuran teks tombol nomor halaman */
                padding: 5px 10px; /* Padding tombol nomor halaman */
            }

            .center-column {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tableBody = document.querySelector('.table tbody');
                const currentPageNumber = document.getElementById('currentPageNumber');
                const previousPageButton = document.getElementById('previousPageButton');
                const nextPageButton = document.getElementById('nextPageButton');

    // Data dan variabel kontrol
    const data = <?= json_encode($duar) ?>; // Menggunakan data yang Anda ambil dari controller
    const itemsPerPage = 20;
    let currentPage = 1;
    const totalPages = Math.ceil(data.length / itemsPerPage);

    // Fungsi untuk menampilkan data pada halaman tertentu
    function displayDataOnPage(page) {
        tableBody.innerHTML = ''; // Kosongkan tabel

        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;

        for (let i = startIndex; i < endIndex && i < data.length; i++) {
            const gas = data[i];
            // Buat baris tabel sesuai dengan data yang diterima dari controller
            function formatCurrency(amount) {
                return 'Rp. ' + amount.toLocaleString('id-ID'); 
            }
            const row = `
            <tr>
            <th class="text-center">${i + 1}</th>
            <td class="text-capitalize text-center text-dark">${gas.nama_pengguna}</td>
            <td class="text-center text-dark">${gas.email}</td>
            <td class="text-capitalize text-center text-dark">${gas.jk}</td>
            <td class="text-capitalize text-center text-dark">${gas.username} / ${gas.tanggal_pengguna}</td>
            <td>
            <div class="col-12 center-column">
            <a href="<?= base_url('/home/detail_users/') ?>/${gas.id_user_pengguna}">
            <button class="btn btn-info"><i class="fa fa-bars"></i> Details</button>
            </a>
            </div>
            </td>
            </tr>
            `;
            tableBody.innerHTML += row;
        }
    }

    // Fungsi untuk mengatur nomor halaman
    function updatePageNumbers() {
        currentPageNumber.textContent = currentPage;
    }

    // Mengatur aksi untuk tombol Previous (<)
    previousPageButton.addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            displayDataOnPage(currentPage);
            updatePageNumbers();
        }
    });

    // Mengatur aksi untuk tombol Next (>)
    nextPageButton.addEventListener('click', function () {
        if (currentPage < totalPages) {
            currentPage++;
            displayDataOnPage(currentPage);
            updatePageNumbers();
        }
    });

    displayDataOnPage(currentPage);
    updatePageNumbers();
});
</script>
</div>
</div>
</div>