<link rel=stylesheet href='./helpers/style.css'>
<head>
<style><?php
session_start();
include "./helpers/style.css"?></style>
<?php include "./helpers/generate-header.php";
include "./helpers/api-portfolio.php";
include "./helpers/api-companies.php";
include "./helpers/api-history.php";
?>

</head>
<body>
<main class="containerP">
<?php
//gets the users id from the session
$data = getPortfolio($_SESSION['id']);
makeHeader();

?>

    <div id="portfolioDiv">
        <h3>Portfolio</h3>



<?php
makeMain($data);
function makeMain($data)
{
//Creates the portfolio list based upon the data in the portfolio table
    $portfolioList = $data;
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

    echo "<script>
        let duplicates = '';
        </script>";

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

                duplicates = document.querySelectorAll('#" . $item['symbol'] . "');
                duplicates.forEach(addListeners);

                function addListeners(item){
                        item.addEventListener('click', () => {
                                document.location.href = 'single-company.php?symbol=" . $item["symbol"] . "';
                            });
                }
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