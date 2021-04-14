<link rel=stylesheet href='helpers/style.css'>
<head>
<style><?php 
session_start();
include "helpers/style.css"?></style>
<?php include "helpers/generate-header.php";
include "helpers/api-portfolio.php";
include "helpers/api-companies.php";
include "helpers/api-history.php";
?>

</head>
<body>
<main class="container">
<?php

$data = getPortfolio($_SESSION['id']);
makeHeader();

?>

    <div id="portfolioDiv">
        <h3>Portfolio</h3>



<?php
makeMain($data);
function makeMain($data)
{

    $portfolioList = $data;
    /*
    $properPortfolioList = array();
    $temp = 0;
    
    foreach ($portfolioList as $portfolio => $item) {
        $duplicate = false;
        $count = 0;
        foreach ($properPortfolioList as $properItem) {
            
            if ($properItem['symbol'] == $item['symbol']) {
                
                (int) $properItem['amount'] += (int) $item['amount'];
                
                //array_push($properPortfolioList, $properItem);
                var_dump($properItem['amount']);
                $duplicate = true;
            }
            
            
            $count++;
            
        }
        
        
        if ($duplicate == false) {
            array_push($properPortfolioList, $item);
        }
    }
    var_dump($properPortfolioList);
    */
    echo "<table>
            <tr>
                <th></th>
                <th>Symbol</th>
                <th>Name</th>
                <th>Shares</th>
                <th>Close</th>
                <th>Value</th>
            </tr>";

    $total = 0;
    foreach ($portfolioList as $portfolio => $item) {
        $total += getHistory($item['symbol'])[0]['close'] * $item['amount'];
        $_GET['symbol'] = $item['symbol'];
        echo "<tr style='cursor: pointer;' id='" . $item["symbol"] . "'>";
        echo "<td>
                <img src='../logos/" . $item["symbol"] . ".svg' style='width:100px;height:50px'>
             </td>";
        echo "<td>
                " . $item['symbol'] . "
              </td>";
        echo "<td>
                " . getCompany()[0]['name'] . "
              </td>";
        echo "<td>
                " . $item['amount'] . "
              </td>";
        echo "<td>
                    $" . number_format(getHistory($item['symbol'])[0]['close'], 2) . "
              </td>";
        echo "<td>
                    $" . number_format(getHistory($item['symbol'])[0]['close'] * $item['amount'], 2) . "
              </td>";
        echo "</tr>";
        echo "<script>
                document.querySelector('#" . $item['symbol'] . "').addEventListener('click', () => {
                    document.location.href = 'single-company.php?symbol=" . $item["symbol"] . "';
                });
              </script>";
    }

    echo
    "<tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total:</th>
            <th>$" . number_format($total, 2) . "</th>";

    echo "</table></div>";

}

?>

</main>
</body>