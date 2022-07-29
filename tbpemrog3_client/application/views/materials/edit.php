<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Ubah Data Material</h3>
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
                <?php foreach($data_materials as $dm): ?>
                <form action="" method="post">
                <div class="col-md-6">                    
                    <label for="">ID Material</label>
                    <input type="number" class="form-control" name="material_id" value="<?= $dm['material_id'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" value="<?= $dm['name'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Stok</label>
                    <input type="number" class="form-control" name="stock" value="<?= $dm['stock'] ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Harga</label>
                    <input type='text' name="price" id="" class="form-control" value="<?= $dm['price'] ?>">                 
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Kategori</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="<?= $dm['category_id'] ?>"><?= $dm['name'] ?></option>
                        <?php foreach($data_material_categories as $dmc): ?>
                            <option value="<?= $dmc['category_id'] ?>"><?= $dmc['name'] ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('materials') ?>" class="btn btn-secondary mt-2">Kembali</a>
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