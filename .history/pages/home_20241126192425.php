<?php
session_start();
include('../includes/header.php');

// Check if cookie is set
$cookie_name = "solehub_cookie";
$cookie_accepted = isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === "accepted";

// If cookie not accepted, show SweetAlert to accept cookies
if (!$cookie_accepted) {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    echo '<script>';
    echo 'Swal.fire({
                title: "Accept Cookies",
                text: "We use cookies to improve your experience on our site. Click Accept to continue.",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Accept",
                cancelButtonText: "Decline"
            }).then((result) => {
                if (result.isConfirmed) {
                    // User accepted cookies
                    document.cookie = "solehub_cookie=accepted; expires=Thu, 01 Jan 2099 00:00:00 UTC; path=/";
                    location.reload(); // Reload the page to reflect cookie acceptance
                } else {
                    // Handle decline action (e.g., redirect or additional action)
                }
            });';
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solehub</title>
    <link rel="icon" type="image/x-icon" href="../asset/img/SOLEHUBS.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/user.css">
    <link rel="stylesheet" href="styles.css?v=1.0.1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Unbounded:wght@200..900&display=swap');
    </style>

</head>
<body>
    <!-- Header Start -->
    <div class="welcome-users" style="margin-top: 100px;">
      <?php
            if (isset($_SESSION['username'])) {
                echo '<i class="fas fa-user"></i> Welcome, ' . htmlspecialchars($_SESSION['username']) . '!';
            }
        ?>
    </div>
    <!-- Header End -->

    <!-- landin area start -->
<section class="landing-area" style="display: flex; flex-direction: column; align-items: flex-start; gap: 20px; padding: 60px; margin-left: 3rem;">
    <div class="content" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
        <div class="landing-text" style="flex: 1; max-width: 50%;">
            <h1 style="font-size: 34px; font-weight: 700; margin-bottom: 20px; font-family:'unbounded';">Step into Style with SoleHub: Your One-Stop Shoe Shop!</h1>
            <p style="font-size: 18px; line-height: 1.6; text-align: justify; font-family:'poppins',sans-serif; width:500px;">
              Discover top brands' latest trends and timeless classics at SoleHub. Whether athletic, casual, or formal, find the perfect pair for every occasion. Shop now for unbeatable quality and exclusive collections!</p>
            <div class="btn" style="margin-top: 20px;">
                <a href="#shop">Get Yours</a>
            </div>
        </div>
        <div class="container-img" style="flex: 1; max-width: 50%; display: flex; justify-content: center; align-items: center;">
            <img src="../asset/img/hero-bg-removebg-preview.png" alt="Shoe Image" style="max-width: 95%; height: auto; border-radius: 21px;
background: #e0e0e0;
box-shadow:  21px 21px 42px #cecece,
            -21px -21px 42px #f2f2f2;">
        </div>
    </div>
</section>
    <!-- landing area end -->

    <!-- Partnership Section -->
    <div class="clip">
    <div class="clip-title"><h2>In Partnership with</h2></div>
    <video src="https://brand.assets.adidas.com/video/upload/f_auto:video,q_auto/if_w_gt_1920,w_1920/Training_FW_24_Dropset3_Global_Launch_HP_Hero_Banner_d_53a178c936.mp4" alt="video"
                autoplay
                playsinline
                controls 
                loop
                width="100%"></video>
</div>

    <!-- Partnership Section End -->

    <!-- Brand Section Start -->
    <section class="brand-section" id="brand">
        <div class="container">
            <div class="heading">
                <h2>Brand</h2>
            </div>
            <div class="row mt-5 align-items-center">
                <div class="col-md-6">
                    <div class="brand-text">
                        <h2>SOLEHUB'S</h2>
                        <p>
                            Shop at Solehub for fashionable, unique, and high-quality shoes from top brands. Find your perfect style at affordable prices or indulge in luxurious designs. Don't miss our flash sales and new arrivals to satisfy your fashion needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="brand-img">
                        <img src="../asset/img/SOLEHUBS.png" alt="Brand Image" class="w-100" style="box-shadow: 3px 24px 24px -12px rgba(0,0,0,0.75);" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Section End -->

