<div align="center">
    <!-- <img align="center" src="data:image/jpg;base64,<?= $foto?>" width="82%" height="18%" > -->
    <div>
        <br>
        <br>
    </div>
<h3 class="text-center" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #333;">Income Report <?php echo $duar[0]->tanggal_laporan?></h3>
    <table id="datatable-buttons" align="center" border="1" align="center" width="80%" class="table table-bordered table-striped verticle-middle table-responsive-sm">
        <thead>
            <tr>
                <th class="text-center tgl-nama-akun">Tanggal</th>
                <th class="text-center tgl-nama-akun" style="width: 15%;">Nama Akun</th>
                <th class="text-center tgl-nama-akun">Ref</th>
                <th class="text-center tgl-nama-akun">Debit</th>
                <th class="text-center tgl-nama-akun">Kredit</th>

            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $totalSemua = 0;
            foreach ($duar as $gas) {
                $totalSemua += $gas->total_harga;
                ?>

                <tr>
                    <td class="text-center tgl-nama-akun"><?php echo $gas->tanggal_laporan?></td>
                    <td class="nama-akun tgl-nama-akun"><?php echo $gas->pembayaran?></td>
                    <td class="text-center tgl-nama-akun"><?php echo $gas->id_transaksi?><?php echo $gas->maker_transaksi?></td>
                    <td class="jumlah tgl-nama-akun">Rp. <?php echo number_format($gas->total_harga, 0, ',', '.') ?></td>
                    <td class="text-center tgl-nama-akun"></td>
                </tr>
                <tr>
                    <td colspan="1" class="text-right"></td>
                    <td style="text-align: left; padding-left: 35px;">Pendapatan</td>
                    <td></td>
                    <td></td>
                    <td class="jumlah tgl-nama-akun">Rp. <?php echo number_format($gas->total_harga, 0, ',', '.') ?></td>
                </tr>
            <?php }?>
        </tbody>
        <tr>
           <td colspan="3" class="text-center"><b>Jumlah</b></td>
           <td class="jumlah tgl-nama-akun"><b>Rp. <?php echo number_format($totalSemua, 0, ',', '.') ?></b></td>
           <td class="jumlah tgl-nama-akun"><b>Rp. <?php echo number_format($totalSemua, 0, ',', '.') ?></b></td>
       </tr>
   </table>
</div>
<script>
    window.print();
</script>

<style>
    /* CSS untuk menengahkan isi tabel */
    table {
        margin: 0 auto; /* Menengahkan tabel secara horizontal */
        text-align: center; /* Menengahkan teks dalam sel-sel tabel secara horizontal */
    }

    th, td {
        vertical-align: middle; /* Menengahkan teks dalam sel-sel tabel secara vertikal */
    }

    th {
        background-color: #333; /* Warna latar belakang header */
        color: white; /* Warna teks header */
        font-weight: bold; /* Ketebalan teks header */
    }

    td {
        font-family: 'Arial', sans-serif; /* Jenis font */
        font-size: 14px; /* Ukuran font */
    }

    td.nama-akun {
        text-align: left; /* Teks Nama Akun menjadi rata kiri */
        padding-left: 15px; /* Padding kiri untuk Nama Akun */
    }

    td.jumlah {
        font-weight: bold; /* Ketebalan teks Jumlah */
    }

    .tgl-nama-akun {
        font-family: 'Times New Roman', Times, serif;
    }
</style>
