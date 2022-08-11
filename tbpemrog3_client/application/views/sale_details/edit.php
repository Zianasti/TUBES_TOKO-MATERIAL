<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Ubah Data Rincian Penjualan</h3>
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
                <?php foreach($data_rincian_penjualan as $drp): ?>
                <form action="" method="post">
                <div class="col-md-6">                    
                    <input type="hidden" class="form-control" name="sale_detail_id" value="<?= $drp['sale_detail_id'] ?>">                   
                </div>
                <div class="col-md-6">                    
                    <label for="">Tanggal</label>
                    <select name="sale_id" id="" class="form-control">
                        <option value="<?= $drp['sale_id'] ?>"><?= $drp['date'] ?></option>
                        <?php foreach($data_penjualan as $dp): ?>
                            <option value="<?= $dp['sale_id'] ?>"><?= $dp['date'] ?></option>
                        <?php endforeach; ?>
                    </select>                     
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama Material</label>
                    <select name="material_id" id="" class="form-control">
                        <option value="<?= $drp['material_id'] ?>"><?= $drp['name'] ?></option>
                        <?php foreach($data_material as $dm): ?>
                            <option value="<?= $dm['material_id'] ?>"><?= $dm['name'] ?></option>
                        <?php endforeach; ?>
                    </select>                     
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Qty</label>
                    <input type="number" class="form-control" name="qty" value="<?= $drp['qty'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Harga</label>
                    <input type="number" class="form-control" name="price" value="<?= $drp['price'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Diskon</label>
                    <input type="number" class="form-control" name="disc" value="<?= $drp['disc'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Subtotal</label>
                    <input type="number" class="form-control" name="subtotal" value="<?= $drp['subtotal'] ?>">                   
                </div>
                
                <div class="col-md-6">
                    <a href="<?= base_url('sale_details') ?>" class="btn btn-secondary mt-2">Kembali</a>
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