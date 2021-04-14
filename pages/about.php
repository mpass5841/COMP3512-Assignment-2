<link rel=stylesheet href='helpers/style.css'>
<head>
<?php 
session_start();
include "./helpers/generate-header.php"; ?>

</head>
<body>
<main class="containerC">
<?php 
//Displays the about page information
makeHeader(); 
echo "<div id='abDiv'><h2>About</h2>";
echo "<p>Bestrade Stock Viewing App<br>COMP-3512<br>Mount Royal University<br>Randy Connolly<br>Winter Semester 2021<br>Technologies Used: GitHub <br> Heroku <br> FreeMYSQLHosting.net <br>";
echo "<p>Ethan Aggarwal - <a href='https://github.com/eagga857'>GitHub Repo</a></p>";
echo "<p>Matthew Passarelli - <a href='https://github.com/mpass5841'>GitHub Repo</a></p>";
echo "<p>Sebastian Wimmer - <a href='https://github.com/swimm830'>GitHub Repo</a></p>";
echo "<a href='https://github.com/mpass5841/COMP3512-Assignment-2'>https://github.com/mpass5841/COMP3512-Assignment-2</a>";
echo "<p>External Resources:</p>";
echo "<p>Navigation Menu: <a href='https://codepen.io/erikterwan/pen/grOZxx'>Erik Terwan</p>";
echo "</div>";
?>

</main>
</body>