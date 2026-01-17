<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>Quartz Color Visualizer & Design Studio | Griffin Quartz</title>
    <meta name="description" content="Interactive quartz color visualizer and wall color palette tool. See how countertops look in real spaces and discover complementary wall colors. Serving South Florida.">
    <meta name="keywords" content="quartz color visualizer, countertop color picker, wall color palette, kitchen design tool, quartz colors South Florida">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://soflocountertops.com/color-visualizer">

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
                            <li><a href="color-visualizer">Design Studio</a></li>
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
            <h1>Design Studio</h1>
            <p>Explore quartz colors and discover the perfect palette for your dream space</p>
        </div>
    </section>

    <!-- Quartz Color Visualizer -->
    <section class="visualizer-section">
        <div class="container">
            <div class="section-intro">
                <h2>Quartz Color Explorer</h2>
                <p>Select a color to see the slab and matching inspiration</p>
            </div>

            <div class="studio-layout">
                <!-- Left: Pantone Card + Photo Stack -->
                <div class="preview-stack">
                    <!-- Pantone Style Card -->
                    <div class="pantone-card-lg" id="pantoneCard">
                        <div class="pantone-swatch" id="pantoneSwatch"></div>
                        <div class="pantone-label">
                            <span class="pantone-name" id="pantoneName">Calacatta Luxe</span>
                            <span class="pantone-collection" id="pantoneCollection">Marble Collection</span>
                        </div>
                    </div>

                    <!-- Room Photo -->
                    <div class="room-preview">
                        <img src="images/swatch-calacatta-luxe.webp" alt="Room preview with selected quartz" class="room-image" id="roomImage">
                    </div>
                </div>

                <!-- Right: Color Swatches Grid -->
                <div class="swatch-panel">
                    <h3>Select a Quartz Color</h3>

                    <div class="swatch-categories">
                        <button class="cat-btn active" data-cat="all">All</button>
                        <button class="cat-btn" data-cat="white">Whites</button>
                        <button class="cat-btn" data-cat="marble">Marbles</button>
                        <button class="cat-btn" data-cat="dark">Darks</button>
                        <button class="cat-btn" data-cat="warm">Warm</button>
                    </div>

                    <div class="color-swatches-v2" id="colorSwatches">
                        <!-- White & Light -->
                        <div class="swatch-v2" data-image="images/swatch-arctic-white.webp" data-name="Arctic White" data-category="white" data-code="White Collection" data-color="#f5f5f5">
                            <div class="swatch-preview" style="background: url('images/swatch-arctic-white.webp') center/cover;"></div>
                            <span>Arctic White</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-cotton-white.webp" data-name="Cotton White" data-category="white" data-code="White Collection" data-color="#faf8f5">
                            <div class="swatch-preview" style="background: url('images/swatch-cotton-white.webp') center/cover;"></div>
                            <span>Cotton White</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-frost.webp" data-name="Frost" data-category="white" data-code="White Collection" data-color="#e8e4df">
                            <div class="swatch-preview" style="background: url('images/swatch-frost.webp') center/cover;"></div>
                            <span>Frost</span>
                        </div>

                        <!-- Marble Look -->
                        <div class="swatch-v2 active" data-image="images/swatch-calacatta-luxe.webp" data-name="Calacatta Luxe" data-category="marble" data-code="Marble Collection" data-color="#f8f6f3">
                            <div class="swatch-preview" style="background: url('images/swatch-calacatta-luxe.webp') center/cover;"></div>
                            <span>Calacatta Luxe</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-carrara-mist.webp" data-name="Carrara Mist" data-category="marble" data-code="Marble Collection" data-color="#f0eeeb">
                            <div class="swatch-preview" style="background: url('images/swatch-carrara-mist.webp') center/cover;"></div>
                            <span>Carrara Mist</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-statuario.webp" data-name="Statuario" data-category="marble" data-code="Marble Collection" data-color="#e5e2de">
                            <div class="swatch-preview" style="background: url('images/swatch-statuario.webp') center/cover;"></div>
                            <span>Statuario</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-calacatta-gold.webp" data-name="Calacatta Gold" data-category="marble" data-code="Marble Collection" data-color="#f2ede6">
                            <div class="swatch-preview" style="background: url('images/swatch-calacatta-gold.webp') center/cover;"></div>
                            <span>Calacatta Gold</span>
                        </div>

                        <!-- Dark Collection -->
                        <div class="color-chip" data-cat="dark" data-name="Midnight Black" data-collection="Dark Collection" data-color="linear-gradient(135deg, #1A1A1A 0%, #2D2D2D 50%, #1A1A1A 100%)" data-img="images/commercial-bar-black-gold-quartz-restaurant.webp">
                            <div class="chip-color" style="background: linear-gradient(135deg, #1A1A1A 0%, #2D2D2D 50%, #1A1A1A 100%);"></div>
                            <span class="chip-name">Midnight Black</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-charcoal.webp" data-name="Charcoal" data-category="dark" data-code="Dark Collection" data-color="#2d2d2d">
                            <div class="swatch-preview" style="background: url('images/swatch-charcoal.webp') center/cover;"></div>
                            <span>Charcoal</span>
                        </div>
                        <div class="color-chip" data-cat="dark" data-name="Storm Gray" data-collection="Dark Collection" data-color="linear-gradient(135deg, #6B6B6B 0%, #4A4A4A 50%, #5A5A5A 100%)" data-img="images/modern-kitchen-gray-quartz-wood-slats.webp">
                            <div class="chip-color" style="background: linear-gradient(135deg, #6B6B6B 0%, #4A4A4A 50%, #5A5A5A 100%);"></div>
                            <span class="chip-name">Storm Gray</span>
                        </div>

                        <!-- Warm Tones -->
                        <div class="swatch-v2" data-image="images/swatch-sahara-beige.webp" data-name="Sahara Beige" data-category="warm" data-code="Warm Collection" data-color="#d4c4b0">
                            <div class="swatch-preview" style="background: url('images/swatch-sahara-beige.webp') center/cover;"></div>
                            <span>Sahara Beige</span>
                        </div>
                        <div class="swatch-v2" data-image="images/swatch-cafe-brown.webp" data-name="Café Brown" data-category="warm" data-code="Warm Collection" data-color="#a08060">
                            <div class="swatch-preview" style="background: url('images/swatch-cafe-brown.webp') center/cover;"></div>
                            <span>Café Brown</span>
                        </div>
                        <div class="color-chip" data-cat="warm" data-name="Ivory Coast" data-collection="Warm Collection" data-color="#EAE0D0" data-img="images/quartz-samples-gold-hardware-luxury.webp">
                            <div class="chip-color" style="background: #EAE0D0;"></div>
                            <span class="chip-name">Ivory Coast</span>
                        </div>
                    </div>

                    <a href="quote-calculator" class="btn btn-primary btn-full">Get Instant Quote</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Wall Color Palette Studio -->
    <section class="palette-studio-section">
        <div class="container">
            <!-- Luxurious Intro Card -->
            <div class="palette-intro-card">
                <div class="intro-visual">
                    <div class="color-drip drip-1"></div>
                    <div class="color-drip drip-2"></div>
                    <div class="color-drip drip-3"></div>
                    <div class="color-drip drip-4"></div>
                    <div class="color-drip drip-5"></div>
                    <div class="brush-icon">
                        <i class="bi bi-brush"></i>
                    </div>
                </div>
                <div class="intro-content">
                    <span class="intro-tag">Wall Color Palette Studio</span>
                    <h2>Complete Your Vision</h2>
                    <p>Your new quartz countertops deserve the perfect backdrop. Explore curated wall color palettes designed by interior experts to complement your stone and elevate your space to new heights of luxury.</p>
                    <div class="intro-features">
                        <div class="intro-feature">
                            <i class="bi bi-palette2"></i>
                            <span>Designer Palettes</span>
                        </div>
                        <div class="intro-feature">
                            <i class="bi bi-house-heart"></i>
                            <span>Room Inspiration</span>
                        </div>
                        <div class="intro-feature">
                            <i class="bi bi-download"></i>
                            <span>Save Your Colors</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Room Palettes -->
            <div class="palette-rooms">
                <!-- Room 1 -->
                <div class="palette-room-card">
                    <div class="room-image-wrap">
                        <img src="images/luxury-white-kitchen-arched-windows-gold.webp" alt="Modern Elegance Kitchen">
                        <div class="room-style-tag">Modern Elegance</div>
                    </div>
                    <div class="room-palette-bar">
                        <div class="palette-dot" style="background: #F5F3EF;" data-name="Alabaster"></div>
                        <div class="palette-dot" style="background: #E8E3DA;" data-name="Swiss Coffee"></div>
                        <div class="palette-dot" style="background: #D4C9B9;" data-name="Accessible Beige"></div>
                        <div class="palette-dot" style="background: #C2B9A7;" data-name="Balanced Beige"></div>
                        <div class="palette-dot" style="background: #9C8E7C;" data-name="Virtual Taupe"></div>
                    </div>
                    <p class="palette-tip-text">Warm neutrals complement white quartz beautifully</p>
                </div>

                <!-- Room 2 -->
                <div class="palette-room-card">
                    <div class="room-image-wrap">
                        <img src="images/luxury-bathroom-black-marble-gold-fixtures.webp" alt="Dramatic Spa Bathroom">
                        <div class="room-style-tag">Dramatic Spa</div>
                    </div>
                    <div class="room-palette-bar">
                        <div class="palette-dot" style="background: #2C3E50;" data-name="Naval"></div>
                        <div class="palette-dot" style="background: #4A4A4A;" data-name="Iron Ore"></div>
                        <div class="palette-dot" style="background: #3D4F4F;" data-name="Dark Night"></div>
                        <div class="palette-dot" style="background: #5C5D5E;" data-name="Peppercorn"></div>
                        <div class="palette-dot" style="background: #D4AF37;" data-name="Auric Gold"></div>
                    </div>
                    <p class="palette-tip-text">Bold colors create a luxurious spa atmosphere</p>
                </div>

                <!-- Room 3 -->
                <div class="palette-room-card">
                    <div class="room-image-wrap">
                        <img src="images/coastal-kitchen-marble-island-coffered-ceiling.webp" alt="Coastal Retreat Kitchen">
                        <div class="room-style-tag">Coastal Retreat</div>
                    </div>
                    <div class="room-palette-bar">
                        <div class="palette-dot" style="background: #E0EBE8;" data-name="Sea Salt"></div>
                        <div class="palette-dot" style="background: #B8D4E3;" data-name="Watery"></div>
                        <div class="palette-dot" style="background: #6B9AC4;" data-name="Denim"></div>
                        <div class="palette-dot" style="background: #537B9D;" data-name="Smoky Blue"></div>
                        <div class="palette-dot" style="background: #FFFFFF;" data-name="Pure White"></div>
                    </div>
                    <p class="palette-tip-text">Ocean blues bring beach vibes indoors</p>
                </div>

                <!-- Room 4 -->
                <div class="palette-room-card">
                    <div class="room-image-wrap">
                        <img src="images/mediterranean-kitchen-quartz-arched-window.webp" alt="Mediterranean Villa Kitchen">
                        <div class="room-style-tag">Mediterranean Villa</div>
                    </div>
                    <div class="room-palette-bar">
                        <div class="palette-dot" style="background: #F5E6D3;" data-name="Creamy"></div>
                        <div class="palette-dot" style="background: #D9C5A0;" data-name="Whole Wheat"></div>
                        <div class="palette-dot" style="background: #C4A77D;" data-name="Camel"></div>
                        <div class="palette-dot" style="background: #8B7355;" data-name="Toasted Pine Nut"></div>
                        <div class="palette-dot" style="background: #6B4423;" data-name="Terracotta"></div>
                    </div>
                    <p class="palette-tip-text">Earth tones create welcoming warmth</p>
                </div>

                <!-- Room 5 -->
                <div class="palette-room-card">
                    <div class="room-image-wrap">
                        <img src="images/outdoor-kitchen-white-marble-waterfall-modern.webp" alt="Outdoor Oasis">
                        <div class="room-style-tag">Outdoor Oasis</div>
                    </div>
                    <div class="room-palette-bar">
                        <div class="palette-dot" style="background: #87A96B;" data-name="Asparagus"></div>
                        <div class="palette-dot" style="background: #4F7942;" data-name="Fern"></div>
                        <div class="palette-dot" style="background: #8FBC8F;" data-name="Sage"></div>
                        <div class="palette-dot" style="background: #C4B7A6;" data-name="Stone"></div>
                        <div class="palette-dot" style="background: #36454F;" data-name="Charcoal"></div>
                    </div>
                    <p class="palette-tip-text">Natural greens blend with outdoor spaces</p>
                </div>
            </div>

            <!-- My Palette Builder -->
            <div class="my-palette-builder">
                <h3>My Color Palette</h3>
                <p>Click any color above to add it to your palette</p>
                <div class="palette-slots">
                    <div class="palette-slot" id="slot1">
                        <span class="slot-label">Wall</span>
                        <span class="slot-hex">#F5F3EF</span>
                    </div>
                    <div class="palette-slot" id="slot2">
                        <span class="slot-label">Trim</span>
                        <span class="slot-hex">#FFFFFF</span>
                    </div>
                    <div class="palette-slot" id="slot3">
                        <span class="slot-label">Accent</span>
                        <span class="slot-hex">#D4C9B9</span>
                    </div>
                </div>
                <div class="palette-actions">
                    <button class="btn btn-outline" id="resetBtn"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                    <button class="btn btn-primary" id="saveBtn"><i class="bi bi-clipboard"></i> Copy Palette</button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="page-cta">
        <div class="container">
            <h2>Ready to Bring Your Vision to Life?</h2>
            <p>Our design experts can help you choose the perfect quartz and wall colors for your space.</p>
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
                        <li><a href="color-visualizer">Design Studio</a></li>
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
    document.addEventListener('DOMContentLoaded', function() {
        // ===== Quartz Color Visualizer =====
        const chips = document.querySelectorAll('.color-chip');
        const pantoneSwatch = document.getElementById('pantoneSwatch');
        const pantoneName = document.getElementById('pantoneName');
        const pantoneCollection = document.getElementById('pantoneCollection');
        const inspirationImg = document.getElementById('inspirationImg');
        const catBtns = document.querySelectorAll('.cat-btn');

        // Set initial state
        const firstChip = document.querySelector('.color-chip.active');
        if (firstChip) {
            updatePreview(firstChip);
        }

        chips.forEach(chip => {
            chip.addEventListener('click', function() {
                chips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                updatePreview(this);
            });
        });

        function updatePreview(chip) {
            const color = chip.dataset.color;
            const name = chip.dataset.name;
            const collection = chip.dataset.collection;
            const img = chip.dataset.img;

            // Update Pantone card
            pantoneSwatch.style.background = color;
            pantoneName.textContent = name;
            pantoneCollection.textContent = collection;

            // Update inspiration image with fade
            inspirationImg.style.opacity = '0';
            setTimeout(() => {
                inspirationImg.src = img;
                inspirationImg.style.opacity = '1';
            }, 150);
        }

        // Category filtering
        catBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                catBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const cat = this.dataset.cat;
                chips.forEach(chip => {
                    if (cat === 'all' || chip.dataset.cat === cat) {
                        chip.style.display = 'flex';
                    } else {
                        chip.style.display = 'none';
                    }
                });
            });
        });

        // ===== Wall Palette Builder =====
        const paletteDots = document.querySelectorAll('.palette-dot');
        const slots = document.querySelectorAll('.palette-slot');
        let currentSlot = 0;

        // Initialize slots with default colors
        slots[0].style.background = '#F5F3EF';
        slots[1].style.background = '#FFFFFF';
        slots[2].style.background = '#D4C9B9';

        paletteDots.forEach(dot => {
            // Tooltip on hover
            dot.addEventListener('mouseenter', function() {
                const name = this.dataset.name;
                this.setAttribute('title', name);
            });

            // Click to add to palette
            dot.addEventListener('click', function() {
                const color = this.style.background;
                const hex = rgbToHex(getComputedStyle(this).backgroundColor);

                slots[currentSlot].style.background = color;
                slots[currentSlot].querySelector('.slot-hex').textContent = hex;

                // Visual feedback
                this.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);

                currentSlot = (currentSlot + 1) % 3;
            });
        });

        // Reset button
        document.getElementById('resetBtn').addEventListener('click', function() {
            const defaults = [
                { bg: '#F5F3EF', hex: '#F5F3EF' },
                { bg: '#FFFFFF', hex: '#FFFFFF' },
                { bg: '#D4C9B9', hex: '#D4C9B9' }
            ];
            slots.forEach((slot, i) => {
                slot.style.background = defaults[i].bg;
                slot.querySelector('.slot-hex').textContent = defaults[i].hex;
            });
            currentSlot = 0;
        });

        // Save/Copy button
        document.getElementById('saveBtn').addEventListener('click', function() {
            const colors = [];
            slots.forEach(slot => {
                colors.push(slot.querySelector('.slot-hex').textContent);
            });

            const text = `Griffin Quartz Color Palette\nWall: ${colors[0]}\nTrim: ${colors[1]}\nAccent: ${colors[2]}`;

            navigator.clipboard.writeText(text).then(() => {
                this.innerHTML = '<i class="bi bi-check"></i> Copied!';
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-clipboard"></i> Copy Palette';
                }, 2000);
            });
        });

        // Helper function
        function rgbToHex(rgb) {
            const result = rgb.match(/\d+/g);
            if (!result) return '#000000';
            return '#' + result.slice(0, 3).map(x => {
                const hex = parseInt(x).toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            }).join('').toUpperCase();
        }
    });
    </script>
</body>
</html>
