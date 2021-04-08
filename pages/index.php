<head>
<style><?php include "helpers/style.css" ?></style>
<?php include "helpers/generate-header.php"; 
include "helpers/api-users.php";
?>

</head>
<body>
<main class='container'>
<?php
session_start();

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

function makeButtons(){
    echo "<a href='about.php'><div class= 'sbox About'>About</div></a>";
    echo "<a href='companies.php'><div class= 'sbox Companies'>Companies</div></a>";
    echo "<a href='login.php'><div class= 'sbox Login'>Login</div></a>";
    echo "<a href='registration.php'><div class= 'sbox Signup'>Signup</div></a>";
    echo "<a href='portfolio.php'><div class= 'sbox Portfolio'>Portfolio</div></a>";
    echo "<a href='favorites.php'><div class= 'sbox Favorites'>Favorites</div></a>";
    echo "<a href='profile.php'><div class= 'sbox Profile'>Profile</div></a>";
    echo  "<a><div class= 'sbox Logout'>Logout</div></a>";
}

function makeMain(){
    echo "<div class='box bMain'id='secondContainer'>";
    makeButtons();
    
    if($_SESSION['login'] = true){
        echo "<script>
        $('a .Signup').css('display', 'none');
        $('a .Login').css('display', 'none');
        $('a .Portfolio').css('display', 'block');
        $('a .Favorites').css('display', 'block');
        $('a .Profile').css('display', 'block');
        $('a .Logout').css('display', 'block');
        </script>";
    }
   echo  "</div>";
    }
?>

</main>
</body>

