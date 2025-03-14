<?php

require_once("BukuTamu.php");
session_start();

if (!isset($_SESSION['BukuTamu'])) {
    $_SESSION['BukuTamu'] = [];
}

if (isset($_POST['submit'])) {
    // Membuat objek dari buku tamu
    $bukuTamu = new BukuTamu();

    // Mengisi properti timestamp dengan fungsi date
    $bukuTamu->timestamp = date('Y-m-d H:i:s');
    $bukuTamu->fullname = $_POST['fullname'];
    $bukuTamu->email = $_POST['email'];
    $bukuTamu->message = $_POST['message'];

    array_push($_SESSION['BukuTamu'], $bukuTamu); // Perbaikan nama session
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-4">Daftar Kunjungan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['BukuTamu'] as $entry): ?>
                    <tr>
                        <td>
                            <?php echo htmlspecialchars($entry->timestamp); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($entry->fullname); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($entry->email); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($entry->message); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php">&lt;&lt;&lt; Kembali</a>
    </div>
</body>

</html>
