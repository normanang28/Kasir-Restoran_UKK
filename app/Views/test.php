<div class="col-xl-5 col-xxl-6">
    <div class="card-body">
        <div id="successNotification" class="alert alert-success solid alert-end-icon alert-dismissible fade show" style="position: fixed; bottom: 20px; right: 10px;">
            <span><i class="mdi mdi-check"></i></span>
            Anda berhasil menambahkan data!
        </div>
    </div>
</div>

<script>
const successNotification = document.getElementById("successNotification");

successNotification.style.display = "block";

function hideNotification() {
    successNotification.style.display = "none";
}

setTimeout(hideNotification, 10000); // 10 detik (10000 milidetik)

</script>