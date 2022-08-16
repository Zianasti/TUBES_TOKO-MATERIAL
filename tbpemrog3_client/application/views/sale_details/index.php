<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Data Rincian Penjualan</h3>
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

                    <a href="<?= base_url('sale_details/add') ?>" class="btn btn-success">Tambah Data</a>
                    <table class="table">
                        <tr>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Nama Material</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    <?php 
                    if ($data_rincian_penjualan != false) {
                        $nomor = 0; foreach($data_rincian_penjualan as $drp):$nomor++; ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $drp['date'] ?></td>
                            <td><?= $drp['name'] ?></td>
                            <td><?= $drp['qty'] ?></td>
                            <td><?= $drp['price'] ?></td>
                            <td><?= $drp['disc'] ?></td>
                            <td><?= $drp['subtotal'] ?></td>
                            <td>
                                <a href="<?= base_url('sale_details/detail/').$drp['sale_detail_id'] ?>" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-info"></i>
                                </a> 
                                <!-- <a href="<?= base_url('sale_details/edit/').$drp['sale_detail_id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>  
                                <form action="<?= base_url('sale_details/delete/').$drp['sale_detail_id'] ?>" id="formDelete<?= $drp['sale_detail_id'] ?>">
                                    <a href="#" onclick="deleteConfirmation(<?= $drp['sale_detail_id'] ?>)" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </form>                            -->
                            </td>
                        </tr>
                    <?php endforeach;} ?>
                    <?php
                    if($data_rincian_penjualan == false)
                    echo "
                    <tr>
                            <td></td>
                            <td></td>
                            <td>Data Tidak Ada</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                    </tr>
                    ";
                    ?>
                    </table>
                </div>
            </div>
        </div>      
        <!-- Ngubah isi konten halaman sampe sini -->
    </div>
    <?php $this->load->view('template/footer'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteConfirmation(id) {
            var idData = id
            Swal.fire({
                title: 'Hapus data?',
                text: "Anda yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formDelete'+idData).submit()
                }
            })
        }
    </script>
</body>
</html>