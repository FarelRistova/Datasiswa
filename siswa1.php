<?php

// kenapa di taruh di paling atas, karena jika di taruh paling bawah akan terjadi error sebelum reset data
session_start();
if(isset($_POST['reset'])){
    session_destroy();
    header('Location: http://localhost/belajarphp/datasiswa/siswa1.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="s.css">
</head>
<body>
    <h1> Data Siswa PPLG </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="isian">
                    <form action="" method="post" id="siswaForm">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        <label for="nis" class="form-label">Nis :</label>
                        <input type="number" name="nis" id="nis" class="form-control" min="0">
                        <label for="rayon" class="form-label">Rayon :</label>
                        <select name="rayon" id="rayon" class="form-select">
                            <option value="" disabled selected>Silakan pilih rayon!</option>
                            <!-- Options for rayon -->
                            <option value="Wikrama 1">Wik 1</option>
                            <option value="Wikrama 2">Wik 2</option>
                            <option value="Wikrama 3">Wik 3</option>
                            <option value="Wikrama 4">Wik 4</option>
                            <option value="Wikrama 5">Wik 5</option>
                            <option value="other">Pilihan lainnya</option>
                        </select>
                        <label for="rombel" class="form-label">Pilih Rombel:</label>
                        <select name="rombel" id="rombel" class="form-select">
                            <option value="" disabled selected>Silakan pilih rombel!</option>
                            <!-- Options for rombel -->
                            <option value="PPLG X-1">PPLG X-1</option>
                            <option value="PPLG X-2">PPLG X-2</option>
                            <option value="PPLG X-3">PPLG X-3</option>
                            <option value="PPLG X-4">PPLG X-4</option>
                            <option value="PPLG X-5">PPLG X-5</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-3" name="kirim" onclick="validateForm()"><i class='bx bxs-plus-square'></i></button>
                        <button type="button" class="btn btn-secondary mt-3"><a href="siswa2.php" style="text-decoration: none; color: white;"><i class='bx bxs-printer'></i></a></button>
                        <button type="submit" class="btn btn-danger mt-3" name="reset"><i class='bx bxs-trash'></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hasil">
                    <?php
                        if (isset($_POST['nama']) && isset($_POST['nis']) && isset($_POST['rayon']) && isset($_POST['rombel'])) {
                            if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rayon']) && !empty($_POST['rombel'])) {
                                $data = array(
                                    'nama' => $_POST['nama'],
                                    'nis' => $_POST['nis'],
                                    'rayon' => $_POST['rayon'],
                                    'rombel' => $_POST['rombel'],
                                );
                                $_SESSION['dataSiswa'][] = $data;
                            } else {
                                echo "<p class='text-danger'>Semua data harus diisi!</p>";
                            }
                        }

                        if (isset($_GET['hapus'])) {
                            $index = $_GET['hapus'];
                            if(isset($_SESSION['dataSiswa'][$index])){
                                unset($_SESSION['dataSiswa'][$index]);
                            }
                            header('Location: http://localhost/belajarphp/datasiswa/siswa1.php');
                            exit;
                        }

                        echo '<table class="table table-bordered">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>NAMA</th>';
                        echo '<th>NIS</th>';
                        echo '<th>RAYON</th>';
                        echo '<th>ROMBEL</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        if(isset($_SESSION['dataSiswa'])) {
                            foreach ($_SESSION['dataSiswa'] as $index => $value) {
                                echo '<tr>';
                                echo '<td>'. $value['nama'] .'</td>';
                                echo '<td>'. $value['nis'] .'</td>';
                                echo '<td>'. $value['rayon'] .'</td>';
                                echo '<td>'. $value['rombel'] .'</td>';
                                echo '<td><a href="?hapus='.$index.'" class="btn btn-danger btn-sm"><i class="bx bxs-message-square-x"></i></a></td>';
                                echo '</tr>';
                            }
                        }
                        echo '</tbody>';
                        echo '</table>';

                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js.js"></script>
</body>
</html>
