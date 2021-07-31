<!-- Menghitung Luas dan Keliling Segitiga -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Menghitung Luas dan Keliling Segitiga</title>
</head>

<body>
    <h1 class="text-center mb-5">Hitung Keliling dan luas Segitiga</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <form method="POST" action="" class="mb-5">
                    <div class="mb-3">
                        <label for="sisia" class="form-label">Masukkan sisi A</label>
                        <input type="number" class="form-control" id="sisia" name="sisiA">
                    </div>
                    <div class="mb-3">
                        <label for="sisib" class="form-label">Masukkan sisi C</label>
                        <input type="number" class="form-control" id="sisib" name="sisiC">
                    </div>
                    <div class="mb-3">
                        <label for="tiggi" class="form-label">Masukkan Tinggi</label>
                        <input type="number" class="form-control" id="tinggi" name="tinggi">
                    </div>
                    <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </form>

                <?php
                    if (isset($_POST['hitung'])) {
                        $valueA = $_POST['sisiA'];
                        $valueB = $_POST['sisiC'];
                        $valueC = $_POST['tinggi'];
                        function add($valueA, $valueB, $valueC) {
                        $luas = (($valueA + $valueB)*$valueC)/2;
                        return $luas;
                        }
                        echo "<strong><U> Sisi A : $valueA, </u></strong><br><br>";
                        echo "<strong><U> Sisi B : $valueB, </strong></u><br><br>";
                        echo "<strong><U> Tinggi : $valueC, maka:</strong></u><br><br>";
                        echo "Luas Trapesium : <br>";
                        $luas = add($valueA, $valueB, $valueC);
                        Printf("Luas : 1/2(%d + %d)* %d = %d<br>",$valueA, $valueB, $valueC, $luas);
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