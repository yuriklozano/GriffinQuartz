<?php
// Set default base path if not defined
if (!isset($basePath)) {
    $basePath = '.';
}
// Create prefix - empty for root, '../' for subdirectories
$prefix = ($basePath === '.' || $basePath === '') ? '' : $basePath . '/';
?>
<!-- Announcement Bar -->
<div class="announcement-bar">
    <p>New Year, New Quartz—<strong>Up to 50% OFF</strong> Select Slabs. Fast Installation in as Little as 1 Week! <a href="<?php echo $prefix; ?>#contact-form"><strong>EXPLORE SALE</strong></a></p>
</div>

<!-- Header -->
<header class="header">
    <div class="container">
        <a href="<?php echo $prefix; ?>" class="logo"><img src="<?php echo $prefix; ?>images/griffin-quartz-logo.webp" alt="Griffin Quartz"></a>

        <nav class="nav" id="mainNav">
            <ul class="nav-list">
                <li class="nav-item dropdown has-mega-menu">
                    <a href="#" class="nav-link">Our Services</a>
                    <!-- Mega Menu -->
                    <div class="mega-menu">
                        <div class="mega-menu-grid">
                            <!-- Kitchen Countertops -->
                            <a href="<?php echo $prefix; ?>kitchen-bath" class="mega-menu-section" style="background-image: url('<?php echo $prefix; ?>images/kitchen-penthouse-calacatta-gold-ocean.webp');">
                                <div class="mega-menu-section-content">
                                    <h3>Kitchen Countertops</h3>
                                    <p>Stunning quartz surfaces for your dream kitchen</p>
                                </div>
                            </a>
                            <!-- Bathroom Vanities -->
                            <a href="<?php echo $prefix; ?>kitchen-bath#bathroom" class="mega-menu-section" style="background-image: url('<?php echo $prefix; ?>images/bathroom-spa-calacatta-vessel-tub.webp');">
                                <div class="mega-menu-section-content">
                                    <h3>Bathroom Vanities</h3>
                                    <p>Elegant countertops for bathrooms of any size</p>
                                </div>
                            </a>
                            <!-- Commercial -->
                            <a href="<?php echo $prefix; ?>commercial" class="mega-menu-section" style="background-image: url('<?php echo $prefix; ?>images/commercial-lobby-white-marble-reception.webp');">
                                <div class="mega-menu-section-content">
                                    <h3>Commercial Projects</h3>
                                    <p>Hotels, restaurants, offices & retail spaces</p>
                                </div>
                            </a>
                        </div>
                        <div class="mega-menu-section-links">
                            <a href="<?php echo $prefix; ?>our-services">All Services</a>
                            <a href="<?php echo $prefix; ?>quartz-brands">Quartz Brands</a>
                            <a href="<?php echo $prefix; ?>cambria/">Cambria Collection</a>
                            <a href="<?php echo $prefix; ?>gallery">View Gallery</a>
                            <a href="<?php echo $prefix; ?>#contact-form" class="mega-menu-cta">Get Free Quote</a>
                        </div>
                    </div>
                    <!-- Mobile fallback dropdown -->
                    <ul class="dropdown-menu mobile-dropdown">
                        <li><a href="<?php echo $prefix; ?>our-services">Countertop Services</a></li>
                        <li><a href="<?php echo $prefix; ?>quartz-brands">Quartz Product Selection</a></li>
                        <li><a href="<?php echo $prefix; ?>kitchen-bath">Countertops for Kitchens & Baths</a></li>
                        <li><a href="<?php echo $prefix; ?>commercial">Commercial Services</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">Installation Locations</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $prefix; ?>locations">All Service Areas</a></li>
                        <li><a href="<?php echo $prefix; ?>south-florida">South Florida</a></li>
                        <li><a href="<?php echo $prefix; ?>boca-raton">Boca Raton, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>boynton-beach">Boynton Beach, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>coconut-creek">Coconut Creek, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>coral-springs">Coral Springs, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>deerfield-beach">Deerfield Beach, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>delray-beach">Delray Beach, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>fort-lauderdale">Fort Lauderdale, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>hollywood">Hollywood, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>miami">Miami, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>parkland">Parkland, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>pompano-beach">Pompano Beach, FL</a></li>
                        <li><a href="<?php echo $prefix; ?>west-palm-beach">West Palm Beach, FL</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="<?php echo $prefix; ?>gallery" class="nav-link">Inspiration Gallery</a></li>
                <li class="nav-item"><a href="<?php echo $prefix; ?>contact" class="nav-link">Contact Us</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">Resources</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $prefix; ?>color-visualizer">Color Visualizer</a></li>
                        <li><a href="<?php echo $prefix; ?>space-design-tool">Space Design Tool</a></li>
                        <li><a href="<?php echo $prefix; ?>quote-calculator">Instant Quote Calculator</a></li>
                        <li><a href="<?php echo $prefix; ?>blog/">Blog</a></li>
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
