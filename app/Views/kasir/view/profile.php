<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <!-- <form class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate  action="<?= base_url('home/aksi_change_profile')?>" method="post"> -->
                <form id="profileForm" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate action="<?= base_url('home/aksi_change_profile')?>" method="post">

                    <div class="row">
                        <div class="input-group">
                            <label class="control-label col-12">Replace New Profile<span style="color: red;">*</span></label>   
                            <div class="col-12 form-file">
                            <input type="file" name="foto" class="form-file-input form-control col-12">
                          </div>
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Full Name<span style="color: red;">*</span></label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" 
                            class="form-control text-capitalize" placeholder="Full Name" value="<?= $users->nama_pengguna?>">
                        </div>
                        <div class="mb-3 col-md-6">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">E-mail<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" id="email" name="email" placeholder="E-mail" required="required" class="form-control" value="<?= $users->email?>">
                            <span class="input-group-text">@gmail.com</span>
                          </div> 
                        </div>  
                        <div class="mb-3 col-md-6">
                          <label class="control-label col-12" >Gender<span style="color: red;">*</span>
                          </label>
                          <div class="col-12">
                            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                              <option  value="<?= $users->jk?>"><?= $users->jk; ?></option>
                              <!-- <option>Select Gender</option> -->
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Username<span style="color: red;">*</span></label>
                            <input type="text" id="username" name="username" 
                            class="form-control text-capitalize" placeholder="Username" value="<?= $use->username?>">
                        </div>
                    </div>
          <a onclick="history.back()" type="submit" class="btn btn-primary">Cancel</a></button>
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
        const profileForm = document.getElementById("profileForm");
        const updateButton = document.getElementById("updateButton");

        // Ambil nilai awal data dari formulir
        const initialData = {
            namaPengguna: "<?= $users->nama_pengguna ?>",
            email: "<?= $users->email ?>",
            jk: "<?= $users->jk ?>",
            username: "<?= $use->username ?>"
            // Tambahkan data lain yang perlu Anda periksa di sini
        };

        // Tambahkan event listener untuk memeriksa perubahan data pada formulir
        profileForm.addEventListener("change", function() {
            // Ambil nilai saat ini dari formulir
            const currentData = {
                namaPengguna: document.getElementById("nama_pengguna").value.trim(),
                email: document.getElementById("email").value.trim(),
                jk: document.getElementById("jk").value,
                username: document.getElementById("username").value.trim(),
                foto: document.querySelector('input[type="file"]').value
                // Tambahkan data lain yang perlu Anda periksa di sini
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