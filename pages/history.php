<head>
<style><?php include "helpers/style.css" ?></style>
<?php include "helpers/generate-header.php";
include "helpers/api-history.php"; 
?>

</head>
<body>
<main class="container">
<?php makeHeader(); 
if(isset($_GET['symbol'])){
$stock = $_GET['symbol'];
$data = json_encode(getHistory($stock));
$stockData = json_decode(($data), true);
if(isset($_GET['select'])){
$order = $_GET['select'];

// code sourced from https://www.javaer101.com/en/article/29231853.html for the sort
$helper = [];
foreach ($stockData as $r){
    $helper[] = $r[$order];
}
array_multisort($helper, SORT_ASC, $stockData);
    makeMain($stockData, $stock);
}else{
    rsort($stockData);
    makeMain($stockData, $stock);
}
}

function makeMain($data, $stock){
    echo "<div class='box btable'>";
    echo "<table id=stockTable>";
    echo "<tr>
    <th><a href='history.php?symbol=$stock & select=date'>Date</a></th>
     <th><a href='history.php?symbol=$stock & select=open'>Open</a></th>
      <th><a href='history.php?symbol=$stock & select=high'>High</a></th>
      <th><a href='history.php?symbol=$stock & select=low'>Low</a></th>
      <th><a href='history.php?symbol=$stock & select=close'>Close</a></th>
      <th><a href='history.php?symbol=$stock & select=volume'>Volume</a></th>
    </tr>";
    foreach($data as $i){
        echo "<tr>";
       echo "<td>".$i['date']."</td>";
       echo "<td>".number_format($i['open'],2)."</td>";
       echo "<td>".number_format($i['high'],2)."</td>";
       echo "<td>".number_format($i['low'],2)."</td>";
       echo "<td>".number_format($i['close'],2)."</td>";
       echo "<td>".number_format($i['volume'],0)."</td>";
       echo "</tr>";
     }
    echo "</table>";
   echo  "</div>";
    }
?>

</main>
</body>