<section class="shoe-carousel">
    <style>
        .shoe-carousel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 0;
            margin-top: 10em;
        }

        .nb-poster {
            flex: 0 0 45%;
            max-width: 45%;
        }

        #trends-text {
            flex: 0 0 50%;
            max-width: 50%;
            padding-left: 30px;
        }

        .nb-poster img {
            width: 600px;
            height: 600px;
        }

        #trends-text h2 {
            margin-left: 40px;
            font-size: 32px; 
            font-weight: 500; 
            margin-bottom: 20px;
            font-family: var(--font-family-header);
        }

        #trends-text p {
            margin-left: 40px;
            font-size: 18px;
            line-height: 1.8;
            word-spacing: 5px;
            text-align: justify;
            color: var(--font-color-text);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #000; 
        }

        .visually-hidden {
            color: #000; 
        }

    </style>

    <div class="container">
        <div class="heading">
            <h2>What's Trend</h2>
        </div>
        <div class="row mt-5 align-items-center">
            <div class="col-md-6">
                <div class="nb-poster">
                    <img src="../asset/img/New Balance Poster.jpg" alt="New Balance Poster"
                    style="box-shadow: 0px 12px 12px -7px rgba(0,0,0,0.75);">
                </div>
            </div>
                <div id="trends-text">
                    <h2>Discover the New Balance 550 White Green</h2>
                    <p>
                      Discover timeless elegance and comfort in the New Balance 550 White Green sneakers at SOLEHUB. Crafted from classic white leather with green accents, they blend heritage style with modern comfort. Engineered for all-day wear with advanced cushioning, perfect for any occasion. Shop this limited edition at SOLEHUB PH and elevate your style.
                    </p>
                </div>
        </div>
    </div>
</section>

