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
            <h1>Design Studio</h1>
            <p>Explore quartz colors and discover the perfect wall palette for your dream space</p>
        </div>
    </section>

    <!-- Quartz Color Visualizer -->
    <section class="visualizer-section">
        <div class="container">
            <div class="section-intro">
                <h2>Quartz Color Explorer</h2>
                <p>Click on any swatch to see the quartz color and matching inspiration photo</p>
            </div>

            <div class="visualizer-wrapper-v2">
                <!-- Left: Preview with Pantone Card -->
                <div class="visualizer-preview-v2">
                    <!-- Pantone Style Card -->
                    <div class="pantone-card" id="pantoneCard">
                        <div class="pantone-color" id="pantoneColor"></div>
                        <div class="pantone-info">
                            <span class="pantone-name" id="pantoneName">Calacatta Luxe</span>
                            <span class="pantone-code" id="pantoneCode">Marble Collection</span>
                        </div>
                    </div>

                    <!-- Room Photo -->
                    <div class="room-preview">
                        <img src="images/gempages_466492372277003100-73cc11db-222d-4622-9742-4cf0833ba929_800x800.webp" alt="Room preview with selected quartz" class="room-image" id="roomImage">
                    </div>
                </div>

                <!-- Right: Color Swatches -->
                <div class="visualizer-controls-v2">
                    <h3>Select a Quartz Color</h3>

                    <div class="color-categories">
                        <button class="category-btn active" data-category="all">All</button>
                        <button class="category-btn" data-category="white">White</button>
                        <button class="category-btn" data-category="marble">Marble</button>
                        <button class="category-btn" data-category="dark">Dark</button>
                        <button class="category-btn" data-category="warm">Warm</button>
                    </div>

                    <div class="color-swatches-v2" id="colorSwatches">
                        <!-- White & Light -->
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-f7734e52-3538-4cee-919f-3c3c7592a09b_800x800.webp" data-name="Arctic White" data-category="white" data-code="White Collection" data-color="#f5f5f5">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-f7734e52-3538-4cee-919f-3c3c7592a09b_800x800.webp') center/cover;"></div>
                            <span>Arctic White</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-a19a946a-f9c0-4bb4-bd50-a343b51d5495_800x800.webp" data-name="Cotton White" data-category="white" data-code="White Collection" data-color="#faf8f5">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-a19a946a-f9c0-4bb4-bd50-a343b51d5495_800x800.webp') center/cover;"></div>
                            <span>Cotton White</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-04837a1f-7071-4be7-9bcc-f97c6af486d9_800x800.webp" data-name="Frost" data-category="white" data-code="White Collection" data-color="#e8e4df">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-04837a1f-7071-4be7-9bcc-f97c6af486d9_800x800.webp') center/cover;"></div>
                            <span>Frost</span>
                        </div>

                        <!-- Marble Look -->
                        <div class="swatch-v2 active" data-image="images/gempages_466492372277003100-73cc11db-222d-4622-9742-4cf0833ba929_800x800.webp" data-name="Calacatta Luxe" data-category="marble" data-code="Marble Collection" data-color="#f8f6f3">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-73cc11db-222d-4622-9742-4cf0833ba929_800x800.webp') center/cover;"></div>
                            <span>Calacatta Luxe</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-da5ef41c-edec-4b46-b96f-d1f2def43638_800x800.webp" data-name="Carrara Mist" data-category="marble" data-code="Marble Collection" data-color="#f0eeeb">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-da5ef41c-edec-4b46-b96f-d1f2def43638_800x800.webp') center/cover;"></div>
                            <span>Carrara Mist</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-dd7ee3f1-483c-4c32-88b2-c06a57c0fe46_800x800.webp" data-name="Statuario" data-category="marble" data-code="Marble Collection" data-color="#e5e2de">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-dd7ee3f1-483c-4c32-88b2-c06a57c0fe46_800x800.webp') center/cover;"></div>
                            <span>Statuario</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-2cc4ec19-ffd3-44b0-8f1e-94d1f9fd9b49_800x800.webp" data-name="Calacatta Gold" data-category="marble" data-code="Marble Collection" data-color="#f2ede6">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-2cc4ec19-ffd3-44b0-8f1e-94d1f9fd9b49_800x800.webp') center/cover;"></div>
                            <span>Calacatta Gold</span>
                        </div>

                        <!-- Dark & Bold -->
                        <div class="swatch-v2" data-image="images/commercial-bar-black-gold-quartz-restaurant.webp" data-name="Midnight Black" data-category="dark" data-code="Dark Collection" data-color="#1a1a1a">
                            <div class="swatch-preview" style="background: url('images/commercial-bar-black-gold-quartz-restaurant.webp') center/cover;"></div>
                            <span>Midnight Black</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-0629076f-1975-44f8-806d-04f0d832f788_800x800.webp" data-name="Charcoal" data-category="dark" data-code="Dark Collection" data-color="#2d2d2d">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-0629076f-1975-44f8-806d-04f0d832f788_800x800.webp') center/cover;"></div>
                            <span>Charcoal</span>
                        </div>
                        <div class="swatch-v2" data-image="images/modern-kitchen-gray-quartz-wood-slats.webp" data-name="Storm Gray" data-category="dark" data-code="Dark Collection" data-color="#4a4a4a">
                            <div class="swatch-preview" style="background: url('images/modern-kitchen-gray-quartz-wood-slats.webp') center/cover;"></div>
                            <span>Storm Gray</span>
                        </div>

                        <!-- Warm Tones -->
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-e54b6997-68a0-4862-b82a-791ba38f6535_800x800.webp" data-name="Sahara Beige" data-category="warm" data-code="Warm Collection" data-color="#d4c4b0">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-e54b6997-68a0-4862-b82a-791ba38f6535_800x800.webp') center/cover;"></div>
                            <span>Sahara Beige</span>
                        </div>
                        <div class="swatch-v2" data-image="images/gempages_466492372277003100-16c97aa4-831d-47c0-a836-f0cca3c63325_800x800.webp" data-name="Café Brown" data-category="warm" data-code="Warm Collection" data-color="#a08060">
                            <div class="swatch-preview" style="background: url('images/gempages_466492372277003100-16c97aa4-831d-47c0-a836-f0cca3c63325_800x800.webp') center/cover;"></div>
                            <span>Café Brown</span>
                        </div>
                        <div class="swatch-v2" data-image="images/quartz-samples-gold-hardware-luxury.webp" data-name="Ivory Coast" data-category="warm" data-code="Warm Collection" data-color="#e8ddd0">
                            <div class="swatch-preview" style="background: url('images/quartz-samples-gold-hardware-luxury.webp') center/cover;"></div>
                            <span>Ivory Coast</span>
                        </div>
                    </div>

                    <div class="visualizer-cta">
                        <a href="quote-calculator" class="btn btn-primary">Get Instant Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wall Color Palette Studio -->
    <section class="palette-studio">
        <div class="container">
            <div class="section-intro">
                <h2>Wall Color Palette Studio</h2>
                <p>Discover luxurious wall colors that perfectly complement your new quartz countertops. Click on any room to explore coordinating palettes.</p>
            </div>

            <!-- Room Gallery with Palette Tool -->
            <div class="palette-gallery">
                <!-- Room 1 -->
                <div class="palette-room" data-room="1">
                    <div class="room-card">
                        <div class="room-image-wrapper">
                            <img src="images/luxury-white-kitchen-arched-windows-gold.webp" alt="Luxury white kitchen">
                            <div class="room-overlay">
                                <span class="explore-btn"><i class="bi bi-palette"></i> Explore Palette</span>
                            </div>
                        </div>
                        <div class="room-info">
                            <h4>Modern Elegance</h4>
                            <p>White Calacatta + Warm Neutrals</p>
                        </div>
                    </div>
                    <div class="palette-panel" id="palette1">
                        <h4>Recommended Wall Colors</h4>
                        <div class="palette-colors">
                            <div class="palette-color" style="background: #F5F3EF;" data-name="Alabaster" data-hex="#F5F3EF">
                                <span class="color-tooltip">Alabaster</span>
                            </div>
                            <div class="palette-color" style="background: #E8E3DA;" data-name="Swiss Coffee" data-hex="#E8E3DA">
                                <span class="color-tooltip">Swiss Coffee</span>
                            </div>
                            <div class="palette-color" style="background: #D4C9B9;" data-name="Accessible Beige" data-hex="#D4C9B9">
                                <span class="color-tooltip">Accessible Beige</span>
                            </div>
                            <div class="palette-color" style="background: #C2B9A7;" data-name="Balanced Beige" data-hex="#C2B9A7">
                                <span class="color-tooltip">Balanced Beige</span>
                            </div>
                            <div class="palette-color" style="background: #9C8E7C;" data-name="Virtual Taupe" data-hex="#9C8E7C">
                                <span class="color-tooltip">Virtual Taupe</span>
                            </div>
                        </div>
                        <p class="palette-tip"><i class="bi bi-lightbulb"></i> These warm neutrals complement white quartz beautifully</p>
                    </div>
                </div>

                <!-- Room 2 -->
                <div class="palette-room" data-room="2">
                    <div class="room-card">
                        <div class="room-image-wrapper">
                            <img src="images/luxury-bathroom-black-marble-gold-fixtures.webp" alt="Luxury bathroom">
                            <div class="room-overlay">
                                <span class="explore-btn"><i class="bi bi-palette"></i> Explore Palette</span>
                            </div>
                        </div>
                        <div class="room-info">
                            <h4>Dramatic Spa</h4>
                            <p>Dark Marble + Deep Tones</p>
                        </div>
                    </div>
                    <div class="palette-panel" id="palette2">
                        <h4>Recommended Wall Colors</h4>
                        <div class="palette-colors">
                            <div class="palette-color" style="background: #2C3E50;" data-name="Naval" data-hex="#2C3E50">
                                <span class="color-tooltip">Naval</span>
                            </div>
                            <div class="palette-color" style="background: #4A4A4A;" data-name="Iron Ore" data-hex="#4A4A4A">
                                <span class="color-tooltip">Iron Ore</span>
                            </div>
                            <div class="palette-color" style="background: #3D4F4F;" data-name="Dark Night" data-hex="#3D4F4F">
                                <span class="color-tooltip">Dark Night</span>
                            </div>
                            <div class="palette-color" style="background: #5C5D5E;" data-name="Peppercorn" data-hex="#5C5D5E">
                                <span class="color-tooltip">Peppercorn</span>
                            </div>
                            <div class="palette-color" style="background: #D4AF37;" data-name="Auric" data-hex="#D4AF37">
                                <span class="color-tooltip">Auric Gold</span>
                            </div>
                        </div>
                        <p class="palette-tip"><i class="bi bi-lightbulb"></i> Bold colors create a luxurious spa atmosphere</p>
                    </div>
                </div>

                <!-- Room 3 -->
                <div class="palette-room" data-room="3">
                    <div class="room-card">
                        <div class="room-image-wrapper">
                            <img src="images/coastal-kitchen-marble-island-coffered-ceiling.webp" alt="Coastal kitchen">
                            <div class="room-overlay">
                                <span class="explore-btn"><i class="bi bi-palette"></i> Explore Palette</span>
                            </div>
                        </div>
                        <div class="room-info">
                            <h4>Coastal Retreat</h4>
                            <p>Carrara + Ocean Blues</p>
                        </div>
                    </div>
                    <div class="palette-panel" id="palette3">
                        <h4>Recommended Wall Colors</h4>
                        <div class="palette-colors">
                            <div class="palette-color" style="background: #E0EBE8;" data-name="Sea Salt" data-hex="#E0EBE8">
                                <span class="color-tooltip">Sea Salt</span>
                            </div>
                            <div class="palette-color" style="background: #B8D4E3;" data-name="Watery" data-hex="#B8D4E3">
                                <span class="color-tooltip">Watery</span>
                            </div>
                            <div class="palette-color" style="background: #6B9AC4;" data-name="Denim" data-hex="#6B9AC4">
                                <span class="color-tooltip">Denim</span>
                            </div>
                            <div class="palette-color" style="background: #537B9D;" data-name="Smoky Blue" data-hex="#537B9D">
                                <span class="color-tooltip">Smoky Blue</span>
                            </div>
                            <div class="palette-color" style="background: #FFFFFF;" data-name="Pure White" data-hex="#FFFFFF">
                                <span class="color-tooltip">Pure White</span>
                            </div>
                        </div>
                        <p class="palette-tip"><i class="bi bi-lightbulb"></i> Coastal blues bring the beach vibes indoors</p>
                    </div>
                </div>

                <!-- Room 4 -->
                <div class="palette-room" data-room="4">
                    <div class="room-card">
                        <div class="room-image-wrapper">
                            <img src="images/mediterranean-kitchen-quartz-arched-window.webp" alt="Mediterranean kitchen">
                            <div class="room-overlay">
                                <span class="explore-btn"><i class="bi bi-palette"></i> Explore Palette</span>
                            </div>
                        </div>
                        <div class="room-info">
                            <h4>Mediterranean Villa</h4>
                            <p>Warm Quartz + Earthy Tones</p>
                        </div>
                    </div>
                    <div class="palette-panel" id="palette4">
                        <h4>Recommended Wall Colors</h4>
                        <div class="palette-colors">
                            <div class="palette-color" style="background: #F5E6D3;" data-name="Creamy" data-hex="#F5E6D3">
                                <span class="color-tooltip">Creamy</span>
                            </div>
                            <div class="palette-color" style="background: #D9C5A0;" data-name="Whole Wheat" data-hex="#D9C5A0">
                                <span class="color-tooltip">Whole Wheat</span>
                            </div>
                            <div class="palette-color" style="background: #C4A77D;" data-name="Camel" data-hex="#C4A77D">
                                <span class="color-tooltip">Camel</span>
                            </div>
                            <div class="palette-color" style="background: #8B7355;" data-name="Toasted Pine Nut" data-hex="#8B7355">
                                <span class="color-tooltip">Toasted Pine Nut</span>
                            </div>
                            <div class="palette-color" style="background: #6B4423;" data-name="Terracotta" data-hex="#6B4423">
                                <span class="color-tooltip">Terracotta</span>
                            </div>
                        </div>
                        <p class="palette-tip"><i class="bi bi-lightbulb"></i> Warm earth tones create a welcoming Mediterranean feel</p>
                    </div>
                </div>

                <!-- Room 5 -->
                <div class="palette-room" data-room="5">
                    <div class="room-card">
                        <div class="room-image-wrapper">
                            <img src="images/outdoor-kitchen-white-marble-waterfall-modern.webp" alt="Outdoor kitchen">
                            <div class="room-overlay">
                                <span class="explore-btn"><i class="bi bi-palette"></i> Explore Palette</span>
                            </div>
                        </div>
                        <div class="room-info">
                            <h4>Outdoor Oasis</h4>
                            <p>White Quartz + Natural Greens</p>
                        </div>
                    </div>
                    <div class="palette-panel" id="palette5">
                        <h4>Recommended Accent Colors</h4>
                        <div class="palette-colors">
                            <div class="palette-color" style="background: #87A96B;" data-name="Asparagus" data-hex="#87A96B">
                                <span class="color-tooltip">Asparagus</span>
                            </div>
                            <div class="palette-color" style="background: #4F7942;" data-name="Fern" data-hex="#4F7942">
                                <span class="color-tooltip">Fern</span>
                            </div>
                            <div class="palette-color" style="background: #8FBC8F;" data-name="Sage" data-hex="#8FBC8F">
                                <span class="color-tooltip">Sage</span>
                            </div>
                            <div class="palette-color" style="background: #C4B7A6;" data-name="Stone" data-hex="#C4B7A6">
                                <span class="color-tooltip">Stone</span>
                            </div>
                            <div class="palette-color" style="background: #36454F;" data-name="Charcoal" data-hex="#36454F">
                                <span class="color-tooltip">Charcoal</span>
                            </div>
                        </div>
                        <p class="palette-tip"><i class="bi bi-lightbulb"></i> Natural greens blend seamlessly with outdoor spaces</p>
                    </div>
                </div>

                <!-- Room 6 -->
                <div class="palette-room" data-room="6">
                    <div class="room-card">
                        <div class="room-image-wrapper">
                            <img src="images/industrial-loft-kitchen-brick-quartz-island.webp" alt="Industrial kitchen">
                            <div class="room-overlay">
                                <span class="explore-btn"><i class="bi bi-palette"></i> Explore Palette</span>
                            </div>
                        </div>
                        <div class="room-info">
                            <h4>Industrial Chic</h4>
                            <p>Gray Quartz + Urban Tones</p>
                        </div>
                    </div>
                    <div class="palette-panel" id="palette6">
                        <h4>Recommended Wall Colors</h4>
                        <div class="palette-colors">
                            <div class="palette-color" style="background: #D3D3D3;" data-name="Light Gray" data-hex="#D3D3D3">
                                <span class="color-tooltip">Light Gray</span>
                            </div>
                            <div class="palette-color" style="background: #A9A9A9;" data-name="Agreeable Gray" data-hex="#A9A9A9">
                                <span class="color-tooltip">Agreeable Gray</span>
                            </div>
                            <div class="palette-color" style="background: #696969;" data-name="Dovetail" data-hex="#696969">
                                <span class="color-tooltip">Dovetail</span>
                            </div>
                            <div class="palette-color" style="background: #8B4513;" data-name="Exposed Brick" data-hex="#8B4513">
                                <span class="color-tooltip">Exposed Brick</span>
                            </div>
                            <div class="palette-color" style="background: #1C1C1C;" data-name="Tricorn Black" data-hex="#1C1C1C">
                                <span class="color-tooltip">Tricorn Black</span>
                            </div>
                        </div>
                        <p class="palette-tip"><i class="bi bi-lightbulb"></i> Industrial palettes embrace raw materials and contrast</p>
                    </div>
                </div>
            </div>

            <!-- Color Picker Tool -->
            <div class="color-picker-tool">
                <h3><i class="bi bi-eyedropper"></i> Custom Color Explorer</h3>
                <p>Click any color above to see it here, or create your own palette</p>
                <div class="picker-workspace">
                    <div class="selected-colors">
                        <div class="selected-color-slot" id="slot1" style="background: #F5F3EF;">
                            <span class="slot-label">Wall</span>
                            <span class="slot-hex">#F5F3EF</span>
                        </div>
                        <div class="selected-color-slot" id="slot2" style="background: #E8E3DA;">
                            <span class="slot-label">Trim</span>
                            <span class="slot-hex">#E8E3DA</span>
                        </div>
                        <div class="selected-color-slot" id="slot3" style="background: #D4C9B9;">
                            <span class="slot-label">Accent</span>
                            <span class="slot-hex">#D4C9B9</span>
                        </div>
                    </div>
                    <div class="picker-actions">
                        <button class="btn btn-outline" id="resetPalette"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
                        <button class="btn btn-primary" id="savePalette"><i class="bi bi-download"></i> Save Palette</button>
                    </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        // ===== Quartz Color Visualizer =====
        const swatches = document.querySelectorAll('.swatch-v2');
        const roomImage = document.getElementById('roomImage');
        const pantoneColor = document.getElementById('pantoneColor');
        const pantoneName = document.getElementById('pantoneName');
        const pantoneCode = document.getElementById('pantoneCode');
        const categoryBtns = document.querySelectorAll('.category-btn');

        // Set initial pantone color
        const activeSwatch = document.querySelector('.swatch-v2.active');
        if (activeSwatch) {
            pantoneColor.style.background = `url('${activeSwatch.dataset.image}') center/cover`;
        }

        swatches.forEach(swatch => {
            swatch.addEventListener('click', function() {
                swatches.forEach(s => s.classList.remove('active'));
                this.classList.add('active');

                const imageSrc = this.dataset.image;
                const name = this.dataset.name;
                const code = this.dataset.code;
                const color = this.dataset.color;

                // Update pantone card with image texture
                pantoneColor.style.background = `url('${imageSrc}') center/cover`;
                pantoneName.textContent = name;
                pantoneCode.textContent = code;

                // Update room image with fade
                roomImage.style.opacity = '0';
                setTimeout(() => {
                    roomImage.src = imageSrc;
                    roomImage.style.opacity = '1';
                }, 200);
            });
        });

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

        // ===== Wall Color Palette Studio =====
        const paletteRooms = document.querySelectorAll('.palette-room');
        const paletteColors = document.querySelectorAll('.palette-color');
        const colorSlots = document.querySelectorAll('.selected-color-slot');
        let currentSlot = 0;

        // Toggle palette panels
        paletteRooms.forEach(room => {
            const card = room.querySelector('.room-card');
            const panel = room.querySelector('.palette-panel');

            card.addEventListener('click', function() {
                // Close other panels
                document.querySelectorAll('.palette-panel.active').forEach(p => {
                    if (p !== panel) p.classList.remove('active');
                });
                document.querySelectorAll('.palette-room.active').forEach(r => {
                    if (r !== room) r.classList.remove('active');
                });

                // Toggle this panel
                panel.classList.toggle('active');
                room.classList.toggle('active');
            });
        });

        // Click palette colors to add to slots
        paletteColors.forEach(color => {
            color.addEventListener('click', function(e) {
                e.stopPropagation();
                const hex = this.dataset.hex;
                const name = this.dataset.name;

                // Add to current slot
                const slot = colorSlots[currentSlot];
                slot.style.background = hex;
                slot.querySelector('.slot-hex').textContent = hex;

                // Visual feedback
                this.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);

                // Cycle to next slot
                currentSlot = (currentSlot + 1) % 3;
            });
        });

        // Reset palette
        document.getElementById('resetPalette').addEventListener('click', function() {
            const defaults = ['#F5F3EF', '#E8E3DA', '#D4C9B9'];
            colorSlots.forEach((slot, i) => {
                slot.style.background = defaults[i];
                slot.querySelector('.slot-hex').textContent = defaults[i];
            });
            currentSlot = 0;
        });

        // Save palette (download as image or copy to clipboard)
        document.getElementById('savePalette').addEventListener('click', function() {
            const colors = [];
            colorSlots.forEach(slot => {
                colors.push(slot.querySelector('.slot-hex').textContent);
            });

            const paletteText = `My Griffin Quartz Color Palette:\nWall: ${colors[0]}\nTrim: ${colors[1]}\nAccent: ${colors[2]}`;

            if (navigator.clipboard) {
                navigator.clipboard.writeText(paletteText).then(() => {
                    alert('Palette copied to clipboard!');
                });
            } else {
                alert(paletteText);
            }
        });
    });
    </script>
</body>
</html>
