<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Griffin Quartz blog - Expert guides, tips, and insights about quartz countertops, installation, pricing, and design for South Florida homeowners.">
    <title>Quartz Countertop Blog | Tips, Guides & Inspiration | Griffin Quartz</title>
    <link rel="canonical" href="https://soflocountertops.com/blog/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../styles.css">
    <style>
        .blog-hero {
            background: linear-gradient(135deg, var(--color-primary) 0%, #1a1a2e 100%);
            padding: 6rem 0 4rem;
            text-align: center;
        }
        .blog-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            color: #fff;
            margin-bottom: 1rem;
        }
        .blog-hero p {
            color: rgba(255,255,255,0.85);
            font-size: 1.125rem;
            max-width: 600px;
            margin: 0 auto;
        }
        .blog-grid {
            padding: 4rem 0;
            background: var(--color-light);
        }
        .blog-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .blog-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: flex;
            flex-direction: column;
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        .blog-card-image {
            aspect-ratio: 16/10;
            overflow: hidden;
            background: #f0f0f0;
        }
        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .blog-card-content {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .blog-card-meta {
            font-size: 0.8125rem;
            color: var(--color-gray);
            margin-bottom: 0.75rem;
        }
        .blog-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--color-primary);
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }
        .blog-card p {
            font-size: 0.9375rem;
            color: var(--color-secondary);
            line-height: 1.6;
            flex: 1;
        }
        .blog-card-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-accent);
            font-weight: 600;
            font-size: 0.875rem;
            margin-top: 1rem;
        }
        .blog-card-link i {
            transition: transform 0.3s;
        }
        .blog-card:hover .blog-card-link i {
            transform: translateX(4px);
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
        <div class="container">
            <a href="/" class="logo"><img src="../images/griffin-quartz-logo.webp" alt="Griffin Quartz"></a>

            <nav class="nav" id="mainNav">
                <ul class="nav-list">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Our Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="../our-services">Countertop Services</a></li>
                            <li><a href="../quartz-brands">Quartz Product Selection</a></li>
                            <li><a href="../kitchen-bath">Countertops for Kitchens & Baths</a></li>
                            <li><a href="../commercial">Commercial Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Installation Locations</a>
                        <ul class="dropdown-menu">
                            <li><a href="../locations">All Service Areas</a></li>
                            <li><a href="../south-florida">South Florida</a></li>
                            <li><a href="../boca-raton">Boca Raton, FL</a></li>
                            <li><a href="../boynton-beach">Boynton Beach, FL</a></li>
                            <li><a href="../coconut-creek">Coconut Creek, FL</a></li>
                            <li><a href="../coral-springs">Coral Springs, FL</a></li>
                            <li><a href="../deerfield-beach">Deerfield Beach, FL</a></li>
                            <li><a href="../delray-beach">Delray Beach, FL</a></li>
                            <li><a href="../fort-lauderdale">Fort Lauderdale, FL</a></li>
                            <li><a href="../hollywood">Hollywood, FL</a></li>
                            <li><a href="../miami">Miami, FL</a></li>
                            <li><a href="../parkland">Parkland, FL</a></li>
                            <li><a href="../pompano-beach">Pompano Beach, FL</a></li>
                            <li><a href="../west-palm-beach">West Palm Beach, FL</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="../gallery" class="nav-link">Inspiration Gallery</a></li>
                    <li class="nav-item"><a href="../contact" class="nav-link">Contact Us</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Resources</a>
                        <ul class="dropdown-menu">
                            <li><a href="../color-visualizer">Color Visualizer</a></li>
                            <li><a href="../space-design-tool">Space Design Tool</a></li>
                            <li><a href="../quote-calculator">Instant Quote Calculator</a></li>
                            <li><a href="./">Blog</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="tel:7203241436" class="nav-link phone-link">720-324-1436</a></li>
                </ul>
            </nav>

            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Blog Hero -->
    <section class="blog-hero">
        <div class="container">
            <h1>Quartz Countertop Blog</h1>
            <p>Expert guides, tips, and inspiration for your countertop project in South Florida</p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="blog-grid">
        <div class="blog-cards">
            <a href="quartz-countertops-cost" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/hotel-buffet-white-marble-counter-flowers.webp" alt="Quartz countertops cost guide" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Sep 01, 2025</span>
                    <h2>How Much Are Quartz Countertops in South Florida</h2>
                    <p>Get a clear picture of quartz countertop pricing in South Florida. Learn about factors that affect cost and what to expect for your project.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="quartz-pricing-guide" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/luxury-white-kitchen-arched-windows-gold.webp" alt="Quartz pricing guide" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Aug 15, 2025</span>
                    <h2>Complete Quartz Countertop Pricing Guide</h2>
                    <p>Everything you need to know about quartz countertop pricing, from budget-friendly options to premium designer selections.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="white-quartz-countertops" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/cambria-products/brittanicca.jpg" alt="White quartz countertops" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Aug 01, 2025</span>
                    <h2>White Quartz Countertops: The Ultimate Guide</h2>
                    <p>Discover why white quartz countertops are the most popular choice for South Florida kitchens and bathrooms.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="top-10-countertop-installation" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/poolside-white-marble-island-palms-dusk.webp" alt="Countertop installation tips" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jul 20, 2025</span>
                    <h2>Top 10 Countertop Installation Tips</h2>
                    <p>Expert tips to ensure your countertop installation goes smoothly. From preparation to final inspection, here's what you need to know.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" style="padding: 4rem 0; background: var(--color-primary); text-align: center;">
        <div class="container">
            <h2 style="font-family: 'Playfair Display', serif; font-size: 2rem; color: #fff; margin-bottom: 1rem;">Ready to Start Your Project?</h2>
            <p style="color: rgba(255,255,255,0.85); margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">Get a free quote for your quartz countertop installation in South Florida.</p>
            <a href="/#contact-form" class="btn btn-primary">Get FREE Quote</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <a href="/" class="footer-logo"><img src="../images/griffin-quartz-logo.webp" alt="Griffin Quartz" style="height: 40px;"></a>
                    <p>South Florida's premier quartz countertop installation company.</p>
                </div>
                <div class="footer-col">
                    <h4>Showroom</h4>
                    <p>1021 S Rogers Cir #18<br>Boca Raton, FL 33487</p>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <p><a href="tel:7203241436">(720) 324-1436</a></p>
                    <p><a href="mailto:info@griffinquartz.com">info@griffinquartz.com</a></p>
                </div>
                <div class="footer-col">
                    <h4>Service Areas</h4>
                    <p>Boca Raton, Fort Lauderdale, Miami, West Palm Beach & all of South Florida</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Griffin Quartz. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="../script.js"></script>
</body>
</html>
