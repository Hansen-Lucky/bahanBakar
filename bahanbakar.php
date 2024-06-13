<?php

class Shell
{
    protected
    static $ppn = 0.1,
        $Super = 15420,
        $VPower = 16130,
        $VPowerDiesel = 18310,
        $VPowerNitro = 16510;

    public function __construct($bahanbakar, $jumlah)
    {
        $harga = $this->getHarga($bahanbakar);
        echo "Anda membeli bahan bakar minyak tipe <b>Shell $bahanbakar</b> dengan jumlah <b>$jumlah liter</b> dan total yang harus dibayarkan: <b>Rp." . number_format(($harga * $jumlah) + ($harga * $jumlah * self::$ppn), 0, ',', '.') . "</b>";
    }

    private function getHarga($bahanbakar)
    {
        return match ($bahanbakar) {
            'Super' => self::$Super,
            'VPower' => self::$VPower,
            'VPowerDiesel' => self::$VPowerDiesel,
            'VPowerNitro' => self::$VPowerNitro,
            default => throw new Exception('data tidak ditemukan')
        };
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bahanbakar']) && isset($_POST['jumlah'])) {
        $bahanbakar = $_POST['bahanbakar'];
        $jumlah = $_POST['jumlah'];
        new Shell($bahanbakar, $jumlah);
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Shell Bahan Bakar </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="shell-logo.png" type="image/x-icon">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 400px;
        }

        img {
            width: 70px;
            height: 70px;
            margin-bottom: 1.5rem;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input,
        select {
            padding: .5rem;
            border: none;
            border-radius: .25rem;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, .1);
        }

        select {
            appearance: none;
            background-color: transparent;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1792 1792'%3E%3Cpath fill='grey' d='M1427 727q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z'/%3E%3C/svg%3E");
            background-repeat: no-repeat, repeat;
            background-position: right .5rem center, 0 0;
            background-size: .65em auto, 100%;
            cursor: pointer;
        }

        button {
            padding: .5rem 1rem;
            border: none;
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <main class="text-center">
        <div class="container bg-white p-3">
            <img src="shell-logo.png" alt="">
            <h2>Shell Bahan Bakar</h2>
            <form action="" method="post" class="form-group">
                <label for="bahanbakar">Jumlah Liter</label>
                <input type="number" name="jumlah" id="bahanbakar" class="form-control" required min="1">
                <label for="bahanbakar">Jenis Bahan Bakar</label>
                <select name="bahanbakar" id="" class="form-select" required>
                    <option selected disabled>-- Pilih Bahan Bakar --</option>
                    <option value="Super">Shell Super</option>
                    <option value="VPower">Shell V-Power</option>
                    <option value="VPowerDiesel">Shell V-Power Diesel</option>
                    <option value="VPowerNitro">Shell V-Power Nitro</option>
                </select>
                <button type="submit" name="submit" class="btn btn-secondary">Beli</button>
            </form>
        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>