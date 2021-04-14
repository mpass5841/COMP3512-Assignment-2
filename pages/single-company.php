
<head>
<style><?php
session_start();
include "helpers/style.css"?></style>
<?php include "helpers/generate-header.php";
include "helpers/api-companies.php";
?>

</head>
<body>
<main class="container">
<?php 

makeHeader();

$data = json_encode(getCompany());
$stockData = json_decode(($data), true);

echo "<div class='box bSingle'>";

foreach ($stockData as $info) {
    echo "<h2>Company Information</h2>
        <img class='compIMG'src='logos/" . $info['symbol'] . ".svg'></img></br>
        <span id='iSpan'>" . $info['symbol'] . "</span></br>
        <span id='iSpan'>" . $info['name'] . "</span></br></br>
        <section id='mSpan'>
        <label>Sector:</label>
        <span>" . $info['sector'] . "</span></br>
        <label>Sub-Industry:</label>
        <span>" . $info['subindustry'] . "</span></br>
        <label>Address:</label>
        <span>" . $info['address'] . "</span></br>
        <label>Website:</label>
        <span><a href=" . $info['website'] . ">" . $info['website'] . "</a></span></br>
        <label>Exchange:</label>
        <span>" . $info['exchange'] . "</span></br>
        <label>Description:</label>
        <span>" . $info['description'] . "</span></section> </br>";
        $stock = $info;
}
?>




<?php

if(isset($_SESSION['login']) && $_SESSION['login'] == true){
echo "<form method='post' id='add' action='favorites.php'> <input type='submit' name='add' value='Favourite " . $stock['symbol'] . "'/> </form>";
}
echo "<a href='history.php?symbol=" . $info['symbol'] . "'><button>$ Month</button></a>";
echo "</div>";

?>

</main>
</body>