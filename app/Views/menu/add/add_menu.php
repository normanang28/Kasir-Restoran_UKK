<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="menuForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_add_menu')?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="control-label col-12">Replace Menu Image<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <input type="file" name="foto_menu" class="form-file-input form-control col-12">
                          </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Menu Name<span style="color: red;">*</span></label>
                            <input type="text" id="nama_menu" name="nama_menu" 
                            class="form-control text-capitalize" placeholder="Menu Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Description Menu<span style="color: red;">*</span></label>
                            <input type="text" id="deskripsi_menu" name="deskripsi_menu" 
                            class="form-control text-capitalize" placeholder="Description Menu">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Price<span style="color: red;">*</span></label>
                            <input type="text" id="harga_menu" name="harga_menu" 
                            class="form-control text-capitalize" placeholder="Price">
                        </div>
                    </div>
          <a href="<?= base_url('/home/menu')?>" type="submit" class="btn btn-primary">Cancel</a></button>
          <!-- <button type="submit" class="btn btn-success">Submit</button> -->
          <button type="submit" id="submitButton" class="btn btn-success" disabled>Submit</button>
        </form>
    </div>
</div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuForm = document.getElementById("menuForm");
        const submitButton = document.getElementById("submitButton");

        menuForm.addEventListener("change", function() {
        const namaMenuInput = document.getElementById("nama_menu").value.trim();
        const deskripsiMenuInput = document.getElementById("deskripsi_menu").value.trim();
        const hargaMenuInput = document.getElementById("harga_menu").value.trim();
        foto: document.querySelector('input[type="file"]').value

        if (namaMenuInput !== "" && deskripsiMenuInput !== "" && hargaMenuInput ) {
                submitButton.removeAttribute("disabled");
            } else {
                submitButton.setAttribute("disabled", "disabled");
            }
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let timeout;
    const timeoutDuration = 2 * 60 * 1000; // 2 menit dalam milidetik (1000 ms = 1 detik)

    function startTimeout() {
        clearTimeout(timeout); // Hapus timeout sebelumnya (jika ada)
        timeout = setTimeout(redirectToDashboard, timeoutDuration);
    }

    function redirectToDashboard() {
        window.location.href = '<?= base_url('/home/menu') ?>'; // Ganti URL sesuai dengan URL dashboard Anda
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