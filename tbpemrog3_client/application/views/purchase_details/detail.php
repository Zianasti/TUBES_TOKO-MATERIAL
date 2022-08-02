<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Rincian Data Pembelian</h3>
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
                <?php foreach($data_rincian_pembelian as $drp): ?>
                <div class="col-md-6">                    
                    <h5 for="">ID Rincian Pembelian</h5>
                    <p><?= $drp['purchase_detail_id'] ?></p>               
                </div>
                <div class="col-md-12 mt-2">                    
                    <h5 for="">Nama Material</h5>
                    <p><?= $drp['name'] ?></p>                     
                </div>
                <div class="col-md-12 mt-2">                    
                    <h5 for="">Jumlah</h5>
                    <p><?= $drp['qty'] ?></p>                      
                </div>
                <div class="col-md-12 mt-2">                    
                    <h5 for="">Harga Beli</h5>
                    <p><?= $drp['cost'] ?></p>                 
                </div>
                <div class="col-md-12 mt-2">                    
                    <h5 for="">Subtotal</h5>
                    <p><?= $drp['subtotal'] ?></p>                 
                </div>
                <div class="col-md-12">
                    <a href="<?= base_url('purchases') ?>" class="btn btn-secondary mt-2">Kembali</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>