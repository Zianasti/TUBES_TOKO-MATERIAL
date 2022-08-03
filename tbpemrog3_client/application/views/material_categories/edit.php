<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Edit Data Kategori material</h3>
            </div>
            <hr>
            
            <div class="row mt-2">
                <form action="" method="post">
                <div class="col-md-6 mt-2">
                        <div class="col-sm-15">
                            <input type="hidden" class="form-control" id="category_id" name="category_id" value=" <?= $data_material_categories['category_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('category_id') ?>
                            </small>
                        </div>
                    </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama Kategori</label>
                    <input type="text" class="form-control" name="name" id="name" value=" <?= $data_material_categories['name']; ?>">                   
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