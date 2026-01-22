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
<?php $basePath = '..'; include '../includes/header.php'; ?>

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
            <!-- NEW BLOGS - 2026 -->
            <a href="quartz-vs-granite-marble-comparison" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/kitchen-penthouse-veined-ocean-view.webp" alt="Quartz vs granite vs marble comparison" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>Quartz vs Granite vs Marble: Which Countertop is Best?</h2>
                    <p>Complete comparison of quartz, granite, marble and quartzite. Learn about durability, cost, maintenance and which is best for South Florida homes.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="quartz-countertop-edge-profiles" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/fabrication-hands-polishing-quartz.webp" alt="Quartz countertop edge profiles" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>Quartz Countertop Edge Profiles: Complete Guide</h2>
                    <p>Explore eased, beveled, bullnose, ogee, waterfall and mitered edges. Learn which countertop edge profile is perfect for your kitchen.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="quartz-countertop-colors-guide" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/kitchen-calacatta-walnut-leather-stools.webp" alt="Quartz countertop colors guide" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>Quartz Countertop Colors: Selection Guide 2026</h2>
                    <p>From white to black, gray to blue - explore every quartz color family. Find the perfect countertop color for your South Florida home.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="best-quartz-countertop-brands" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/fabrication-shop-polishing-slab.webp" alt="Best quartz countertop brands" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>Best Quartz Countertop Brands 2026</h2>
                    <p>Compare Cambria, Silestone, Caesarstone, MSI and Hanstone. Expert brand reviews with pricing, pros and cons for South Florida homeowners.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="quartz-countertops-cost-guide" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/kitchen-penthouse-calacatta-gold-ocean.webp" alt="Quartz countertops cost guide 2026" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>How Much Do Quartz Countertops Cost? 2026 Guide</h2>
                    <p>Complete 2026 pricing breakdown by tier, brand and edge profile. Learn what affects cost and how to budget for your project.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="how-to-clean-quartz-countertops" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/kitchen-calacatta-gold-globe-pendants.webp" alt="How to clean quartz countertops" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>How to Clean Quartz Countertops: Care Guide</h2>
                    <p>Daily cleaning tips, stain removal techniques, and products to avoid. Keep your quartz countertops looking pristine for decades.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="quartz-countertop-installation-guide" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/installation-team-penthouse-slab.webp" alt="Quartz countertop installation" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>Quartz Countertop Installation: What to Expect</h2>
                    <p>From consultation to final reveal - understand every phase of professional countertop installation. Timeline, prep and installation day tips.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <a href="affordable-quartz-countertops" class="blog-card">
                <div class="blog-card-image">
                    <img src="../images/kitchen-coastal-wicker-stools-skylight.webp" alt="Affordable quartz countertops" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Jan 22, 2026</span>
                    <h2>Affordable Quartz Countertops: Budget Tips</h2>
                    <p>Get premium quartz on a budget. Learn about remnants, simpler edges, standard colors and other money-saving strategies.</p>
                    <span class="blog-card-link">Read More <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>

            <!-- EXISTING BLOGS -->
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
                    <img src="../images/industrial-loft-kitchen-brick-quartz-island.webp" alt="Quartz pricing guide" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Aug 22, 2025</span>
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
                    <img src="../images/resort-poolside-outdoor-kitchen-blue-tile.webp" alt="Countertop installation tips" loading="lazy">
                </div>
                <div class="blog-card-content">
                    <span class="blog-card-meta">Aug 09, 2025</span>
                    <h2>Top 10 Countertop Installation Near Fort Lauderdale</h2>
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
    <?php include '../includes/footer.php'; ?>
</body>
</html>
