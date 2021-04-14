<link rel=stylesheet href='helpers/style.css'>;
<head>
<?php include "helpers/generate-header.php";
include "helpers/api-companies.php";?>

</head>
<body>
<main class="container">
<?php
session_start();
makeHeader();

if (isset($_POST['add'])) {
    $_GET['symbol'] = substr($_POST['add'], 10);
    $_SESSION["favourites"][substr($_POST['add'], 10)] = getCompany();
}

if (isset($_POST['remove'])) {
    unset($_SESSION['favourites'][substr($_POST['remove'], 7)]);
}

if (isset($_POST['removeAll'])) {

    unset($_SESSION['favourites']);

}

?>

    <div>
        <h3>Favourites</h3>



<?php

if (isset($_SESSION["favourites"])) {
    $favouriteList = $_SESSION["favourites"];
    makeMain($favouriteList);
}
function makeMain($favouriteList)
{

    if (isset($_SESSION["favourites"])) {

        echo "<ul id='list'>";
        foreach ($favouriteList as $favourite) {
            echo "<li style='cursor: pointer;' id='" . $favourite[0]["symbol"] . "'> <img src='../logos/" . $favourite[0]["symbol"] . ".svg' style='width:100px;height:50px'>" . $favourite[0]["symbol"] . "  " . $favourite[0]["name"] . "</li>";

            echo "<form method='post' id='remove'> <input type='submit' name='remove' value='Remove " . $favourite[0]['symbol'] . "'/> </form>";

            echo "<script>

            document.querySelector('#" . $favourite[0]["symbol"] . "').addEventListener('click', () => {

                document.location.href = 'single-company.php?symbol=" . $favourite[0]["symbol"] . "';

            });

            document.querySelector('#remove').addEventListener('click', () => {

                document.location.href = 'favorites.php';

            });


            </script>";

        }
        echo "</ul>
        <form method='post' id='removeAll'> <input type='submit' name='removeAll' value='Remove All'/> </form>
        </div>";
    }
}

?>



</main>
</body>