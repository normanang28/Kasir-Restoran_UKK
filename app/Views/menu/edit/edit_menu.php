<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <!-- <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_menu')?>" method="post" enctype="multipart/form-data"> -->
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_menu')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $duar->id_menu ?>">

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
                            class="form-control text-capitalize" placeholder="Menu Name" value="<?= $duar->nama_menu?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Description Menu<span style="color: red;">*</span></label>
                            <input type="text" id="deskripsi_menu" name="deskripsi_menu" 
                            class="form-control text-capitalize" placeholder="Description Menu" value="<?= $duar->deskripsi_menu?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Price<span style="color: red;">*</span></label>
                            <input type="text" id="harga_menu" name="harga_menu" 
                            class="form-control text-capitalize" placeholder="Price" value="<?= $duar->harga_menu?>">
                        </div>
                    </div>
          <a href="<?= base_url('/home/menu')?>" type="submit" class="btn btn-primary">Cancel</a></button>
          <!-- <button type="submit" class="btn btn-success">Update</button> -->
         <button type="submit" id="updateButton" class="btn btn-success" disabled>Update</button>
        </form>
    </div>
</div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil referensi ke formulir dan tombol "Update"
        const userForm = document.getElementById("userForm");
        const updateButton = document.getElementById("updateButton");

        // Ambil nilai awal data dari formulir
        const initialData = {
            namaPengguna: "<?= $duar->nama_menu ?>",
            email: "<?= $duar->deskripsi_menu ?>",
            username: "<?= $duar->harga_menu ?>",
        };

        // Tambahkan event listener untuk memeriksa perubahan data pada formulir
        userForm.addEventListener("change", function() {
            // Ambil nilai saat ini dari formulir
            const currentData = {
                namaPengguna: document.getElementById("nama_menu").value.trim(),
                email: document.getElementById("deskripsi_menu").value.trim(),
                username: document.getElementById("harga_menu").value.trim(),
                foto: document.querySelector('input[type="file"]').value
            };

            // Cek apakah ada perubahan pada data
            const isDataChanged = Object.keys(currentData).some(key => currentData[key] !== initialData[key]);

            // Aktifkan atau nonaktifkan tombol "Update" berdasarkan perubahan data
            if (isDataChanged) {
                updateButton.removeAttribute("disabled");
            } else {
                updateButton.setAttribute("disabled", "disabled");
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