<!-- Carousel section starts here -->
<section class="carousel-area">
    <div class="container">
        <div class="carousel-wrapper" style="margin: 50px;">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $images = array(
                        "../asset/img/NB 1.jpg",
                        "../asset/img/NB 2.jpg",
                        "../asset/img/NB 3.jpg",
                        "../asset/img/NB 4.jpg",
                        "../asset/img/NB 5.jpg",
                    );

                    $numSlides = ceil(count($images) / 3);

                    for ($i = 0; $i < $numSlides; $i++) {
                        echo '<div class="carousel-item ' . ($i === 0 ? 'active' : '') . '">';
                        echo '<div class="row">';
                        for ($j = 0; $j < 3; $j++) {
                            $index = $i * 3 + $j;
                            if ($index < count($images)) {
                                echo '<div class="col-md-4">';
                                echo '<img src="' . $images[$index] . '" class="img-fluid" alt="Slide ' . ($index + 1) . '">';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Shoe Carousel Section End -->


<!-- Shop Section Start -->
    <section class="shop-section" id="shop">
      <div class="container">
        <div class="heading">
          <h2>Shop</h2>
        </div>

        <div class="row mt-5">
          <!-- card 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img src="../asset/img/adidas images1.jpg" alt="Card Image" />
                </div>
                <div class="card-text">
                  <h1>Ultra boost 1.0</h1>
                  <h3><span>&#8369;10,000</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/adidas images2.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>UBounce DNA shoes</h1>
                  <h3><span>&#8369;5,500</span></p></h3>
                  <p>Sale 20% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/adidas images3.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h2>Best Seller</h2>
                  <h1>Adidas Samba</h1>
                  <h3><span>&#8369;6,800.98</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 4 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/New balance img3.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h2>Best Seller</h2>
                  <h1>New Balance 550</h1>
                  <h3><span>&#8369;7,795</span></p></h3>
                  <p>Sale 30% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 5 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/New balance img4.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>ALD x New Balance 996</h1>
                  <h3>8,200</h3>
                  <h3><span>&#8369;7,471</span></p></h3>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 6 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/New balance img5.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>NB Made in USA 996 Core</h1>
                  <h3><span>&#8369;5,495.50</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 7 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/Converse img6.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h2>Best Seller</h2>
                  <h1>Chuck 70</h1>
                  <h3><span>&#8369;5,189</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 8 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/Converse img7.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>Chuck 70 AT-CX</h1>
                  <h3><span>&#8369;5,995.35</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>
          <!-- card 9 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/Converse img8.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>Converse Chuck Taylor</h1>
                  <h3><span>&#8369;4,599</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 10 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/nike img10.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h5 class="sold-out">Sold Out</h5>
                  <h1>Nike Blazer x sacai</h1>
                  <h3><span>&#8369;4,169.92</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 11 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/nike img11.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>Nike Dunk Low</h1>
                  <h3><span>&#8369;6,195</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 12 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/nike img9.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>Nike Air Jordan 1</h1>
                  <h3><span>&#8369;11,199</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 13 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/vans img12.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>Vans Authentic core</h1>
                  <h3><span>&#8369;4,000</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 14 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/vans img13.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h1>Vans Unisex x slip</h1>
                  <h3><span>&#8369;4,800</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>

          <!-- card 15 -->
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-content">
                <div class="card-img">
                  <img
                    src="../asset/img/vans img14.jpg"
                    alt="Card Image"
                    class="w-100"
                  />
                </div>
                <div class="card-text">
                  <h5 class="sold-out">Sold Out</h5>
                  <h1>Vans Old skol</h1>
                  <h3><span>&#8369;4,557.85</span></p></h3>
                  <p>Sale 10% off</p>
                  <a href="../includes/payment.html" target="_self">BUY NOW</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shop Section End -->

    <!-- Reviews Section Start -->
    <section class="review-section" id="review">
      <div class="container">
        <div class="heading">
          <h2>Reviews</h2>
        </div>
        <div class="row mt-5">
          <!-- Review 1 -->
          <div class="col-lg-4">
            <div class="review">
              <div class="review-content">
                <div class="review-img">
                  <img
                  src="../asset/img/human1.jpg"
                  alt="Review Image"
                    class="w-100"
                  />
                </div>
                <div class="review-text">
                  <h5>Grace P.</h5>
                  <h6>Taguig</h6>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                  </div>
                  <p>
                    Found exactly what I wanted at a cheaper price than in a local store. Fast and easy checkout.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Review 2 -->
          <div class="col-lg-4">
            <div class="review">
              <div class="review-content">
                <div class="review-img">
                  <img
                    src="../asset/img/human2.jpg"
                    alt="Review Image"
                    class="w-100"
                  />
                </div>
                <div class="review-text">
                  <h5>David M.</h5>
                  <h6>Makati</h6>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                  </div>
                  <p>
                    It was exactly as pictured and exactly what I wanted. Fast shipping, great price ,Thank you!
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Review 3 -->
          <div class="col-lg-4">
            <div class="review">
              <div class="review-content">
                <div class="review-img">
                  <img
                    src="../asset/img/galon.png"
                    alt="Review Image"
                    class="w-100"
                  />
                </div>
                <div class="review-text">
                  <h5>Galon R.</h5>
                  <h6>Quezon City</h6>
                  <div class="rating">
                    <i class="fas fa-star"></i>
                  </div>
                  <p> 
                    Terrible customer experience. Took order then a day later claimed they were busy and said orders will be late. Awit sa inyo!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Reviews Section End -->

    <!-- Membership Section -->
    <section class="membership">
        <div class="b-membership">
            <span>BECOME A MEMBER &amp; GET 15% OFF</span>
            <button type="button">
                <span class="m-signup"><a href="../index.php">SIGN UP FOR FREE</a></span>
            </button>
        </div>
    </section>
    <!-- Membership Section End -->
    
    <!-- Contact section Start -->
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="heading">
                <h2>Contact</h2>
            </div>

            <div class="row mt-5">
                <!-- Left side -->
                <div class="col-lg-6">
                    <div class="contact-text">
                        <h2>Reach Me</h2>
                        <p>
                            Address: 60 New york Street., Brgy. E Rodriguez Cubao Quezon City<br>
                            Mobile: 09270228403/093896086527<br>
                            Landline: +632 8889 1234<br>
                            Open daily 10:00 a.m. to 7:00 p.m.
                        </p>

                        <div class="social-link">
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                        </div>
                    </div>
                </div>

                <!-- Right side -->
                <div class="col-lg-6">
                    <div>
                        <form>
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Full Name" autocomplete="off" />
                            </div>

                            <!-- Contact Number -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Contact No</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Contact Number" autocomplete="off" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email address" autocomplete="off" />
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section End -->

    <!-- Footer Section Start -->
    <!-- Footer Section End -->

    <!-- Back to top start -->
    <div class="top">
        <button onclick="topFunction()" id="topBtn" title="Go to top">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
    <!-- Back to top end -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- My script -->
    <script src="./script.js"></script>
    
    <!-- Footer -->
    <?php
      include('../includes/footer.html');
    ?>
