<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Detail Data Karyawan</h3>
            </div>
            <hr>
            <div class="card-body">
                    <h5 class="card-title"><b>ID Karyawan :</b><br><?= $data_employees['employee_id']?></h5>
                    <p class="card-text"><b>Nama :</b><br><?= $data_employees['name']?></p>
                    <p class="card-text"><b>Tanggal Lahir :</b><br><?= $data_employees['dob']?></p>
                    <p class="card-text"><b>Jenis Kelamin :</b><br><?= $data_employees['gender']?></p>
                    <p class="card-text"><b>Email :</b><br><?= $data_employees['email']?></p>

                    <p></p>
                    <a href="<?= base_url('employees') ?>" class="btn btn-secondary mt-2">Kembali</a>
                </div>
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>