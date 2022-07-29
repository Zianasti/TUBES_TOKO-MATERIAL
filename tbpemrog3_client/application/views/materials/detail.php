<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Detail Data Material</h3>
            </div>
            <hr>
            <?php
                foreach ($data_materials as $dm) :
                ?>
            <div class="card-body">
                    <h5 class="card-title"><b>ID Material :</b><br><?= $dm['material_id']?></h5>
                    <p class="card-text"><b>Nama :</b><br><?= $dm['name']?></p>
                    <p class="card-text"><b>Stok :</b><br><?= $dm['stock']?></p>
                    <p class="card-text"><b>Harga :</b><br><?= $dm['price']?></p>
                    <p class="card-text"><b>Kategori Material :</b><br><?= $dm['category_name']?></p>

                    <p></p>
                    <a href="<?= base_url('materials') ?>" class="btn btn-secondary mt-2">Kembali</a>
                </div>
                <?php endforeach; ?>
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>