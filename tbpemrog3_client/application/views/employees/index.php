<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <!-- Ngubah isi konten halaman dari sini -->
        <div class="container">
            <div class="row mt-2">
                <h3>Data Karyawan</h3>
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

                    <a href="<?= base_url('employees/add') ?>" class="btn btn-success">Tambah Data</a>
                    <table class="table">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    <?php
                    if ($data_employees != false) {
                        $nomor=1; foreach($data_employees as $de): ?>
                    
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $de['name'] ?></td>
                            <td><?= $de['email'] ?></td>
                            <td>
                            <a href="<?= base_url('employees/detail/'.$de['employee_id'])?>" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                                
                            <a href="<?= base_url('employees/update/'.$de['employee_id'])?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="<?= base_url('employees/delete/').$de['employee_id'] ?>" id="formDelete<?= $de['employee_id'] ?>">
                                    <a href="#" onclick="deleteConfirmation(<?= $de['employee_id'] ?>)" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </form>    
                            </td>
                        </tr>
                    <?php $nomor++; endforeach; } ?>
                    <?php
                    if($data_employees == false)
                    echo "
                        <tr>
                            <td></td>
                            <td>Data Tidak Ada</td>
                            <td></td>
                            <td?></td>
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
