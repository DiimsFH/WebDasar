<?php
include 'koneksi.php';

// Query to select all data from tabel_mahasiswa
$sql = "SELECT * FROM tabel_mahasiswa";
$result = $koneksi->query($sql);

// Start HTML output with Bootstrap
echo '<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Mahasiswa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
                <h1>Data Mahasiswa</h1>;
                <a href ="form-mahasiswa.php" class = "btn btn-success btn-sm">Form Mahasiswa</a>';
            if ($result->num_rows > 0) {
                // Start table
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="table-dark">
                                    <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    </tr>
                            </thead>';
                        echo '<tbody>';
                                    // Output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($row['nim']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['alamat']) . '</td>';
                                        echo '</tr>';
                                    }
                        echo '</tbody>
                </table>';
                }
                else   {
                        echo '<div class="alert alert-warning" role="alert">No results found.</div>';
                        }
        echo '</div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>';

$koneksi->close();
?>
