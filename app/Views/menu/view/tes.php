<?php if(session()->get('level')== 3) { ?>
    <div class="row">
        <!-- Form di sebelah kiri -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-body text-center">
                        <h3 class="control-label col-12">~ Form Add Menu ~</h3>
                    </div>
                    <!-- <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/home/menu_payment/')?>">
                                <span>
                                    <i class="ti-money" title="Menu Payment"> Menu Payment</i>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="<?= base_url('/home/transaction/')?>">
                                <span>
                                    <i class="ti-shopping-cart-full" title="Transaction"> Transaction</i>
                                </span>
                            </a>
                        </li>                    
                    </ul>
                    <br> -->
                    <form class="form-horizontal form-label-left" novalidate action="<?= base_url('home/aksi_add_keranjang_menu')?>" method="post">

                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Menu Name<span class="required"></span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="id_menu" class="form-control text-capitalize" id="id_menu" required>
                                <option value="">Select Menu</option>
                                <?php 
                                foreach ($duar as $menu) {
                                    $status = $menu->status;
                                    $textColor = ($status == 'Menu Tersedia') ? 'text-black' : 'text-danger';
                                    ?>
                                    <option class="text-capitalize <?php echo $textColor; ?>" value="<?php echo $menu->id_menu ?>"><?php echo $menu->nama_menu ?> - <?php echo $menu->harga_menu ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Tambahkan elemen div untuk menampilkan pesan -->
                        <div id="menuStatusMessage" class="col-md-12 col-sm-12 col-xs-12 mt-2 text-danger">Menu yang Anda pilih tidak tersedia.</div>
                        <br>
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">How Many<span class="required"></span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input id="banyak" class="form-control col-md-12 col-xs-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="banyak" placeholder="How Many" required="required" type="number" min="0">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success w-100" id="submitBtn" disabled>Add Menu</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form');
                const submitBtn = document.getElementById('submitBtn');
                const menuStatusMessage = document.getElementById('menuStatusMessage');

                const idMenuSelect = document.getElementById('id_menu');

                form.addEventListener('input', function() {
        // Memeriksa apakah semua input valid
        const isValid = form.checkValidity();
        
        // Mengaktifkan/menonaktifkan tombol "Submit" berdasarkan hasil pemeriksaan
        submitBtn.disabled = !isValid;
        
        // Memeriksa status menu saat opsi berubah
        const selectedOption = idMenuSelect.options[idMenuSelect.selectedIndex];
        const textColor = selectedOption.classList.contains('text-danger') ? 'text-danger' : '';
        
        // Menampilkan atau menyembunyikan pesan berdasarkan status menu
        if (textColor === 'text-danger') {
            menuStatusMessage.style.display = 'block';
        } else {
            menuStatusMessage.style.display = 'none';
        }
    });

    // Memeriksa status menu saat halaman dimuat
    const selectedOption = idMenuSelect.options[idMenuSelect.selectedIndex];
    const textColor = selectedOption.classList.contains('text-danger') ? 'text-danger' : '';
    
    // Menampilkan atau menyembunyikan pesan berdasarkan status menu
    if (textColor === 'text-danger') {
        menuStatusMessage.style.display = 'block';
    } else {
        menuStatusMessage.style.display = 'none';
    }
});
</script>


<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <div class="right-aligned">
                <?php if(!empty($search)) {?>
                    <a href="<?= base_url('/home/menu/')?>"><button class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</button></a>
                <?php }?>
            </div>
            <br>
            <style>
              /* Gaya untuk kontainer form */
              .form-container {
                width: 300px; /* Lebar form */
                margin: 0 auto; /* Pusatkan form horizontal */
            }

            /* Gaya untuk elemen yang ada di dalam form */
            .right-aligned {
                text-align: right;
            }
        </style>
        <form action="<?= base_url('home/menu_search') ?>" method="post">
            <div class="input-group search-area">
                <input type="text" class="form-control text-capitalize" name="search_menu" placeholder="Search here...">
                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
            </div>
        </form>
        <br>
        <div class="table-responsive">
            <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">Menu</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($duar as $gas){
                      ?>
                      <tr>
                          <td>
                             <div class="media">
                                <img class="me-3 img-fluid rounded" width="150" src="<?=base_url('assets/images/menu/' .$gas->foto_menu)?>" alt="Image Menu">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-w500 text-capitalize"><a class="text-primary"><?php echo $gas->nama_menu?></a></h4>
                                    <!-- <br> -->
                                    <h6 class="mt-0 mb-2 mb-4 text-capitalize"><a class="text-dark" style="color: #333; text-align: justify;"><?php echo $gas->deskripsi_menu?></a></h6> 
                                </div>
                            </div>
                        </td>
                        <td class="text-capitalize text-center text-dark">Rp. <?php echo $gas->harga_menu?></td>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->status?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
<!-- <div class="pagination">
    <div id="pageNumbers" class="page-numbers"></div>
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
    const pageNumbers = document.getElementById('pageNumbers');

    // Data dan variabel kontrol
    const data = <?= json_encode($duar) ?>; // Menggunakan data yang Anda ambil dari controller
    const itemsPerPage = 50;
    let currentPage = 1;

    // Fungsi untuk menampilkan data pada halaman tertentu
    // ...
