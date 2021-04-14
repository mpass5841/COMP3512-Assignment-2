<head>
<style><?php 
session_start();
include "./helpers/style.css" ?></style>
<?php 

include "./helpers/generate-header.php"; 

?>

</head>
<body>
<main class="container">
<?php 

makeHeader(); 
//Gives the user the ability to login, then posts that data to the index
echo "<div class='box b'>LOGIN";
echo "<form method=post action=index.php>
<label for='email'>Email:</label>
<input type='text' id='email' name='email'><br>
<label for='password'>Password:</label>
<input type='text' id='password' name='password'><br><br>
<input type='submit' id='buttn' value='LOGIN'>
</form> ";
echo "<p>No account?</p><a id='signup' href='registration.php'>Sign Up</a>";
echo "</div>";
?>

</main>
</body>