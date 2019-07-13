<?php

$conn = new mysqli('localhost', 'root', '', 'bootcamp');
if ($conn->connect_errno) {
    echo 'koneksi gagal' . $conn->connect_error;
}

function TampilName()
{
    global $conn;
    $query = ('SELECT name.id,name.Name ,name.id_work,name.id_salary, work.name, category.salary FROM name JOIN work ON name.id_work = work.id JOIN category ON name.id_salary = category.id
    ');

    $tampil = $conn->query($query);
    $rows = [];
    while ($row = $tampil->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

function TampilWork()
{
    global $conn;
    $query = $conn->query("SELECT * FROM work");
    $rows = [];
    while ($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function TampilSalary()
{
    global $conn;
    $query = $conn->query("SELECT * FROM category");
    $rows = [];
    while ($row = $query->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function Add($data)
{
    global $conn;
    $name = htmlspecialchars($data['name']);
    $work = $data['work'];
    $salary = $data['salary'];

    $query = $conn->query("INSERT INTO name VALUES('','$name','$work','$salary')");

    if ($query) {
        return '<script>alert("Data ' . $name . ' Berhasil Ditambahkan");document.location="index.php"</script>';
    } else {
        return '<script>alert("Data ' . $name . ' Gagal Ditambahkan");document.location="index.php"</script>';
    }
}

function Edit($data)
{
    global $conn;
    $id = $data['id'];
    $name = htmlspecialchars($data['name']);
    $work = $data['work'];
    $salary = $data['salary'];

    $query = $conn->query("UPDATE name SET Name='$name',id_work='$work',id_salary='$salary' WHERE id ='$id'");

    if ($query) {
        return '<script>alert("Data ' . $name . ' Berhasil Diubah");document.location="index.php"</script>';
    } else {
        return '<script>alert("Data ' . $name . ' Gagal Diubah");document.location="index.php"</script>';
    }
}
function Delete($data)
{
    global $conn;
    $id = $data['id'];
    $name = $data['name'];
    $query = $conn->query("DELETE FROM name WHERE id='$id'");
    if ($query) {
        return '<script>alert("Data ' . $name . ' Berhasil Dihapus");document.location="index.php"</script>';
    } else {
        return '<script>alert("Data ' . $name . ' Gagal Dihapus");document.location="index.php"</script>';
    }
}