function displayDataOnPage(page) {
    tableBody.innerHTML = ''; // Kosongkan tabel

    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    for (let i = startIndex; i < endIndex && i < data.length; i++) {
        const gas = data[i];
        // Buat baris tabel sesuai dengan data yang diterima dari controller
        // Anda dapat menyesuaikan ini sesuai dengan tampilan Anda
        const row = `
        <tr>
          <td>
           <div class="media">
                <img class="me-3 img-fluid rounded" width="150" src="<?=base_url('assets/images/menu/')?>/${gas.foto_menu}" alt="Image Menu">
                <div class="media-body">
                    <h4 class="mt-0 mb-1 font-w500 text-capitalize"><a class="text-primary">${gas.nama_menu}</a></h4>
                    <h6 class="mt-0 mb-2 mb-4 text-capitalize"><a class="text-dark" style="color: #333; text-align: justify;">${gas.deskripsi_menu}</a></h6> 
                    </div>
                </div>
            </td>
            <td class="text-capitalize text-center text-dark">Rp. ${gas.harga_menu}</td>
            <td class="text-capitalize text-center text-dark">${gas.status}</td>
        </tr>
        `;
        tableBody.innerHTML += row;
    }
}
// ...


    // Fungsi untuk mengatur nomor halaman
    function updatePageNumbers() {
        const totalPages = Math.ceil(data.length / itemsPerPage);
        pageNumbers.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageNumber = document.createElement('button');
            pageNumber.textContent = i;

            pageNumber.addEventListener('click', function () {
                currentPage = i;
                displayDataOnPage(currentPage);
                updatePageNumbers();
            });

            // Tambahkan kelas 'btn-primary' jika tombol aktif
            if (i === currentPage) {
                pageNumber.classList.add('btn', 'btn-primary');
            } else {
                pageNumber.classList.add('btn', 'btn-light'); // Warna putih cream
            }

            pageNumbers.appendChild(pageNumber);
        }
    }

    // Tampilkan data pada halaman pertama
    displayDataOnPage(currentPage);

    // Inisialisasi nomor halaman
    updatePageNumbers();
});
</script> -->
</div>
</div>
</div>
</div>
<?php }else{} ?>




<?php if(session()->get('level')== 2) { ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="right-aligned">
                    <?php if(!empty($search)) {?>
                        <a href="<?= base_url('/home/menu/')?>"><button class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</button></a>
                    <?php }?>
                    <?php if(session()->get('level')== 2) { ?>
                        <a href="<?= base_url('/home/add_menu/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add</button></a>
                    <?php }else{} ?>
                </div>
                <style>
                  /* Gaya untuk kontainer form */
                  .form-container {
                    width: 300px; /* Lebar form */
                    margin: 0 auto; /* Pusatkan form horizontal */
                }

                /* Gaya untuk elemen yang ada di dalam form */
                .right-aligned {
                    text-align: right;
                }
            </style>

            <div class="header-left">
                <form action="<?= base_url('home/menu_search') ?>" method="post">
                    <div class="input-group search-area">
                        <input type="text" class="form-control text-capitalize" name="search_menu" placeholder="Search here...">
                        <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                    </div>
                </form>         
            </div>
            <div class="table-responsive">
                <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <?php if(session()->get('level')== 2) { ?>
                                <th class="text-center">Menu</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
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
                            <?php if(session()->get('level')== 2) { ?>
                              <td>
                               <div class="media">
                                <img class="me-3 img-fluid rounded" width="150" src="<?=base_url('assets/images/menu/' .$gas->foto_menu)?>" alt="Image Menu">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-w500 text-capitalize"><a class="text-primary"><?php echo $gas->nama_menu?></a></h4>
                                    <!-- <br> -->
                                    <h6 class="mt-0 mb-2 mb-4 text-capitalize"><a class="text-dark" style="color: #333; text-align: justify;"><?php echo $gas->deskripsi_menu?></a></h6> 
                                </div>
                            </div>
                        </td>
                        <td class="text-capitalize text-center text-dark">Rp. <?php echo $gas->harga_menu?></td>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->status?></td>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->username?> / <?php echo $gas->tanggal_menu?></td>
                    <?php }else{} ?>
                    <td>
                        <div class="button-container">
                            <?php if(session()->get('level')== 2 && $gas->status != "Menu Tersedia") { ?>
                                <a href="<?= base_url('/home/menu_tersedia/'.$gas->id_menu)?>"><button class="btn btn-info"><i class="fa fa-check"></i> </button></a>
                            <?php }else{} ?>
                            <?php if(session()->get('level')== 2 && $gas->status != '<span style="color: red;">Tidak Tersedia</span>') { ?>
                                <a href="<?= base_url('/home/tidak_tersedia/'.$gas->id_menu)?>"><button class="btn btn-info"><i class="fa fa-times"></i> </button></a>
                            <?php }else{} ?>
                            <?php if(session()->get('level')== 2) { ?>
                                <a href="<?= base_url('/home/edit_menu/'.$gas->id_menu)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                            <?php }else{} ?>
                            <?php if(session()->get('level')== 2) { ?>
                                <a href="<?= base_url('/home/delete_menu/'.$gas->id_menu)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                            <?php }else{} ?>
                        </div>

                        <style>
                            .button-container {
                                display: flex;
                                justify-content: center; /* Mengatur tombol-tombol di tengah secara horizontal */
                                align-items: center;
                            }
                            .button-container a {
                                margin: 0 5px; /* Tambahkan ruang di kiri dan kanan tombol */
                            }
                        </style>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
<?php }else{} ?>