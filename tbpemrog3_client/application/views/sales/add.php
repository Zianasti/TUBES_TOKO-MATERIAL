<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Penjualan</h3>
            </div>
            <hr>
            <div class="row mt-2">
                <form action="<?= base_url('sales/add') ?>" method="post">
                <div class="col-md-6 mt-2">                    
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="date">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Nama Karyawan</label>
                    <select name="employee_id" id="" class="form-control">
                        <option value="">---Pilih Karyawan---</option>
                        <?php foreach($data_employees as $de): ?>
                            <option value="<?= $de['employee_id'] ?>"><?= $de['name'] ?></option>
                        <?php endforeach; ?>
                    </select>                
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Total</label>
                    <input type="number" class="form-control" id="total" name="total">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Bayar</label>
                    <input type="number" class="form-control" id="pay" name="pay">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Uang Kembalian</label>
                    <input type="number" class="form-control" id="money_change" name="money_change" readonly="true">                   
                </div>
                
                <div class="col-md-6">
                    <a href="<?= base_url('sales') ?>" class="btn btn-secondary mt-2">Kembali</a>
                    <input type="submit" class="btn btn-primary float-end mt-2" value="Simpan">
                </div>
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
    <script>
        $('#pay').on('keyup', function (){
        var pay = $('#pay').val()
        var total = $('#total').val()
        var money_change = pay - total
        $('#money_change').val(money_change)
    })
    </script>
</body>
</html>