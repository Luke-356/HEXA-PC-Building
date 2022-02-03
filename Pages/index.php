<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/style.css?v=1.45" />
    <title>HEXA Home</title>
</head>

<body>
    <div class="container">
        <!--navigation-->
        <?php
        include 'header.php';
        ?>

        <!--hero area-->
        <div class="hero">
            <div class="hero-body">
                <div class="hero-info">
                    <h1>
                        Build The PC of <br />
                        <span>Your Dream</span>
                    </h1>
                    <p>
                        Build the PC you want with our intelligent system building tool
                        also with good price and best quality plus free shipping
                    </p>

                    <div id="hero-cta">
                        <a href="builder.php">Get Started</a>
                        <a href="" id="gost-btn">Learn More</a>
                    </div>
                </div>

                <img src="../Images/hero-img.svg" alt="hero-image" class="hero-image" />
            </div>

            <!--partner area-->
            <div class="hero-foot">
                <p>Partnered with Top Tiers</p>
                <div class="top-tiers">
                    <img src="../Images/Vector 2.svg" />
                    <div class="compaines">
                        <img src="../Images/google-icon.svg" alt="" srcset="" />
                        <img src="../Images/intel.svg" alt="" srcset="" />
                        <img src="../Images/nvidia-icon.svg" alt="" srcset="" />
                        <img src="../Images/amd-icon.svg" alt="" srcset="" />
                    </div>
                    <img src="../Images/Vector 3.svg" />
                </div>
            </div>
        </div>

        <!-- About -->
        <div class="about-us">
            <div class="about-info">
                <span>Why Us?</span>
                <h2>More About Us</h2>
                <p>
                    We are pre-build PC company that deliver high quality products to
                    your door step with good price. We give the best service to our
                    customers to full fill their professional needs.
                </p>

                <div class="cta">
                    <a href="builder.php">Get Started</a>
                    <a href="" id="gost-btn">Learn More</a>
                </div>
            </div>

            <!--video player-->
            <div class="about-video">
                <div class="video">
                    <video src="../Images/pexels-treedeo-footage-7255101.mp4" id="video" type="video/mp4"></video>
                    <div class="layer"></div>
                    <img src="../Images/play-btn.svg" alt="play button" class="play-icon" />
                </div>
            </div>
        </div>

        <div class="steps">
            <div class="step-wrap">
                <div class="number">1</div>
                <p>
                    Just pick all the parts you want for you PC depending on your needs
                </p>
            </div>

            <div class="step-wrap">
                <div class="number">2</div>
                <p>
                    If you are satisfied with your PC build, you can order your PC now
                </p>
            </div>

            <div class="step-wrap">
                <div class="number">3</div>
                <p>
                    Our staffs will build the PC and deliver it right to your door-step
                </p>
            </div>
        </div>

        <svg width="10" height="80" viewBox="0 0 10 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="dots">
            <circle cx="5" cy="5" r="5" fill="#C4C4C4" />
            <circle cx="5" cy="39" r="5" fill="#C4C4C4" />
            <circle cx="5" cy="75" r="5" fill="#C4C4C4" />
        </svg>

        <div class="services">
            <p class="service-p">Our Services</p>
            <h2>What We Can Offer</h2>
            <div class="service-steps">
                <div class="custom">
                    <img src="../Images/undraw_empty_cart_co35 1.svg" />
                    <h3>Custom PC Builder</h3>
                    <p>
                        Just pick the parts you want with our effective and easy to use PC
                        builder
                    </p>
                </div>
                <div class="price">
                    <img src="../Images/undraw_discount_d4bd 1.svg" />
                    <h3>Great Price Tags</h3>
                    <p>
                        All the parts are with cheap and reasonable price to the customers
                    </p>
                </div>
                <div class="free">
                    <img src="../Images/undraw_On_the_way_re_swjt 1.svg" />
                    <h3>Free Delivery</h3>
                    <p>
                        Delivered right infront of your door- step and completely free of
                        charge
                    </p>
                </div>
            </div>
        </div>

        <!-- <div class="rating">
            <div class="reviews">
                <h1>Customer Reviews</h1>
                <div class="review-wrap">
                    <div class="review-div">
                        <img src="../Images/quote-right.svg" alt="quote-icon" />
                    </div>
                    <div class="review-div">
                        <img src="../Images/quote-right.svg" alt="quote-icon" />
                    </div>
                </div>
            </div>
            <div class="rating-info">
                <h2>What Our Customers say about our services</h2>
            </div>
        </div> -->
    </div>

    <script src="./js/home.js"></script>
</body>

</html>