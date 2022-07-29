<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Material</h3>
            </div>
            <hr>
            <div class="row mt-2">
                <form action="<?= base_url('materials/add') ?>" method="post">
                <div class="col-md-6">                    
                    <label for="">ID Material</label>
                    <input type="number" class="form-control" name="material_id">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name">                   
                </div>
                <div class="col-md-6">                    
                    <label for="">Stok</label>
                    <input type="number" class="form-control" name="stock">                   
                </div>
                <div class="col-md-6">                    
                    <label for="">Harga</label>
                    <input type="text" class="form-control" name="price">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama Kategori</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">---Pilih Kategori Material---</option>
                        <?php foreach($data_material_categories as $dmc): ?>
                            <option value="<?= $dmc['category_id'] ?>"><?= $dmc['name'] ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('materials') ?>" class="btn btn-secondary mt-2">Kembali</a>
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