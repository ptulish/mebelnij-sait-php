<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Jantexport OU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo-tab.png" type="image/png">

    <!-- Подключение стилей -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300..900&display=swap" rel="stylesheet">
</head>
<body id="hero">


<header class="header" id="main-header">
    <!-- Шапка сайта (header) -->
    <div class="logo">
        <img src="assets/logo_jantexport_ou.png" alt="Логотип" />
    </div>
    <button class="burger-menu" id="burger-menu">
        <!-- Иконка бургера -->
        <span></span>
        <span></span>
        <span></span>
    </button>
    <nav class="nav" id="nav-menu">
        <a href="#hero" class="nav-btn">Home</a>
        <a href="#about-us" class="nav-btn">About us</a>
        <a href="#gallery" class="nav-btn">Gallery</a>
        <a href="#ask-us" class="nav-btn">Ask us!</a>
        <a href="#contacts" class="nav-btn">Contacts</a>
    </nav>
</header>

<section class="hero" id="hero1">
    <div class="hero-text">
        <h1>Furniture for office, home and kitchen</h1>
        <p>Bringing style, comfort, and quality to your life!</p>
        <a class="btn nav-btn btn-outline-primary" href="#about-us">LEARN MORE</a>
    </div>
</section>

<!-- Основная часть страницы -->
<main>
    <div>
        <section class="wood-background margin-section" id="about-us">
            <h2>About us</h2>
            <p class="about-us-textblock">
                Jantexport OU has successfully established itself in the European furniture market, becoming one of the leading suppliers of exclusive furniture for the home, kitchen, and office. We collaborate with recognized leaders in the furniture industry from Italy, France, and Germany, which allows us to offer our customers products of the highest quality and unique design.
                <br/><br/>
                Our mission is to bring together the best examples of European furniture production in one place, making luxury and comfort accessible to everyone. We carefully follow global trends in interior design, so our assortment includes both elegant classic collections and modern minimalist models, refined Art Deco examples, as well as eco-friendly solutions that adhere to the principles of sustainable development. This diverse selection allows us to satisfy the varied tastes and requirements of our clients.
                <br/><br/>
                We pay special attention not only to the quality of our products but also to our level of service. We offer professional interior design consultations, an individual approach to each order, and direct pricing from manufacturers, ensuring high competitiveness and transparency in the terms of cooperation. Our experience and deep understanding of the furniture industry enable us to quickly respond to market changes and propose innovative solutions that reflect current trends.
                <br/><br/>
                We are proud of our reputation as a reliable partner who helps create unique spaces for living and working. Jantexport OU strives not just to meet the needs of our clients but to exceed their expectations, making every interior a reflection of its owner’s individuality and style.
                <br/><br/>
            </p>
            <div class="info-blocks">
                <div class="info-block">
                    <img src="assets/mark-2.png" alt="Quality" />
                    <h3>Uncompromising Quality</h3>
                    <p>We select furniture made from the finest materials and employ modern design standards to guarantee our customers only receive products of the highest caliber.</p>
                </div>
                <div class="info-block">
                    <img src="assets/education.png" alt="Expertise" />
                    <h3>Professional Expertise</h3>
                    <p>We do more than just sell furniture. We offer harmonious combinations of style and functionality, staying informed about the latest global design trends to guide you toward the perfect choice.</p>
                </div>
                <div class="info-block">
                    <img src="assets/hand-shake.png" alt="Experience" />
                    <h3>Extensive Experience</h3>
                    <p>Our long-standing relationships with top manufacturers let us provide a wide assortment of furniture directly—saving you time, eliminating extra costs, and delivering optimal value.</p>
                </div>
            </div>
        </section>

    </div>
    <!-- Единая секция -->
    <section class="gallery wood-background margin-section" id="gallery">
        <h2 class="gallery-section-header">Gallery</h2>
        <div onclick="toggleCarousel(1)" class="gallery-header">
            <h2>Office Furniture – Comfort and Efficiency</h2>
            <svg class="arrow-down" width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10l5 5 5-5H7z" fill="currentColor"/>
            </svg>
        </div>
        <div id="carousel-1" class="carousel">
            <p class="carousel-text">We’ll help you select ergonomic and stylish office furniture to make your workspace comfortable and productive.</p>
            <div class="carousel-wrapper">
                <button class="carousel-button left" onclick="scrollCarouselLeft(0)">&#8249;</button>
                <div class="carousel-images officeGal"></div>
                <button class="carousel-button right" onclick="scrollCarouselRight(0)">&#8250;</button>
            </div>
        </div>

        <div onclick="toggleCarousel(2)" class="gallery-header">
            <h2>Home Furniture – Cozy and Stylish in Every Detail</h2>
            <svg class="arrow-down" width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10l5 5 5-5H7z" fill="currentColor"/>
            </svg>
        </div>
        <div id="carousel-2" class="carousel">
            <p class="carousel-text">We assist in selecting furniture that makes your bedroom and living room comfortable, functional, and harmonious.</p>
            <div class="carousel-wrapper">
                <button class="carousel-button left" onclick="scrollCarouselLeft(1)">&#8249;</button>
                <div class="carousel-images homeGal"></div>
                <button class="carousel-button right" onclick="scrollCarouselRight(1)">&#8250;</button>
            </div>
        </div>

        <div onclick="toggleCarousel(3)" class="gallery-header">
            <h2>Kitchen – The Heart of Your Home</h2>
            <svg class="arrow-down" width="10" height="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10l5 5 5-5H7z" fill="currentColor"/>
            </svg>
        </div>
        <div id="carousel-3" class="carousel">
            <p class="carousel-text">We help you choose stylish and functional kitchen furniture to create comfort and coziness in your home.</p>
            <div class="carousel-wrapper">
                <button class="carousel-button left" onclick="scrollCarouselLeft(2)">&#8249;</button>
                <div class="carousel-images kitchenGal"></div>
                <button class="carousel-button right" onclick="scrollCarouselRight(2)">&#8250;</button>
            </div>
        </div>
    </section>

    <section id="ask-us" class="wood-background margin-section">
        <h2>Ask Us!</h2>
        <div class="form-form">
            <form action="./send_email.php" method="POST" class="ask-us-form" id="contactForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Name and Surename</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Smith" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="New order" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary form-button" id="sendButton">Send!</button>
            </form>
        </div>
    </section>
    <div id="notification" class="notification"></div>

    <section class="brand-section">
        <div class="brand-block">
            <img src="assets/pin.png" alt="Image 1">
            <h1>Address</h1>
            <p>Pärnu mnt. 142, 11317 Tallinn, Estonia</p>
        </div>
        <div class="brand-block">
            <img src="assets/phone-call.png" alt="Image 2">
            <h1>Phone</h1>
            <p>Call us now: <br> <a href="tel:+37122064314">+371 22064314</a></p>
        </div>
        <div class="brand-block">
            <img src="assets/email.png" alt="Image 3">
            <h1>Email</h1>
            <p><a href="mailto:info@jantexportou.com">info@jantexportou.com</a></p>
        </div>
    </section>
    <section class="map-section" id="contacts">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2030.305665045152!2d24.73255547664654!3d59.41129600445751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46929554772f93c5%3A0x1d360f14d324b532!2sP%C3%A4rnu%20mnt.%20142%2C%2011317%20Tallinn%2C%20Estland!5e0!3m2!1sde!2sat!4v1739109678432!5m2!1sde!2sat"
                width="1920"
                height="300"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">

        </iframe>
    </section>

</main>

<!-- Подвал -->
<footer class="footer">
    <p>© 2024 Jantexport OU. All rights are saved.</p>
</footer>

<!-- Подключение скриптов -->
<script src="script.js"></script>
<script src="bootstrap.js"></script>
</body>
</html>
