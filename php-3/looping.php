<?php

echo "<h1>No. 1 Looping While</h1>";

echo "<h1>LOOPING PERTAMA</h1>";
echo "<script>console.log('LOOPING PERTAMA')</script>";

$f = 2;

while ($f <= 20) {
    echo "<h4>$f - I Love Coding</h4>";
    $f += 2;
}

echo "<h1>LOOPING KEDUA</h1>";
echo "<script>console.log('LOOPING KEDUA')</script>";

$i = 20;

while ($i >= 2) {
    echo "<h4>$i - I will become a mobile developer</h4>";
    $i -= 2;
}

?>


<h1>No. 2 Looping for javascript</h1>
<div id="loopfor">

</div>
<script>
let looping = document.getElementById('loopfor');

const loopFor = () => {
    for (let f = 1; f <= 20; f++) {
        if (f % 2 == 0) {
            loopfor.innerHTML += f + " - Taruna Bhakti <br>";
        } else if (f % 3 == 0) {
            loopfor.innerHTML += f + " - I Love Coding <br>";
        } else if (f % 2 == 1) {
            loopfor.innerHTML += f + " - RPL <br>";
        }
    }
}
loopFor();
</script>


<?php

echo "<h1>No. 3 Looping FOREACH <h1/>";
$products = [
    [
        'name' => 'shiny star', 
        'price' => 20, 
        'stock' => 10
    ],
    [
        'name' => 'green shell', 
        'price' => 10, 
        'stock' => 20
    ],
    [
        'name' => 'red shell', 
        'price' => 15, 
        'stock' => 15
    ],
    [
        'name' => 'gold coin', 
        'price' => 5, 
        'stock' => 12
    ],
    [
        'name' => 'lightning bolt', 
        'price' => 40, 
        'stock' => 8
    ],
    [
        'name' => 'banana skin', 
        'price' => 2, 
        'stock' => 5
    ],
];

foreach ($products as $key => $produk) {
    echo $produk['name']. " - ";
    echo $produk['price']. " - ";
    echo $produk['stock']. "<br>";
}
?>