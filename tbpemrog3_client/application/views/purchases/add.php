<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Pembelian</h3>
            </div>
            <hr>
            <div class="row mt-2">
                <form action="<?= base_url('purchases/add') ?>" method="post">
                <div class="col-md-6">                    
                    <label for="">ID Pembelian</label>
                    <input type="number" class="form-control" name="purchase_id">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="date">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Total</label>
                    <input type="number" class="form-control" name="total">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" class="form-control"></textarea>                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Supplier</label>
                    <select name="supplier_id" id="" class="form-control">
                        <option value="">---Pilih Supplier---</option>
                        <?php foreach($data_supplier as $ds): ?>
                            <option value="<?= $ds['supplier_id'] ?>"><?= $ds['name'] ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('purchases') ?>" class="btn btn-secondary mt-2">Kembali</a>
                    <input type="submit" class="btn btn-primary float-end mt-2" value="Simpan">
                </div>
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>