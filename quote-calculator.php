<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>Quartz Countertop Quote Calculator | Instant Pricing | Griffin Quartz</title>
    <meta name="description" content="Get an instant estimate for your quartz countertop project. Enter your dimensions and preferences to see pricing. Free quotes for Boca Raton, Fort Lauderdale, Miami & South Florida.">
    <meta name="keywords" content="quartz countertop cost calculator, countertop price estimator, quartz pricing South Florida, countertop quote, kitchen countertop cost">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://soflocountertops.com/quote-calculator">

    <!-- Open Graph -->
    <meta property="og:title" content="Instant Quartz Countertop Quote Calculator | Griffin Quartz">
    <meta property="og:description" content="Get instant pricing for your quartz countertop project. Enter dimensions and see your estimate in seconds.">
    <meta property="og:url" content="https://soflocountertops.com/quote-calculator">
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
    <section class="page-hero calculator-hero">
        <div class="container">
            <h1>Instant Quote Calculator</h1>
            <p>Get an estimate for your quartz countertop project in under 60 seconds. Enter your details below.</p>
        </div>
    </section>

    <!-- Calculator Tool -->
    <section class="calculator-section">
        <div class="container">
            <div class="calculator-wrapper">
                <!-- Calculator Form -->
                <div class="calculator-form">
                    <form id="quoteCalculator">
                        <!-- Step 1: Project Type -->
                        <div class="calc-step" data-step="1">
                            <h3><span class="step-number">1</span> What type of project is this?</h3>
                            <div class="option-cards">
                                <label class="option-card">
                                    <input type="radio" name="projectType" value="kitchen" checked>
                                    <div class="option-content">
                                        <i class="bi bi-house-door"></i>
                                        <span>Kitchen</span>
                                    </div>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="projectType" value="bathroom">
                                    <div class="option-content">
                                        <i class="bi bi-droplet"></i>
                                        <span>Bathroom</span>
                                    </div>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="projectType" value="outdoor">
                                    <div class="option-content">
                                        <i class="bi bi-sun"></i>
                                        <span>Outdoor</span>
                                    </div>
                                </label>
                                <label class="option-card">
                                    <input type="radio" name="projectType" value="commercial">
                                    <div class="option-content">
                                        <i class="bi bi-building"></i>
                                        <span>Commercial</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Step 2: Dimensions -->
                        <div class="calc-step" data-step="2">
                            <h3><span class="step-number">2</span> Enter your countertop dimensions</h3>
                            <p class="step-hint">Measure the length and depth of each countertop section. Add multiple sections if needed.</p>

                            <div class="dimension-sections" id="dimensionSections">
                                <div class="dimension-row" data-section="1">
                                    <div class="dimension-label">Section 1</div>
                                    <div class="dimension-inputs">
                                        <div class="input-group">
                                            <label>Length</label>
                                            <div class="input-with-unit">
                                                <input type="number" name="length1" min="1" max="300" value="96" class="calc-input length-input">
                                                <span class="unit">inches</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <label>Depth</label>
                                            <div class="input-with-unit">
                                                <input type="number" name="depth1" min="1" max="60" value="25" class="calc-input depth-input">
                                                <span class="unit">inches</span>
                                            </div>
                                        </div>
                                        <button type="button" class="remove-section-btn" style="visibility: hidden;"><i class="bi bi-x-circle"></i></button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="add-section-btn" id="addSectionBtn">
                                <i class="bi bi-plus-circle"></i> Add Another Section
                            </button>

                            <div class="total-sqft">
                                <span>Total Square Footage:</span>
                                <strong id="totalSqft">16.7</strong> sq ft
                            </div>
                        </div>

                        <!-- Step 3: Material Grade -->
                        <div class="calc-step" data-step="3">
                            <h3><span class="step-number">3</span> Select your quartz grade</h3>
                            <div class="grade-options">
                                <label class="grade-option">
                                    <input type="radio" name="grade" value="standard" checked>
                                    <div class="grade-content">
                                        <div class="grade-header">
                                            <span class="grade-name">Standard</span>
                                            <span class="grade-price">$45-65/sq ft</span>
                                        </div>
                                        <p>Solid colors and simple patterns. Great value for budget-conscious projects.</p>
                                    </div>
                                </label>
                                <label class="grade-option">
                                    <input type="radio" name="grade" value="premium">
                                    <div class="grade-content">
                                        <div class="grade-header">
                                            <span class="grade-name">Premium</span>
                                            <span class="grade-price">$65-95/sq ft</span>
                                        </div>
                                        <p>Popular marble-look patterns including Carrara and soft veining. Most popular choice.</p>
                                        <span class="popular-badge">Most Popular</span>
                                    </div>
                                </label>
                                <label class="grade-option">
                                    <input type="radio" name="grade" value="luxury">
                                    <div class="grade-content">
                                        <div class="grade-header">
                                            <span class="grade-name">Luxury</span>
                                            <span class="grade-price">$95-150/sq ft</span>
                                        </div>
                                        <p>Calacatta, Statuario, and exotic patterns. Premium brands like Cambria and Silestone.</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Step 4: Edge Profile -->
                        <div class="calc-step" data-step="4">
                            <h3><span class="step-number">4</span> Choose your edge profile</h3>
                            <div class="edge-options">
                                <label class="edge-option">
                                    <input type="radio" name="edge" value="eased" checked>
                                    <div class="edge-content">
                                        <div class="edge-visual edge-eased"></div>
                                        <span>Eased</span>
                                        <span class="edge-price">Included</span>
                                    </div>
                                </label>
                                <label class="edge-option">
                                    <input type="radio" name="edge" value="beveled">
                                    <div class="edge-content">
                                        <div class="edge-visual edge-beveled"></div>
                                        <span>Beveled</span>
                                        <span class="edge-price">+$8/ft</span>
                                    </div>
                                </label>
                                <label class="edge-option">
                                    <input type="radio" name="edge" value="bullnose">
                                    <div class="edge-content">
                                        <div class="edge-visual edge-bullnose"></div>
                                        <span>Bullnose</span>
                                        <span class="edge-price">+$12/ft</span>
                                    </div>
                                </label>
                                <label class="edge-option">
                                    <input type="radio" name="edge" value="ogee">
                                    <div class="edge-content">
                                        <div class="edge-visual edge-ogee"></div>
                                        <span>Ogee</span>
                                        <span class="edge-price">+$18/ft</span>
                                    </div>
                                </label>
                                <label class="edge-option">
                                    <input type="radio" name="edge" value="waterfall">
                                    <div class="edge-content">
                                        <div class="edge-visual edge-waterfall"></div>
                                        <span>Waterfall</span>
                                        <span class="edge-price">+$25/ft</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Step 5: Add-ons -->
                        <div class="calc-step" data-step="5">
                            <h3><span class="step-number">5</span> Additional services (optional)</h3>
                            <div class="addon-options">
                                <label class="addon-option">
                                    <input type="checkbox" name="addon" value="sink">
                                    <div class="addon-content">
                                        <i class="bi bi-droplet-half"></i>
                                        <div class="addon-details">
                                            <span class="addon-name">Undermount Sink Cutout</span>
                                            <span class="addon-price">+$150</span>
                                        </div>
                                    </div>
                                </label>
                                <label class="addon-option">
                                    <input type="checkbox" name="addon" value="cooktop">
                                    <div class="addon-content">
                                        <i class="bi bi-fire"></i>
                                        <div class="addon-details">
                                            <span class="addon-name">Cooktop Cutout</span>
                                            <span class="addon-price">+$200</span>
                                        </div>
                                    </div>
                                </label>
                                <label class="addon-option">
                                    <input type="checkbox" name="addon" value="backsplash">
                                    <div class="addon-content">
                                        <i class="bi bi-bricks"></i>
                                        <div class="addon-details">
                                            <span class="addon-name">4" Backsplash</span>
                                            <span class="addon-price">+$25/linear ft</span>
                                        </div>
                                    </div>
                                </label>
                                <label class="addon-option">
                                    <input type="checkbox" name="addon" value="removal">
                                    <div class="addon-content">
                                        <i class="bi bi-trash3"></i>
                                        <div class="addon-details">
                                            <span class="addon-name">Old Countertop Removal</span>
                                            <span class="addon-price">+$200</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Quote Result -->
                <div class="calculator-result">
                    <div class="result-card">
                        <h3>Your Estimated Quote</h3>

                        <div class="estimate-display">
                            <div class="estimate-range">
                                <span class="estimate-label">Estimated Total</span>
                                <div class="estimate-values">
                                    <span class="estimate-low" id="estimateLow">$750</span>
                                    <span class="estimate-separator">-</span>
                                    <span class="estimate-high" id="estimateHigh">$1,085</span>
                                </div>
                            </div>
                        </div>

                        <div class="estimate-breakdown">
                            <h4>Price Breakdown</h4>
                            <div class="breakdown-row">
                                <span>Material (<span id="sqftDisplay">16.7</span> sq ft)</span>
                                <span id="materialCost">$750 - $1,085</span>
                            </div>
                            <div class="breakdown-row">
                                <span>Edge Profile (<span id="edgeFtDisplay">8</span> linear ft)</span>
                                <span id="edgeCost">Included</span>
                            </div>
                            <div class="breakdown-row" id="addonRow" style="display: none;">
                                <span>Add-ons</span>
                                <span id="addonCost">$0</span>
                            </div>
                            <div class="breakdown-row breakdown-total">
                                <span>Estimated Total</span>
                                <span id="totalCost">$750 - $1,085</span>
                            </div>
                        </div>

                        <div class="estimate-note">
                            <i class="bi bi-info-circle"></i>
                            <p>This is an estimate only. Final pricing depends on slab selection, site conditions, and exact measurements. <strong>Includes fabrication and professional installation.</strong></p>
                        </div>

                        <div class="result-actions">
                            <a href="tel:7203241436" class="btn btn-primary btn-block">
                                <i class="bi bi-telephone"></i> Call for Exact Quote
                            </a>
                            <button type="button" class="btn btn-outline btn-block" id="emailQuoteBtn">
                                <i class="bi bi-envelope"></i> Email This Quote
                            </button>
                        </div>

                        <div class="result-trust">
                            <div class="trust-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Price Match Guarantee</span>
                            </div>
                            <div class="trust-item">
                                <i class="bi bi-calendar-check"></i>
                                <span>1-Week Installation</span>
                            </div>
                            <div class="trust-item">
                                <i class="bi bi-award"></i>
                                <span>Lifetime Warranty</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="calculator-benefits">
        <div class="container">
            <h2>Why Griffin Quartz for Your Project?</h2>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <i class="bi bi-piggy-bank"></i>
                    <h3>Factory-Direct Pricing</h3>
                    <p>We cut out the middleman and pass the savings to you. Up to 50% off retail prices.</p>
                </div>
                <div class="benefit-card">
                    <i class="bi bi-truck"></i>
                    <h3>Free Delivery & Install</h3>
                    <p>No hidden fees. Your quote includes delivery, fabrication, and professional installation.</p>
                </div>
                <div class="benefit-card">
                    <i class="bi bi-clock-history"></i>
                    <h3>Fast Turnaround</h3>
                    <p>From measurement to installation in as little as one week. We respect your time.</p>
                </div>
                <div class="benefit-card">
                    <i class="bi bi-star"></i>
                    <h3>5-Star Service</h3>
                    <p>100+ five-star reviews from happy customers across South Florida.</p>
                </div>
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
    // Quote Calculator functionality
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('quoteCalculator');
        let sectionCount = 1;

        // Pricing data
        const pricing = {
            grades: {
                standard: { low: 45, high: 65 },
                premium: { low: 65, high: 95 },
                luxury: { low: 95, high: 150 }
            },
            edges: {
                eased: 0,
                beveled: 8,
                bullnose: 12,
                ogee: 18,
                waterfall: 25
            },
            addons: {
                sink: 150,
                cooktop: 200,
                backsplash: 25, // per linear ft
                removal: 200
            }
        };

        // Calculate and update quote
        function updateQuote() {
            // Get total square footage
            let totalSqft = 0;
            let totalLinearFt = 0;

            document.querySelectorAll('.dimension-row').forEach(row => {
                const length = parseFloat(row.querySelector('.length-input').value) || 0;
                const depth = parseFloat(row.querySelector('.depth-input').value) || 0;
                const sqft = (length * depth) / 144;
                totalSqft += sqft;
                totalLinearFt += length / 12; // Convert to feet for edge
            });

            // Get selected grade
            const grade = document.querySelector('input[name="grade"]:checked').value;
            const gradePrice = pricing.grades[grade];

            // Get selected edge
            const edge = document.querySelector('input[name="edge"]:checked').value;
            const edgePrice = pricing.edges[edge];

            // Get addons
            let addonTotal = 0;
            document.querySelectorAll('input[name="addon"]:checked').forEach(addon => {
                if (addon.value === 'backsplash') {
                    addonTotal += pricing.addons[addon.value] * totalLinearFt;
                } else {
                    addonTotal += pricing.addons[addon.value];
                }
            });

            // Calculate totals
            const materialLow = Math.round(totalSqft * gradePrice.low);
            const materialHigh = Math.round(totalSqft * gradePrice.high);
            const edgeCost = Math.round(totalLinearFt * edgePrice);

            const totalLow = materialLow + edgeCost + addonTotal;
            const totalHigh = materialHigh + edgeCost + addonTotal;

            // Update display
            document.getElementById('totalSqft').textContent = totalSqft.toFixed(1);
            document.getElementById('sqftDisplay').textContent = totalSqft.toFixed(1);
            document.getElementById('edgeFtDisplay').textContent = totalLinearFt.toFixed(0);

            document.getElementById('estimateLow').textContent = '$' + totalLow.toLocaleString();
            document.getElementById('estimateHigh').textContent = '$' + totalHigh.toLocaleString();

            document.getElementById('materialCost').textContent = '$' + materialLow.toLocaleString() + ' - $' + materialHigh.toLocaleString();

            if (edgeCost > 0) {
                document.getElementById('edgeCost').textContent = '+$' + edgeCost.toLocaleString();
            } else {
                document.getElementById('edgeCost').textContent = 'Included';
            }

            const addonRow = document.getElementById('addonRow');
            if (addonTotal > 0) {
                addonRow.style.display = 'flex';
                document.getElementById('addonCost').textContent = '+$' + addonTotal.toLocaleString();
            } else {
                addonRow.style.display = 'none';
            }

            document.getElementById('totalCost').textContent = '$' + totalLow.toLocaleString() + ' - $' + totalHigh.toLocaleString();
        }

        // Add section button
        document.getElementById('addSectionBtn').addEventListener('click', function() {
            sectionCount++;
            const newSection = document.createElement('div');
            newSection.className = 'dimension-row';
            newSection.dataset.section = sectionCount;
            newSection.innerHTML = `
                <div class="dimension-label">Section ${sectionCount}</div>
                <div class="dimension-inputs">
                    <div class="input-group">
                        <label>Length</label>
                        <div class="input-with-unit">
                            <input type="number" name="length${sectionCount}" min="1" max="300" value="48" class="calc-input length-input">
                            <span class="unit">inches</span>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Depth</label>
                        <div class="input-with-unit">
                            <input type="number" name="depth${sectionCount}" min="1" max="60" value="25" class="calc-input depth-input">
                            <span class="unit">inches</span>
                        </div>
                    </div>
                    <button type="button" class="remove-section-btn"><i class="bi bi-x-circle"></i></button>
                </div>
            `;

            document.getElementById('dimensionSections').appendChild(newSection);

            // Add remove functionality
            newSection.querySelector('.remove-section-btn').addEventListener('click', function() {
                newSection.remove();
                updateQuote();
            });

            // Add input listeners
            newSection.querySelectorAll('.calc-input').forEach(input => {
                input.addEventListener('input', updateQuote);
            });

            updateQuote();
        });

        // Listen for changes
        form.addEventListener('change', updateQuote);
        form.addEventListener('input', updateQuote);

        // Email quote button
        document.getElementById('emailQuoteBtn').addEventListener('click', function() {
            const totalSqft = document.getElementById('totalSqft').textContent;
            const estimateLow = document.getElementById('estimateLow').textContent;
            const estimateHigh = document.getElementById('estimateHigh').textContent;

            const subject = encodeURIComponent('Quote Request from Website Calculator');
            const body = encodeURIComponent(`Hi Griffin Quartz,

I used your online quote calculator and got an estimate of ${estimateLow} - ${estimateHigh} for approximately ${totalSqft} sq ft of quartz countertops.

I would like to schedule a free in-home consultation to get an exact quote.

Please contact me at your earliest convenience.

Thank you!`);

            window.location.href = `mailto:info@griffinquartz.com?subject=${subject}&body=${body}`;
        });

        // Initial calculation
        updateQuote();
    });
    </script>
</body>
</html>
