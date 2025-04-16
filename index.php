<?php
// Start session to manage user login (if needed in future)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="index.php" class="logo"><i class="fas fa-house"></i>MyHome</a>

         <ul>
            <li><a href="#">Post Property<i class="fas fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">Buy<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="#">House</a></li>
                     <li><a href="#">Flat</a></li>
                     <li><a href="#">Shop</a></li>
                     <li><a href="#">Ready to Move</a></li>
                     <li><a href="#">Furnished</a></li>
                  </ul>
               </li>
               <li><a href="#">Sell<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="#">Post property</a></li>
                     <li><a href="#">Dashboard</a></li>
                  </ul>
               </li>
               <li><a href="#">Rent</a>
                  <ul>
                     <li><a href="#">House</a></li>
                     <li><a href="#">Flat</a></li>
                     <li><a href="#">Shop</a></li>
                  </ul>
               </li>
               <li><a href="#">Help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.html">About us</a></i></li>
                     <li><a href="contact.html">Contact us</a></i></li>
                     <li><a href="contact.html#faq">FAQ</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="#">Saved <i class="far fa-heart"></i></a></li>
            <li><a href="#">Account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Register</a></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>
<!-- header section ends -->

<!-- home section starts  -->
<div class="home">
   <section class="center">
      <form action="search.php" method="post">
         <h3>find your perfect home</h3>
         <div class="box">
            <p>enter location <span>*</span></p>
            <input type="text" name="location" required maxlength="50" placeholder="enter city name" class="input">
         </div>
         <div class="flex">
            <div class="box">
               <p>property type <span>*</span></p>
               <select name="type" class="input" required>
                  <option value="flat">flat</option>
                  <option value="house">house</option>
                  <option value="shop">shop</option>
               </select>
            </div>
            <div class="box">
               <p>how many BHK <span>*</span></p>
               <select name="bhk" class="input" required>
                  <?php for($i = 1; $i <= 9; $i++): ?>
                     <option value="<?= $i ?>"><?= $i ?> BHK</option>
                  <?php endfor; ?>
               </select>
            </div>
            <div class="box">
               <p>minimum budget <span>*</span></p>
               <select name="minimum" class="input" required>
                  <?php
                     $budgets = [500000, 1000000, 2000000, 3000000, 4000000, 5000000, 6000000, 7000000, 8000000, 9000000, 10000000, 20000000, 30000000, 40000000, 50000000, 60000000, 70000000, 80000000, 90000000, 100000000, 150000000, 200000000];
                     foreach($budgets as $budget){
                        echo "<option value='$budget'>" . ($budget < 10000000 ? ($budget/100000).' lac' : ($budget/10000000).' Cr') . "</option>";
                     }
                  ?>
               </select>
            </div>
            <div class="box">
               <p>maximum budget <span>*</span></p>
               <select name="maximum" class="input" required>
                  <?php
                     foreach($budgets as $budget){
                        echo "<option value='$budget'>" . ($budget < 10000000 ? ($budget/100000).' lac' : ($budget/10000000).' Cr') . "</option>";
                     }
                  ?>
               </select>
            </div>
         </div>
         <input type="submit" value="search property" name="search" class="btn">
      </form>
   </section>
</div>
<!-- home section ends -->

<!-- services, listings, and footer sections -->
<?php include("partials/services.php"); ?>
<?php include("partials/listings.php"); ?>
<?php include("partials/footer.php"); ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
