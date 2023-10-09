<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
         <div class="header-left">       
         </div>
         <div class="right-aligned">
            <?php if(!empty($search)) {?>
                <a href="<?= base_url('/home/transaction/')?>"><button class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to Transaction</button></a>
            <?php }?>
        </div>
           <!-- <div class="button-container">
            <?php if(empty($search)) {?>
               <a href="<?= base_url('/home/menu/')?>"><button type="button" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to Menu</button></a>
            <?php }?>
        </div> -->
        <style>
         .button-container {
            text-align: right; /* Mengatur teks ke kanan */
        }

        .button-container a {
            margin-left: 10px; /* Memberikan jarak antara button jika diperlukan */
        }

        .right-aligned {
            text-align: right;
        }
    </style>
    <div class="header-left">
        <form action="<?= base_url('home/transaksi_search') ?>" method="post">
            <div class="input-group search-area">
                <input type="text" class="form-control text-capitalize" name="search_transaksi" placeholder="Search here...">
                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
            </div>
        </form>         
    </div>
    <br>
    <div class="table-responsive">
        <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
            <thead>
                <tr>
                    <tr>
                        <th class="text-center">No Transaction.</th>
                        <th class="text-center">Number Table</th>
                        <th class="text-center">Orderer's Name</th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Paid</th>
                        <th class="text-center">Remaining Change</th>
                        <th class="text-center">Maker</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($duar as $gas){
                        ?>
                        <tr>
                            <td class="text-capitalize text-center text-dark"><?php echo $gas->id_transaksi?><?php echo $gas->maker_transaksi?></td>
                            <td class="text-capitalize text-center text-dark"><?php echo $gas->no_meja?></td>
                            <td class="text-capitalize text-center text-dark"><?php echo $gas->dengan?></td>
                            <td class="text-capitalize text-center text-dark"><?php echo $gas->pembayaran?></td>
                            <td class="text-capitalize text-center text-dark">Rp. <?php echo number_format($gas->total_harga, 0, ',', '.') ?></td>
                            <td class="text-capitalize text-center text-dark">Rp. <?php echo number_format($gas->dibayar, 0, ',', '.') ?></td>
                            <td class="text-capitalize text-center text-dark"><?php echo $gas->kembalian?></td>
                            <td class="text-capitalize text-center text-dark"><?php echo $gas->username?> / <?php echo $gas->tanggal_transaksi?></td>
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
            <td class="text-capitalize text-center text-dark">${gas.id_transaksi}${gas.maker_transaksi}</td>
            <td class="text-capitalize text-center text-dark">${gas.no_meja}</td>
            <td class="text-capitalize text-center text-dark">${gas.dengan}</td>
            <td class="text-capitalize text-center text-dark">${gas.pembayaran}</td>
            <td class="text-capitalize text-center text-dark">${formatCurrency(gas.total_harga)}</td> 
            <td class="text-capitalize text-center text-dark">${formatCurrency(gas.dibayar)}</td> 
            <td class="text-capitalize text-center text-dark">${gas.kembalian}</td>
            <td class="text-capitalize text-center text-dark">${gas.username} / ${gas.tanggal_transaksi}</td>
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