<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Karyawan</h3>
            </div>
            <hr>
            <form action ="<?= base_url('employees/add') ?>" method="post" >
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name">                   
                </div>
                <div class="col-md-6">                    
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="dob">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Jenis Kelamin</label>
                    <select type="text" class="form-control" name="gender">
                    <option value="pilih">--Pilih Jenis Kelamin--</option>
                    <option value="laki-Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email">                   
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('employees') ?>" class="btn btn-secondary mt-2">Kembali</a>
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