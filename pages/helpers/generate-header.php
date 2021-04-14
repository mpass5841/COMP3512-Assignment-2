<style><?php include "helpers/style.css" ?></style>
<?php

//Generates the header for each page, including the hamburger menu
function makeHeader(){
echo "<div class='box a'>";
 echo "<a href='index.php'><img id='logo' src=logos/bestrade.jpg style='height:60px'></a>";
 echo "<!--    Made by Erik Terwan    -->
 <!--   24th of November 2015   -->
 <!--        MIT License        -->
 <nav role='navigation'>
   <div id='menuToggle'>
     <!--
     A fake / hidden checkbox is used as click reciever,
     so you can use the :checked selector on it.
     -->
     <input type='checkbox' />
     
     <!--
     Some spans to act as a hamburger.
     
     They are acting like a real hamburger,
     not that McDonalds stuff.
     -->
     <span></span>
     <span></span>
     <span></span>
     
     <!--
     Too bad the menu has to be inside of the button
     but hey, it's pure CSS magic.
     -->
     <ul id='menu'>
       <a id='hamIndex' href='index.php'><li>Home</li></a>
       <a id='hamAbout' href='about.php'><li>About</li></a>
       <a id='hamCompanies' href='companies.php'><li>Companies</li></a>
       <a id='hamLogin' href='login.php'><li>Login</li></a>

       <a id='hamPortfolio' href='portfolio.php'><li>Portfolio</li></a>
       <a id='hamProfile' href='profile.php'><li>Profile</li></a>
       <a id='hamFavorites' href='favorites.php'><li>Favorites</li></a>

     </ul>
   </div>
 </nav>";
echo "</div>";

if(isset($_SESSION['login']) && $_SESSION['login'] == true){
  echo "<script>
  document.querySelector('#hamLogin').style.display = 'none';
  document.querySelector('#hamPortfolio').style.display = 'block';
  document.querySelector('#hamFavorites').style.display = 'block';
  document.querySelector('#hamProfile').style.display = 'block';
  </script>";
} else{
  echo "<script>
  document.querySelector('#hamLogin').style.display = 'block';
  document.querySelector('#hamPortfolio').style.display = 'none';
  document.querySelector('#hamFavorites').style.display = 'none';
  document.querySelector('#hamProfile').style.display = 'none';
  </script>";
}
}

function makeMenu(){
echo "<div class='box b'><h2>BESTRADE</h2>";
echo "<div class='homeOptions'>";
echo "<a href='about.php'>ABOUT</a>";
echo "<a href='companies.php'>COMPANIES</a>";
echo "<a href='portfolio.php'>PORTFOLIO</a>";
echo "<a href='favorites.php'>FAVOURITES</a>";
echo "<a href='profile.php'>PROFILE</a>";
echo "<a href='login.php'>LOGOUT</a>";
echo "</div>";
echo "</div>";
}
?>