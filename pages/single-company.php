
<head>
<style><?php include "helpers/style.css" ?></style>
<?php include "helpers/generate-header.php"; 
include "helpers/api-companies.php";
?>

</head>
<body>
<main class="container">
<?php makeHeader(); 

$data = json_encode(getCompany());
$stockData = json_decode(($data), true);
makeMain($stockData);

function makeMain($data){
    echo "<div class='box bSingle'>";
    foreach($data as $info){
   echo "<h2>Company Information</h2>
        <img class='compIMG'src='logos/".$info['symbol'].".svg'></img></br>
        <span id='iSpan'>".$info['symbol']."</span></br>
        <span id='iSpan'>".$info['name']."</span></br></br>
        <section id='mSpan'>
        <label>Sector:</label>
        <span>".$info['sector']."</span></br>
        <label>Sub-Industry:</label>
        <span>".$info['subindustry']."</span></br>
        <label>Address:</label>
        <span>".$info['address']."</span></br>
        <label>Website:</label>
        <span><a href=".$info['website'].">".$info['website']."</a></span></br>
        <label>Exchange:</label>
        <span>".$info['exchange']."</span></br>
        <label>Description:</label>
        <span>".$info['description']."</span></section> </br>";
    }
    echo "<a href='favorites.php?symbol=".$info['symbol']."'><button>Add to Favorites</button></a>";
    echo "<a href='history.php?symbol=".$info['symbol']."'><button>$ Month</button></a>";
    echo "</div>";
}
?>

</main>
</body>