<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
           <div class="header-left">       
           </div>
           <form action="<?= base_url('/home/delete_keranjang/')?>" method="post">
               <div class="button-container">
                   <a href="<?= base_url('/home/menu/')?>"><button type="button" class="btn btn-warning"><i class="fa fa-reply"></i> Back to Menu</button></a>
                   <a href="<?= base_url('/home/add_transaction/')?>"><button type="button" class="btn btn-success"><i class="fa fa-dollar-sign"></i> Pay</button></a>
                   <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
               </div>
               <style>
                   .button-container {
                    text-align: right; /* Mengatur teks ke kanan */
                }

                .button-container a {
                    margin-left: 10px; /* Memberikan jarak antara button jika diperlukan */
                }

            </style>
            <br>
            <div class="table-responsive">
                <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
                    <thead>
                        <tr>
                            <tr>
                                <th style="width:50px;">
                                    <div class="custom-control custom-checkbox checkbox-success check-lg me-3">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <!-- <th>#</th> -->
                                <th class="text-center">Menu</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $total = 0;
                            foreach ($duar as $gas){
                            $subtotal = $gas->harga_menu * $gas->banyak; // Hitung subtotal untuk setiap menu
                            $total += $subtotal; // Akumulasi subtotal ke total
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="checkbox__input" value="<?= $gas->id_keranjang ?>" name="keranjang[]" id="keranjang<?= $gas->id_keranjang ?>"/>
                            </td>                      
                            <td>
                               <div class="media">
                                <img class="me-3 img-fluid rounded" width="150" src="<?=base_url('assets/images/menu/' .$gas->foto_menu)?>" alt="Image Menu">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-w500 text-capitalize"><a class="text-primary"><?php echo $gas->nama_menu?></a></h4>
                                    <h6 class="mt-0 mb-2 mb-4 text-capitalize"><a class="text-dark" style="color: #333; text-align: justify;"><?php echo $gas->deskripsi_menu?></a></h6> 
                                </div>
                            </div>
                        </td>
                        <td class="text-capitalize text-center text-dark">Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.') ?></td>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->banyak?></td>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
        <tbody>
            <tr style="font-weight: bold">
                <td colspan="1"></td>
                <td>Total:</td>
                <td class="text-capitalize text-center">Rp. <?= number_format($total, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let timeout;
    const timeoutDuration = 2 * 60 * 1000; // 2 menit dalam milidetik (1000 ms = 1 detik)

    function startTimeout() {
        clearTimeout(timeout); // Hapus timeout sebelumnya (jika ada)
        timeout = setTimeout(redirectToDashboard, timeoutDuration);
    }

    function redirectToDashboard() {
        window.location.href = '<?= base_url('/home/dashboard') ?>'; // Ganti URL sesuai dengan URL dashboard Anda
    }

    // Mulai timer ketika halaman dimuat atau ada aktivitas
    document.addEventListener('mousemove', startTimeout);
    document.addEventListener('keypress', startTimeout);

    // Mulai timer ketika halaman pertama dimuat
    startTimeout();

    const tableBody = document.querySelector('.table tbody');
    const pageNumbers = document.getElementById('pageNumbers');

    // Data dan variabel kontrol
    const data = <?= json_encode($duar) ?>; // Menggunakan data yang Anda ambil dari controller
    const itemsPerPage = 50;
    let currentPage = 1;
});
</script>