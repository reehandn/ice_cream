<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ice Cream</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center">
        <div class="logo">
            <img src="asset/logooo.jpg" alt="Logo" class="logo-image">
        </div>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <nav class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('form') }}">Order</a>
                    </li>
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout"> Logout </button>
                    </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

  <section class="hero">
    <div class="hero-text">
      <h1>Stay Cool, Stay Sweet</h1>
      <p>Experience the ultimate sweetness with our creamy, refreshing ice cream. Made from the finest ingredients, every scoop is crafted to deliver pure joy and indulgence. Whether you crave classic flavors or adventurous twists, our ice cream is the perfect treat for any moment.</p>
      <a class="hero-btn" href="{{ route('form') }}">Pesan Sekarang</a> 
    </div>
    <div class="hero-image">
        <img src="asset/seru.png" alt="Ice Cream Hero">
    </div>
  </section>

  <section class="special-offers-heading">
  <div class="heading-container">
        <h1 class="main-text">Special Offers</h1>
        <p class="sub-text">Discover the best deals and exclusive offers tailored just for you!</p>
    </div>
</section>
<section class="offers">
    <div class="offer-card">
        <img src="asset/type0.jpg" alt="Offer 1">
        <div class="offer-text">
            <h3>Special Ice Cream Mix</h3>
            <p>Bali, 24 September 2024 - Cobalah Es Krim yang lezat dengan bahan yang menyegarkan. Ayo coba sekarang!</p>
            <p class="date">September 26, 2024</p>
        </div>
    </div>
    <div class="offer-card">
        <img src="asset/type1.png" alt="Offer 2">
        <div class="offer-text">
            <h3>Ice Cream Deluxe</h3>
            <p>Bali, 13 Agustus 2024 - Rasakan rasa dari Es Krim kami yang eksklusif sekarang juga!</p>
            <p class="date">August 30, 2024</p>
        </div>
    </div>
    <div class="offer-card">
        <img src="asset/type2.png" alt="Offer 3">
        <div class="offer-text">
            <h3>Ice Cream Extra Deluxe</h3>
            <p>Bali, 20 April 2024 - Es Krim Premium kami tidak akan mengecewakan hari cerah anda!</p>
            <p class="date">June 12, 2024</p>
        </div>
    </div>
</section>


<section class="how-it-works">
    <h2>How It Works</h2>
    <div class="content-wrapper">
        <!-- Info Box 1: Pick Up -->
        <div class="info-box">
            <div class="info-image">
                <img src="asset/pickup.jpg" alt="Pick Up">
            </div>
            <div class="info-text">
                <h3>Pick Up</h3>
                <p>Pesan terlebih dahulu dan ambil es krim favorit Anda di lokasi yang telah dipilih.</p>
                <a href="#" class="info-link">Order <span>&rarr;</span></a>
            </div>
        </div>
        <!-- Info Box 2: Delivery -->
        <div class="info-box">
            <div class="info-image">
                <img src="asset/deliver.jpg" alt="Delivery">
            </div>
            <div class="info-text">
                <h3>Delivery</h3>
                <p>Es krim favorit Anda diantar langsung ke rumah Anda dengan layanan cepat dan aman.</p>
                <a href="#" class="info-link">Order <span>&rarr;</span></a>
            </div>
        </div>
    </div>
</section>




<section class="milestone">
    <h2 class="milestone-title">Preference</h2>
    <div class="timeline">
        <!-- Timeline Item -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-image">
                    <img src="asset/cone.jpeg" alt="Fore Coffee Mobile Application">
                </div>
                <div class="timeline-text">
                    <h3>Cone Ice Cream</h3>
                    <p>Penyajian ini mencerminkan cara klasik menikmati es krim sambil tetap praktis untuk dibawa.</p>
                </div>
            </div>
        </div>
        <!-- Timeline Item -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-image">
                    <img src="asset/cup.jpeg" alt="First Outside Jabodetabek">
                </div>
                <div class="timeline-text">
                    <h3>Cup Ice Cream</h3>
                    <p>Penyajian ini cocok untuk pengalaman menikmati es krim dengan porsi yang lebih rapi dan nyaman.</p>
                </div>
            </div>
        </div>
        <!-- Timeline Item -->
        <div class="timeline-item">
            <div class="timeline-content">
                <div class="timeline-image">
                    <img src="asset/bread.jpeg" alt="FOREveryone 1L">
                </div>
                <div class="timeline-text">
                    <h3>Bread Ice Cream</h3>
                    <p>Penyajian ini memberikan variasi menarik untuk menikmati es krim dalam bentuk dessert yang lebih mengenyangkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="footer-overlay">
        <div class="footer-container">
            <!-- Logo dan Contact Section -->
            <div class="footer-logo-section">
                <img src="asset/logooo.jpg" alt="Blue Sky Summer Logo" class="footer-logo">
                <p></p>
                <button class="contact-btn">Contact With Us</button>
            </div>

            <!-- Link Section -->
            <div class="footer-links">
                <div class="footer-column">
                    <h4>My Account</h4>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wish List</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Extras</h4>
                    <ul>
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Gift Certificates</a></li>
                        <li><a href="#">Affiliate</a></li>
                        <li><a href="#">Specials</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="footer-contact">
                <h4>Contact Us</h4>
                <div class="social-icons">
                    <a href="#"><img src="asset/4.png" alt="Facebook"></a>
                    <a href="#"><img src="asset/5.png" alt="Twitter"></a>
                    <a href="#"><img src="asset/3.png" alt="Instagram"></a>
                    <a href="#"><img src="asset/2.png" alt="LinkedIn"></a>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>