<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Rincian Penjualan</h3>
            </div>
            <hr>
            <div class="row mt-2">
                <form action="<?= base_url('sale_details/add') ?>" method="post">
                <div class="col-md-6 mt-2">                    
                        <label for="">Tanggal</label>
                        <select name="sale_id" id="selectdate" class="form-control">
                            <option value="">---Pilih Tanggal Penjualan---</option>
                            <?php foreach($data_penjualan as $dp): ?>
                                <option value="<?= $dp['sale_id'] ?>"><?= $dp['sale_id']?> | <?= $dp['date'] ?></option>
                            <?php endforeach; ?>
                        </select>                
                    </div>
                    <div class="col-md-6 mt-2" id="selectMaterialName">                    
                        <label for="">Nama Material</label>
                        <select class="form-control" name="material_id" id="material">
                            <option value="">---Pilih Material---</option>
                            <?php foreach($data_materials as $dm): ?>
                                <option value="<?= $dm['material_id'] ?>"><?= $dm['name'] ?></option>
                            <?php endforeach; ?>
                        </select>                  
                    </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty">                   
                </div>
                <div class="col-md-7 mt-2">
                        <label for="price">Harga</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="price" name="price" value=" <?= set_value('price'); ?>" readonly="true">
                            <small class="text-danger">
                                <?php echo form_error('price') ?>
                            </small>
                        </div>
                    </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Diskon</label>
                    <input type="number" class="form-control" name="disc">                   
                </div>
                <div class="col-md-6 mt-2">                    
                    <label for="">Subtotal</label>
                    <input type="number" id="subtotal" class="form-control" name="subtotal" readonly="true">                   
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
</body>
</html>
<script>
    //saat data material berubah
    $('#material').change(function () {
        var material = $('#material').val();

        $.ajax({
            type : 'GET',
            url : 'http://tbpemrog3.test/tbpemrog3_server/materials?KEY=test123&material_id='+material,
            headers: {
                "Authorization": "Basic " + btoa("user" + ":" + "password")
            },
            success: function (data){
                $('#price').val(data.data[0].price)
            }
        })
    })

    //itung subtotal otomatis
    $('#qty').on('keyup', function (){
        var price = $('#price').val()
        var qty = $('#qty').val()
        var subtotal = price * qty
        $('#subtotal').val(subtotal)
    })

</script>