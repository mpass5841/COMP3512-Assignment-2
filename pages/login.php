<head>
<style><?php include "helpers/style.css" ?></style>
<?php include "helpers/generate-header.php"; 

?>

</head>
<body>
<main class="container">
<?php makeHeader(); 

echo "<div class='box b'>LOGIN";
echo "<form method=post action=index.php>
<label for='email'>Email:</label>
<input type='text' id='email' name='email'><br>
<label for='password'>Password:</label>
<input type='text' id='password' name='password'><br><br>
<input type='submit' value='LOGIN'>
</form> ";
echo "<p>No account?</p><a id='signup' href='registration.php'>Sign Up</a>";
echo "</div>";
?>

</main>
</body>