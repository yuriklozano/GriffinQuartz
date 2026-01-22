<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Griffin Quartz for quartz countertop installation in South Florida. Visit our Boca Raton showroom, call us, or request a free estimate online.">
    <title>Contact Us | Griffin Quartz South Florida | Free Estimates</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php $basePath = ''; include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero hero-small">
        <div class="hero-background">
            <img src="images/backyard-outdoor-kitchen-firepit-evening.webp" alt="Contact Griffin Quartz" loading="eager">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <h1>Contact Us</h1>
            <p class="hero-description">Get in touch for a free consultation and estimate</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="content-section">
        <div class="container">
            <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start;">
                <div class="contact-info">
                    <h2>Get In Touch</h2>
                    <p>Ready to transform your space with beautiful quartz countertops? Contact us today for a free consultation and estimate. We're available 7 days a week to answer your questions.</p>

                    <div class="contact-details" style="margin-top: 30px;">
                        <div class="contact-item" style="margin-bottom: 20px;">
                            <h3>Phone</h3>
                            <p><a href="tel:7203241436">(720) 324-1436</a></p>
                        </div>
                        <div class="contact-item" style="margin-bottom: 20px;">
                            <h3>Email</h3>
                            <p><a href="mailto:info@griffinquartz.com">info@griffinquartz.com</a></p>
                        </div>
                        <div class="contact-item" style="margin-bottom: 20px;">
                            <h3>Showroom Address</h3>
                            <p>
                                <a href="https://www.google.com/maps?q=1021+S+Rogers+Cir+%2318,+Boca+Raton,+FL+33487" target="_blank" rel="noopener">
                                    1021 S Rogers Cir #18<br>
                                    Boca Raton, FL 33487
                                </a>
                            </p>
                        </div>
                        <div class="contact-item">
                            <h3>Hours</h3>
                            <p>Monday - Sunday: 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper" id="contact-form">
                    <h2>Request a Free Estimate</h2>
                    <form class="contact-form" id="contactForm">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="project">Project Type</label>
                            <select id="project" name="project">
                                <option value="">Select a project type</option>
                                <option value="kitchen">Kitchen Countertops</option>
                                <option value="bathroom">Bathroom Vanity</option>
                                <option value="commercial">Commercial Project</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message (Optional)</label>
                            <textarea id="message" name="message" rows="4" placeholder="Tell us about your project..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
