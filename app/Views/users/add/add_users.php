<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
              <!-- <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_add_users')?>" method="post"> -->
            <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_add_users')?>" method="post">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Full Name<span style="color: red;">*</span></label>
                            <input type="text" id="nama_pengguna" name="nama_pengguna" 
                            class="form-control text-capitalize" placeholder="Full Name">
                        </div>
                        <div class="mb-3 col-md-6">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">E-mail<span style="color: red;">*</span></label>
                          <div class="input-group">
                            <input type="text" id="email" name="email" placeholder="E-mail" required="required" class="form-control">
                            <span class="input-group-text">@gmail.com</span>
                          </div> 
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Gender<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                              <option>Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Username<span style="color: red;">*</span></label>
                            <input type="text" id="username" name="username" 
                            class="form-control text-capitalize" placeholder="Username">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password<span style="color: red;">*</span></label>
                            <input type="text" id="password" name="password" 
                            class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Level<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
                              <option>Select Level</option>
                              <option value="1">Admin</option>
                              <option value="2">Manager</option>
                              <option value="3">Cashier</option>
                            </select>
                          </div>
                        </div>
                    </div>
          <a href="<?= base_url('/home/users')?>" type="submit" class="btn btn-primary">Cancel</a></button>
          <!-- <button type="submit" class="btn btn-success">Submit</button> -->
          <button type="submit" id="submitButton" class="btn btn-success" disabled>Submit</button>
        </form>
    </div>
</div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil referensi ke formulir dan tombol "Submit"
        const userForm = document.getElementById("userForm");
        const submitButton = document.getElementById("submitButton");

        // Tambahkan event listener untuk memeriksa isian formulir saat berubah
        userForm.addEventListener("change", function() {
            // Cek apakah ada nilai yang diisi dalam setiap elemen input
            const namaPengguna = document.getElementById("nama_pengguna").value.trim();
            const email = document.getElementById("email").value.trim();
            const jk = document.getElementById("jk").value;
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();
            const level = document.getElementById("level").value;

            // Aktifkan atau nonaktifkan tombol "Submit" berdasarkan isian
            if (namaPengguna !== "" && email !== "" && jk !== "Select Gender" && username !== "" && password !== "" && level !== "Select Level") {
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