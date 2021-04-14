<head>    
<style><?php
session_start();
include "./helpers/style.css" ?></style>
<?php include "./helpers/generate-header.php"; 
include "./helpers/api-users.php";
?>

</head>
<body>
<main class='container'>
<?php

if(isset($_GET['logout'])){
    unset($_SESSION['login']);
    unset($_GET['logout']);
    unset($_SESSION['favourites']);
}

//gets the email from the login page, then verifies user based off the user table
if(isset($_POST['email'])){
    $data = json_encode(getUsers());
    $userData = json_decode(($data), true);
    foreach($userData as $i){
        if($_POST['email'] == $i['email']){
          if(password_verify($_POST['password'], $i['password'])){  
               $_SESSION['login'] = true;
               $_SESSION['id'] = $i['id'];
          }else{
              echo "lolcats";
        }
        }
    }
    }

makeHeader(); 
makeMain();

//Creates the main options
function makeButtons(){
    echo "<a href='about.php' id='About'><div class= 'sbox' >About</div></a>";
    echo "<a href='companies.php' id='Companies'><div class= 'sbox' >Companies</div></a>";
    echo "<a href='login.php' id='Login'><div class= 'sbox' >Login</div></a>";
    echo "<a href='registration.php' id='Signup'><div class= 'sbox' >Signup</div></a>";
    echo "<a href='portfolio.php' id='Portfolio'><div class= 'sbox' >Portfolio</div></a>";
    echo "<a href='favorites.php' id='Favorites'><div class= 'sbox' >Favorites</div></a>";
    echo "<a href='profile.php' id='Profile'><div class= 'sbox' >Profile</div></a>";
    echo "<form method='get'  action='index.php'> <input class='sbox' id='Logout' type='submit' name='logout' value='Logout'/> </form>";
}

//Sets diplays based upon login status
function makeMain(){
    echo "<div class='box bMain'id='secondContainer'>";
    makeButtons();
    
    

    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        echo "<script>
        document.querySelector('#Signup').style.display = 'none';
        document.querySelector('#Login').style.display = 'none';
        document.querySelector('#Portfolio').style.display = 'block';
        document.querySelector('#Favorites').style.display = 'block';
        document.querySelector('#Profile').style.display = 'block';
        document.querySelector('#Logout').style.display = 'block';
        </script>";
    } else{
        echo "<script>
        document.querySelector('#Signup').style.display = 'block';
        document.querySelector('#Login').style.display = 'block';
        document.querySelector('#Portfolio').style.display = 'none';
        document.querySelector('#Favorites').style.display = 'none';
        document.querySelector('#Profile').style.display = 'none';
        document.querySelector('#Logout').style.display = 'none';
        </script>";
    }
   echo  "</div>";
    }
?>

</main>
</body>