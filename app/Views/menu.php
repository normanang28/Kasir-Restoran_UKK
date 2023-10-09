        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
<?php  if(session()->get('id')>0) { ?>
                    <li><a href="<?= base_url('/home/dashboard')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-home" title="Dashboard"></i>
                            <span  class="nav-text">Dashboard</span>
                        </a>
                    </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1) { ?>
                    <li><a href="<?= base_url('/home/users')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-user-9" title="Users"></i>
                            <span class="nav-text">Users</span>
                        </a>
                    </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 2 || session()->get('level')== 3) { ?>
                    <li><a href="<?= base_url('/home/menu')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-database" title="Menu"></i>
                            <span class="nav-text">Menu</span>
                        </a>
                    </li>
<?php }else{} ?>
<!-- <?php  if(session()->get('level')== 3) { ?>
                    <li><a href="<?= base_url('/home/menu_card')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-hourglass-2" title="Menu Payment"></i>
                            <span class="nav-text">Menu Payment</span>
                        </a>
                    </li>
<?php }else{} ?> -->
<?php  if(session()->get('level')== 3) { ?>
                    <li><a href="<?= base_url('/home/transaction')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-id-card" title="Transaction"></i>
                            <span class="nav-text">Transaction</span>
                        </a>
                    </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 2) { ?>
                    <li><a href="<?= base_url('/home/transaction_m')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-network" title="Transaction"></i>
                            <span class="nav-text">Transaction</span>
                        </a>
                    </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1 || session()->get('level')== 2) { ?>
                    <li><a href="<?= base_url('/home/employee_activity')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-folder-18" title="Employee Activity Log"></i>
                            <span class="nav-text">Employee Activity Log</span>
                        </a>
                    </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 2) { ?>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad" title="Report"></i>
							<span class="nav-text">Report</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('/home/income_report')?>">Income Report</a></li>
                        </ul>
                    </li>
<?php }else{} ?>
<?php  if(session()->get('level')== 1) { ?>
                    <hr class="sidebar-divider">

                    <li><a href="<?= base_url('/home/settings_control')?>" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-settings-4" title="Settings Control"></i>
                            <span class="nav-text">Settings Control</span>
                        </a>
                    </li>
<?php }else{} ?>
                </ul>
			</div>
        </div>
<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- <div class="form-head d-flex mb-3 align-items-start">
                    <div class="me-auto d-none d-lg-block">
                        <p class="mb-0 text-capitalize">Welcome <b><?= session()->get('nama_pengguna')?> / <?= session()->get('username')?></b> to <?= session()->get('nama_website') ?>!</p>     
                        </div>
                    <b><span id="currentDateTime"></span></b>
                </div> -->
                <div class="form-head d-flex mb-3 align-items-start">
                    <div class="me-auto d-none d-lg-block">
                        <?php
                        $level = session()->get('level'); // Ganti 'level' dengan key yang sesuai dengan tingkat pengguna di session Anda
                        $nama_pengguna = session()->get('nama_pengguna');
                        
                        $userLevelText = "";
                        
                        if ($level == 1) {
                            $userLevelText = "Admin";
                        } elseif ($level == 2) {
                            $userLevelText = "Manager";
                        } else {
                            $userLevelText = "Cashier";
                        }
                        
                        echo "<p class='mb-0 text-capitalize'>Welcome <b>$nama_pengguna / $userLevelText</b> to " . session()->get('nama_website') . "!</p>";
                        ?>
                    </div>
                    <b><span id="currentDateTime"></span></b>
                </div>


<script>
function updateDateTime() {
    const dateTimeElement = document.getElementById('currentDateTime');
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: '2-digit',
        second: '2-digit',
        hour12: true, // Menggunakan format 12 jam dengan AM/PM
    };

    const currentDateTime = new Date().toLocaleString(undefined, options);
    dateTimeElement.textContent = currentDateTime.replace(',', ' at');
}

// Perbarui waktu setiap detik
setInterval(updateDateTime, 1000);

// Panggil fungsi untuk menampilkan waktu awal
updateDateTime();
</script>


               