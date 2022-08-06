<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Ubah Data Rincian Pembelian</h3>
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
                <form action="" method="post">
                <div class="col-md-6">                    
                    <input type="hidden" class="form-control" name="purchase_id" value="<?= $dp['purchase_id'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="date" value="<?= $dp['date'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Total</label>
                    <input type="number" class="form-control" name="total" value="<?= $dp['total'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" class="form-control"><?= $dp['description'] ?></textarea>                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Supplier</label>
                    <select name="supplier_id" id="" class="form-control">
                        <option value="<?= $dp['supplier_id'] ?>"><?= $dp['name'] ?></option>
                        <?php foreach($data_supplier as $ds): ?>
                            <option value="<?= $ds['supplier_id'] ?>"><?= $ds['name'] ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('purchases') ?>" class="btn btn-secondary mt-2">Kembali</a>
                    <input type="submit" class="btn btn-primary float-end mt-2" value="Ubah">
                </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>