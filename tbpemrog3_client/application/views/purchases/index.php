<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Pembelian</title>
</head>
<body>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Deskripsi</th>
            <th>Supplier</th>
        </tr>
    </table>
    <?php foreach($data_pembelian as $dp): ?>
        <tr>
            <td><?= $dp['date'] ?></td>
            <td><?= $dp['total'] ?></td>
            <td><?= $dp['description'] ?></td>
            <td><?= $dp['name'] ?></td>
        </tr>
    <?php endforeach; ?>
</body>
</html>