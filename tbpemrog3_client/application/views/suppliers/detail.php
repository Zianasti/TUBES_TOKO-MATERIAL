<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Detail Data Supplier</h3>
            </div>
            <hr>
            <div class="card-body">
                    <h5 class="card-title"><b>ID Pemasok :</b><br><?= $data_suppliers['supplier_id']?></h5>
                    <p class="card-text"><b>Nama :</b><br><?= $data_suppliers['name']?></p>
                    <p class="card-text"><b>No. Telepon :</b><br><?= $data_suppliers['phone']?></p>
                    <p class="card-text"><b>Alamat :</b><br><?= $data_suppliers['address']?></p>
                    <p class="card-text"><b>Email :</b><br><?= $data_suppliers['email']?></p>

                    <p></p>
                    <a href="<?= base_url('suppliers') ?>" class="btn btn-secondary mt-2">Kembali</a>
                </div>
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>