<link rel=stylesheet href='helpers/style.css'>
<head>
<style><?php 
session_start();
include "helpers/style.css"?></style>
<?php

include "helpers/generate-header.php";
include "helpers/api-companies.php";
?>

</head>
<body>
<main class="containerC">
<?php
makeHeader();
?>

    <div>
        <h3>Companies</h3>
        <label>Filter:</label>

        <form name="form" action="" method="get">
            <input type="text" name="companySearch" id="companySearch">
            <input type="submit" id="buttn" value="Go">
            <button id="clear">Clear</button>
        </form>


        <script type='text/JavaScript'>
            document.querySelector('#clear').addEventListener('click', () => {
                document.querySelector('#companySearch').value = '';
                <?php
                //Filters the list based upon the users input
                    $filterText = $_GET["companySearch"];
                    unset($filterText);
                ?>
            });
        </script>

<?php
makeMain();

//Displays the list of companies based off the companies table
function makeMain()
{
    $companyList = getCompany();
    echo "<ul>";
    foreach ($companyList as $company) {

        if (isset($_GET["companySearch"])) {
            $filterText = $_GET["companySearch"];
        } else {
            $filterText = "";
        }

        if (is_numeric(stripos($company["name"], $filterText)) || $filterText == "") {

            echo "<li style='cursor: pointer;' id='" . $company["symbol"] . "'> <img id='img" . $company["symbol"] . "'src='./logos/" . $company["symbol"] . ".svg' style='width:100px;height:50px'>" . $company["symbol"] . "  " . $company["name"] . "</li>";
            echo "<script>
                document.querySelector('#" . $company["symbol"] . "').addEventListener('click', () => {
                    document.location.href = 'single-company.php?symbol=" . $company["symbol"] . "';
                });
                
            </script>";

        }
    }
    echo "</ul></div>";
}

?>

</main>
</body>