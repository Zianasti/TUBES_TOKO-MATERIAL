<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Kategori material</h3>
            </div>
            <hr>
            <div class="row mt-2">
                <form action="<?= base_url('material_categories/add') ?>" method="post">
                <div class="col-md-6">                    
                    <label for="">ID Kategori</label>
                    <input type="number" class="form-control" name="category_id">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama Kategori</label>
                    <input type="text" class="form-control" name="name">                   
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