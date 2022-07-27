<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Data Pembelian</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">

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

                    <a href="<?= base_url('purchases/add') ?>" class="btn btn-success">Tambah Data</a>
                    <table class="table">
                        <tr>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Deskripsi</th>
                            <th>Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    <?php foreach($data_pembelian as $dp): ?>
                        <tr>
                            <td><?= $dp['date'] ?></td>
                            <td><?= $dp['total'] ?></td>
                            <td><?= $dp['description'] ?></td>
                            <td><?= $dp['name'] ?></td>
                            <td>
                                <a href="<?= base_url('purchases/detail/').$dp['purchase_id'] ?>" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-info"></i>
                                </a>
                                <a href="<?= base_url('purchases/edit/').$dp['purchase_id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>  
                                <form action="<?= base_url('purchases/delete/').$dp['purchase_id'] ?>" onsubmit="return deleteConfirmation()">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>                             
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>      
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteConfirmation() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    return true
                } return false
            })
        }
    </script>
</body>
</html>