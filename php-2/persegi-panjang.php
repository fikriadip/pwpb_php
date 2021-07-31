<!-- Menghitung Luas dan Keliling persegi panjang -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Menghitung Luas dan Keliling persegi panjang</title>
</head>

<body>
    <h1 class="text-center mb-5">Hitung Panjang dan Lebar Persegi Panjang</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <form method="POST" action="" class="mb-5">
                    <div class="mb-3">
                        <label for="panjang" class="form-label">Masukkan Panjang</label>
                        <input type="number" class="form-control" id="panjang" name="long">
                    </div>
                    <div class="mb-3">
                        <label for="lebar" class="form-label">Masukkan Lebar</label>
                        <input type="number" class="form-control" id="lebar" name="wide">
                    </div>
                    <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>

                <?php
                    if (isset($_POST['hitung'])) {
                        $panjang = $_POST['long'];
                        $lebar = $_POST['wide'];
                        
                        $keliling = ($panjang * 2) + ($lebar * 2); // menghitung keliling
                        $luas = $panjang * $lebar; // menghitung luas

                        echo "Persegi panjang yang memiliki lebar: $lebar, dan panjang : $panjang maka : <br>";
                        echo "Keliling : $keliling <br>";
                        echo "Luas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: $luas";
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>