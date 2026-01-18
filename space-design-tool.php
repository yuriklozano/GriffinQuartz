<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Design your dream countertop space with our interactive Blueprint Maker. Draw custom layouts, add sink cutouts, select edge profiles, choose colors, and get instant cost estimates.">
    <meta name="keywords" content="countertop design tool, kitchen blueprint maker, quartz countertop planner, space designer, countertop calculator, edge profiles, sink cutout">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Griffin Quartz">

    <meta property="og:title" content="Space Design Tool | Blueprint Maker | Griffin Quartz">
    <meta property="og:description" content="Design your dream countertop space with our interactive Blueprint Maker. Create professional blueprints with measurements and get instant estimates.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://griffinquartz.com/space-design-tool">

    <title>Space Design Tool | Blueprint Maker | Griffin Quartz</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Space Design Tool Specific Styles */
        .design-tool-container {
            display: grid;
            grid-template-columns: 280px 1fr 320px;
            gap: 0;
            min-height: calc(100vh - 80px);
            background: #1a1a2e;
        }

        @media (max-width: 1200px) {
            .design-tool-container {
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr auto;
            }
        }

        /* Left Toolbar */
        .tool-sidebar {
            background: #16213e;
            padding: 20px;
            border-right: 1px solid #0f3460;
            overflow-y: auto;
            max-height: calc(100vh - 80px);
        }

        .tool-section {
            margin-bottom: 24px;
        }

        .tool-section-title {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #FDB913;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tool-section-title i {
            font-size: 14px;
        }

        .tool-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 12px 14px;
            background: #0f3460;
            border: 1px solid #1a4a7a;
            border-radius: 8px;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 8px;
        }

        .tool-btn:hover {
            background: #1a4a7a;
            border-color: #FDB913;
        }

        .tool-btn.active {
            background: #FDB913;
            color: #000;
            border-color: #FDB913;
        }

        .tool-btn i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        /* Edge Profile Cards */
        .edge-profiles-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .edge-profile-card {
            background: #0f3460;
            border: 2px solid #1a4a7a;
            border-radius: 8px;
            padding: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
        }

        .edge-profile-card:hover {
            border-color: #FDB913;
        }

        .edge-profile-card.selected {
            border-color: #FDB913;
            background: #1a4a7a;
        }

        .edge-profile-card svg {
            width: 100%;
            height: 35px;
            margin-bottom: 6px;
        }

        .edge-profile-card span {
            font-size: 10px;
            color: #b0b0b0;
            font-weight: 500;
        }

        .edge-profile-card.selected span {
            color: #FDB913;
        }

        /* Canvas Area */
        .canvas-area {
            background: #0d1b2a;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .canvas-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 20px;
            background: #16213e;
            border-bottom: 1px solid #0f3460;
        }

        .canvas-toolbar-left,
        .canvas-toolbar-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .toolbar-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #0f3460;
            border: 1px solid #1a4a7a;
            border-radius: 6px;
            color: #e0e0e0;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toolbar-btn:hover {
            background: #1a4a7a;
            border-color: #FDB913;
        }

        .toolbar-btn.active {
            background: #FDB913;
            color: #000;
        }

        .toolbar-divider {
            width: 1px;
            height: 24px;
            background: #1a4a7a;
            margin: 0 8px;
        }

        .zoom-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #0f3460;
            padding: 4px 12px;
            border-radius: 6px;
            border: 1px solid #1a4a7a;
        }

        .zoom-level {
            font-size: 12px;
            color: #e0e0e0;
            min-width: 45px;
            text-align: center;
        }

        .canvas-wrapper {
            flex: 1;
            position: relative;
            overflow: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #blueprint-canvas {
            background: #fff;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
            cursor: crosshair;
        }

        .canvas-grid-overlay {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        /* Blueprint styling */
        .blueprint-bg {
            background:
                linear-gradient(90deg, rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.05) 1px, transparent 1px),
                linear-gradient(rgba(59, 130, 246, 0.05) 1px, transparent 1px),
                #f8fafc;
            background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px;
        }

        /* Right Panel */
        .properties-panel {
            background: #16213e;
            padding: 20px;
            border-left: 1px solid #0f3460;
            overflow-y: auto;
            max-height: calc(100vh - 80px);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #0f3460;
        }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            color: #fff;
        }

        /* Color Swatches */
        .color-swatches {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-bottom: 20px;
        }

        .color-swatch {
            aspect-ratio: 1;
            border-radius: 8px;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .color-swatch:hover {
            transform: scale(1.05);
            border-color: rgba(253, 185, 19, 0.5);
        }

        .color-swatch.selected {
            border-color: #FDB913;
            box-shadow: 0 0 0 2px rgba(253, 185, 19, 0.3);
        }

        .color-swatch-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            font-size: 8px;
            padding: 3px;
            text-align: center;
            color: #fff;
        }

        /* Measurements Display */
        .measurements-display {
            background: #0f3460;
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .measurement-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #1a4a7a;
        }

        .measurement-row:last-child {
            border-bottom: none;
        }

        .measurement-label {
            font-size: 13px;
            color: #b0b0b0;
        }

        .measurement-value {
            font-size: 14px;
            font-weight: 600;
            color: #FDB913;
        }

        /* Cost Estimate */
        .cost-estimate-box {
            background: linear-gradient(135deg, #0f3460 0%, #1a4a7a 100%);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #FDB913;
        }

        .cost-estimate-header {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #b0b0b0;
            margin-bottom: 8px;
        }

        .cost-estimate-value {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #FDB913;
            margin-bottom: 4px;
        }

        .cost-estimate-note {
            font-size: 11px;
            color: #888;
        }

        .cost-breakdown {
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid rgba(253, 185, 19, 0.2);
        }

        .cost-item {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #b0b0b0;
            margin-bottom: 6px;
        }

        .cost-item span:last-child {
            color: #e0e0e0;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-download {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            background: #FDB913;
            color: #000;
            border: none;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-download:hover {
            background: #e0a510;
            transform: translateY(-2px);
        }

        .btn-secondary-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 20px;
            background: transparent;
            color: #e0e0e0;
            border: 1px solid #1a4a7a;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-secondary-action:hover {
            border-color: #FDB913;
            color: #FDB913;
        }

        /* Input fields */
        .input-group {
            margin-bottom: 16px;
        }

        .input-label {
            display: block;
            font-size: 12px;
            color: #b0b0b0;
            margin-bottom: 6px;
        }

        .input-field {
            width: 100%;
            padding: 10px 12px;
            background: #0f3460;
            border: 1px solid #1a4a7a;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
        }

        .input-field:focus {
            outline: none;
            border-color: #FDB913;
        }

        .input-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        /* Cutout Options */
        .cutout-options {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .cutout-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background: #0f3460;
            border: 1px solid #1a4a7a;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .cutout-option:hover {
            border-color: #FDB913;
        }

        .cutout-option.selected {
            border-color: #FDB913;
            background: #1a4a7a;
        }

        .cutout-icon {
            width: 40px;
            height: 40px;
            background: #1a4a7a;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .cutout-option.selected .cutout-icon {
            background: #FDB913;
            color: #000;
        }

        .cutout-info {
            flex: 1;
        }

        .cutout-name {
            font-size: 13px;
            color: #fff;
            margin-bottom: 2px;
        }

        .cutout-size {
            font-size: 11px;
            color: #888;
        }

        /* Tabs */
        .panel-tabs {
            display: flex;
            gap: 4px;
            margin-bottom: 20px;
            background: #0f3460;
            padding: 4px;
            border-radius: 8px;
        }

        .panel-tab {
            flex: 1;
            padding: 10px;
            background: transparent;
            border: none;
            color: #b0b0b0;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .panel-tab.active {
            background: #FDB913;
            color: #000;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Mobile Toolbar */
        .mobile-toolbar {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #16213e;
            padding: 12px 20px;
            border-top: 1px solid #0f3460;
            z-index: 100;
        }

        .mobile-toolbar-btns {
            display: flex;
            justify-content: space-around;
        }

        .mobile-tool-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            background: none;
            border: none;
            color: #b0b0b0;
            font-size: 10px;
            cursor: pointer;
        }

        .mobile-tool-btn i {
            font-size: 20px;
        }

        .mobile-tool-btn.active {
            color: #FDB913;
        }

        @media (max-width: 1200px) {
            .tool-sidebar,
            .properties-panel {
                max-height: none;
            }

            .mobile-toolbar {
                display: block;
            }

            .canvas-area {
                min-height: 60vh;
            }
        }

        @media (max-width: 768px) {
            .design-tool-container {
                display: block;
            }

            .tool-sidebar {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 60px;
                z-index: 200;
                max-height: none;
            }

            .tool-sidebar.mobile-open {
                display: block;
            }

            .properties-panel {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 60px;
                z-index: 200;
            }

            .properties-panel.mobile-open {
                display: block;
            }

            .canvas-area {
                height: calc(100vh - 140px);
            }
        }

        /* Hero Section for the tool */
        .tool-hero {
            background: linear-gradient(135deg, #0d1b2a 0%, #16213e 50%, #1a4a7a 100%);
            padding: 60px 20px 40px;
            text-align: center;
        }

        .tool-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            color: #fff;
            margin-bottom: 16px;
        }

        .tool-hero h1 span {
            color: #FDB913;
        }

        .tool-hero p {
            font-size: 18px;
            color: #b0b0b0;
            max-width: 700px;
            margin: 0 auto 30px;
            line-height: 1.6;
        }

        .tool-features-bar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 20px;
        }

        .tool-feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #e0e0e0;
            font-size: 14px;
        }

        .tool-feature-item i {
            color: #FDB913;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .tool-hero {
                padding: 40px 20px 30px;
            }

            .tool-hero h1 {
                font-size: 28px;
            }

            .tool-hero p {
                font-size: 15px;
            }

            .tool-features-bar {
                gap: 15px;
            }

            .tool-feature-item {
                font-size: 12px;
            }
        }

        /* Shape preview in drawing */
        .shape-preview {
            position: absolute;
            border: 2px dashed #FDB913;
            background: rgba(253, 185, 19, 0.1);
            pointer-events: none;
        }

        /* Dimension labels on canvas */
        .dimension-label {
            position: absolute;
            background: #FDB913;
            color: #000;
            padding: 2px 8px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 3px;
            white-space: nowrap;
        }

        /* Instructions overlay */
        .instructions-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #666;
            pointer-events: none;
        }

        .instructions-overlay i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .instructions-overlay p {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .instructions-overlay small {
            font-size: 13px;
            opacity: 0.7;
        }

        /* Selection handles */
        .selection-handle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #FDB913;
            border: 2px solid #000;
            border-radius: 2px;
            cursor: pointer;
        }

        /* Backsplash toggle */
        .backsplash-config {
            background: #0f3460;
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .toggle-label {
            font-size: 13px;
            color: #e0e0e0;
        }

        .toggle-switch {
            position: relative;
            width: 48px;
            height: 26px;
            background: #1a4a7a;
            border-radius: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toggle-switch.active {
            background: #FDB913;
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: #fff;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .toggle-switch.active::after {
            left: 25px;
        }

        .backsplash-height {
            margin-top: 12px;
        }

        .backsplash-height.hidden {
            display: none;
        }

        /* Shape list */
        .shapes-list {
            margin-top: 16px;
        }

        .shape-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            background: #0f3460;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid #1a4a7a;
        }

        .shape-item.selected {
            border-color: #FDB913;
        }

        .shape-item-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .shape-item-icon {
            width: 32px;
            height: 32px;
            background: #1a4a7a;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FDB913;
        }

        .shape-item-name {
            font-size: 13px;
            color: #fff;
        }

        .shape-item-dims {
            font-size: 11px;
            color: #888;
        }

        .shape-item-delete {
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            padding: 4px;
        }

        .shape-item-delete:hover {
            color: #ff4444;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 30px 20px;
            color: #666;
        }

        .empty-state i {
            font-size: 40px;
            margin-bottom: 12px;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <div class="container">
            <p><strong>LIMITED TIME:</strong> Up to 50% OFF on Premium Quartz! <span class="countdown" id="countdown"><span id="days">00</span>D : <span id="hours">00</span>H : <span id="minutes">00</span>M : <span id="seconds">00</span>S</span></p>
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="/" class="logo">Griffin<span>Quartz</span></a>
                <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="nav-menu" id="mainNav">
                    <li class="dropdown">
                        <a href="/our-services">Our Services <i class="bi bi-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/our-services">Countertop Services</a></li>
                            <li><a href="/quartz-brands">Quartz Product Selection</a></li>
                            <li><a href="/kitchen-bath">Countertops for Kitchens & Baths</a></li>
                            <li><a href="/commercial">Commercial Services</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Installation Locations <i class="bi bi-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/service-areas">All Service Areas</a></li>
                            <li><a href="/south-florida">South Florida</a></li>
                            <li><a href="/boca-raton">Boca Raton</a></li>
                            <li><a href="/boynton-beach">Boynton Beach</a></li>
                            <li><a href="/coconut-creek">Coconut Creek</a></li>
                            <li><a href="/coral-springs">Coral Springs</a></li>
                            <li><a href="/deerfield-beach">Deerfield Beach</a></li>
                            <li><a href="/delray-beach">Delray Beach</a></li>
                            <li><a href="/fort-lauderdale">Fort Lauderdale</a></li>
                            <li><a href="/hollywood">Hollywood</a></li>
                            <li><a href="/miami">Miami</a></li>
                            <li><a href="/parkland">Parkland</a></li>
                            <li><a href="/pompano-beach">Pompano Beach</a></li>
                            <li><a href="/west-palm-beach">West Palm Beach</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Resources <i class="bi bi-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/color-visualizer">Color Visualizer</a></li>
                            <li><a href="/space-design-tool">Space Design Tool</a></li>
                            <li><a href="/quote-calculator">Instant Quote Calculator</a></li>
                        </ul>
                    </li>
                    <li><a href="/gallery">Inspiration Gallery</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="tel:7203241436" class="nav-phone"><i class="bi bi-telephone-fill"></i> (720) 324-1436</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Tool Hero -->
    <section class="tool-hero">
        <h1>Space <span>Design Tool</span></h1>
        <p>Create professional blueprints for your countertop project. Draw custom layouts, add sink and cooktop cutouts, select edge profiles, choose your perfect quartz color, and get instant cost estimates.</p>
        <div class="tool-features-bar">
            <div class="tool-feature-item">
                <i class="bi bi-pencil-square"></i>
                <span>Draw Custom Shapes</span>
            </div>
            <div class="tool-feature-item">
                <i class="bi bi-rulers"></i>
                <span>Precise Measurements</span>
            </div>
            <div class="tool-feature-item">
                <i class="bi bi-palette"></i>
                <span>Color Selection</span>
            </div>
            <div class="tool-feature-item">
                <i class="bi bi-download"></i>
                <span>Download Blueprint</span>
            </div>
            <div class="tool-feature-item">
                <i class="bi bi-calculator"></i>
                <span>Cost Estimate</span>
            </div>
        </div>
    </section>

    <!-- Main Design Tool -->
    <div class="design-tool-container">
        <!-- Left Toolbar -->
        <aside class="tool-sidebar" id="toolSidebar">
            <div class="tool-section">
                <div class="tool-section-title">
                    <i class="bi bi-pencil"></i>
                    Drawing Tools
                </div>
                <button class="tool-btn active" data-tool="select" onclick="setTool('select')">
                    <i class="bi bi-cursor"></i>
                    <span>Select / Move</span>
                </button>
                <button class="tool-btn" data-tool="rectangle" onclick="setTool('rectangle')">
                    <i class="bi bi-square"></i>
                    <span>Rectangle Counter</span>
                </button>
                <button class="tool-btn" data-tool="lshape" onclick="setTool('lshape')">
                    <i class="bi bi-box"></i>
                    <span>L-Shape Counter</span>
                </button>
                <button class="tool-btn" data-tool="ushape" onclick="setTool('ushape')">
                    <i class="bi bi-bounding-box"></i>
                    <span>U-Shape Counter</span>
                </button>
                <button class="tool-btn" data-tool="island" onclick="setTool('island')">
                    <i class="bi bi-square-fill"></i>
                    <span>Kitchen Island</span>
                </button>
            </div>

            <div class="tool-section">
                <div class="tool-section-title">
                    <i class="bi bi-scissors"></i>
                    Cutouts
                </div>
                <button class="tool-btn" data-tool="sink" onclick="setTool('sink')">
                    <i class="bi bi-droplet"></i>
                    <span>Undermount Sink</span>
                </button>
                <button class="tool-btn" data-tool="cooktop" onclick="setTool('cooktop')">
                    <i class="bi bi-fire"></i>
                    <span>Cooktop Cutout</span>
                </button>
                <button class="tool-btn" data-tool="faucet" onclick="setTool('faucet')">
                    <i class="bi bi-moisture"></i>
                    <span>Faucet Hole</span>
                </button>
            </div>

            <div class="tool-section">
                <div class="tool-section-title">
                    <i class="bi bi-border-style"></i>
                    Edge Profiles
                </div>
                <div class="edge-profiles-grid">
                    <div class="edge-profile-card selected" data-edge="eased" onclick="selectEdge('eased')">
                        <svg viewBox="0 0 60 35">
                            <path d="M5 30 L5 8 Q5 5 8 5 L55 5 L55 30 Z" fill="none" stroke="#FDB913" stroke-width="2"/>
                        </svg>
                        <span>Eased</span>
                    </div>
                    <div class="edge-profile-card" data-edge="beveled" onclick="selectEdge('beveled')">
                        <svg viewBox="0 0 60 35">
                            <path d="M5 30 L5 12 L12 5 L55 5 L55 30 Z" fill="none" stroke="#888" stroke-width="2"/>
                        </svg>
                        <span>Beveled</span>
                    </div>
                    <div class="edge-profile-card" data-edge="bullnose" onclick="selectEdge('bullnose')">
                        <svg viewBox="0 0 60 35">
                            <path d="M5 30 L5 17.5 Q5 5 17.5 5 L55 5 L55 30 Z" fill="none" stroke="#888" stroke-width="2"/>
                        </svg>
                        <span>Bullnose</span>
                    </div>
                    <div class="edge-profile-card" data-edge="ogee" onclick="selectEdge('ogee')">
                        <svg viewBox="0 0 60 35">
                            <path d="M5 30 L5 20 Q5 15 8 12 Q12 8 12 5 L55 5 L55 30 Z" fill="none" stroke="#888" stroke-width="2"/>
                        </svg>
                        <span>Ogee</span>
                    </div>
                    <div class="edge-profile-card" data-edge="waterfall" onclick="selectEdge('waterfall')">
                        <svg viewBox="0 0 60 35">
                            <path d="M5 5 L55 5 L55 30 L30 30 L30 15 L5 15 Z" fill="none" stroke="#888" stroke-width="2"/>
                        </svg>
                        <span>Waterfall</span>
                    </div>
                    <div class="edge-profile-card" data-edge="mitered" onclick="selectEdge('mitered')">
                        <svg viewBox="0 0 60 35">
                            <path d="M5 30 L5 5 L55 5 L55 30 L50 30 L50 10 L10 10 L10 30 Z" fill="none" stroke="#888" stroke-width="2"/>
                        </svg>
                        <span>Mitered</span>
                    </div>
                </div>
            </div>

            <div class="tool-section">
                <div class="tool-section-title">
                    <i class="bi bi-layers"></i>
                    Backsplash
                </div>
                <div class="backsplash-config">
                    <div class="toggle-row">
                        <span class="toggle-label">Add Backsplash</span>
                        <div class="toggle-switch" id="backsplashToggle" onclick="toggleBacksplash()"></div>
                    </div>
                    <div class="backsplash-height hidden" id="backsplashHeight">
                        <label class="input-label">Height (inches)</label>
                        <input type="number" class="input-field" value="4" min="2" max="24" id="backsplashHeightInput" onchange="updateBacksplashHeight()">
                    </div>
                </div>
            </div>

            <div class="tool-section">
                <div class="tool-section-title">
                    <i class="bi bi-list-ul"></i>
                    Your Shapes
                </div>
                <div class="shapes-list" id="shapesList">
                    <div class="empty-state">
                        <i class="bi bi-collection"></i>
                        <p>No shapes yet. Start drawing!</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Canvas Area -->
        <main class="canvas-area">
            <div class="canvas-toolbar">
                <div class="canvas-toolbar-left">
                    <button class="toolbar-btn" onclick="undo()" title="Undo">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                    <button class="toolbar-btn" onclick="redo()" title="Redo">
                        <i class="bi bi-arrow-clockwise"></i>
                    </button>
                    <div class="toolbar-divider"></div>
                    <button class="toolbar-btn" onclick="deleteSelected()" title="Delete Selected">
                        <i class="bi bi-trash"></i>
                    </button>
                    <button class="toolbar-btn" onclick="duplicateSelected()" title="Duplicate">
                        <i class="bi bi-copy"></i>
                    </button>
                    <div class="toolbar-divider"></div>
                    <button class="toolbar-btn" onclick="toggleGrid()" title="Toggle Grid" id="gridToggle">
                        <i class="bi bi-grid-3x3"></i>
                    </button>
                    <button class="toolbar-btn" onclick="toggleSnap()" title="Snap to Grid" id="snapToggle">
                        <i class="bi bi-magnet"></i>
                    </button>
                </div>
                <div class="canvas-toolbar-right">
                    <div class="zoom-controls">
                        <button class="toolbar-btn" onclick="zoomOut()" style="width:28px;height:28px;">
                            <i class="bi bi-dash"></i>
                        </button>
                        <span class="zoom-level" id="zoomLevel">100%</span>
                        <button class="toolbar-btn" onclick="zoomIn()" style="width:28px;height:28px;">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <button class="toolbar-btn" onclick="fitToScreen()" title="Fit to Screen">
                        <i class="bi bi-fullscreen"></i>
                    </button>
                    <button class="toolbar-btn" onclick="clearCanvas()" title="Clear All">
                        <i class="bi bi-x-circle"></i>
                    </button>
                </div>
            </div>
            <div class="canvas-wrapper" id="canvasWrapper">
                <canvas id="blueprint-canvas" width="1000" height="700"></canvas>
                <div class="instructions-overlay" id="canvasInstructions">
                    <i class="bi bi-vector-pen"></i>
                    <p>Select a drawing tool and click & drag to create shapes</p>
                    <small>Use precise measurements in the properties panel</small>
                </div>
            </div>
        </main>

        <!-- Right Panel -->
        <aside class="properties-panel" id="propertiesPanel">
            <div class="panel-header">
                <h3 class="panel-title">Properties</h3>
            </div>

            <div class="panel-tabs">
                <button class="panel-tab active" onclick="switchTab('materials')">Materials</button>
                <button class="panel-tab" onclick="switchTab('dimensions')">Dimensions</button>
                <button class="panel-tab" onclick="switchTab('estimate')">Estimate</button>
            </div>

            <!-- Materials Tab -->
            <div class="tab-content active" id="materialsTab">
                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-palette"></i>
                        Quartz Colors
                    </div>
                    <div class="color-swatches" id="colorSwatches">
                        <div class="color-swatch selected" style="background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);" data-color="Arctic White" data-price="45" onclick="selectColor(this)">
                            <span class="color-swatch-label">Arctic White</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #e8ddd4 0%, #d4c4b5 100%);" data-color="Calacatta Gold" data-price="75" onclick="selectColor(this)">
                            <span class="color-swatch-label">Calacatta Gold</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #f0ebe6 0%, #ddd5cc 100%);" data-color="Carrara Mist" data-price="65" onclick="selectColor(this)">
                            <span class="color-swatch-label">Carrara Mist</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #2c2c2c 0%, #1a1a1a 100%);" data-color="Midnight Black" data-price="55" onclick="selectColor(this)">
                            <span class="color-swatch-label">Midnight Black</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #4a4a4a 0%, #333 100%);" data-color="Steel Gray" data-price="50" onclick="selectColor(this)">
                            <span class="color-swatch-label">Steel Gray</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #d4cdc4 0%, #b8afa3 100%);" data-color="Coastal Fog" data-price="60" onclick="selectColor(this)">
                            <span class="color-swatch-label">Coastal Fog</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #e6ddd3 0%, #cfc2b3 50%, #a89888 100%);" data-color="Taj Mahal" data-price="85" onclick="selectColor(this)">
                            <span class="color-swatch-label">Taj Mahal</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #f7f4f0 0%, #e8e2da 50%, #c9bfb3 100%);" data-color="Statuario" data-price="80" onclick="selectColor(this)">
                            <span class="color-swatch-label">Statuario</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #8b7355 0%, #6b5344 100%);" data-color="Espresso" data-price="55" onclick="selectColor(this)">
                            <span class="color-swatch-label">Espresso</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #f5f0e8 0%, #e0d5c5 100%);" data-color="Ivory Coast" data-price="50" onclick="selectColor(this)">
                            <span class="color-swatch-label">Ivory Coast</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #3d5a80 0%, #293d5a 100%);" data-color="Navy Dream" data-price="70" onclick="selectColor(this)">
                            <span class="color-swatch-label">Navy Dream</span>
                        </div>
                        <div class="color-swatch" style="background: linear-gradient(135deg, #2d5a4a 0%, #1e3d32 100%);" data-color="Emerald Bay" data-price="75" onclick="selectColor(this)">
                            <span class="color-swatch-label">Emerald Bay</span>
                        </div>
                    </div>
                </div>

                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-rulers"></i>
                        Thickness
                    </div>
                    <div class="cutout-options">
                        <div class="cutout-option selected" data-thickness="2" onclick="selectThickness(this)">
                            <div class="cutout-icon"><i class="bi bi-dash-lg"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">2cm (3/4")</div>
                                <div class="cutout-size">Standard - Most common</div>
                            </div>
                        </div>
                        <div class="cutout-option" data-thickness="3" onclick="selectThickness(this)">
                            <div class="cutout-icon"><i class="bi bi-dash-lg"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">3cm (1-1/4")</div>
                                <div class="cutout-size">Premium - More substantial</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-scissors"></i>
                        Sink Cutouts
                    </div>
                    <div class="cutout-options">
                        <div class="cutout-option" data-sink="single" onclick="addSinkCutout('single')">
                            <div class="cutout-icon"><i class="bi bi-square"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">Single Bowl</div>
                                <div class="cutout-size">22" x 18" typical</div>
                            </div>
                        </div>
                        <div class="cutout-option" data-sink="double" onclick="addSinkCutout('double')">
                            <div class="cutout-icon"><i class="bi bi-layout-split"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">Double Bowl</div>
                                <div class="cutout-size">33" x 22" typical</div>
                            </div>
                        </div>
                        <div class="cutout-option" data-sink="farmhouse" onclick="addSinkCutout('farmhouse')">
                            <div class="cutout-icon"><i class="bi bi-box"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">Farmhouse</div>
                                <div class="cutout-size">30" x 20" typical</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-fire"></i>
                        Cooktop Cutouts
                    </div>
                    <div class="cutout-options">
                        <div class="cutout-option" data-cooktop="30" onclick="addCooktopCutout('30')">
                            <div class="cutout-icon"><i class="bi bi-grid-3x3"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">30" Cooktop</div>
                                <div class="cutout-size">29" x 20" cutout</div>
                            </div>
                        </div>
                        <div class="cutout-option" data-cooktop="36" onclick="addCooktopCutout('36')">
                            <div class="cutout-icon"><i class="bi bi-grid-3x3"></i></div>
                            <div class="cutout-info">
                                <div class="cutout-name">36" Cooktop</div>
                                <div class="cutout-size">35" x 20" cutout</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dimensions Tab -->
            <div class="tab-content" id="dimensionsTab">
                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-aspect-ratio"></i>
                        Selected Shape
                    </div>
                    <div id="selectedShapeInfo">
                        <div class="empty-state">
                            <i class="bi bi-cursor"></i>
                            <p>Select a shape to edit dimensions</p>
                        </div>
                    </div>
                    <div id="shapeEditor" style="display:none;">
                        <div class="input-row">
                            <div class="input-group">
                                <label class="input-label">Width (inches)</label>
                                <input type="number" class="input-field" id="shapeWidth" onchange="updateShapeDimensions()">
                            </div>
                            <div class="input-group">
                                <label class="input-label">Depth (inches)</label>
                                <input type="number" class="input-field" id="shapeDepth" onchange="updateShapeDimensions()">
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="input-group">
                                <label class="input-label">X Position</label>
                                <input type="number" class="input-field" id="shapePosX" onchange="updateShapePosition()">
                            </div>
                            <div class="input-group">
                                <label class="input-label">Y Position</label>
                                <input type="number" class="input-field" id="shapePosY" onchange="updateShapePosition()">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-rulers"></i>
                        Total Measurements
                    </div>
                    <div class="measurements-display">
                        <div class="measurement-row">
                            <span class="measurement-label">Total Surface Area</span>
                            <span class="measurement-value" id="totalSqFt">0 sq ft</span>
                        </div>
                        <div class="measurement-row">
                            <span class="measurement-label">Total Edge Length</span>
                            <span class="measurement-value" id="totalEdge">0 linear ft</span>
                        </div>
                        <div class="measurement-row">
                            <span class="measurement-label">Backsplash Area</span>
                            <span class="measurement-value" id="backsplashArea">0 sq ft</span>
                        </div>
                        <div class="measurement-row">
                            <span class="measurement-label">Number of Cutouts</span>
                            <span class="measurement-value" id="totalCutouts">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estimate Tab -->
            <div class="tab-content" id="estimateTab">
                <div class="cost-estimate-box">
                    <div class="cost-estimate-header">Estimated Project Cost</div>
                    <div class="cost-estimate-value" id="totalEstimate">$0</div>
                    <div class="cost-estimate-note">*Rough estimate. Final price may vary.</div>

                    <div class="cost-breakdown">
                        <div class="cost-item">
                            <span>Material (<span id="selectedColorName">Arctic White</span>)</span>
                            <span id="materialCost">$0</span>
                        </div>
                        <div class="cost-item">
                            <span>Edge Profile (<span id="selectedEdgeName">Eased</span>)</span>
                            <span id="edgeCost">$0</span>
                        </div>
                        <div class="cost-item">
                            <span>Sink Cutouts</span>
                            <span id="sinkCost">$0</span>
                        </div>
                        <div class="cost-item">
                            <span>Cooktop Cutouts</span>
                            <span id="cooktopCost">$0</span>
                        </div>
                        <div class="cost-item">
                            <span>Backsplash</span>
                            <span id="backsplashCost">$0</span>
                        </div>
                        <div class="cost-item">
                            <span>Fabrication & Install</span>
                            <span id="installCost">$0</span>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-download" onclick="downloadBlueprint()">
                        <i class="bi bi-download"></i>
                        Download Blueprint (PDF)
                    </button>
                    <button class="btn-secondary-action" onclick="downloadPNG()">
                        <i class="bi bi-image"></i>
                        Download as PNG
                    </button>
                    <button class="btn-secondary-action" onclick="saveProject()">
                        <i class="bi bi-save"></i>
                        Save Project
                    </button>
                    <button class="btn-secondary-action" onclick="requestQuote()">
                        <i class="bi bi-envelope"></i>
                        Request Detailed Quote
                    </button>
                </div>

                <div style="margin-top: 20px; padding: 16px; background: #0f3460; border-radius: 8px; border-left: 3px solid #FDB913;">
                    <p style="font-size: 12px; color: #b0b0b0; margin: 0;">
                        <strong style="color: #FDB913;">Note:</strong> This estimate is for planning purposes only. Actual costs depend on site conditions, material availability, and project complexity. Contact us for a precise quote.
                    </p>
                </div>
            </div>
        </aside>
    </div>

    <!-- Mobile Toolbar -->
    <div class="mobile-toolbar">
        <div class="mobile-toolbar-btns">
            <button class="mobile-tool-btn active" onclick="openMobilePanel('tools')">
                <i class="bi bi-tools"></i>
                <span>Tools</span>
            </button>
            <button class="mobile-tool-btn" onclick="openMobilePanel('canvas')">
                <i class="bi bi-pencil-square"></i>
                <span>Canvas</span>
            </button>
            <button class="mobile-tool-btn" onclick="openMobilePanel('properties')">
                <i class="bi bi-sliders"></i>
                <span>Properties</span>
            </button>
            <button class="mobile-tool-btn" onclick="downloadBlueprint()">
                <i class="bi bi-download"></i>
                <span>Download</span>
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer" style="background: #0d1b2a; border-top: 1px solid #0f3460;">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h4>Griffin<span>Quartz</span></h4>
                    <p>Premium quartz countertops for kitchens, bathrooms, and commercial spaces throughout South Florida.</p>
                </div>
                <div class="footer-section">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="/our-services">Our Services</a></li>
                        <li><a href="/quartz-brands">Quartz Brands</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h5>Resources</h5>
                    <ul>
                        <li><a href="/color-visualizer">Color Visualizer</a></li>
                        <li><a href="/space-design-tool">Space Design Tool</a></li>
                        <li><a href="/quote-calculator">Quote Calculator</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h5>Contact Us</h5>
                    <p><i class="bi bi-telephone"></i> (720) 324-1436</p>
                    <p><i class="bi bi-envelope"></i> info@griffinquartz.com</p>
                    <p><i class="bi bi-geo-alt"></i> South Florida</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Griffin Quartz. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
    // ============================================
    // SPACE DESIGN TOOL - INTERACTIVE BLUEPRINT MAKER
    // ============================================

    // Global State
    const state = {
        tool: 'select',
        shapes: [],
        selectedShape: null,
        selectedColor: { name: 'Arctic White', price: 45 },
        selectedEdge: { name: 'Eased', price: 0 },
        selectedThickness: 2,
        backsplash: { enabled: false, height: 4 },
        zoom: 1,
        pan: { x: 0, y: 0 },
        gridEnabled: true,
        snapEnabled: true,
        history: [],
        historyIndex: -1,
        isDrawing: false,
        startPoint: null,
        currentShape: null,
        pixelsPerInch: 4 // Scale: 4 pixels = 1 inch
    };

    // Canvas Setup
    const canvas = document.getElementById('blueprint-canvas');
    const ctx = canvas.getContext('2d');

    // Edge pricing
    const edgePrices = {
        eased: { name: 'Eased', price: 0 },
        beveled: { name: 'Beveled', price: 8 },
        bullnose: { name: 'Bullnose', price: 12 },
        ogee: { name: 'Ogee', price: 15 },
        waterfall: { name: 'Waterfall', price: 25 },
        mitered: { name: 'Mitered', price: 20 }
    };

    // Cutout pricing
    const cutoutPrices = {
        sink: { single: 150, double: 200, farmhouse: 250 },
        cooktop: { '30': 175, '36': 200 },
        faucet: 35
    };

    // Initialize
    function init() {
        setupCanvas();
        setupEventListeners();
        drawCanvas();
        updateEstimate();
    }

    function setupCanvas() {
        // Set canvas size based on container
        const wrapper = document.getElementById('canvasWrapper');
        canvas.width = Math.min(1000, wrapper.clientWidth - 40);
        canvas.height = Math.min(700, wrapper.clientHeight - 40);
    }

    function setupEventListeners() {
        canvas.addEventListener('mousedown', handleMouseDown);
        canvas.addEventListener('mousemove', handleMouseMove);
        canvas.addEventListener('mouseup', handleMouseUp);
        canvas.addEventListener('mouseleave', handleMouseUp);

        // Touch events for mobile
        canvas.addEventListener('touchstart', handleTouchStart, { passive: false });
        canvas.addEventListener('touchmove', handleTouchMove, { passive: false });
        canvas.addEventListener('touchend', handleTouchEnd);

        // Keyboard shortcuts
        document.addEventListener('keydown', handleKeyDown);

        // Window resize
        window.addEventListener('resize', () => {
            setupCanvas();
            drawCanvas();
        });
    }

    // ============================================
    // DRAWING FUNCTIONS
    // ============================================

    function drawCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw background
        drawBackground();

        // Draw grid
        if (state.gridEnabled) {
            drawGrid();
        }

        // Draw all shapes
        state.shapes.forEach((shape, index) => {
            drawShape(shape, shape === state.selectedShape);
        });

        // Draw current shape being created
        if (state.isDrawing && state.currentShape) {
            drawShape(state.currentShape, false, true);
        }

        // Draw dimensions
        state.shapes.forEach(shape => {
            drawDimensions(shape);
        });

        // Update instructions visibility
        const instructions = document.getElementById('canvasInstructions');
        if (instructions) {
            instructions.style.display = state.shapes.length === 0 ? 'block' : 'none';
        }
    }

    function drawBackground() {
        // Blueprint style background
        ctx.fillStyle = '#f8fafc';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Border
        ctx.strokeStyle = '#3b82f6';
        ctx.lineWidth = 2;
        ctx.strokeRect(2, 2, canvas.width - 4, canvas.height - 4);

        // Title block
        ctx.fillStyle = '#1e40af';
        ctx.fillRect(canvas.width - 200, canvas.height - 60, 198, 58);
        ctx.fillStyle = '#fff';
        ctx.font = 'bold 14px Inter';
        ctx.fillText('GRIFFIN QUARTZ', canvas.width - 190, canvas.height - 40);
        ctx.font = '10px Inter';
        ctx.fillText('Space Design Blueprint', canvas.width - 190, canvas.height - 25);
        ctx.fillText('Scale: 1" = ' + state.pixelsPerInch + 'px', canvas.width - 190, canvas.height - 12);
    }

    function drawGrid() {
        const gridSize = state.pixelsPerInch * 6; // 6 inch grid
        const smallGrid = state.pixelsPerInch; // 1 inch grid

        ctx.strokeStyle = 'rgba(59, 130, 246, 0.1)';
        ctx.lineWidth = 1;

        // Small grid
        for (let x = 0; x <= canvas.width; x += smallGrid) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
            ctx.stroke();
        }
        for (let y = 0; y <= canvas.height; y += smallGrid) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
            ctx.stroke();
        }

        // Large grid
        ctx.strokeStyle = 'rgba(59, 130, 246, 0.25)';
        for (let x = 0; x <= canvas.width; x += gridSize) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
            ctx.stroke();
        }
        for (let y = 0; y <= canvas.height; y += gridSize) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
            ctx.stroke();
        }
    }

    function drawShape(shape, isSelected, isPreview = false) {
        ctx.save();

        // Get color based on shape type
        let fillColor, strokeColor;
        if (shape.type === 'sink' || shape.type === 'cooktop' || shape.type === 'faucet') {
            fillColor = 'rgba(239, 68, 68, 0.2)';
            strokeColor = '#ef4444';
        } else {
            fillColor = isPreview ? 'rgba(253, 185, 19, 0.1)' : 'rgba(59, 130, 246, 0.15)';
            strokeColor = isPreview ? '#FDB913' : '#3b82f6';
        }

        ctx.fillStyle = fillColor;
        ctx.strokeStyle = strokeColor;
        ctx.lineWidth = isSelected ? 3 : 2;

        if (isPreview) {
            ctx.setLineDash([5, 5]);
        }

        switch (shape.type) {
            case 'rectangle':
            case 'island':
            case 'sink':
            case 'cooktop':
                drawRectangle(shape);
                break;
            case 'lshape':
                drawLShape(shape);
                break;
            case 'ushape':
                drawUShape(shape);
                break;
            case 'faucet':
                drawFaucetHole(shape);
                break;
        }

        // Draw selection handles
        if (isSelected && !isPreview) {
            drawSelectionHandles(shape);
        }

        // Draw backsplash indicator
        if (shape.backsplash && state.backsplash.enabled) {
            drawBacksplash(shape);
        }

        ctx.restore();
    }

    function drawRectangle(shape) {
        ctx.beginPath();
        ctx.rect(shape.x, shape.y, shape.width, shape.height);
        ctx.fill();
        ctx.stroke();

        // Crosshatch pattern for countertop
        if (shape.type !== 'sink' && shape.type !== 'cooktop') {
            ctx.save();
            ctx.clip();
            ctx.strokeStyle = 'rgba(59, 130, 246, 0.1)';
            ctx.lineWidth = 1;
            const spacing = 10;
            for (let i = -shape.height; i < shape.width; i += spacing) {
                ctx.beginPath();
                ctx.moveTo(shape.x + i, shape.y);
                ctx.lineTo(shape.x + i + shape.height, shape.y + shape.height);
                ctx.stroke();
            }
            ctx.restore();
        }

        // Label
        if (shape.type !== 'faucet') {
            ctx.fillStyle = '#1e40af';
            ctx.font = 'bold 11px Inter';
            const label = shape.label || shape.type.toUpperCase();
            ctx.fillText(label, shape.x + 8, shape.y + 18);
        }
    }

    function drawLShape(shape) {
        const armWidth = shape.armWidth || shape.width * 0.4;
        const armHeight = shape.armHeight || shape.height * 0.4;

        ctx.beginPath();
        ctx.moveTo(shape.x, shape.y);
        ctx.lineTo(shape.x + shape.width, shape.y);
        ctx.lineTo(shape.x + shape.width, shape.y + armHeight);
        ctx.lineTo(shape.x + armWidth, shape.y + armHeight);
        ctx.lineTo(shape.x + armWidth, shape.y + shape.height);
        ctx.lineTo(shape.x, shape.y + shape.height);
        ctx.closePath();
        ctx.fill();
        ctx.stroke();

        // Label
        ctx.fillStyle = '#1e40af';
        ctx.font = 'bold 11px Inter';
        ctx.fillText('L-SHAPE', shape.x + 8, shape.y + 18);
    }

    function drawUShape(shape) {
        const armWidth = shape.armWidth || shape.width * 0.3;
        const centerDepth = shape.centerDepth || shape.height * 0.5;

        ctx.beginPath();
        ctx.moveTo(shape.x, shape.y);
        ctx.lineTo(shape.x + shape.width, shape.y);
        ctx.lineTo(shape.x + shape.width, shape.y + shape.height);
        ctx.lineTo(shape.x + shape.width - armWidth, shape.y + shape.height);
        ctx.lineTo(shape.x + shape.width - armWidth, shape.y + centerDepth);
        ctx.lineTo(shape.x + armWidth, shape.y + centerDepth);
        ctx.lineTo(shape.x + armWidth, shape.y + shape.height);
        ctx.lineTo(shape.x, shape.y + shape.height);
        ctx.closePath();
        ctx.fill();
        ctx.stroke();

        // Label
        ctx.fillStyle = '#1e40af';
        ctx.font = 'bold 11px Inter';
        ctx.fillText('U-SHAPE', shape.x + 8, shape.y + 18);
    }

    function drawFaucetHole(shape) {
        ctx.beginPath();
        ctx.arc(shape.x + shape.width/2, shape.y + shape.height/2, shape.width/2, 0, Math.PI * 2);
        ctx.fill();
        ctx.stroke();
    }

    function drawBacksplash(shape) {
        if (shape.type === 'sink' || shape.type === 'cooktop' || shape.type === 'faucet') return;

        const bsHeight = state.backsplash.height * state.pixelsPerInch;
        ctx.fillStyle = 'rgba(253, 185, 19, 0.2)';
        ctx.strokeStyle = '#FDB913';
        ctx.lineWidth = 1;
        ctx.setLineDash([3, 3]);

        // Draw backsplash at the back of the counter
        ctx.beginPath();
        ctx.rect(shape.x, shape.y - bsHeight - 5, shape.width, bsHeight);
        ctx.fill();
        ctx.stroke();

        ctx.setLineDash([]);
    }

    function drawDimensions(shape) {
        if (shape.type === 'faucet') return;

        ctx.fillStyle = '#1e40af';
        ctx.font = '10px Inter';

        const widthInches = Math.round(shape.width / state.pixelsPerInch);
        const heightInches = Math.round(shape.height / state.pixelsPerInch);

        // Width dimension (top)
        const widthText = widthInches + '"';
        ctx.fillText(widthText, shape.x + shape.width/2 - ctx.measureText(widthText).width/2, shape.y - 8);

        // Draw dimension line
        ctx.strokeStyle = '#1e40af';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(shape.x, shape.y - 5);
        ctx.lineTo(shape.x + shape.width, shape.y - 5);
        ctx.stroke();

        // Tick marks
        ctx.beginPath();
        ctx.moveTo(shape.x, shape.y - 2);
        ctx.lineTo(shape.x, shape.y - 8);
        ctx.moveTo(shape.x + shape.width, shape.y - 2);
        ctx.lineTo(shape.x + shape.width, shape.y - 8);
        ctx.stroke();

        // Height dimension (right)
        ctx.save();
        ctx.translate(shape.x + shape.width + 15, shape.y + shape.height/2);
        ctx.rotate(-Math.PI/2);
        const heightText = heightInches + '"';
        ctx.fillText(heightText, -ctx.measureText(heightText).width/2, 4);
        ctx.restore();

        // Height line
        ctx.beginPath();
        ctx.moveTo(shape.x + shape.width + 5, shape.y);
        ctx.lineTo(shape.x + shape.width + 5, shape.y + shape.height);
        ctx.stroke();

        // Tick marks
        ctx.beginPath();
        ctx.moveTo(shape.x + shape.width + 2, shape.y);
        ctx.lineTo(shape.x + shape.width + 8, shape.y);
        ctx.moveTo(shape.x + shape.width + 2, shape.y + shape.height);
        ctx.lineTo(shape.x + shape.width + 8, shape.y + shape.height);
        ctx.stroke();
    }

    function drawSelectionHandles(shape) {
        const handles = getSelectionHandles(shape);
        ctx.fillStyle = '#FDB913';
        ctx.strokeStyle = '#000';
        ctx.lineWidth = 1;

        handles.forEach(handle => {
            ctx.beginPath();
            ctx.rect(handle.x - 5, handle.y - 5, 10, 10);
            ctx.fill();
            ctx.stroke();
        });
    }

    function getSelectionHandles(shape) {
        return [
            { x: shape.x, y: shape.y, cursor: 'nw-resize' },
            { x: shape.x + shape.width/2, y: shape.y, cursor: 'n-resize' },
            { x: shape.x + shape.width, y: shape.y, cursor: 'ne-resize' },
            { x: shape.x + shape.width, y: shape.y + shape.height/2, cursor: 'e-resize' },
            { x: shape.x + shape.width, y: shape.y + shape.height, cursor: 'se-resize' },
            { x: shape.x + shape.width/2, y: shape.y + shape.height, cursor: 's-resize' },
            { x: shape.x, y: shape.y + shape.height, cursor: 'sw-resize' },
            { x: shape.x, y: shape.y + shape.height/2, cursor: 'w-resize' }
        ];
    }

    // ============================================
    // EVENT HANDLERS
    // ============================================

    function handleMouseDown(e) {
        const rect = canvas.getBoundingClientRect();
        const x = (e.clientX - rect.left) / state.zoom;
        const y = (e.clientY - rect.top) / state.zoom;

        if (state.tool === 'select') {
            // Check if clicking on existing shape
            const clickedShape = findShapeAtPoint(x, y);
            if (clickedShape) {
                selectShape(clickedShape);
                state.isDragging = true;
                state.dragOffset = {
                    x: x - clickedShape.x,
                    y: y - clickedShape.y
                };
            } else {
                selectShape(null);
            }
        } else {
            // Start drawing new shape
            state.isDrawing = true;
            state.startPoint = snapToGrid({ x, y });
            state.currentShape = createShape(state.tool, state.startPoint.x, state.startPoint.y, 0, 0);
        }
    }

    function handleMouseMove(e) {
        const rect = canvas.getBoundingClientRect();
        const x = (e.clientX - rect.left) / state.zoom;
        const y = (e.clientY - rect.top) / state.zoom;

        if (state.isDrawing && state.startPoint) {
            const snappedPoint = snapToGrid({ x, y });
            state.currentShape.width = snappedPoint.x - state.startPoint.x;
            state.currentShape.height = snappedPoint.y - state.startPoint.y;

            // Ensure positive dimensions
            if (state.currentShape.width < 0) {
                state.currentShape.x = snappedPoint.x;
                state.currentShape.width = Math.abs(state.currentShape.width);
            }
            if (state.currentShape.height < 0) {
                state.currentShape.y = snappedPoint.y;
                state.currentShape.height = Math.abs(state.currentShape.height);
            }

            drawCanvas();
        } else if (state.isDragging && state.selectedShape) {
            const snapped = snapToGrid({ x: x - state.dragOffset.x, y: y - state.dragOffset.y });
            state.selectedShape.x = snapped.x;
            state.selectedShape.y = snapped.y;
            drawCanvas();
            updateShapesList();
            updateEstimate();
        }
    }

    function handleMouseUp(e) {
        if (state.isDrawing && state.currentShape) {
            // Only add shape if it has reasonable dimensions
            if (state.currentShape.width > 10 && state.currentShape.height > 10) {
                state.shapes.push(state.currentShape);
                selectShape(state.currentShape);
                saveToHistory();
            }
            state.currentShape = null;
        }

        state.isDrawing = false;
        state.isDragging = false;
        state.startPoint = null;

        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    function handleTouchStart(e) {
        e.preventDefault();
        const touch = e.touches[0];
        handleMouseDown({ clientX: touch.clientX, clientY: touch.clientY });
    }

    function handleTouchMove(e) {
        e.preventDefault();
        const touch = e.touches[0];
        handleMouseMove({ clientX: touch.clientX, clientY: touch.clientY });
    }

    function handleTouchEnd(e) {
        handleMouseUp(e);
    }

    function handleKeyDown(e) {
        if (e.key === 'Delete' || e.key === 'Backspace') {
            deleteSelected();
        } else if (e.key === 'Escape') {
            selectShape(null);
            state.isDrawing = false;
            state.currentShape = null;
            drawCanvas();
        } else if (e.ctrlKey || e.metaKey) {
            if (e.key === 'z') {
                e.preventDefault();
                undo();
            } else if (e.key === 'y') {
                e.preventDefault();
                redo();
            } else if (e.key === 'd') {
                e.preventDefault();
                duplicateSelected();
            }
        }
    }

    // ============================================
    // SHAPE FUNCTIONS
    // ============================================

    function createShape(type, x, y, width, height) {
        const defaultSizes = {
            rectangle: { w: 96, h: 25 }, // 24" x 6.25" default
            lshape: { w: 120, h: 120 },
            ushape: { w: 160, h: 120 },
            island: { w: 144, h: 48 }, // 36" x 12"
            sink: { single: { w: 88, h: 72 }, double: { w: 132, h: 88 }, farmhouse: { w: 120, h: 80 } },
            cooktop: { '30': { w: 116, h: 80 }, '36': { w: 140, h: 80 } },
            faucet: { w: 8, h: 8 }
        };

        let shape = {
            id: Date.now(),
            type: type,
            x: x,
            y: y,
            width: width || defaultSizes[type]?.w || 100,
            height: height || defaultSizes[type]?.h || 60,
            backsplash: type !== 'sink' && type !== 'cooktop' && type !== 'faucet'
        };

        // Add specific properties for L and U shapes
        if (type === 'lshape') {
            shape.armWidth = shape.width * 0.4;
            shape.armHeight = shape.height * 0.4;
        } else if (type === 'ushape') {
            shape.armWidth = shape.width * 0.3;
            shape.centerDepth = shape.height * 0.5;
        }

        return shape;
    }

    function findShapeAtPoint(x, y) {
        // Check in reverse order (top shapes first)
        for (let i = state.shapes.length - 1; i >= 0; i--) {
            const shape = state.shapes[i];
            if (x >= shape.x && x <= shape.x + shape.width &&
                y >= shape.y && y <= shape.y + shape.height) {
                return shape;
            }
        }
        return null;
    }

    function selectShape(shape) {
        state.selectedShape = shape;

        const shapeEditor = document.getElementById('shapeEditor');
        const selectedShapeInfo = document.getElementById('selectedShapeInfo');

        if (shape) {
            shapeEditor.style.display = 'block';
            selectedShapeInfo.style.display = 'none';

            document.getElementById('shapeWidth').value = Math.round(shape.width / state.pixelsPerInch);
            document.getElementById('shapeDepth').value = Math.round(shape.height / state.pixelsPerInch);
            document.getElementById('shapePosX').value = Math.round(shape.x / state.pixelsPerInch);
            document.getElementById('shapePosY').value = Math.round(shape.y / state.pixelsPerInch);
        } else {
            shapeEditor.style.display = 'none';
            selectedShapeInfo.style.display = 'block';
        }

        drawCanvas();
    }

    function snapToGrid(point) {
        if (!state.snapEnabled) return point;
        const gridSize = state.pixelsPerInch; // Snap to 1 inch
        return {
            x: Math.round(point.x / gridSize) * gridSize,
            y: Math.round(point.y / gridSize) * gridSize
        };
    }

    // ============================================
    // TOOL FUNCTIONS
    // ============================================

    function setTool(tool) {
        state.tool = tool;

        // Update UI
        document.querySelectorAll('.tool-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.tool === tool);
        });

        // Update cursor
        canvas.style.cursor = tool === 'select' ? 'default' : 'crosshair';
    }

    function selectEdge(edge) {
        state.selectedEdge = edgePrices[edge];

        document.querySelectorAll('.edge-profile-card').forEach(card => {
            card.classList.toggle('selected', card.dataset.edge === edge);
            card.querySelector('svg path').setAttribute('stroke',
                card.dataset.edge === edge ? '#FDB913' : '#888');
        });

        document.getElementById('selectedEdgeName').textContent = state.selectedEdge.name;
        updateEstimate();
    }

    function selectColor(element) {
        document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('selected'));
        element.classList.add('selected');

        state.selectedColor = {
            name: element.dataset.color,
            price: parseInt(element.dataset.price)
        };

        document.getElementById('selectedColorName').textContent = state.selectedColor.name;
        updateEstimate();
    }

    function selectThickness(element) {
        document.querySelectorAll('[data-thickness]').forEach(el => el.classList.remove('selected'));
        element.classList.add('selected');
        state.selectedThickness = parseInt(element.dataset.thickness);
        updateEstimate();
    }

    function toggleBacksplash() {
        const toggle = document.getElementById('backsplashToggle');
        const heightDiv = document.getElementById('backsplashHeight');

        state.backsplash.enabled = !state.backsplash.enabled;
        toggle.classList.toggle('active', state.backsplash.enabled);
        heightDiv.classList.toggle('hidden', !state.backsplash.enabled);

        drawCanvas();
        updateEstimate();
    }

    function updateBacksplashHeight() {
        state.backsplash.height = parseInt(document.getElementById('backsplashHeightInput').value) || 4;
        drawCanvas();
        updateEstimate();
    }

    function addSinkCutout(type) {
        const sizes = {
            single: { w: 88, h: 72, label: 'SINK (Single)' },
            double: { w: 132, h: 88, label: 'SINK (Double)' },
            farmhouse: { w: 120, h: 80, label: 'SINK (Farmhouse)' }
        };

        const size = sizes[type];
        const shape = {
            id: Date.now(),
            type: 'sink',
            subtype: type,
            x: 100,
            y: 100,
            width: size.w,
            height: size.h,
            label: size.label,
            backsplash: false
        };

        state.shapes.push(shape);
        selectShape(shape);
        saveToHistory();
        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    function addCooktopCutout(size) {
        const sizes = {
            '30': { w: 116, h: 80, label: 'COOKTOP (30")' },
            '36': { w: 140, h: 80, label: 'COOKTOP (36")' }
        };

        const dims = sizes[size];
        const shape = {
            id: Date.now(),
            type: 'cooktop',
            subtype: size,
            x: 200,
            y: 100,
            width: dims.w,
            height: dims.h,
            label: dims.label,
            backsplash: false
        };

        state.shapes.push(shape);
        selectShape(shape);
        saveToHistory();
        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    // ============================================
    // CANVAS CONTROLS
    // ============================================

    function zoomIn() {
        state.zoom = Math.min(2, state.zoom + 0.1);
        document.getElementById('zoomLevel').textContent = Math.round(state.zoom * 100) + '%';
        canvas.style.transform = `scale(${state.zoom})`;
    }

    function zoomOut() {
        state.zoom = Math.max(0.5, state.zoom - 0.1);
        document.getElementById('zoomLevel').textContent = Math.round(state.zoom * 100) + '%';
        canvas.style.transform = `scale(${state.zoom})`;
    }

    function fitToScreen() {
        state.zoom = 1;
        document.getElementById('zoomLevel').textContent = '100%';
        canvas.style.transform = 'scale(1)';
    }

    function toggleGrid() {
        state.gridEnabled = !state.gridEnabled;
        document.getElementById('gridToggle').classList.toggle('active', state.gridEnabled);
        drawCanvas();
    }

    function toggleSnap() {
        state.snapEnabled = !state.snapEnabled;
        document.getElementById('snapToggle').classList.toggle('active', state.snapEnabled);
    }

    function clearCanvas() {
        if (confirm('Clear all shapes? This cannot be undone.')) {
            state.shapes = [];
            state.selectedShape = null;
            saveToHistory();
            updateShapesList();
            updateEstimate();
            drawCanvas();
        }
    }

    function deleteSelected() {
        if (state.selectedShape) {
            state.shapes = state.shapes.filter(s => s !== state.selectedShape);
            state.selectedShape = null;
            saveToHistory();
            updateShapesList();
            updateEstimate();
            drawCanvas();
        }
    }

    function duplicateSelected() {
        if (state.selectedShape) {
            const newShape = { ...state.selectedShape };
            newShape.id = Date.now();
            newShape.x += 20;
            newShape.y += 20;
            state.shapes.push(newShape);
            selectShape(newShape);
            saveToHistory();
            updateShapesList();
            updateEstimate();
            drawCanvas();
        }
    }

    // ============================================
    // HISTORY (UNDO/REDO)
    // ============================================

    function saveToHistory() {
        state.historyIndex++;
        state.history = state.history.slice(0, state.historyIndex);
        state.history.push(JSON.stringify(state.shapes));
    }

    function undo() {
        if (state.historyIndex > 0) {
            state.historyIndex--;
            state.shapes = JSON.parse(state.history[state.historyIndex]);
            state.selectedShape = null;
            updateShapesList();
            updateEstimate();
            drawCanvas();
        }
    }

    function redo() {
        if (state.historyIndex < state.history.length - 1) {
            state.historyIndex++;
            state.shapes = JSON.parse(state.history[state.historyIndex]);
            state.selectedShape = null;
            updateShapesList();
            updateEstimate();
            drawCanvas();
        }
    }

    // ============================================
    // DIMENSION UPDATES
    // ============================================

    function updateShapeDimensions() {
        if (!state.selectedShape) return;

        state.selectedShape.width = parseInt(document.getElementById('shapeWidth').value) * state.pixelsPerInch;
        state.selectedShape.height = parseInt(document.getElementById('shapeDepth').value) * state.pixelsPerInch;

        saveToHistory();
        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    function updateShapePosition() {
        if (!state.selectedShape) return;

        state.selectedShape.x = parseInt(document.getElementById('shapePosX').value) * state.pixelsPerInch;
        state.selectedShape.y = parseInt(document.getElementById('shapePosY').value) * state.pixelsPerInch;

        drawCanvas();
    }

    // ============================================
    // UI UPDATES
    // ============================================

    function updateShapesList() {
        const list = document.getElementById('shapesList');

        if (state.shapes.length === 0) {
            list.innerHTML = `
                <div class="empty-state">
                    <i class="bi bi-collection"></i>
                    <p>No shapes yet. Start drawing!</p>
                </div>
            `;
            return;
        }

        list.innerHTML = state.shapes.map(shape => {
            const w = Math.round(shape.width / state.pixelsPerInch);
            const h = Math.round(shape.height / state.pixelsPerInch);
            const icon = getShapeIcon(shape.type);
            const name = shape.label || shape.type.charAt(0).toUpperCase() + shape.type.slice(1);
            const selected = shape === state.selectedShape ? 'selected' : '';

            return `
                <div class="shape-item ${selected}" onclick="selectShapeById(${shape.id})">
                    <div class="shape-item-info">
                        <div class="shape-item-icon"><i class="bi bi-${icon}"></i></div>
                        <div>
                            <div class="shape-item-name">${name}</div>
                            <div class="shape-item-dims">${w}" × ${h}"</div>
                        </div>
                    </div>
                    <button class="shape-item-delete" onclick="event.stopPropagation(); deleteShapeById(${shape.id})">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `;
        }).join('');
    }

    function getShapeIcon(type) {
        const icons = {
            rectangle: 'square',
            lshape: 'box',
            ushape: 'bounding-box',
            island: 'square-fill',
            sink: 'droplet',
            cooktop: 'fire',
            faucet: 'moisture'
        };
        return icons[type] || 'square';
    }

    function selectShapeById(id) {
        const shape = state.shapes.find(s => s.id === id);
        selectShape(shape);
    }

    function deleteShapeById(id) {
        state.shapes = state.shapes.filter(s => s.id !== id);
        if (state.selectedShape && state.selectedShape.id === id) {
            state.selectedShape = null;
        }
        saveToHistory();
        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    function switchTab(tab) {
        document.querySelectorAll('.panel-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

        event.target.classList.add('active');
        document.getElementById(tab + 'Tab').classList.add('active');
    }

    // ============================================
    // COST ESTIMATION
    // ============================================

    function updateEstimate() {
        // Calculate total square footage
        let totalSqInches = 0;
        let totalEdgeInches = 0;
        let sinkCount = { single: 0, double: 0, farmhouse: 0 };
        let cooktopCount = { '30': 0, '36': 0 };

        state.shapes.forEach(shape => {
            if (shape.type === 'sink') {
                sinkCount[shape.subtype]++;
            } else if (shape.type === 'cooktop') {
                cooktopCount[shape.subtype]++;
            } else if (shape.type !== 'faucet') {
                // Calculate area based on shape type
                const w = shape.width / state.pixelsPerInch;
                const h = shape.height / state.pixelsPerInch;

                if (shape.type === 'lshape') {
                    const armW = (shape.armWidth || shape.width * 0.4) / state.pixelsPerInch;
                    const armH = (shape.armHeight || shape.height * 0.4) / state.pixelsPerInch;
                    totalSqInches += (w * armH) + (armW * (h - armH));
                    totalEdgeInches += w + h + (w - armW) + (h - armH) + armW + armH;
                } else if (shape.type === 'ushape') {
                    const armW = (shape.armWidth || shape.width * 0.3) / state.pixelsPerInch;
                    const centerD = (shape.centerDepth || shape.height * 0.5) / state.pixelsPerInch;
                    totalSqInches += (w * centerD) + (armW * (h - centerD)) * 2;
                    totalEdgeInches += w * 2 + h * 2 + (w - armW * 2) * 2;
                } else {
                    totalSqInches += w * h;
                    totalEdgeInches += (w + h) * 2;
                }
            }
        });

        const totalSqFt = totalSqInches / 144;
        const totalEdgeFt = totalEdgeInches / 12;

        // Calculate backsplash
        let backsplashSqFt = 0;
        if (state.backsplash.enabled) {
            state.shapes.forEach(shape => {
                if (shape.backsplash && shape.type !== 'sink' && shape.type !== 'cooktop' && shape.type !== 'faucet') {
                    const w = shape.width / state.pixelsPerInch;
                    backsplashSqFt += (w * state.backsplash.height) / 144;
                }
            });
        }

        // Update measurements display
        document.getElementById('totalSqFt').textContent = totalSqFt.toFixed(1) + ' sq ft';
        document.getElementById('totalEdge').textContent = totalEdgeFt.toFixed(1) + ' linear ft';
        document.getElementById('backsplashArea').textContent = backsplashSqFt.toFixed(1) + ' sq ft';
        document.getElementById('totalCutouts').textContent =
            (sinkCount.single + sinkCount.double + sinkCount.farmhouse + cooktopCount['30'] + cooktopCount['36']);

        // Calculate costs
        const thicknessMultiplier = state.selectedThickness === 3 ? 1.3 : 1;
        const materialCost = totalSqFt * state.selectedColor.price * thicknessMultiplier;
        const edgeCost = totalEdgeFt * state.selectedEdge.price;

        const sinkCost =
            sinkCount.single * cutoutPrices.sink.single +
            sinkCount.double * cutoutPrices.sink.double +
            sinkCount.farmhouse * cutoutPrices.sink.farmhouse;

        const cooktopCostVal =
            cooktopCount['30'] * cutoutPrices.cooktop['30'] +
            cooktopCount['36'] * cutoutPrices.cooktop['36'];

        const backsplashCostVal = backsplashSqFt * (state.selectedColor.price * 0.8);
        const installCost = totalSqFt * 35; // $35/sq ft for fabrication and install

        const totalCost = materialCost + edgeCost + sinkCost + cooktopCostVal + backsplashCostVal + installCost;

        // Update cost display
        document.getElementById('materialCost').textContent = '$' + Math.round(materialCost).toLocaleString();
        document.getElementById('edgeCost').textContent = '$' + Math.round(edgeCost).toLocaleString();
        document.getElementById('sinkCost').textContent = '$' + Math.round(sinkCost).toLocaleString();
        document.getElementById('cooktopCost').textContent = '$' + Math.round(cooktopCostVal).toLocaleString();
        document.getElementById('backsplashCost').textContent = '$' + Math.round(backsplashCostVal).toLocaleString();
        document.getElementById('installCost').textContent = '$' + Math.round(installCost).toLocaleString();
        document.getElementById('totalEstimate').textContent = '$' + Math.round(totalCost).toLocaleString();
    }

    // ============================================
    // EXPORT FUNCTIONS
    // ============================================

    function downloadBlueprint() {
        // Create a temporary canvas for high-res export
        const exportCanvas = document.createElement('canvas');
        const scale = 2;
        exportCanvas.width = canvas.width * scale;
        exportCanvas.height = canvas.height * scale;
        const exportCtx = exportCanvas.getContext('2d');
        exportCtx.scale(scale, scale);

        // Draw everything on export canvas
        exportCtx.fillStyle = '#fff';
        exportCtx.fillRect(0, 0, canvas.width, canvas.height);

        // Copy current canvas
        exportCtx.drawImage(canvas, 0, 0);

        // Add title and info
        exportCtx.fillStyle = '#1e40af';
        exportCtx.font = 'bold 16px Inter';
        exportCtx.fillText('COUNTERTOP BLUEPRINT', 20, 30);
        exportCtx.font = '12px Inter';
        exportCtx.fillText('Generated by Griffin Quartz Space Design Tool', 20, 50);
        exportCtx.fillText('Date: ' + new Date().toLocaleDateString(), 20, 68);
        exportCtx.fillText('Color: ' + state.selectedColor.name, 20, 86);
        exportCtx.fillText('Edge: ' + state.selectedEdge.name, 150, 86);
        exportCtx.fillText('Estimated Cost: ' + document.getElementById('totalEstimate').textContent, 280, 86);

        // Convert to PDF using canvas
        const link = document.createElement('a');
        link.download = 'countertop-blueprint-' + Date.now() + '.png';
        link.href = exportCanvas.toDataURL('image/png');
        link.click();

        // Show success message
        showNotification('Blueprint downloaded successfully!', 'success');
    }

    function downloadPNG() {
        const link = document.createElement('a');
        link.download = 'countertop-design-' + Date.now() + '.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
        showNotification('PNG downloaded successfully!', 'success');
    }

    function saveProject() {
        const projectData = {
            shapes: state.shapes,
            color: state.selectedColor,
            edge: state.selectedEdge,
            thickness: state.selectedThickness,
            backsplash: state.backsplash,
            date: new Date().toISOString()
        };

        const blob = new Blob([JSON.stringify(projectData, null, 2)], { type: 'application/json' });
        const link = document.createElement('a');
        link.download = 'countertop-project-' + Date.now() + '.json';
        link.href = URL.createObjectURL(blob);
        link.click();

        showNotification('Project saved successfully!', 'success');
    }

    function requestQuote() {
        // Get measurements
        const sqFt = document.getElementById('totalSqFt').textContent;
        const estimate = document.getElementById('totalEstimate').textContent;

        // Redirect to contact with pre-filled info
        const params = new URLSearchParams({
            source: 'space-design-tool',
            sqft: sqFt,
            color: state.selectedColor.name,
            edge: state.selectedEdge.name,
            estimate: estimate
        });

        window.location.href = '/contact?' + params.toString();
    }

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = 'notification ' + type;
        notification.innerHTML = `
            <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : '#ef4444'};
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 1000;
            animation: slideIn 0.3s ease;
        `;

        document.body.appendChild(notification);
        setTimeout(() => notification.remove(), 3000);
    }

    // ============================================
    // MOBILE SUPPORT
    // ============================================

    function openMobilePanel(panel) {
        document.querySelectorAll('.mobile-tool-btn').forEach(btn => btn.classList.remove('active'));
        event.target.closest('.mobile-tool-btn').classList.add('active');

        document.getElementById('toolSidebar').classList.remove('mobile-open');
        document.getElementById('propertiesPanel').classList.remove('mobile-open');

        if (panel === 'tools') {
            document.getElementById('toolSidebar').classList.add('mobile-open');
        } else if (panel === 'properties') {
            document.getElementById('propertiesPanel').classList.add('mobile-open');
        }
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>
