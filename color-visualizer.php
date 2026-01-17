<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>Quartz Color Visualizer | See Countertops in Your Kitchen | Griffin Quartz</title>
    <meta name="description" content="Visualize how different quartz countertop colors will look in your kitchen or bathroom. Try our free interactive color visualizer tool. Serving Boca Raton, Fort Lauderdale, Miami & South Florida.">
    <meta name="keywords" content="quartz color visualizer, countertop color picker, kitchen countertop visualizer, quartz colors South Florida, Calacatta quartz, Carrara quartz, white quartz countertops">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://soflocountertops.com/color-visualizer">

    <!-- Open Graph -->
    <meta property="og:title" content="Quartz Color Visualizer | Griffin Quartz">
    <meta property="og:description" content="Try different quartz countertop colors in our free interactive visualizer. See how Calacatta, Carrara, and other premium quartz looks in real kitchens.">
    <meta property="og:url" content="https://soflocountertops.com/color-visualizer">
    <meta property="og:type" content="website">

    <!-- Fonts and Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
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
                            <li><a href="locations">Explore All Locations</a></li>
                            <li><a href="boca-raton">Boca Raton, FL</a></li>
                            <li><a href="fort-lauderdale">Fort Lauderdale, FL</a></li>
                            <li><a href="miami">Miami, FL</a></li>
                            <li><a href="west-palm-beach">West Palm Beach, FL</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Resources</a>
                        <ul class="dropdown-menu">
                            <li><a href="color-visualizer">Color Visualizer</a></li>
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

    <!-- Page Hero -->
    <section class="page-hero visualizer-hero">
        <div class="container">
            <h1>Quartz Color Visualizer</h1>
            <p>See how different quartz colors will look in your kitchen. Click on any swatch below to preview it on the countertops.</p>
        </div>
    </section>

    <!-- Visualizer Tool -->
    <section class="visualizer-section">
        <div class="container">
            <div class="visualizer-wrapper">
                <!-- Kitchen Preview -->
                <div class="visualizer-preview">
                    <div class="kitchen-container">
                        <!-- Base kitchen image -->
                        <img src="images/luxury-white-kitchen-arched-windows-gold.webp" alt="Kitchen preview" class="kitchen-base" id="kitchenBase">
                        <!-- Countertop overlay that changes color -->
                        <div class="countertop-overlay" id="countertopOverlay"></div>
                        <!-- Selected color name -->
                        <div class="selected-color-badge" id="selectedColorBadge">
                            <span id="selectedColorName">Calacatta Luxe</span>
                        </div>
                    </div>
                </div>

                <!-- Color Swatches -->
                <div class="visualizer-controls">
                    <h3>Select a Quartz Color</h3>
                    <p class="swatch-instruction">Click any swatch to preview it on the countertops</p>

                    <div class="color-categories">
                        <button class="category-btn active" data-category="all">All Colors</button>
                        <button class="category-btn" data-category="white">White & Light</button>
                        <button class="category-btn" data-category="marble">Marble Look</button>
                        <button class="category-btn" data-category="dark">Dark & Bold</button>
                        <button class="category-btn" data-category="warm">Warm Tones</button>
                    </div>

                    <div class="color-swatches" id="colorSwatches">
                        <!-- White & Light -->
                        <div class="swatch active" data-color="#f5f5f5" data-pattern="solid" data-name="Arctic White" data-category="white" title="Arctic White">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-f7734e52-3538-4cee-919f-3c3c7592a09b_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Arctic White</span>
                        </div>
                        <div class="swatch" data-color="#faf8f5" data-pattern="solid" data-name="Cotton White" data-category="white" title="Cotton White">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-a19a946a-f9c0-4bb4-bd50-a343b51d5495_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Cotton White</span>
                        </div>
                        <div class="swatch" data-color="#e8e4df" data-pattern="solid" data-name="Frost" data-category="white" title="Frost">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-04837a1f-7071-4be7-9bcc-f97c6af486d9_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Frost</span>
                        </div>

                        <!-- Marble Look -->
                        <div class="swatch" data-color="#f8f6f3" data-pattern="calacatta" data-name="Calacatta Luxe" data-category="marble" title="Calacatta Luxe">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-73cc11db-222d-4622-9742-4cf0833ba929_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Calacatta Luxe</span>
                        </div>
                        <div class="swatch" data-color="#f0eeeb" data-pattern="carrara" data-name="Carrara Mist" data-category="marble" title="Carrara Mist">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-da5ef41c-edec-4b46-b96f-d1f2def43638_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Carrara Mist</span>
                        </div>
                        <div class="swatch" data-color="#e5e2de" data-pattern="statuario" data-name="Statuario" data-category="marble" title="Statuario">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-dd7ee3f1-483c-4c32-88b2-c06a57c0fe46_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Statuario</span>
                        </div>
                        <div class="swatch" data-color="#f2ede6" data-pattern="veined" data-name="Calacatta Gold" data-category="marble" title="Calacatta Gold">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-2cc4ec19-ffd3-44b0-8f1e-94d1f9fd9b49_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Calacatta Gold</span>
                        </div>

                        <!-- Dark & Bold -->
                        <div class="swatch" data-color="#1a1a1a" data-pattern="solid" data-name="Midnight Black" data-category="dark" title="Midnight Black">
                            <div class="swatch-color" style="background: url('images/commercial-bar-black-gold-quartz-restaurant.webp') center/cover;"></div>
                            <span class="swatch-name">Midnight Black</span>
                        </div>
                        <div class="swatch" data-color="#2d2d2d" data-pattern="solid" data-name="Charcoal" data-category="dark" title="Charcoal">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-0629076f-1975-44f8-806d-04f0d832f788_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Charcoal</span>
                        </div>
                        <div class="swatch" data-color="#3d3d3d" data-pattern="sparkle" data-name="Black Galaxy" data-category="dark" title="Black Galaxy">
                            <div class="swatch-color" style="background: url('images/quartz-samples-gold-hardware-luxury.webp') 33% center/cover;"></div>
                            <span class="swatch-name">Black Galaxy</span>
                        </div>
                        <div class="swatch" data-color="#4a4a4a" data-pattern="solid" data-name="Storm Gray" data-category="dark" title="Storm Gray">
                            <div class="swatch-color" style="background: url('images/modern-kitchen-gray-quartz-wood-slats.webp') center/cover;"></div>
                            <span class="swatch-name">Storm Gray</span>
                        </div>

                        <!-- Warm Tones -->
                        <div class="swatch" data-color="#d4c4b0" data-pattern="solid" data-name="Sahara Beige" data-category="warm" title="Sahara Beige">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-e54b6997-68a0-4862-b82a-791ba38f6535_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Sahara Beige</span>
                        </div>
                        <div class="swatch" data-color="#c9b99a" data-pattern="solid" data-name="Tuscan Sand" data-category="warm" title="Tuscan Sand">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-ce3ebffe-b91f-48c1-bba1-e7dde1047dd4_800x800.webp') center/cover;"></div>
                            <span class="swatch-name">Tuscan Sand</span>
                        </div>
                        <div class="swatch" data-color="#a08060" data-pattern="solid" data-name="Café Brown" data-category="warm" title="Café Brown">
                            <div class="swatch-color" style="background: url('images/gempages_466492372277003100-16c97aa4-831d-47c0-a836-f0cca3c63325_800x800.webp') 0% center/cover;"></div>
                            <span class="swatch-name">Café Brown</span>
                        </div>
                        <div class="swatch" data-color="#e8ddd0" data-pattern="solid" data-name="Ivory Coast" data-category="warm" title="Ivory Coast">
                            <div class="swatch-color" style="background: url('images/quartz-samples-gold-hardware-luxury.webp') 100% center/cover;"></div>
                            <span class="swatch-name">Ivory Coast</span>
                        </div>
                    </div>

                    <div class="visualizer-cta">
                        <p>Love what you see?</p>
                        <a href="quote-calculator" class="btn btn-primary">Get Instant Quote</a>
                        <a href="#contact-form" class="btn btn-outline">Schedule Free Consultation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="visualizer-info">
        <div class="container">
            <div class="info-grid">
                <div class="info-card">
                    <i class="bi bi-palette2"></i>
                    <h3>200+ Colors Available</h3>
                    <p>This visualizer shows our most popular colors. Visit our showroom in Boca Raton to see our complete collection of over 200 quartz colors and patterns.</p>
                </div>
                <div class="info-card">
                    <i class="bi bi-house-door"></i>
                    <h3>Free In-Home Samples</h3>
                    <p>Can't decide? We'll bring samples directly to your home so you can see how they look with your cabinets, flooring, and lighting.</p>
                </div>
                <div class="info-card">
                    <i class="bi bi-camera"></i>
                    <h3>Custom Visualization</h3>
                    <p>Want to see quartz on YOUR kitchen? Send us a photo and we'll create a custom mockup showing exactly how your new countertops will look.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="page-cta">
        <div class="container">
            <h2>Ready to Transform Your Kitchen?</h2>
            <p>Get a free in-home consultation and see our complete quartz collection in person.</p>
            <div class="cta-buttons">
                <a href="tel:7203241436" class="btn btn-primary"><i class="bi bi-telephone"></i> Call (720) 324-1436</a>
                <a href="quote-calculator" class="btn btn-outline">Get Instant Quote</a>
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
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="color-visualizer">Color Visualizer</a></li>
                        <li><a href="quote-calculator">Instant Quote Calculator</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Griffin Quartz</h4>
                    <p><strong>Phone:</strong> <a href="tel:7203241436">(720) 324-1436</a></p>
                    <p><strong>Email:</strong> <a href="mailto:info@griffinquartz.com">info@griffinquartz.com</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Griffin Quartz | South Florida's Premier Quartz Countertop Installers</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
    // Color Visualizer functionality
    document.addEventListener('DOMContentLoaded', function() {
        const swatches = document.querySelectorAll('.swatch');
        const overlay = document.getElementById('countertopOverlay');
        const colorName = document.getElementById('selectedColorName');
        const categoryBtns = document.querySelectorAll('.category-btn');

        // Set initial state
        updateOverlay('#f8f6f3', 'calacatta', 'Calacatta Luxe');

        swatches.forEach(swatch => {
            swatch.addEventListener('click', function() {
                // Remove active from all swatches
                swatches.forEach(s => s.classList.remove('active'));
                // Add active to clicked swatch
                this.classList.add('active');

                const color = this.dataset.color;
                const pattern = this.dataset.pattern;
                const name = this.dataset.name;

                updateOverlay(color, pattern, name);
            });
        });

        function updateOverlay(color, pattern, name) {
            // Remove all pattern classes
            overlay.className = 'countertop-overlay';

            // Apply color/pattern
            if (pattern === 'solid') {
                overlay.style.background = color;
            } else if (pattern === 'calacatta') {
                overlay.classList.add('pattern-calacatta');
                overlay.style.background = '';
            } else if (pattern === 'carrara') {
                overlay.classList.add('pattern-carrara');
                overlay.style.background = '';
            } else if (pattern === 'statuario') {
                overlay.classList.add('pattern-statuario');
                overlay.style.background = '';
            } else if (pattern === 'veined') {
                overlay.classList.add('pattern-calacatta-gold');
                overlay.style.background = '';
            } else if (pattern === 'sparkle') {
                overlay.classList.add('pattern-galaxy');
                overlay.style.background = '';
            }

            // Update name
            colorName.textContent = name;

            // Add animation
            overlay.style.opacity = '0';
            setTimeout(() => {
                overlay.style.opacity = '0.85';
            }, 50);
        }

        // Category filtering
        categoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                categoryBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const category = this.dataset.category;

                swatches.forEach(swatch => {
                    if (category === 'all' || swatch.dataset.category === category) {
                        swatch.style.display = 'flex';
                    } else {
                        swatch.style.display = 'none';
                    }
                });
            });
        });
    });
    </script>
</body>
</html>
