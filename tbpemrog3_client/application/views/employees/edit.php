<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Edit Data Karyawan</h3>
            </div>
            <hr>
            
            <div class="row mt-2">
                <form action="" method="post">
                <div class="col-md-6 mt-2">
                        <label for="employee_id">ID Karyawan</label>
                        <div class="col-sm-15">
                            <input type="text" class="form-control" id="employee_id" name="employee_id" value=" <?= $data_employees['employee_id']; ?>" readonly>
                            <small class="text-danger">
                                <?php echo form_error('employee_id') ?>
                            </small>
                        </div>
                    </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" value=" <?= $data_employees['name']; ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="dob" id="dob" value=" <?= $data_employees['dob']; ?>">                   
                </div>
                <div class="col-md-6 mt-2">                    
                <select type="text" class="form-control" name="gender">
                    <option value="<?= $data_employees['gender']; ?>"><?= $data_employees['gender']; ?></option>
                    <option value="laki-Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>                     
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value=" <?= $data_employees['email']; ?>">                   
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