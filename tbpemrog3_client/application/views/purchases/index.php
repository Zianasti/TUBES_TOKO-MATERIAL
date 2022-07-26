<html>
    <?php $this->load->view('template/head'); ?>
<body class="sb-nav-fixed">
    <?php $this->load->view('template/navbarsidebar'); ?>
    <div id="layoutSidenav_content">
        <table class="table">
            <tr>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Deskripsi</th>
                <th>Supplier</th>
            </tr>
        <?php foreach($data_pembelian as $dp): ?>
            <tr>
                <td><?= $dp['date'] ?></td>
                <td><?= $dp['total'] ?></td>
                <td><?= $dp['description'] ?></td>
                <td><?= $dp['name'] ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
    <?php $this->load->view('template/footer'); ?>
</body>
</html>