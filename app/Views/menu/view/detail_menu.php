<?php if(session()->get('level')== 3) { ?>
	<form class="form-horizontal form-label-left" novalidate action="<?= base_url('home/aksi_add_keranjang_menu')?>" method="post">
		<input type="hidden" name="id_menu" value="<?php echo $gas->id_menu; ?>">

		<div class="profile-uoloaded-post border-bottom-1 pb-5 custom-card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="<?= base_url('assets/images/menu/' . $gas->foto_menu) ?>" alt="" class="img-fluid custom-image rounded-start">
				</div>
				<div class="col-md-6">
					<a class="post-title">
						<h3 class="text-black text-capitalize"><?php echo $gas->nama_menu ?></h3>
					</a>
					<p><?php echo $gas->deskripsi_menu ?></p>
					<br>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<!-- Input Quantity -->
						<input id="banyak" class="form-control col-md-12 col-xs-12 text-capitalize" data-validate-length-range="6" data-validate-words="2" name="banyak" placeholder="Quantity" required="required" type="number" min="1" oninput="updateTotal()">
					</div>
					<br>
					<div class="d-flex justify-content-between align-items-center">
						<!-- <h3 class="text-capitalize text-dark" id="totalPrice">Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.') ?></h3> -->
						<h3 class="text-capitalize <?php echo ($gas->status == '<span style="color: red;">Tidak Tersedia</span>') ? 'text-danger' : 'text-dark'; ?>" id="totalPrice">
							Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.'); ?>
						</h3>
						<div>
							<!-- <button type="submit" class="btn btn-success"><i class="ti-shopping-cart-full"></i> Add Menu</button> -->
							<button type="submit" class="btn btn-success" id="addMenuButton" disabled><i class="ti-shopping-cart-full"></i> Add Menu</button>
							<a href="<?= base_url('/home/menu/') ?>"><button type="button" class="btn btn-info"><i class="fa fa-reply"></i> Back</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
    // Dapatkan elemen input jumlah
    var inputQuantity = document.getElementById('banyak');
    // Dapatkan elemen tombol "Add Menu"
    var addMenuButton = document.getElementById('addMenuButton');

    // Tambahkan event listener pada input
    inputQuantity.addEventListener('input', function () {
        // Periksa apakah input tidak kosong
        if (inputQuantity.value.trim() !== '') {
            // Aktifkan tombol jika input tidak kosong
            addMenuButton.disabled = false;
        } else {
            // Nonaktifkan tombol jika input kosong
            addMenuButton.disabled = true;
        }
    });
});
</script>
<?php }else{} ?>


<?php if(session()->get('level')== 2) { ?>
	<div class="profile-uoloaded-post border-bottom-1 pb-5 custom-card">
		<div class="row align-items-center">
			<div class="col-md-6">
				<img src="<?= base_url('assets/images/menu/' . $gas->foto_menu) ?>" alt="" class="img-fluid custom-image rounded-start">
			</div>
			<div class="col-md-6">
				<a class="post-title">
					<h3 class="text-black text-capitalize"><?php echo $gas->nama_menu ?></h3>
				</a>
				<p><?php echo $gas->deskripsi_menu ?></p>
				<div class="d-flex justify-content-between align-items-center">
					<!-- <h3 class="text-capitalize text-dark" id="totalPrice">Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.') ?></h3> -->
					<h3 class="text-capitalize <?php echo ($gas->status == '<span style="color: red;">Tidak Tersedia</span>') ? 'text-danger' : 'text-dark'; ?>" id="totalPrice">
						Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.'); ?>
					</h3>
					<div>
						<a href="<?= base_url('/home/menu/') ?>"><button class="btn btn-info"><i class="fa fa-reply"></i> Back</button></a>
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
				</div>
			</div>
		</div>
	</div>
<?php }else{} ?>
<style>
	.custom-image {
		width: 10000px; /* Atur lebar sesuai keinginan Anda */
		height: 325px; /* Atur tinggi sesuai keinginan Anda */
		object-fit: cover; /* Memastikan gambar mengisi ruang dengan benar */
		border-top-left-radius: 10px; /* Lengkung sudut kiri atas */
		border-bottom-left-radius: 10px; /* Lengkung sudut kiri bawah */
	}

	.custom-card {
		background-color: #fff; /* Warna latar belakang card */
		padding: 20px; /* Atur padding sesuai keinginan Anda */
		border-radius: 10px; /* Atur radius sudut card */
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan card */
		margin-bottom: 20px; /* Atur margin bawah sesuai keinginan Anda */
	}

	.custom-card {
		text-align: justify; /* Teks deskripsi menu menjadi rata kiri-kanan */
	}
</style>
<script>
	function updateTotal() {
        // Dapatkan nilai Quantity dari input
        var quantity = parseInt(document.getElementById("banyak").value);
        
        // Dapatkan harga menu dari PHP
        var hargaMenu = <?php echo $gas->harga_menu; ?>;
        
        // Periksa jika quantity tidak diisi atau kurang dari 0
        if (isNaN(quantity) || quantity < 0) {
            // Tampilkan harga default jika quantity tidak valid
            document.getElementById("totalPrice").innerHTML = "Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.') ?>";
        } else {
            // Hitung total harga
            var totalHarga = quantity * hargaMenu;
            
            // Tampilkan total harga yang dihitung ulang dalam format yang sesuai
            document.getElementById("totalPrice").innerHTML = "Rp. " + totalHarga.toFixed(0).replace(/\d(?=(\d{3})+$)/g, "$&,");
        }
    }
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