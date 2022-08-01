<html>
<?php $this->load->view('template/head'); ?>

<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Ubah Data Penjualan</h3>
            </div>
            <!-- Alert kalau ada pesan dari controller -->
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error! <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <!-- /Alert kalau ada pesan dari controller -->
            <hr>
            <div class="row mt-2">
                <?php foreach ($data_penjualan as $dp) : ?>
                    <div class="col-md-6">
                        <h5 for="">ID Penjualan</h5>
                        <p><?= $dp['sale_id'] ?></p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 for="">Tanggal</h5>
                        <p><?= $dp['date'] ?></p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 for="">Bayar</h5>
                        <p><?= $dp['pay'] ?></p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 for="">Total</h5>
                        <p><?= $dp['total'] ?></p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 for="">Uang Kembalian</h5>
                        <p><?= $dp['money_change'] ?></p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <h5 for="">Nama Karyawan</h5>
                        <p><?= $dp['name'] ?></p>
                    </div>
                    <div class="col-md-12">
                        <a href="<?= base_url('sales') ?>" class="btn btn-secondary mt-2">Kembali</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">

                    <!-- Alert kalau ada pesan dari controller -->
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error! <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <!-- /Alert kalau ada pesan dari controller -->

                    <a href="<?= base_url('sale_details/add') ?>" class="btn btn-success">Tambah Data</a>
                    <table class="table">
                        <tr>
                            <th>ID Rincian Penjualan</th>
                            <th>Tanggal</th>
                            <th>Nama Material</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                        <?php foreach ($data_rincian_penjualan as $drp) : ?>
                            <tr>
                                <td><?= $drp['sale_detail_id'] ?></td>
                                <td><?= $drp['date'] ?></td>
                                <td><?= $drp['name'] ?></td>
                                <td><?= $drp['qty'] ?></td>
                                <td><?= $drp['price'] ?></td>
                                <td><?= $drp['disc'] ?></td>
                                <td><?= $drp['subtotal'] ?></td>
                                <td>
                                    <a href="<?= base_url('sale_details/detail/') . $drp['sale_detail_id'] ?>" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-info"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>

</html>