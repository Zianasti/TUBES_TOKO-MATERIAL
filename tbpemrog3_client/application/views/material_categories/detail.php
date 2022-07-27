<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Detail Data Kategori Material</h3>
            </div>
            <hr>
            <div class="card-body">
                    <h5 class="card-title"><b>ID Material :</b><br><?= $data_material_categories['category_id']?></h5>
                    <p class="card-text"><b>Nama Material :</b><br><?= $data_material_categories['name']?></p>
                    <p></p>
                    <a href="<?= base_url('material_categories') ?>" class="btn btn-secondary mt-2">Kembali</a>
                </div>
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>