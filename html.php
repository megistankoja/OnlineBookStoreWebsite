<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookflix and Chill</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" type="text/css">


  
</head>
<body>
    
<!-- header section starts  -->
<?php include 'header.php'; ?>
<header class="header">

    <div class="header-1">

        <a href="#" class="logo"> <i class="fas fa-book"></i> Bookflix and Chill </a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="kerko ketu..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>

    </div>
    
    <div class="header-2">
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="#featured">featured</a>
            <a href="#arrivals">arrivals</a>
            <a href="html4.html">reviews</a>
           <a href="html3.html">blogs</a>
            <a  href='html2.html' alt='Broken links'>genres</a>
           
        </nav>
    </div>

</header>

<!-- header section ends -->

<!-- bottom navbar  -->

<nav class="bottom-navbar">
    <a href="home.php" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
   
</nav>

<!-- login form  -->

<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="" method="post">
        <h3>sign in</h3>
        <span>email</span>
        <input type="email" name="" class="box" placeholder="enter your email" id="">
        <span>password</span>
        <input type="password" name="" class="box" placeholder="enter your password" id="">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
        </div>
        <input type="submit" value="sign in" class="btn">
        <p>forget password ? <a href="#">click here</a></p>
        <p>don't have an account ? <a href="#">create one</a></p>
        
    </form>

</div>


<!-- home section starts  -->

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3 style="color:white;">Deri ne 50% zbritje</h3>
            <a href="#" class="btn">Blej tani</a>
            <p style="color:white; font-size:20px;" > Blini libra te rinj dhe te perdorur,online dhe ne dyqan vetem tek  Bookflix and Chill me qender ne qytetin e bukur te Shkodrës!</p>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="matrix.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="the_wish.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="reckless.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="the_maid.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="shadow_and_bone.jpg" alt=""></a>
                <a href="#" class="swiper-slide"><img src="wish_you_were_here.jpg" alt=""></a>
            </div>
            <img src="image/stand.png" class="stand" alt="">
        </div>

    </div>

</section>

<!-- home section ense  -->

<!-- icons section starts  -->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <div class="content">
            <h3>Posta falas</h3>
            <p>per porosi mbi $100</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>Pagese e sigurte</h3>
            <p>100% sigurim te dhenash</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>Kthime te lehta</h3>
            <p>kthimi deri ne 10 dite </p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 suport</h3>
            <p>sms/telefonate ne cdo kohe </p>
        </div>
    </div>

</section>

<!-- icons section ends -->

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> <span>featured books</span> </h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="itendswithus.jpg" alt="">
                </div>
                <div class="content">
                    <h3>It ends with us</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="thealchemist.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The Alchemist</h3>
                    <div class="price">$17.00 <span>$20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="matrix.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Matrix</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="one_of_us_is_lying.jpg" alt="">
                </div>
                <div class="content">
                    <h3>One of us is lying</h3>
                    <div class="price">$19.99 <span>$24.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="the_davinci_code.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The Davinci Code</h3>
                    <div class="price">$13.99 <span>$17.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="normal_people.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Normal people</h3>
                    <div class="price">$18.99 <span>$24.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="shadow_and_bone.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Shadow and bone</h3>
                    <div class="price">$23.99 <span>$26.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="what_if.jpg" alt="">
                </div>
                <div class="content">
                    <h3>What if</h3>
                    <div class="price">$18.99 <span>$22.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="brothers.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Brothers</h3>
                    <div class="price">$16.99 <span>$20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="the_dutch_house.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The dutch house</h3>
                    <div class="price">$21.99 <span>$25.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- featured section ends -->

<!-- newsletter section starts -->

<section class="newsletter">

    <form action="">
        <h3>subscribe for latest updates</h3>
        <input type="email" name="" placeholder="enter your email" id="" class="box">
        <input type="submit" value="subscribe" class="btn">
    </form>

</section>

<!-- newsletter section ends -->

<!-- arrivals section starts  -->


<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>new arrivals</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">
        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="itendswithus.jpg" alt="">
                </div>
                <div class="content">
                    <h3>It ends with us</h3>
                    <div class="price">$18.99 <span>$22.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="the_fallen_stars.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The fallen stars</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="the_maid.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The maid</h3>
                    <div class="price">$23.99 <span>$27.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="to_paradise.jpg" alt="">
                </div>
                <div class="content">
                    <h3>To paradise</h3>
                    <div class="price">$14.99 <span>$19.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="invisible.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Invisible</h3>
                    <div class="price">$18.99 <span>$25.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="bird_box.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Bird Box</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="reckless.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Reckless</h3>
                    <div class="price">$16.99 <span>$21.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="wish_you_were_here.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Wish you were here</h3>
                    <div class="price">$19.99 <span>$25.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="fiona_and_jane.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Fiona and Jane</h3>
                    <div class="price">$14.99 <span>$19.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="the_wish.jpg" alt="">
                </div>
                <div class="content">
                    <h3>The wish</h3>
                    <div class="price">$17.99 <span>$23.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>
        <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    </div>

</section>

<!-- arrivals section ends -->

<!-- deal section starts  -->

<section class="deal">

    <div class="content">
        <h3>oferta e dites</h3>
        <h1>deri ne 50% zbritje</h1>
        <p>Shfletoni librat ekzluziv sot!  Nxitoni- oferta e dites skadon ne mesnate!</p>
        <a href="#" class="btn">shop now</a>
    </div>

    <div class="image">
        <img src="image/deal-img.jpeg" alt="">
    </div>

</section>

<!-- deal section ends -->
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Vendodhjet tona:</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Shqiperi</a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Mali i Zi</a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Kosove </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Itali</a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> France </a>
            
        </div>

        

        

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +355-69-46-00-534 </a>
            <a href="#"> <i class="fas fa-phone"></i> +383-68-73-21-896 </a>
            <a href="#"> <i class="fas fa-envelope"></i> bookflixandchill@gmail.com </a>
            <img src="image/worldmap.png" class="map" alt="">
        </div>
        
    </div>

    <div class="share">
        <a href="https://www.facebook.com/" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="credit"> Krijuar nga <span>M&L&M</span> | te gjitha te drejtat e rezervuara! </div>

</section>

<!-- footer section ends -->

<!-- loader  -->
<?php include 'footer.php'; ?>

<!-- custom js file link  -->

<div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- custom js file link  -->
<script src="javascript.js"></script>


</body>
</html>