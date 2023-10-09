<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
<?php if(session()->get('level')== 1) { ?>
        <a onclick="history.back()" type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Back</a></button>
        <a href="<?= base_url('/home/reset_pw/'.$gas->id_user_pengguna)?>"><button class="btn btn-info" title="Reset Password"><i class="fa fa-edit"></i> Reset Password</button></a>
<?php }else{} ?>
        <h1></h1>
         <div class="table-responsive">
            <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
        <thead>
            <tr>
<?php if(session()->get('level')== 1) { ?>
              <th class="text-center">Username</th>
              <th class="text-center">Full Name</th>
              <th class="text-center">E-mail</th>
              <th class="text-center">Gender</th>
              <th class="text-center">Action</th>
<?php }else{} ?>
            </tr>
                  </thead>
                  <tbody>
                    <tr>
<?php if(session()->get('level')== 1) { ?>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->username?></td>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->nama_pengguna?></td>
                        <td class="text-center text-dark"><?php echo $gas->email?></td>
                        <td class="text-capitalize text-center text-dark"><?php echo $gas->jk?></td>
                        <td>
                          <a href="<?= base_url('/home/edit_users/'.$gas->id_user_pengguna)?>"><button class="btn btn-warning"><i class="fa fa-edit"></i> </button></a>
                          <a href="<?= base_url('/home/delete_users/'.$gas->id_user_pengguna)?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> </button></a>
                        </td>
<?php }else{} ?>
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