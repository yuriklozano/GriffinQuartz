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

            <!-- Tool Actions Bar -->
            <div class="tool-actions-bar">
                <button class="tool-btn" id="compareModeBtn">
                    <i class="bi bi-columns-gap"></i>
                    <span>Compare Colors</span>
                </button>
                <button class="tool-btn" id="requestSampleBtn">
                    <i class="bi bi-box-seam"></i>
                    <span>Request Samples</span>
                </button>
                <button class="tool-btn" id="downloadPaletteBtn">
                    <i class="bi bi-download"></i>
                    <span>Download Palette</span>
                </button>
            </div>

            <!-- Compare Mode Panel (Hidden by default) -->
            <div class="compare-panel" id="comparePanel" style="display: none;">
                <div class="compare-header">
                    <h3><i class="bi bi-columns-gap"></i> Compare Mode</h3>
                    <p>Click up to 3 colors to compare side-by-side</p>
                    <button class="close-compare" id="closeCompare"><i class="bi bi-x-lg"></i></button>
                </div>
                <div class="compare-slots">
                    <div class="compare-slot empty" id="compareSlot1">
                        <div class="compare-color"></div>
                        <span class="compare-name">Select Color 1</span>
                        <button class="remove-compare"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="compare-slot empty" id="compareSlot2">
                        <div class="compare-color"></div>
                        <span class="compare-name">Select Color 2</span>
                        <button class="remove-compare"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="compare-slot empty" id="compareSlot3">
                        <div class="compare-color"></div>
                        <span class="compare-name">Select Color 3</span>
                        <button class="remove-compare"><i class="bi bi-x"></i></button>
                    </div>
                </div>
                <button class="btn btn-outline btn-sm" id="clearCompare">Clear All</button>
            </div>

            <div class="studio-layout">
                <!-- Left: Pantone Card + Photo Stack -->
                <div class="preview-stack">
                    <!-- Pantone Style Card -->
                    <div class="pantone-card-lg" id="pantoneCard">
                        <div class="pantone-swatch" id="pantoneSwatch" style="background: #F8F8F8;"></div>
                        <div class="pantone-label">
                            <span class="pantone-name" id="pantoneName">Arctic White</span>
                            <span class="pantone-collection" id="pantoneCollection">White Collection</span>
                        </div>
                    </div>

                    <!-- Room Photo Below -->
                    <div class="inspiration-photo">
                        <img src="images/luxury-white-kitchen-arched-windows-gold.webp" alt="Inspiration photo" id="inspirationImg">
                    </div>

                    <!-- Room Type Filter -->
                    <div class="room-type-filter">
                        <span class="filter-label">View in:</span>
                        <button class="room-btn active" data-room="all"><i class="bi bi-grid-3x3-gap"></i> All</button>
                        <button class="room-btn" data-room="kitchen"><i class="bi bi-cup-hot"></i> Kitchen</button>
                        <button class="room-btn" data-room="bathroom"><i class="bi bi-droplet"></i> Bath</button>
                        <button class="room-btn" data-room="outdoor"><i class="bi bi-sun"></i> Outdoor</button>
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

                    <div class="swatch-grid" id="swatchGrid">
                        <!-- White Collection -->
                        <div class="color-chip active" data-cat="white" data-name="Arctic White" data-collection="White Collection" data-color="#F8F8F8" data-img="images/luxury-white-kitchen-arched-windows-gold.webp" data-room="kitchen" data-imgs='{"kitchen":"images/luxury-white-kitchen-arched-windows-gold.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/outdoor-kitchen-white-marble-waterfall-modern.webp"}'>
                            <div class="chip-color" style="background: #F8F8F8;"></div>
                            <span class="chip-name">Arctic White</span>
                        </div>
                        <div class="color-chip" data-cat="white" data-name="Pure Snow" data-collection="White Collection" data-color="#FAFAFA" data-img="images/outdoor-kitchen-white-marble-waterfall-modern.webp" data-room="outdoor" data-imgs='{"kitchen":"images/coastal-kitchen-marble-island-coffered-ceiling.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/outdoor-kitchen-white-marble-waterfall-modern.webp"}'>
                            <div class="chip-color" style="background: #FAFAFA;"></div>
                            <span class="chip-name">Pure Snow</span>
                        </div>
                        <div class="color-chip" data-cat="white" data-name="Frost" data-collection="White Collection" data-color="#F0EDE8" data-img="images/coastal-kitchen-marble-island-coffered-ceiling.webp" data-room="kitchen" data-imgs='{"kitchen":"images/coastal-kitchen-marble-island-coffered-ceiling.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/covered-patio-white-marble-island-pool.webp"}'>
                            <div class="chip-color" style="background: #F0EDE8;"></div>
                            <span class="chip-name">Frost</span>
                        </div>

                        <!-- Marble Collection -->
                        <div class="color-chip" data-cat="marble" data-name="Calacatta Luxe" data-collection="Marble Collection" data-color="linear-gradient(135deg, #F5F3F0 0%, #E8E4DF 50%, #D5CFC7 100%)" data-img="images/modern-kitchen-marble-island-glass-pendants.webp" data-room="kitchen" data-imgs='{"kitchen":"images/modern-kitchen-marble-island-glass-pendants.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/outdoor-kitchen-marble-fireplace-pool.webp"}'>
                            <div class="chip-color" style="background: linear-gradient(135deg, #F5F3F0 0%, #E8E4DF 50%, #D5CFC7 100%);"></div>
                            <span class="chip-name">Calacatta Luxe</span>
                        </div>
                        <div class="color-chip" data-cat="marble" data-name="Carrara Mist" data-collection="Marble Collection" data-color="linear-gradient(120deg, #F0EEEB 0%, #E0DCD6 50%, #D0CBC4 100%)" data-img="images/covered-patio-white-marble-island-pool.webp" data-room="outdoor" data-imgs='{"kitchen":"images/mediterranean-kitchen-quartz-arched-window.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/covered-patio-white-marble-island-pool.webp"}'>
                            <div class="chip-color" style="background: linear-gradient(120deg, #F0EEEB 0%, #E0DCD6 50%, #D0CBC4 100%);"></div>
                            <span class="chip-name">Carrara Mist</span>
                        </div>
                        <div class="color-chip" data-cat="marble" data-name="Statuario" data-collection="Marble Collection" data-color="linear-gradient(145deg, #EAE7E3 0%, #D8D3CC 50%, #C5BFB5 100%)" data-img="images/outdoor-kitchen-marble-fireplace-pool.webp" data-room="outdoor" data-imgs='{"kitchen":"images/modern-kitchen-marble-island-glass-pendants.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/outdoor-kitchen-marble-fireplace-pool.webp"}'>
                            <div class="chip-color" style="background: linear-gradient(145deg, #EAE7E3 0%, #D8D3CC 50%, #C5BFB5 100%);"></div>
                            <span class="chip-name">Statuario</span>
                        </div>
                        <div class="color-chip" data-cat="marble" data-name="Calacatta Gold" data-collection="Marble Collection" data-color="linear-gradient(130deg, #F5F0E8 0%, #E8DFD0 50%, #D4C5A8 100%)" data-img="images/mediterranean-kitchen-quartz-arched-window.webp" data-room="kitchen" data-imgs='{"kitchen":"images/mediterranean-kitchen-quartz-arched-window.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/mediterranean-outdoor-kitchen-stone-arches.webp"}'>
                            <div class="chip-color" style="background: linear-gradient(130deg, #F5F0E8 0%, #E8DFD0 50%, #D4C5A8 100%);"></div>
                            <span class="chip-name">Calacatta Gold</span>
                        </div>

                        <!-- Dark Collection -->
                        <div class="color-chip" data-cat="dark" data-name="Midnight Black" data-collection="Dark Collection" data-color="linear-gradient(135deg, #1A1A1A 0%, #2D2D2D 50%, #1A1A1A 100%)" data-img="images/luxury-bathroom-black-marble-gold-fixtures.webp" data-room="bathroom" data-imgs='{"kitchen":"images/industrial-loft-kitchen-brick-quartz-island.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/backyard-outdoor-kitchen-firepit-evening.webp"}'>
                            <div class="chip-color" style="background: linear-gradient(135deg, #1A1A1A 0%, #2D2D2D 50%, #1A1A1A 100%);"></div>
                            <span class="chip-name">Midnight Black</span>
                        </div>
                        <div class="color-chip" data-cat="dark" data-name="Charcoal" data-collection="Dark Collection" data-color="#3D3D3D" data-img="images/industrial-loft-kitchen-brick-quartz-island.webp" data-room="kitchen" data-imgs='{"kitchen":"images/industrial-loft-kitchen-brick-quartz-island.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/modern-outdoor-kitchen-quartz-firepit.webp"}'>
                            <div class="chip-color" style="background: #3D3D3D;"></div>
                            <span class="chip-name">Charcoal</span>
                        </div>
                        <div class="color-chip" data-cat="dark" data-name="Storm Gray" data-collection="Dark Collection" data-color="linear-gradient(135deg, #6B6B6B 0%, #4A4A4A 50%, #5A5A5A 100%)" data-img="images/modern-kitchen-gray-quartz-wood-slats.webp" data-room="kitchen" data-imgs='{"kitchen":"images/modern-kitchen-gray-quartz-wood-slats.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/rooftop-outdoor-kitchen-sunset-skyline.webp"}'>
                            <div class="chip-color" style="background: linear-gradient(135deg, #6B6B6B 0%, #4A4A4A 50%, #5A5A5A 100%);"></div>
                            <span class="chip-name">Storm Gray</span>
                        </div>

                        <!-- Warm Collection -->
                        <div class="color-chip" data-cat="warm" data-name="Sahara Beige" data-collection="Warm Collection" data-color="#D4C4B0" data-img="images/mediterranean-outdoor-kitchen-stone-arches.webp" data-room="outdoor" data-imgs='{"kitchen":"images/mediterranean-kitchen-quartz-arched-window.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/mediterranean-outdoor-kitchen-stone-arches.webp"}'>
                            <div class="chip-color" style="background: #D4C4B0;"></div>
                            <span class="chip-name">Sahara Beige</span>
                        </div>
                        <div class="color-chip" data-cat="warm" data-name="Café Brown" data-collection="Warm Collection" data-color="#A08060" data-img="images/backyard-outdoor-kitchen-firepit-evening.webp" data-room="outdoor" data-imgs='{"kitchen":"images/industrial-loft-kitchen-brick-quartz-island.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/backyard-outdoor-kitchen-firepit-evening.webp"}'>
                            <div class="chip-color" style="background: #A08060;"></div>
                            <span class="chip-name">Café Brown</span>
                        </div>
                        <div class="color-chip" data-cat="warm" data-name="Ivory Coast" data-collection="Warm Collection" data-color="#EAE0D0" data-img="images/rooftop-outdoor-kitchen-sunset-skyline.webp" data-room="outdoor" data-imgs='{"kitchen":"images/coastal-kitchen-marble-island-coffered-ceiling.webp","bathroom":"images/luxury-bathroom-black-marble-gold-fixtures.webp","outdoor":"images/rooftop-outdoor-kitchen-sunset-skyline.webp"}'>
                            <div class="chip-color" style="background: #EAE0D0;"></div>
                            <span class="chip-name">Ivory Coast</span>
                        </div>
                    </div>

                    <!-- Quick Calculator Widget -->
                    <div class="quick-calc-widget">
                        <h4><i class="bi bi-calculator"></i> Quick Estimate</h4>
                        <div class="quick-calc-inputs">
                            <div class="calc-input-group">
                                <input type="number" id="quickLength" placeholder="Length" min="1">
                                <span>ft</span>
                            </div>
                            <span class="calc-x">×</span>
                            <div class="calc-input-group">
                                <input type="number" id="quickWidth" placeholder="Width" min="1">
                                <span>ft</span>
                            </div>
                        </div>
                        <div class="quick-calc-result" id="quickCalcResult">
                            <span class="result-label">Estimated Range:</span>
                            <span class="result-value">Enter dimensions</span>
                        </div>
                        <a href="quote-calculator" class="btn btn-outline btn-sm">Detailed Quote <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <a href="quote-calculator" class="btn btn-primary btn-full">Get Instant Quote</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Request Sample Modal -->
    <div class="modal-overlay" id="sampleModal" style="display: none;">
        <div class="modal-content">
            <button class="modal-close" id="closeSampleModal"><i class="bi bi-x-lg"></i></button>
            <div class="modal-header">
                <i class="bi bi-box-seam"></i>
                <h3>Request Free Samples</h3>
                <p>Get up to 3 free quartz samples delivered to your door</p>
            </div>
            <div class="selected-samples" id="selectedSamples">
                <p class="samples-hint">Selected colors will appear here</p>
            </div>
            <form class="sample-form" id="sampleForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="sampleName">Full Name *</label>
                        <input type="text" id="sampleName" required>
                    </div>
                    <div class="form-group">
                        <label for="samplePhone">Phone *</label>
                        <input type="tel" id="samplePhone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sampleEmail">Email *</label>
                    <input type="email" id="sampleEmail" required>
                </div>
                <div class="form-group">
                    <label for="sampleAddress">Shipping Address *</label>
                    <input type="text" id="sampleAddress" placeholder="Street Address" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="sampleCity" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="sampleState" placeholder="State" value="FL" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="sampleZip" placeholder="ZIP" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-full">
                    <i class="bi bi-send"></i> Request Samples
                </button>
            </form>
        </div>
    </div>

    <!-- Download Palette Modal -->
    <div class="modal-overlay" id="downloadModal" style="display: none;">
        <div class="modal-content modal-sm">
            <button class="modal-close" id="closeDownloadModal"><i class="bi bi-x-lg"></i></button>
            <div class="modal-header">
                <i class="bi bi-palette"></i>
                <h3>Your Color Selection</h3>
            </div>
            <div class="download-preview" id="downloadPreview">
                <!-- Will be populated by JS -->
            </div>
            <div class="download-actions">
                <button class="btn btn-outline" id="copyPaletteLink">
                    <i class="bi bi-link-45deg"></i> Copy Link
                </button>
                <button class="btn btn-outline" id="emailPalette">
                    <i class="bi bi-envelope"></i> Email
                </button>
                <button class="btn btn-primary" id="downloadPDF">
                    <i class="bi bi-file-pdf"></i> Download PDF
                </button>
            </div>
        </div>
    </div>

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
        // ===== State Management =====
        let compareMode = false;
        let compareColors = [];
        let selectedColor = null;
        let currentRoomFilter = 'all';

        // ===== DOM Elements =====
        const chips = document.querySelectorAll('.color-chip');
        const pantoneSwatch = document.getElementById('pantoneSwatch');
        const pantoneName = document.getElementById('pantoneName');
        const pantoneCollection = document.getElementById('pantoneCollection');
        const inspirationImg = document.getElementById('inspirationImg');
        const catBtns = document.querySelectorAll('.cat-btn');
        const roomBtns = document.querySelectorAll('.room-btn');

        // ===== Quartz Color Visualizer =====
        const firstChip = document.querySelector('.color-chip.active');
        if (firstChip) {
            updatePreview(firstChip);
            selectedColor = {
                name: firstChip.dataset.name,
                color: firstChip.dataset.color,
                collection: firstChip.dataset.collection
            };
        }

        chips.forEach(chip => {
            chip.addEventListener('click', function() {
                if (compareMode) {
                    addToCompare(this);
                } else {
                    chips.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                    updatePreview(this);
                    selectedColor = {
                        name: this.dataset.name,
                        color: this.dataset.color,
                        collection: this.dataset.collection
                    };
                }
            });
        });

        function updatePreview(chip) {
            const color = chip.dataset.color;
            const name = chip.dataset.name;
            const collection = chip.dataset.collection;

            // Get image based on room filter
            let img = chip.dataset.img;
            if (currentRoomFilter !== 'all' && chip.dataset.imgs) {
                try {
                    const imgs = JSON.parse(chip.dataset.imgs);
                    if (imgs[currentRoomFilter]) {
                        img = imgs[currentRoomFilter];
                    }
                } catch(e) {}
            }

            pantoneSwatch.style.background = color;
            pantoneName.textContent = name;
            pantoneCollection.textContent = collection;

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

        // ===== Room Type Filter =====
        roomBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                roomBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentRoomFilter = this.dataset.room;

                // Update current preview
                const activeChip = document.querySelector('.color-chip.active');
                if (activeChip) {
                    updatePreview(activeChip);
                }
            });
        });

        // ===== Compare Mode =====
        const compareModeBtn = document.getElementById('compareModeBtn');
        const comparePanel = document.getElementById('comparePanel');
        const closeCompare = document.getElementById('closeCompare');
        const clearCompare = document.getElementById('clearCompare');

        compareModeBtn.addEventListener('click', function() {
            compareMode = !compareMode;
            this.classList.toggle('active', compareMode);
            comparePanel.style.display = compareMode ? 'block' : 'none';

            if (compareMode) {
                document.body.classList.add('compare-active');
            } else {
                document.body.classList.remove('compare-active');
                clearAllCompare();
            }
        });

        closeCompare.addEventListener('click', function() {
            compareMode = false;
            compareModeBtn.classList.remove('active');
            comparePanel.style.display = 'none';
            document.body.classList.remove('compare-active');
            clearAllCompare();
        });

        clearCompare.addEventListener('click', clearAllCompare);

        function addToCompare(chip) {
            if (compareColors.length >= 3) return;

            const colorData = {
                name: chip.dataset.name,
                color: chip.dataset.color,
                collection: chip.dataset.collection,
                element: chip
            };

            // Check if already added
            if (compareColors.find(c => c.name === colorData.name)) return;

            compareColors.push(colorData);
            chip.classList.add('in-compare');
            updateCompareSlots();
        }

        function updateCompareSlots() {
            for (let i = 0; i < 3; i++) {
                const slot = document.getElementById(`compareSlot${i + 1}`);
                const colorDiv = slot.querySelector('.compare-color');
                const nameSpan = slot.querySelector('.compare-name');

                if (compareColors[i]) {
                    slot.classList.remove('empty');
                    colorDiv.style.background = compareColors[i].color;
                    nameSpan.textContent = compareColors[i].name;
                } else {
                    slot.classList.add('empty');
                    colorDiv.style.background = '';
                    nameSpan.textContent = `Select Color ${i + 1}`;
                }
            }
        }

        // Remove from compare
        document.querySelectorAll('.remove-compare').forEach((btn, index) => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (compareColors[index]) {
                    compareColors[index].element.classList.remove('in-compare');
                    compareColors.splice(index, 1);
                    updateCompareSlots();
                }
            });
        });

        function clearAllCompare() {
            compareColors.forEach(c => c.element.classList.remove('in-compare'));
            compareColors = [];
            updateCompareSlots();
        }

        // ===== Request Sample Modal =====
        const sampleModal = document.getElementById('sampleModal');
        const requestSampleBtn = document.getElementById('requestSampleBtn');
        const closeSampleModal = document.getElementById('closeSampleModal');
        const selectedSamplesDiv = document.getElementById('selectedSamples');
        const sampleForm = document.getElementById('sampleForm');

        requestSampleBtn.addEventListener('click', function() {
            // Populate with selected/compare colors
            let samplesToShow = compareColors.length > 0 ? compareColors : (selectedColor ? [selectedColor] : []);

            if (samplesToShow.length === 0) {
                selectedSamplesDiv.innerHTML = '<p class="samples-hint">Please select colors first, then request samples</p>';
            } else {
                selectedSamplesDiv.innerHTML = samplesToShow.map(c => `
                    <div class="sample-chip">
                        <div class="sample-color" style="background: ${c.color}"></div>
                        <span>${c.name}</span>
                    </div>
                `).join('');
            }

            sampleModal.style.display = 'flex';
        });

        closeSampleModal.addEventListener('click', () => sampleModal.style.display = 'none');
        sampleModal.addEventListener('click', (e) => {
            if (e.target === sampleModal) sampleModal.style.display = 'none';
        });

        sampleForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Simulate form submission
            const btn = this.querySelector('button[type="submit"]');
            btn.innerHTML = '<i class="bi bi-check-circle"></i> Request Sent!';
            btn.disabled = true;
            setTimeout(() => {
                sampleModal.style.display = 'none';
                btn.innerHTML = '<i class="bi bi-send"></i> Request Samples';
                btn.disabled = false;
                this.reset();
            }, 2000);
        });

        // ===== Download Palette Modal =====
        const downloadModal = document.getElementById('downloadModal');
        const downloadPaletteBtn = document.getElementById('downloadPaletteBtn');
        const closeDownloadModal = document.getElementById('closeDownloadModal');
        const downloadPreview = document.getElementById('downloadPreview');

        downloadPaletteBtn.addEventListener('click', function() {
            let colorsToShow = compareColors.length > 0 ? compareColors : (selectedColor ? [selectedColor] : []);

            downloadPreview.innerHTML = colorsToShow.map(c => `
                <div class="preview-color">
                    <div class="preview-swatch" style="background: ${c.color}"></div>
                    <div class="preview-info">
                        <strong>${c.name}</strong>
                        <span>${c.collection}</span>
                    </div>
                </div>
            `).join('') || '<p>No colors selected</p>';

            downloadModal.style.display = 'flex';
        });

        closeDownloadModal.addEventListener('click', () => downloadModal.style.display = 'none');
        downloadModal.addEventListener('click', (e) => {
            if (e.target === downloadModal) downloadModal.style.display = 'none';
        });

        // Copy palette link
        document.getElementById('copyPaletteLink').addEventListener('click', function() {
            const colors = compareColors.length > 0 ? compareColors : (selectedColor ? [selectedColor] : []);
            const colorNames = colors.map(c => c.name).join(',');
            const url = `${window.location.origin}${window.location.pathname}?colors=${encodeURIComponent(colorNames)}`;

            navigator.clipboard.writeText(url).then(() => {
                this.innerHTML = '<i class="bi bi-check"></i> Copied!';
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-link-45deg"></i> Copy Link';
                }, 2000);
            });
        });

        // Email palette
        document.getElementById('emailPalette').addEventListener('click', function() {
            const colors = compareColors.length > 0 ? compareColors : (selectedColor ? [selectedColor] : []);
            const colorList = colors.map(c => `${c.name} (${c.collection})`).join('\n');
            const subject = 'My Griffin Quartz Color Selection';
            const body = `Here are my selected quartz colors:\n\n${colorList}\n\nView on website: ${window.location.href}`;

            window.location.href = `mailto:?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
        });

        // Download PDF (creates a printable view)
        document.getElementById('downloadPDF').addEventListener('click', function() {
            const colors = compareColors.length > 0 ? compareColors : (selectedColor ? [selectedColor] : []);

            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Griffin Quartz - Color Selection</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 40px; }
                        h1 { color: #1a1a1a; border-bottom: 2px solid #FDB913; padding-bottom: 10px; }
                        .color-card { display: inline-block; margin: 20px; text-align: center; }
                        .swatch { width: 150px; height: 150px; border-radius: 10px; margin-bottom: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); }
                        .name { font-weight: bold; font-size: 16px; }
                        .collection { color: #666; font-size: 14px; }
                        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; }
                    </style>
                </head>
                <body>
                    <h1>Griffin Quartz Color Selection</h1>
                    <p>Thank you for exploring our quartz colors!</p>
                    ${colors.map(c => `
                        <div class="color-card">
                            <div class="swatch" style="background: ${c.color}"></div>
                            <div class="name">${c.name}</div>
                            <div class="collection">${c.collection}</div>
                        </div>
                    `).join('')}
                    <div class="footer">
                        <p><strong>Griffin Quartz</strong> | South Florida's Premier Quartz Countertop Installers</p>
                        <p>Call: (720) 324-1436 | Visit: soflocountertops.com</p>
                    </div>
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        });

        // ===== Quick Calculator =====
        const quickLength = document.getElementById('quickLength');
        const quickWidth = document.getElementById('quickWidth');
        const quickCalcResult = document.getElementById('quickCalcResult');

        function calculateQuickEstimate() {
            const length = parseFloat(quickLength.value) || 0;
            const width = parseFloat(quickWidth.value) || 0;

            if (length > 0 && width > 0) {
                const sqft = length * width;
                const lowPrice = Math.round(sqft * 55);
                const highPrice = Math.round(sqft * 95);

                quickCalcResult.innerHTML = `
                    <span class="result-label">${sqft} sq ft estimate:</span>
                    <span class="result-value">$${lowPrice.toLocaleString()} - $${highPrice.toLocaleString()}</span>
                `;
            } else {
                quickCalcResult.innerHTML = `
                    <span class="result-label">Estimated Range:</span>
                    <span class="result-value">Enter dimensions</span>
                `;
            }
        }

        quickLength.addEventListener('input', calculateQuickEstimate);
        quickWidth.addEventListener('input', calculateQuickEstimate);

        // ===== Wall Palette Builder =====
        const paletteDots = document.querySelectorAll('.palette-dot');
        const slots = document.querySelectorAll('.palette-slot');
        let currentSlot = 0;

        slots[0].style.background = '#F5F3EF';
        slots[1].style.background = '#FFFFFF';
        slots[2].style.background = '#D4C9B9';

        paletteDots.forEach(dot => {
            dot.addEventListener('mouseenter', function() {
                this.setAttribute('title', this.dataset.name);
            });

            dot.addEventListener('click', function() {
                const color = this.style.background;
                const hex = rgbToHex(getComputedStyle(this).backgroundColor);

                slots[currentSlot].style.background = color;
                slots[currentSlot].querySelector('.slot-hex').textContent = hex;

                this.style.transform = 'scale(1.3)';
                setTimeout(() => this.style.transform = 'scale(1)', 200);

                currentSlot = (currentSlot + 1) % 3;
            });
        });

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

        document.getElementById('saveBtn').addEventListener('click', function() {
            const colors = [];
            slots.forEach(slot => colors.push(slot.querySelector('.slot-hex').textContent));

            const text = `Griffin Quartz Color Palette\nWall: ${colors[0]}\nTrim: ${colors[1]}\nAccent: ${colors[2]}`;

            navigator.clipboard.writeText(text).then(() => {
                this.innerHTML = '<i class="bi bi-check"></i> Copied!';
                setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard"></i> Copy Palette', 2000);
            });
        });

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
