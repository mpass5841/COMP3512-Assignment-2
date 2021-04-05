<link rel=stylesheet href='helpers/style.css'>;
<head>
<?php include "helpers/generate-header.php"; ?>

</head>
<body>
<main class="container">
<?php makeHeader(); 
echo "<div class='box b'>LOGIN";
echo "<form action='/action_page.php'>
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