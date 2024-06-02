<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="s.php">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Data Siswa</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>NAMA</th>
                    <th>NIS</th>
                    <th>RAYON</th>
                    <th>ROMBEL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                if (isset($_SESSION['dataSiswa'])) {
                    foreach ($_SESSION['dataSiswa'] as $value) {
                        echo '<tr>';
                        echo '<td>'. $value['nama'] .'</td>';
                        echo '<td>'. $value['nis'] .'</td>';
                        echo '<td>'. $value['rayon'] .'</td>';
                        echo '<td>'. $value['rombel'] .'</td>';
                        echo '</tr>';
                    }
                }

                if(isset($_POST['reset'])){
                    session_destroy();
                    header('Location: http://localhost/belajarphp/datasiswa/siswa1.php');
                    exit;
                }
                
                ?>
            </tbody>
        </table>
        <form action="siswa1.php" method="post">
            <button type="submit" class="btn btn-primary"><i class='bx bx-arrow-back'></i></button>
        </form>
        <form action="siswa2.php" method="post">
            <button type="submit" class="btn btn-danger mt-3" name="reset"><i class='bx bxs-trash'></i></button>
        </form>
    </div>
</body>
</html>
