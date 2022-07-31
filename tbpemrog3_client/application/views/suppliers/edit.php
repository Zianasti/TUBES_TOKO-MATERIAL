<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Edit Data Pemasok</h3>
            </div>
            <hr>
            
            <div class="row mt-2">
                <form action="" method="post">
                <div class="col-md-6 mt-2">
                        <label for="supplier_id">ID Pemasok</label>
                        <div class="col-sm-15">
                            <input type="text" class="form-control" id="supplier_id" name="supplier_id" value=" <?= $data_suppliers['supplier_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('supplier_id') ?>
                            </small>
                        </div>
                    </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value=" <?= $data_suppliers['name']; ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">No. Telepon</label>
                    <input type="text" class="form-control" name="phone" id="phone" value=" <?= $data_suppliers['phone']; ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="address" id="address" value=" <?= $data_suppliers['address']; ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value=" <?= $data_suppliers['email']; ?>">                   
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('material_categories') ?>" class="btn btn-secondary mt-2">Kembali</a>
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