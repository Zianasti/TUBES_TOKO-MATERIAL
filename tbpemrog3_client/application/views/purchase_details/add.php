<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Tambah Data Rincian Pembelian</h3>
            </div>
            <!-- Menampilkan flash data (pesan saat data error)-->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error! <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <hr>
            <div class="row mt-2">
                <form action="<?= base_url('purchase_details/add') ?>" method="post">
                <div class="col-md-6">                    
                    <label for="">Pilih Jenis Penambahan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioJenis" id="radioBaru" onclick="checkRadioValue()" value="radioBaru">
                        <label class="form-check-label" for="radioBaru">
                            Tambah Baru
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioJenis" id="radioUpdate" onclick="checkRadioValue()" value="radioUpdate">
                        <label class="form-check-label" for="radioUpdate">
                            Perbarui Data
                        </label>
                    </div>                 
                </div>
                <div id="containerInput">

                    <!-- Tambah Material Baru -->
                    <div class="col-md-6 mt-2" id="inputMaterialName">                    
                        <label for="">Nama Material Baru</label>
                        <input type="text" class="form-control" name="name">                   
                    </div>
                    <div class="col-md-6 mt-2" id="inputMaterialPrice">                    
                        <label for="">Harga Jual Material Baru</label>
                        <input type="number" class="form-control" name="price">                   
                    </div>
                    <div class="col-md-6 mt-2" id="selectMaterialCategory">                    
                        <label for="">Kategori Material Baru</label>
                        <select class="form-control" name="category_id">
                            <option value="">---Pilih Kategori---</option>
                            <?php foreach($data_material_categories as $dmc): ?>
                                <option value="<?= $dmc['category_id'] ?>"><?= $dmc['name'] ?></option>
                            <?php endforeach; ?>
                        </select>                     
                    </div>

                    <!-- Update Material -->
                    <div class="col-md-6 mt-2" id="selectMaterialName">                    
                        <label for="">Nama Material</label>
                        <select class="form-control" name="material_id2">
                            <option value="">---Pilih Material---</option>
                            <?php foreach($data_materials as $dm): ?>
                                <option value="<?= $dm['material_id'] ?>"><?= $dm['name'] ?></option>
                            <?php endforeach; ?>
                        </select>                  
                    </div>

                    <div class="col-md-6 mt-2">                    
                        <label for="">Jumlah Beli</label>
                        <input type="number" name="qty" id="inputQty" class="form-control">
                    </div>
                    <div class="col-md-6 mt-2">                    
                        <label for="">Harga Beli Material</label>
                        <input type="number" name="cost" id="inputCost" class="form-control">
                    </div>
                    <div class="col-md-6 mt-2">                    
                        <label for="">Subtotal</label>
                        <input type="number" name="subtotal" id="inputSubtotal" class="form-control">
                    </div>
                    <div class="col-md-6 mt-2">                    
                        <label for="">Pembelian</label>
                        <select name="purchase_id" id="selectPurchaseId" class="form-control">
                            <option value="">---Pilih Pembelian---</option>
                            <?php foreach($data_pembelian as $dp): ?>
                                <option value="<?= $dp['purchase_id'] ?>"><?= $dp['date']?> | <?= $dp['description'] ?></option>
                            <?php endforeach; ?>
                        </select>                
                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url('purchase_details') ?>" class="btn btn-secondary mt-2">Kembali</a>
                        <input type="submit" class="btn btn-primary float-end mt-2" value="Simpan">
                    </div>
                </div>             
                </form>
            </div>
        </div>       
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
    <script>
        (function() {
            document.getElementById('containerInput').style.display = "none"
        })()
        function checkRadioValue() {
            var radioBaru = document.getElementById('radioBaru')
            var radioUpdate = document.getElementById('radioUpdate')
            if (radioBaru.checked == true) {
                document.getElementById('containerInput').style.display = "block"

                document.getElementById('inputMaterialName').style.display = "block"
                document.getElementById('inputMaterialPrice').style.display = "block"
                document.getElementById('selectMaterialCategory').style.display = "block"

                document.getElementById('selectMaterialName').style.display = "none"
            }
            if (radioUpdate.checked == true) {
                document.getElementById('containerInput').style.display = "block"

                document.getElementById('inputMaterialName').style.display = "none"
                document.getElementById('inputMaterialPrice').style.display = "none"
                document.getElementById('selectMaterialCategory').style.display = "none"

                document.getElementById('selectMaterialName').style.display = "block"
            }
        }
    </script>
</body>
</html>