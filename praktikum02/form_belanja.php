<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Belanja Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgb(41, 164, 0);
            font-family: Arial, sans-serif;
        }
        .container {
            background: linear-gradient(135deg,rgb(202, 255, 182),rgb(174, 255, 186));
        }
        h2 {
            color:rgb(41, 164, 0);
            text-align: center;
            font-weight: bold;
        }
        .btn-primary {
            background-color:rgb(60, 119, 246);
            border: none;
        }
        .btn-primary:hover {
            background-color:rgb(105, 204, 113);
        }
        table {
            width: 90%; 
            max-width: 1000px;
            margin: 20px auto; 
            border-collapse: collapse; 
            background: rgb(41, 164, 0); 
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
        }

        th {
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background: rgba(0, 0, 0, 0.2);
        }

        td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
            color: white;
            border-top: 1px solid rgba(255, 255, 255, 0.3); 
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.1);
            transition: 0.3s ease-in-out;
        }

        th {
            background-color:rgb(0, 116, 21);
            color: white;
        }
        .form-label {
            color:rgb(41, 164, 0);
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            border: 2px rgb(0, 116, 21);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Form Belanja Online</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Customer</label>
                <input type="text" class="form-control" name="customer" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Produk Pilihan</label>
                <div>
                    <input type="radio" name="produk" value="TV" required> TV
                    <br/>
                    <input type="radio" name="produk" value="Kulkas"> Kulkas
                    <br/>
                    <input type="radio" name="produk" value="Mesin Cuci"> Mesin Cuci
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Beli</label>
                <input type="number" class="form-control" name="jumlah" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="proses" value="Simpan">Simpan</button>
        </form>

        <?php
        $customer = $produk = $jumlah = $total_harga = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
            $customer = $_POST['customer'];
            $produk = $_POST['produk'];
            $jumlah = $_POST['jumlah'];

            $harga_produk = [
                "TV" => 3000000,
                "Kulkas" => 4000000,
                "Mesin Cuci" => 3500000
            ];
            $total_harga = $harga_produk[$produk] * $jumlah;
        }
        ?>

        <?php if (!empty($customer)) : ?>
            <h3 class="mt-4 text-center">Hasil Belanja</h3>
            <table class="table table-bordered text-center">
                <tr><th>CUSTOMER</th><td><?php echo htmlspecialchars($customer); ?></td></tr>
                <tr><th>PRODUK</th><td><?php echo htmlspecialchars($produk); ?></td></tr>
                <tr><th>JUMLAH BELI</th><td><?php echo htmlspecialchars($jumlah); ?></td></tr>
                <tr><th>TOTAL HARGA</th><td>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></td></tr>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>