<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>Quartz Countertops for Kitchens & Bathrooms | South Florida Installation | Griffin Quartz</title>
    <meta name="description" content="Transform your kitchen and bathroom with premium quartz countertops. Expert installation for islands, vanities, backsplashes & more. Serving Boca Raton, Fort Lauderdale, Miami. Free estimates!">
    <meta name="keywords" content="kitchen quartz countertops, bathroom quartz countertops, quartz vanity tops, kitchen island countertops, quartz backsplash, undermount sink cutout, South Florida countertops, Boca Raton kitchen remodel">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://soflocountertops.com/kitchen-bath">

    <!-- Open Graph -->
    <meta property="og:title" content="Quartz Countertops for Kitchens & Bathrooms | Griffin Quartz">
    <meta property="og:description" content="Transform your kitchen and bathroom with premium quartz countertops. Expert installation in South Florida.">
    <meta property="og:url" content="https://soflocountertops.com/kitchen-bath">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://soflocountertops.com/images/modern-kitchen-gray-quartz-wood-slats.webp">

    <!-- Fonts and Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        /* Kitchen & Bath Page Styles */
        .page-hero {
            position: relative;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }

        .page-hero .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .page-hero .hero-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .page-hero .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.7));
        }

        .page-hero .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 60px 20px;
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .page-hero .hero-description {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Section Intro */
        .section-intro {
            padding: 80px 0 40px;
            text-align: center;
        }

        .section-intro h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            color: #000;
            margin-bottom: 1rem;
        }

        .section-intro p {
            font-size: 1.125rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Application Cards */
        .applications-section {
            padding: 40px 0 80px;
        }

        .applications-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        @media (max-width: 1200px) {
            .applications-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .applications-grid {
                grid-template-columns: 1fr;
            }
        }

        .application-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .application-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }

        .application-card-image {
            height: 200px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #FDB913;
        }

        .application-card-content {
            padding: 24px;
        }

        .application-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: #000;
            margin-bottom: 12px;
        }

        .application-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .application-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .application-card ul li {
            padding: 8px 0;
            border-top: 1px solid #f0f0f0;
            font-size: 0.9rem;
            color: #444;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .application-card ul li i {
            color: #FDB913;
            font-size: 1rem;
        }

        /* Split Section */
        .split-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 500px;
        }

        @media (max-width: 768px) {
            .split-section {
                grid-template-columns: 1fr;
            }
        }

        .split-content {
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .split-content.dark {
            background: #000;
            color: #fff;
        }

        .split-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.75rem, 3vw, 2.5rem);
            margin-bottom: 1.5rem;
        }

        .split-content.dark h2 {
            color: #FDB913;
        }

        .split-content p {
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            color: #666;
        }

        .split-content.dark p {
            color: #ccc;
        }

        .split-content .btn {
            display: inline-block;
            width: auto;
            max-width: fit-content;
        }

        .split-image {
            background-size: cover;
            background-position: center;
            min-height: 400px;
        }

        /* Why Quartz Section */
        .why-quartz-section {
            padding: 80px 0;
            background: #f8f8f8;
        }

        .why-quartz-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .why-card {
            text-align: center;
            padding: 40px 30px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        .why-card i {
            font-size: 3rem;
            color: #FDB913;
            margin-bottom: 20px;
            display: block;
        }

        .why-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: #000;
            margin-bottom: 12px;
        }

        .why-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Popular Colors Section */
        .colors-section {
            padding: 80px 0;
        }

        .colors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .color-card {
            position: relative;
            height: 250px;
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .color-card:hover {
            transform: scale(1.03);
        }

        .color-card-bg {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .color-card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: #fff;
        }

        .color-card h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .color-card span {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        /* Process Section */
        .process-section {
            padding: 80px 0;
            background: #000;
            color: #fff;
        }

        .process-section h2 {
            color: #fff;
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .process-step {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }

        .process-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #FDB913;
            color: #000;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .process-step h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #fff;
        }

        .process-step p {
            color: #999;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background: #f8f8f8;
        }

        .faq-grid {
            max-width: 900px;
            margin: 50px auto 0;
        }

        .faq-item {
            background: #fff;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .faq-question {
            padding: 20px 24px;
            font-weight: 600;
            color: #000;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.2s ease;
        }

        .faq-question:hover {
            background: #f8f8f8;
        }

        .faq-question i {
            color: #FDB913;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            display: none;
            padding: 0 24px 20px;
            color: #666;
            line-height: 1.7;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        /* Photo Gallery Section */
        .gallery-section {
            padding: 80px 0;
        }

        .gallery-tabs {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
            margin-bottom: 40px;
        }

        .gallery-tab {
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            border: 2px solid #000;
            background: transparent;
            color: #000;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-tab:hover {
            background: #f0f0f0;
        }

        .gallery-tab.active {
            background: #000;
            color: #fff;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            aspect-ratio: 4/3;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.02);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-item-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
        }

        .gallery-item-overlay h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 4px;
            color: #fff;
        }

        .gallery-item-overlay span {
            font-size: 0.85rem;
            opacity: 0.8;
            color: #fff;
        }

        .gallery-item[data-category="kitchen"] { display: block; }
        .gallery-item[data-category="bathroom"] { display: block; }

        .gallery-grid[data-filter="kitchen"] .gallery-item[data-category="bathroom"] {
            display: none;
        }

        .gallery-grid[data-filter="bathroom"] .gallery-item[data-category="kitchen"] {
            display: none;
        }

        /* CTA Section */
        .cta-section-full {
            padding: 80px 0;
            background: linear-gradient(135deg, #FDB913 0%, #e5a811 100%);
            text-align: center;
        }

        .cta-section-full h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            color: #000;
            margin-bottom: 1rem;
        }

        .cta-section-full p {
            font-size: 1.25rem;
            color: #000;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cta-buttons .btn {
            padding: 16px 32px;
            font-size: 1rem;
        }

        .btn-dark {
            background: #000;
            color: #fff;
            border: none;
        }

        .btn-dark:hover {
            background: #333;
        }

        .btn-outline-dark {
            background: transparent;
            color: #000;
            border: 2px solid #000;
        }

        .btn-outline-dark:hover {
            background: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <p>New Year, New Quartz—<strong>Up to 50% OFF</strong> Select Slabs. Fast Installation in as Little as 1 Week! <a href="/#contact-form"><strong>EXPLORE SALE</strong></a></p>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container header-container">
            <a href="/" class="logo">
                <img src="images/griffin-quartz-logo.webp" alt="Griffin Quartz Logo">
            </a>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav class="nav" id="mainNav">
                <ul class="nav-list">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Our Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="our-services">Countertop Services</a></li>
                            <li><a href="quartz-brands">Quartz Product Selection</a></li>
                            <li><a href="kitchen-bath">Countertops for Kitchens & Baths</a></li>
                            <li><a href="commercial">Commercial Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Installation Locations</a>
                        <ul class="dropdown-menu">
                            <li><a href="locations">All Service Areas</a></li>
                            <li><a href="south-florida">South Florida</a></li>
                            <li><a href="boca-raton">Boca Raton, FL</a></li>
                            <li><a href="boynton-beach">Boynton Beach, FL</a></li>
                            <li><a href="coconut-creek">Coconut Creek, FL</a></li>
                            <li><a href="coral-springs">Coral Springs, FL</a></li>
                            <li><a href="deerfield-beach">Deerfield Beach, FL</a></li>
                            <li><a href="delray-beach">Delray Beach, FL</a></li>
                            <li><a href="fort-lauderdale">Fort Lauderdale, FL</a></li>
                            <li><a href="hollywood">Hollywood, FL</a></li>
                            <li><a href="miami">Miami, FL</a></li>
                            <li><a href="parkland">Parkland, FL</a></li>
                            <li><a href="pompano-beach">Pompano Beach, FL</a></li>
                            <li><a href="west-palm-beach">West Palm Beach, FL</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Resources</a>
                        <ul class="dropdown-menu">
                            <li><a href="color-visualizer">Color Visualizer</a></li>
                            <li><a href="space-design-tool">Space Design Tool</a></li>
                            <li><a href="quote-calculator">Instant Quote Calculator</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="gallery" class="nav-link">Inspiration Gallery</a></li>
                    <li class="nav-item"><a href="contact" class="nav-link">Contact Us</a></li>
                    <li class="nav-item"><a href="tel:7203241436" class="nav-link phone-link">720-324-1436</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-background">
            <img src="images/modern-kitchen-gray-quartz-wood-slats.webp" alt="Modern kitchen with premium quartz countertops" loading="eager">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <h1>Quartz for Kitchens & Bathrooms</h1>
            <p class="hero-description">Transform your most important spaces with stunning, durable quartz surfaces crafted for South Florida living.</p>
        </div>
    </section>

    <!-- Kitchen Section Intro -->
    <section class="section-intro">
        <div class="container">
            <h2>Kitchen Quartz Countertops</h2>
            <p>Your kitchen is the heart of your home. Elevate it with beautiful, durable quartz countertops that stand up to daily cooking, entertaining, and family gatherings while maintaining their stunning appearance for decades.</p>
        </div>
    </section>

    <!-- Kitchen Applications -->
    <section class="applications-section">
        <div class="container">
            <div class="applications-grid">
                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Kitchen Islands</h3>
                        <p>Make a bold statement with a stunning quartz island that becomes the centerpiece of your kitchen.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Waterfall edge installations</li>
                            <li><i class="bi bi-check-circle-fill"></i> Extended overhangs for seating</li>
                            <li><i class="bi bi-check-circle-fill"></i> Large-format seamless slabs</li>
                            <li><i class="bi bi-check-circle-fill"></i> Integrated prep sinks</li>
                        </ul>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-grid-3x3"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Perimeter Countertops</h3>
                        <p>Durable work surfaces that resist stains, scratches, and heat for busy kitchens.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Continuous grain patterns</li>
                            <li><i class="bi bi-check-circle-fill"></i> Custom edge profiles</li>
                            <li><i class="bi bi-check-circle-fill"></i> Precision corner miters</li>
                            <li><i class="bi bi-check-circle-fill"></i> Appliance cutouts</li>
                        </ul>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-bricks"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Quartz Backsplashes</h3>
                        <p>Create a cohesive look with matching quartz backsplashes that are easy to clean.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Full-height backsplash</li>
                            <li><i class="bi bi-check-circle-fill"></i> No grout lines to clean</li>
                            <li><i class="bi bi-check-circle-fill"></i> Seamless countertop match</li>
                            <li><i class="bi bi-check-circle-fill"></i> Outlet & switch cutouts</li>
                        </ul>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Sink & Cooktop Cutouts</h3>
                        <p>Expert precision cutting for undermount sinks and cooktops with polished edges.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Undermount sink integration</li>
                            <li><i class="bi bi-check-circle-fill"></i> Farmhouse sink cutouts</li>
                            <li><i class="bi bi-check-circle-fill"></i> Cooktop openings</li>
                            <li><i class="bi bi-check-circle-fill"></i> Faucet hole drilling</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kitchen Split Section -->
    <section class="split-section">
        <div class="split-image" style="background-image: url('images/luxury-white-kitchen-arched-windows-gold.webp');"></div>
        <div class="split-content">
            <h2>The Heart of Your Home</h2>
            <p>Your kitchen deserves a countertop that can keep up with daily life. Quartz is non-porous, meaning spills from wine, coffee, and cooking oils won't stain—even if left overnight.</p>
            <p>From morning coffee to holiday feasts, quartz delivers the beauty of natural stone with unmatched durability. Resistant to scratches, heat, and everyday wear, it's the perfect surface for South Florida's busiest room.</p>
            <a href="quote-calculator" class="btn btn-outline">Get Instant Quote</a>
        </div>
    </section>

    <!-- Bathroom Section Intro -->
    <section class="section-intro">
        <div class="container">
            <h2>Bathroom Quartz Countertops</h2>
            <p>Transform your bathroom into a spa-like retreat with elegant quartz vanity tops that resist moisture, stains, and the daily wear of your morning routine. Perfect for South Florida's humid climate.</p>
        </div>
    </section>

    <!-- Bathroom Applications -->
    <section class="applications-section">
        <div class="container">
            <div class="applications-grid">
                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-moisture"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Vanity Tops</h3>
                        <p>Single or double sink vanities in any size. Quartz is ideal for bathrooms—non-porous surfaces resist moisture and mold.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Single & double sink configs</li>
                            <li><i class="bi bi-check-circle-fill"></i> Custom sizing available</li>
                            <li><i class="bi bi-check-circle-fill"></i> Integrated backsplash</li>
                            <li><i class="bi bi-check-circle-fill"></i> Vessel sink compatibility</li>
                        </ul>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-water"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Shower Surrounds</h3>
                        <p>Luxurious quartz shower walls and benches that create a seamless, easy-to-clean environment.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Full shower wall panels</li>
                            <li><i class="bi bi-check-circle-fill"></i> Built-in shower benches</li>
                            <li><i class="bi bi-check-circle-fill"></i> Niches & shelving</li>
                            <li><i class="bi bi-check-circle-fill"></i> No grout maintenance</li>
                        </ul>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-heart-half"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Tub Surrounds</h3>
                        <p>Elegant quartz surfaces around your bathtub create a cohesive, spa-like atmosphere.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Tub deck installations</li>
                            <li><i class="bi bi-check-circle-fill"></i> Wall panel surrounds</li>
                            <li><i class="bi bi-check-circle-fill"></i> Seamless corners</li>
                            <li><i class="bi bi-check-circle-fill"></i> Moisture-resistant</li>
                        </ul>
                    </div>
                </div>

                <div class="application-card">
                    <div class="application-card-image">
                        <i class="bi bi-stars"></i>
                    </div>
                    <div class="application-card-content">
                        <h3>Custom Features</h3>
                        <p>Complete your bathroom's designer look with matching quartz accents throughout.</p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Floating shelves</li>
                            <li><i class="bi bi-check-circle-fill"></i> Window sills</li>
                            <li><i class="bi bi-check-circle-fill"></i> Makeup vanity tops</li>
                            <li><i class="bi bi-check-circle-fill"></i> Decorative accents</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bathroom Split Section -->
    <section class="split-section">
        <div class="split-image" style="background-image: url('images/bathroom-spa-white-quartz-wood.webp');"></div>
        <div class="split-content">
            <h2>Spa-Like Luxury at Home</h2>
            <p>South Florida's humidity can be tough on bathroom surfaces. Quartz is naturally resistant to moisture, mold, and mildew—making it the perfect choice for our tropical climate.</p>
            <p>From sleek modern vanities to elegant master bath suites, quartz delivers the look of natural stone with superior durability. Choose from marble-look Calacatta patterns or contemporary solid colors to match your style.</p>
            <a href="gallery" class="btn btn-outline">View Bathroom Gallery</a>
        </div>
    </section>

    <!-- Why Quartz Section -->
    <section class="why-quartz-section">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Why Choose Quartz?</h2>
            <p class="section-description" style="text-align: center; max-width: 700px; margin: 0 auto; color: #666;">Quartz combines the beauty of natural stone with engineered durability—perfect for kitchens and bathrooms.</p>

            <div class="why-quartz-grid">
                <div class="why-card">
                    <i class="bi bi-shield-check"></i>
                    <h3>Non-Porous Surface</h3>
                    <p>Unlike granite or marble, quartz won't absorb liquids, bacteria, or stains. Safe for food prep and easy to sanitize.</p>
                </div>
                <div class="why-card">
                    <i class="bi bi-gem"></i>
                    <h3>Scratch & Chip Resistant</h3>
                    <p>Engineered to be one of the hardest surfaces available. Resists scratches from knives and everyday wear.</p>
                </div>
                <div class="why-card">
                    <i class="bi bi-palette2"></i>
                    <h3>200+ Color Options</h3>
                    <p>From classic marble-look to bold contemporary patterns. Find the perfect match for any design style.</p>
                </div>
                <div class="why-card">
                    <i class="bi bi-droplet-fill"></i>
                    <h3>Zero Maintenance</h3>
                    <p>No sealing required, ever. Simply wipe clean with soap and water for a lifetime of beauty.</p>
                </div>
                <div class="why-card">
                    <i class="bi bi-sun"></i>
                    <h3>UV Resistant</h3>
                    <p>Premium quartz won't fade in South Florida's intense sunlight. Perfect for bright kitchens and bathrooms.</p>
                </div>
                <div class="why-card">
                    <i class="bi bi-arrow-repeat"></i>
                    <h3>Consistent Patterns</h3>
                    <p>Unlike natural stone, quartz delivers predictable veining and patterns across multiple slabs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Kitchen & Bathroom Inspiration</h2>
            <p class="section-description" style="text-align: center; max-width: 700px; margin: 0 auto; color: #666;">Browse our completed projects throughout South Florida. Filter by room type to find inspiration for your space.</p>

            <div class="gallery-tabs">
                <button class="gallery-tab active" data-filter="all">All Projects</button>
                <button class="gallery-tab" data-filter="kitchen">Kitchens</button>
                <button class="gallery-tab" data-filter="bathroom">Bathrooms</button>
            </div>

            <div class="gallery-grid" data-filter="all">
                <!-- Kitchen Images -->
                <div class="gallery-item" data-category="kitchen">
                    <img src="images/kitchen-calacatta-gold-globe-pendants.webp" alt="Kitchen with Calacatta Gold quartz" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Calacatta Gold Kitchen</h4>
                        <span>Boca Raton</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="kitchen">
                    <img src="images/kitchen-black-marble-gold-herringbone.webp" alt="Black marble kitchen with gold accents" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Black & Gold Kitchen</h4>
                        <span>Fort Lauderdale</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="kitchen">
                    <img src="images/kitchen-coastal-wicker-stools-skylight.webp" alt="Coastal kitchen with skylight" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Coastal Kitchen</h4>
                        <span>Delray Beach</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="kitchen">
                    <img src="images/kitchen-beachfront-ocean-view-globes.webp" alt="Beachfront kitchen with ocean view" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Oceanfront Kitchen</h4>
                        <span>Miami Beach</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="kitchen">
                    <img src="images/kitchen-calacatta-walnut-leather-stools.webp" alt="Kitchen with walnut and leather stools" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Modern Transitional</h4>
                        <span>Parkland</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="kitchen">
                    <img src="images/kitchen-green-cabinets-cream-quartz.webp" alt="Kitchen with green cabinets" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Designer Kitchen</h4>
                        <span>West Palm Beach</span>
                    </div>
                </div>

                <!-- Bathroom Images -->
                <div class="gallery-item" data-category="bathroom">
                    <img src="images/bathroom-spa-calacatta-vessel-tub.webp" alt="Spa bathroom with vessel tub" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Spa Master Bath</h4>
                        <span>Boca Raton</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="bathroom">
                    <img src="images/bathroom-double-vanity-calacatta-gold.webp" alt="Double vanity bathroom" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Double Vanity Suite</h4>
                        <span>Coral Springs</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="bathroom">
                    <img src="images/bathroom-penthouse-gray-quartz-ocean.webp" alt="Penthouse bathroom with ocean view" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Penthouse Bath</h4>
                        <span>Fort Lauderdale</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="bathroom">
                    <img src="images/bathroom-floating-vanity-ocean-view.webp" alt="Floating vanity with ocean view" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Floating Vanity</h4>
                        <span>Hollywood</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="bathroom">
                    <img src="images/bathroom-spa-white-quartz-wood.webp" alt="Spa bathroom with white quartz" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Zen Spa Bath</h4>
                        <span>Delray Beach</span>
                    </div>
                </div>
                <div class="gallery-item" data-category="bathroom">
                    <img src="images/bathroom-white-quartz-orchids-coastal.webp" alt="Coastal bathroom with orchids" loading="lazy">
                    <div class="gallery-item-overlay">
                        <h4>Coastal Master</h4>
                        <span>Palm Beach</span>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="gallery" class="btn btn-outline">View Full Gallery</a>
            </div>
        </div>
    </section>

    <!-- Popular Colors Section -->
    <section class="colors-section">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Popular Quartz Colors for Kitchens & Baths</h2>
            <p class="section-description" style="text-align: center; max-width: 700px; margin: 0 auto; color: #666;">Browse our most requested colors. Visit our Boca Raton showroom to see the full collection.</p>

            <div class="colors-grid">
                <div class="color-card">
                    <div class="color-card-bg" style="background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 50%, #f0f0f0 100%);"></div>
                    <div class="color-card-overlay">
                        <h4>Calacatta Gold</h4>
                        <span>Marble-look veining</span>
                    </div>
                </div>
                <div class="color-card">
                    <div class="color-card-bg" style="background: linear-gradient(135deg, #fafafa 0%, #f0f0f0 100%);"></div>
                    <div class="color-card-overlay">
                        <h4>Arctic White</h4>
                        <span>Pure solid white</span>
                    </div>
                </div>
                <div class="color-card">
                    <div class="color-card-bg" style="background: linear-gradient(135deg, #e8e8e8 0%, #d0d0d0 50%, #e0e0e0 100%);"></div>
                    <div class="color-card-overlay">
                        <h4>Carrara Mist</h4>
                        <span>Soft grey veining</span>
                    </div>
                </div>
                <div class="color-card">
                    <div class="color-card-bg" style="background: linear-gradient(135deg, #f8f5f0 0%, #e8e0d5 100%);"></div>
                    <div class="color-card-overlay">
                        <h4>Statuario</h4>
                        <span>Bold dramatic veins</span>
                    </div>
                </div>
                <div class="color-card">
                    <div class="color-card-bg" style="background: linear-gradient(135deg, #444 0%, #333 100%);"></div>
                    <div class="color-card-overlay">
                        <h4>Midnight Black</h4>
                        <span>Contemporary dark</span>
                    </div>
                </div>
                <div class="color-card">
                    <div class="color-card-bg" style="background: linear-gradient(135deg, #d4c9b8 0%, #c4b9a8 100%);"></div>
                    <div class="color-card-overlay">
                        <h4>Coastal Grey</h4>
                        <span>Warm neutral tone</span>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="quartz-brands" class="btn btn-outline">Explore Full Color Selection</a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Our Installation Process</h2>
            <p class="section-description" style="text-align: center; max-width: 700px; margin: 0 auto; color: #999;">From consultation to installation, we make the process seamless. Most projects completed in 1 week.</p>

            <div class="process-grid">
                <div class="process-step">
                    <div class="process-number">1</div>
                    <h3>Free Consultation</h3>
                    <p>We visit your home to discuss your vision, measure your space, and help you select the perfect quartz.</p>
                </div>
                <div class="process-step">
                    <div class="process-number">2</div>
                    <h3>Precise Templating</h3>
                    <p>Our team creates exact digital templates of your countertops using laser measurement technology.</p>
                </div>
                <div class="process-step">
                    <div class="process-number">3</div>
                    <h3>Expert Fabrication</h3>
                    <p>Your countertops are precision-cut and polished at our Boca Raton facility with CNC machinery.</p>
                </div>
                <div class="process-step">
                    <div class="process-number">4</div>
                    <h3>Professional Install</h3>
                    <p>Our certified installers deliver and install your countertops with minimal disruption to your home.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Frequently Asked Questions</h2>

            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How much do kitchen quartz countertops cost?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Kitchen quartz countertops in South Florida typically range from $50-$150 per square foot installed, depending on the color, brand, and complexity of your project. Entry-level solid colors start around $50/sf, while premium Calacatta and exotic patterns can reach $150/sf. Use our <a href="quote-calculator">instant quote calculator</a> for a personalized estimate.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Is quartz better than granite for kitchens?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Quartz offers several advantages over granite for kitchen use: it's non-porous (won't harbor bacteria), requires no sealing, is more consistent in appearance, and is highly resistant to stains. Granite is a beautiful natural stone but requires annual sealing and is more prone to chipping. Both are excellent choices—it often comes down to aesthetic preference and maintenance expectations.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Can quartz be used in bathrooms with high humidity?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Absolutely! Quartz is ideal for South Florida bathrooms. Its non-porous surface is completely resistant to moisture, mold, and mildew—unlike natural stone which can absorb water. Quartz won't warp, stain, or deteriorate in humid conditions, making it perfect for vanities, shower surrounds, and tub decks.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>How long does countertop installation take?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Most residential projects are completed within 1 week from template to installation. The actual installation day typically takes 2-4 hours for a standard kitchen. Larger projects or those requiring multiple slabs may take an additional day. We coordinate scheduling to minimize disruption to your daily routine.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you remove and dispose of old countertops?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        Yes, we offer old countertop removal and disposal as an add-on service for $250. This includes careful removal to protect your cabinets, hauling away the old material, and proper disposal. Many homeowners choose this option for a hassle-free experience.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>What edge profiles do you offer?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        We offer a full range of edge profiles including Eased (standard, included), Beveled, Half Bullnose, Full Bullnose, Ogee, and Waterfall edges. Premium edge profiles add $12-$40 per linear foot depending on complexity. Our design consultants can help you choose the perfect edge to complement your space.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section-full">
        <div class="container">
            <h2>Ready to Transform Your Kitchen or Bathroom?</h2>
            <p>Get a free in-home consultation and estimate. We'll help you find the perfect quartz for your space.</p>
            <div class="cta-buttons">
                <a href="tel:7203241436" class="btn btn-dark"><i class="bi bi-telephone"></i> Call (720) 324-1436</a>
                <a href="quote-calculator" class="btn btn-outline-dark"><i class="bi bi-calculator"></i> Get Instant Quote</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Visit Our Showroom</h4>
                    <p>Located at Englert Arts Inc.</p>
                    <a href="https://www.google.com/maps?q=1021+S+Rogers+Cir+%2318,+Boca+Raton,+FL+33487" target="_blank" rel="noopener">
                        1021 S Rogers Cir #18<br>Boca Raton, FL 33487
                    </a>
                    <p style="margin-top: 1rem;"><strong>Hours:</strong> Mon-Sun 8AM-6PM</p>
                </div>
                <div class="footer-col">
                    <h4>Quartz Countertop Services</h4>
                    <ul>
                        <li><a href="quartz-brands">Quartz Product Selection</a></li>
                        <li><a href="kitchen-bath">Kitchen & Bathroom Countertops</a></li>
                        <li><a href="commercial">Commercial Countertop Installation</a></li>
                        <li><a href="gallery">Inspiration Gallery</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Service Areas</h4>
                    <ul class="service-areas">
                        <li><a href="boca-raton">Boca Raton</a></li>
                        <li><a href="fort-lauderdale">Fort Lauderdale</a></li>
                        <li><a href="miami">Miami</a></li>
                        <li><a href="west-palm-beach">West Palm Beach</a></li>
                        <li><a href="delray-beach">Delray Beach</a></li>
                        <li><a href="locations">All South Florida Locations</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Griffin Quartz</h4>
                    <p><strong>Phone:</strong> <a href="tel:7203241436">(720) 324-1436</a></p>
                    <p><strong>Email:</strong> <a href="mailto:info@griffinquartz.com">info@griffinquartz.com</a></p>
                    <p style="margin-top: 1rem;"><a href="/#contact-form" class="btn btn-primary btn-sm">Get FREE Quote</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Griffin Quartz | South Florida's Premier Quartz Countertop Installers</p>
                <p class="footer-areas">Proudly serving Palm Beach County, Broward County, and Miami-Dade County including Boca Raton, Fort Lauderdale, Miami, West Palm Beach, Delray Beach, Hollywood, Pompano Beach, Coral Gables, Miami Beach, Aventura, and surrounding areas.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                const isActive = item.classList.contains('active');

                // Close all other items
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));

                // Toggle current item
                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });

        // Gallery Tab Filtering
        document.querySelectorAll('.gallery-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Update active tab
                document.querySelectorAll('.gallery-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const filter = tab.dataset.filter;
                const grid = document.querySelector('.gallery-grid');
                grid.dataset.filter = filter;

                // Show/hide items based on filter
                document.querySelectorAll('.gallery-item').forEach(item => {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
