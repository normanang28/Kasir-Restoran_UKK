<div class="card">
    <div class="card-header"> Invoice Payment Menu<span class="float-right">
        <strong>Status:</strong> In The Payment Process</span>
    </div>
    <div class="card-body">
        <div class="row mb-5">
            <form id="menuForm" class="form-horizontal form-label-left" novalidate action="<?= base_url('home/aksi_add_transaction') ?>" method="post">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Number Table<span style="color: red;">*</span></label>
                        <input type="number" id="no_meja" name="no_meja" class="form-control text-capitalize" min="0" placeholder="Number Table">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Orderer's Name<span style="color: red;">*</span></label>
                        <div class="input-group">
                            <input type="text" id="dengan" name="dengan" placeholder="Orderer's Name" required="required" class="form-control text-capitalize">
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Total Price<span style="color: red;">*</span></label>
                        <input type="number" id="total_harga" name="total_harga" class="form-control" placeholder="Total Price">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Paid<span style="color: red;">*</span></label>
                        <input type="number" id="dibayar" name="dibayar" class="form-control" placeholder="Paid">
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-12 col-xs-12">Remaining Change<span style="color: red;">*</span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" id="kembalian" name="kembalian" placeholder="Remaining Change" required="required" class="form-control col-md-12 col-xs-12 text-capitalize">
                        </div>
                    </div>
                </div>
                 <a href="<?= base_url('/home/menu_card/')?>"><button type="button" class="btn btn-primary">Cancel</button></a>
                <button type="submit" id="submitButton" class="btn btn-success" disabled>Pay Menu Bill</button>
            </form>
        </div>
    </div>
</div>
<script>
    function updateKembalian() {
        var totalHargaInput = document.getElementById('total_harga');
        var dibayarInput = document.getElementById('dibayar');
        var kembalianInput = document.getElementById('kembalian');

        var totalHarga = parseFloat(totalHargaInput.value) || 0;
        var dibayar = parseFloat(dibayarInput.value) || 0;

        var kembalian = dibayar - totalHarga;
        kembalianInput.value = kembalian.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    }

    function cancelPayment() {
        var totalHargaInput = document.getElementById('total_harga');
        var dibayarInput = document.getElementById('dibayar');
        var kembalianInput = document.getElementById('kembalian');

        totalHargaInput.value = '';
        dibayarInput.value = '';
        kembalianInput.value = '';
    }

    document.addEventListener('DOMContentLoaded', function () {
        var totalHargaInput = document.getElementById('total_harga');
        var dibayarInput = document.getElementById('dibayar');

        totalHargaInput.addEventListener('input', updateKembalian);
        dibayarInput.addEventListener('input', updateKembalian);
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuForm = document.getElementById("menuForm");
        const submitButton = document.getElementById("submitButton");

        menuForm.addEventListener("change", function() {
        const namaMenuInput = document.getElementById("no_meja").value.trim();
        const deskripsiMenuInput = document.getElementById("dengan").value.trim();
        const hargaMenuInput = document.getElementById("total_harga").value.trim();
        const dibayar = document.getElementById("dibayar").value.trim();
        const kembalian = document.getElementById("kembalian").value.trim();

        if (namaMenuInput !== "" && deskripsiMenuInput !== "" && hargaMenuInput !== "" && dibayar !== "" && kembalian) {
                submitButton.removeAttribute("disabled");
            } else {
                submitButton.setAttribute("disabled", "disabled");
            }
        });
    });
</script>
