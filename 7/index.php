<?php
require('fungsi.php');
$data = TampilName();
if (isset($_POST['edit'])) {
    echo Edit($_POST);
}
if (isset($_POST['del'])) {
    echo Delete($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        img {
            height: 25px;
        }
    </style>
</head>

<body>
    <nav class="navbar shadow navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">ARKADEMY BOOTCAMP</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php require('add.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered text-center table-striped mt-2">
                    <thead class=" thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Work</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $d['Name'] ?></td>
                                <td><?= $d['name'] ?></td>
                                <td><?= 'Rp. ' . str_replace(',', '.', number_format($d['salary'])) ?></td>
                                <td>
                                    <?php require('del.php'); ?>
                                    <?php require('edit.php'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>