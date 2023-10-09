<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
              <!-- <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_users')?>" method="post"> -->
                 <!-- <input type="hidden" name="id" value="<?= $duar->id_user ?>"> -->
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_users')?>" method="post">
                    <input type="hidden" name="id" value="<?= $duar->id_user ?>">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Full Name<span style="color: red;">*</span></label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" 
                            class="form-control text-capitalize" placeholder="Full Name" value="<?= $duar->nama_pengguna?>">
                        </div>
                        <div class="mb-3 col-md-6">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">E-mail<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" id="email" name="email" placeholder="E-mail" required="required" class="form-control" value="<?= $duar->email?>">
                            <span class="input-group-text">@gmail.com</span>
                          </div> 
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                              <option value="<?= $duar->jk?>"><?= $duar->jk; ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Username<span style="color: red;">*</span></label>
                            <input type="text" id="username" name="username" 
                            class="form-control text-capitalize" placeholder="Username" value="<?= $duar->username?>">
                        </div>
                        <div class="item form-group">
                            <label class="form-label">Level<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
                              <option value="<?= $duar->level?>"><?= $duar->level; ?></option>
                              <option value="1">Admin</option>
                              <option value="2">Manager</option>
                              <option value="3">Cashier</option>
                            </select>
                          </div>
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
        const userForm = document.getElementById("userForm");
        const updateButton = document.getElementById("updateButton");

        // Ambil nilai awal data dari formulir
        const initialData = {
            namaPengguna: "<?= $duar->nama_pengguna ?>",
            email: "<?= $duar->email ?>",
            jk: "<?= $duar->jk ?>",
            username: "<?= $duar->username ?>",
            level: "<?= $duar->level ?>"
        };

        // Tambahkan event listener untuk memeriksa perubahan data pada formulir
        userForm.addEventListener("change", function() {
            // Ambil nilai saat ini dari formulir
            const currentData = {
                namaPengguna: document.getElementById("nama_pengguna").value.trim(),
                email: document.getElementById("email").value.trim(),
                jk: document.getElementById("jk").value,
                username: document.getElementById("username").value.trim(),
                level: document.getElementById("level").value
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
        window.location.href = '<?= base_url('/home/users') ?>'; // Ganti URL sesuai dengan URL dashboard Anda
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