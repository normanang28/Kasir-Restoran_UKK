<style>
    .custom-image {
        width: 100px; /* Ukuran gambar 100% dari lebar parent */
        height: 150px; /* Atur tinggi maksimum sesuai keinginan Anda */
        object-fit: cover; /* Memastikan gambar mengisi ruang dengan benar */
    }

    .rounded-card {
        border-radius: 20px; /* Mengatur radius sudut card */
        overflow: hidden; /* Menghilangkan sudut yang terlalu tajam */
    }

    .product-grid-card {
        border: none; /* Menghilangkan border card */
    }

    .rounded-button {
        width: 30px; /* Lebar tombol bulat */
        height: 30px; /* Tinggi tombol bulat */
        border-radius: 50%; /* Membuat tombol menjadi bulat */
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 10px; /* Sesuaikan posisi tombol secara vertikal */
        right: 10px; /* Sesuaikan posisi tombol secara horizontal */
        border: 1px solid #000; /* Tambahkan border dengan warna hitam */
        background-color: #fff; /* Warna latar belakang tombol */
    }

    /* Mengatur padding kiri untuk nama menu dan harga menu */
    .menu-details {
        padding-left: 20px; /* Sesuaikan jumlah padding sesuai keinginan Anda */
    }

    .menu-menu {
        padding-left: 140px; /* Sesuaikan jumlah padding sesuai keinginan Anda */
    }

    .custom-button {
        position: fixed; /* Tetapkan posisi tombol */
        bottom: 0; /* Geser tombol ke bagian bawah */
        right: 0; /* Geser tombol ke bagian kanan */
        margin: 20px; /* Atur margin sesuai keinginan Anda */
    }

    .search-area {
        margin-top: 10px; /* Tambahkan ruang di atas search bar sesuai keinginan Anda */
        margin-bottom: 10px; /* Tambahkan ruang di bawah search bar sesuai keinginan Anda */
    }
</style>

<?php if(session()->get('level')== 3) { ?>
    <div class="row">
        <div class="right-aligned">
            <?php if(!empty($search)) {?>
                <a href="<?= base_url('/home/menu/')?>"><button class="btn btn-info"><i class="fa fa-reply"></i> Back</button></a>
            <?php }?>
        </div>
        <style>
          /* Gaya untuk kontainer form */
          .form-container {
            width: 300px; /* Lebar form */
            margin: 0 auto; /* Pusatkan form horizontal */
        }

        /* Gaya untuk elemen yang ada di dalam form */
        .right-aligned {
            text-align: right;
        }
    </style>
    <form action="<?= base_url('home/menu_search') ?>" method="post">
        <div class="input-group search-area">
            <input type="text" class="form-control text-capitalize" name="search_menu" placeholder="Search here...">
            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
        </div>
    </form>  
    <br>
    <?php
    foreach ($duar as $gas) {
        ?>
        <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
            <div class="card rounded-card">
                <div class=" product-grid-card">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            <a href="<?= base_url('/home/add_menu_payment/'.$gas->id_menu)?>">
                                <img class="me-3 img-fluid custom-image" src="<?= base_url('assets/images/menu/' . $gas->foto_menu) ?>" alt="">
                            </a>
                            <div class="rounded-button">
                                <a href="<?= base_url('/home/add_menu_payment/'.$gas->id_menu)?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="new-arrival-content text-left mt-3 menu-details">
                            <h4><a class="text-capitalize"><?php echo $gas->nama_menu ?></a></h4>
                            <span class="text-capitalize text-center text-dark">Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.') ?></span>
                        </div>
                        <div class="menu-menu">
                            <span class="text-capitalize text-center text-dark"><?php echo $gas->status ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<div class="custom-button">
    <a href="<?= base_url('/home/menu_card/') ?>"><button class="btn btn-success" style="width: 300px;"><i class="ti-shopping-cart-full"></i> Menu Card</button></a>
</div>
<?php }else{} ?>


<?php if(session()->get('level')== 2) { ?>
    <div class="row">
        <div class="right-aligned">
            <?php if(!empty($search)) {?>
                <a href="<?= base_url('/home/menu/')?>"><button class="btn btn-info"><i class="fa fa-reply"></i> Back</button></a>
            <?php }?>
            <?php if(empty($search)) {?>
                <a href="<?= base_url('/home/add_menu/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Add</button></a>
            <?php }?>
        </div>
        <style>
          /* Gaya untuk kontainer form */
          .form-container {
            width: 300px; /* Lebar form */
            margin: 0 auto; /* Pusatkan form horizontal */
        }

        /* Gaya untuk elemen yang ada di dalam form */
        .right-aligned {
            text-align: right;
        }
    </style>
    <form action="<?= base_url('home/menu_search') ?>" method="post">
        <div class="input-group search-area">
            <input type="text" class="form-control text-capitalize" name="search_menu" placeholder="Search here...">
            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
        </div>
    </form>         
    <br>
    <?php
    foreach ($duar as $gas) {
        ?>
        <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
            <div class="card rounded-card">
                <div class=" product-grid-card">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            <a href="<?= base_url('/home/add_menu_payment/'.$gas->id_menu)?>">
                                <img class="me-3 img-fluid custom-image" src="<?= base_url('assets/images/menu/' . $gas->foto_menu) ?>" alt="">
                            </a>
                            <div class="rounded-button">
                                <a href="<?= base_url('/home/add_menu_payment/'.$gas->id_menu)?>"><i class="fa fa-info"></i></a>
                            </div>
                        </div>
                        <div class="new-arrival-content text-left mt-3 menu-details">
                            <h4><a class="text-capitalize"><?php echo $gas->nama_menu ?></a></h4>
                            <span class="text-capitalize text-center text-dark">Rp. <?php echo number_format($gas->harga_menu, 0, ',', '.') ?></span>
                        </div>
                        <div class="menu-menu">
                            <span class="text-capitalize text-center text-dark"><?php echo $gas->status ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<?php }else{} ?>


