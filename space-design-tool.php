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
        /* Space Design Tool - On-Brand Styles */
        .tool-hero {
            background: linear-gradient(135deg, #000 0%, #1a1a1a 100%);
            padding: 80px 20px 60px;
            text-align: center;
        }

        .tool-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #fff;
            margin-bottom: 20px;
        }

        .tool-hero h1 span {
            color: #FDB913;
        }

        .tool-hero p {
            font-size: 18px;
            color: #b0b0b0;
            max-width: 700px;
            margin: 0 auto 30px;
            line-height: 1.7;
        }

        .tool-features-bar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 30px;
        }

        .tool-feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #e0e0e0;
            font-size: 15px;
        }

        .tool-feature-item i {
            color: #FDB913;
            font-size: 20px;
        }

        /* Main Design Tool Layout */
        .design-tool-wrapper {
            background: #f5f5f5;
        }

        .design-tool-container {
            display: grid;
            grid-template-columns: 300px 1fr 340px;
            gap: 0;
            max-width: 1800px;
            margin: 0 auto;
            min-height: calc(100vh - 200px);
        }

        /* Left Sidebar */
        .tool-sidebar {
            background: #fff;
            border-right: 1px solid #e0e0e0;
            padding: 24px;
            overflow-y: auto;
            max-height: calc(100vh - 200px);
        }

        .tool-section {
            margin-bottom: 28px;
        }

        .tool-section-title {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #FDB913;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 8px;
            border-bottom: 1px solid #f0f0f0;
        }

        .tool-section-title i {
            font-size: 14px;
        }

        .tool-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 14px 16px;
            background: #f8f8f8;
            border: 2px solid #e8e8e8;
            border-radius: 8px;
            color: #333;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 8px;
        }

        .tool-btn:hover {
            background: #fff;
            border-color: #FDB913;
        }

        .tool-btn.active {
            background: #000;
            color: #fff;
            border-color: #000;
        }

        .tool-btn i {
            font-size: 18px;
            width: 22px;
            text-align: center;
            color: #FDB913;
        }

        .tool-btn.active i {
            color: #FDB913;
        }

        /* Edge Profile Cards */
        .edge-profiles-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .edge-profile-card {
            background: #f8f8f8;
            border: 2px solid #e8e8e8;
            border-radius: 8px;
            padding: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
        }

        .edge-profile-card:hover {
            border-color: #FDB913;
            background: #fff;
        }

        .edge-profile-card.selected {
            border-color: #000;
            background: #000;
        }

        .edge-profile-card svg {
            width: 100%;
            height: 30px;
            margin-bottom: 6px;
        }

        .edge-profile-card span {
            font-size: 11px;
            color: #666;
            font-weight: 600;
        }

        .edge-profile-card.selected span {
            color: #FDB913;
        }

        /* Canvas Area */
        .canvas-area {
            background: #e8e8e8;
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
            background: #fff;
            border-bottom: 1px solid #e0e0e0;
        }

        .canvas-toolbar-left,
        .canvas-toolbar-right {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .toolbar-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background: #f5f5f5;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            color: #333;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toolbar-btn:hover {
            background: #fff;
            border-color: #FDB913;
            color: #FDB913;
        }

        .toolbar-btn.active {
            background: #000;
            color: #FDB913;
            border-color: #000;
        }

        .toolbar-divider {
            width: 1px;
            height: 24px;
            background: #e0e0e0;
            margin: 0 10px;
        }

        .zoom-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f5f5f5;
            padding: 4px 12px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
        }

        .zoom-level {
            font-size: 13px;
            color: #333;
            min-width: 50px;
            text-align: center;
            font-weight: 600;
        }

        .canvas-wrapper {
            flex: 1;
            position: relative;
            overflow: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        #blueprint-canvas {
            background: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            cursor: crosshair;
            border-radius: 4px;
        }

        /* Right Panel */
        .properties-panel {
            background: #fff;
            border-left: 1px solid #e0e0e0;
            padding: 24px;
            overflow-y: auto;
            max-height: calc(100vh - 200px);
        }

        .panel-header {
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #000;
        }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #000;
        }

        /* Tabs */
        .panel-tabs {
            display: flex;
            gap: 0;
            margin-bottom: 24px;
            background: #f5f5f5;
            border-radius: 8px;
            padding: 4px;
        }

        .panel-tab {
            flex: 1;
            padding: 12px 8px;
            background: transparent;
            border: none;
            color: #666;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .panel-tab:hover {
            color: #000;
        }

        .panel-tab.active {
            background: #000;
            color: #FDB913;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Color Swatches */
        .color-swatches {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 24px;
        }

        .color-swatch {
            aspect-ratio: 1;
            border-radius: 8px;
            cursor: pointer;
            border: 3px solid #e0e0e0;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .color-swatch:hover {
            transform: scale(1.05);
            border-color: #FDB913;
        }

        .color-swatch.selected {
            border-color: #000;
            box-shadow: 0 0 0 2px #FDB913;
        }

        .color-swatch-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.8);
            font-size: 8px;
            padding: 4px;
            text-align: center;
            color: #fff;
        }

        /* Measurements Display */
        .measurements-display {
            background: #f8f8f8;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border: 1px solid #e8e8e8;
        }

        .measurement-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e8e8e8;
        }

        .measurement-row:last-child {
            border-bottom: none;
        }

        .measurement-label {
            font-size: 14px;
            color: #666;
        }

        .measurement-value {
            font-size: 15px;
            font-weight: 700;
            color: #000;
        }

        /* Quick Estimate Box */
        .quick-estimate-box {
            background: #f8f8f8;
            border-radius: 10px;
            padding: 16px;
            border: 1px solid #e8e8e8;
        }

        .quick-estimate-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 12px 0;
            border-bottom: 1px solid #e8e8e8;
        }

        .quick-estimate-row:first-child {
            padding-top: 0;
        }

        .quick-estimate-row:last-child,
        .quick-estimate-row.total {
            border-bottom: none;
        }

        .quick-estimate-row.total {
            padding-top: 12px;
        }

        .quick-estimate-label {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .quick-estimate-label .label-main {
            font-size: 13px;
            font-weight: 600;
            color: #000;
        }

        .quick-estimate-label .label-sub {
            font-size: 11px;
            color: #888;
        }

        .quick-estimate-value {
            font-size: 14px;
            font-weight: 700;
            color: #000;
            text-align: right;
        }

        .quick-estimate-value.range {
            color: #666;
            font-weight: 600;
        }

        .quick-estimate-row.total .label-main {
            font-size: 14px;
        }

        .quick-estimate-row.total .quick-estimate-value {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            color: #000;
        }

        .quick-estimate-row.total .quick-estimate-value.range {
            color: #000;
        }

        .quick-estimate-divider {
            height: 2px;
            background: linear-gradient(90deg, #FDB913, #000);
            margin: 4px 0 0 0;
        }

        .quick-estimate-note {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 12px;
            padding: 10px;
            background: #fff8e6;
            border-radius: 6px;
            border: 1px solid #FDB913;
        }

        .quick-estimate-note i {
            color: #FDB913;
            font-size: 14px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .quick-estimate-note {
            font-size: 11px;
            color: #666;
            line-height: 1.4;
        }

        /* Cost Estimate */
        .cost-estimate-box {
            background: #000;
            border-radius: 12px;
            padding: 24px;
        }

        .cost-estimate-header {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #888;
            margin-bottom: 8px;
        }

        .cost-estimate-value {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #FDB913;
            margin-bottom: 6px;
        }

        .cost-estimate-note {
            font-size: 12px;
            color: #666;
        }

        .cost-breakdown {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #333;
        }

        .cost-item {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #888;
            margin-bottom: 8px;
        }

        .cost-item span:last-child {
            color: #fff;
            font-weight: 500;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-download {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 24px;
            background: #FDB913;
            color: #000;
            border: none;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-download:hover {
            background: #E0A510;
            transform: translateY(-2px);
        }

        .btn-secondary-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            background: transparent;
            color: #333;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-secondary-action:hover {
            border-color: #000;
            background: #000;
            color: #fff;
        }

        /* Cutout Options */
        .cutout-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .cutout-option {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            background: #f8f8f8;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .cutout-option:hover {
            border-color: #FDB913;
            background: #fff;
        }

        .cutout-option.selected {
            border-color: #000;
            background: #fff;
        }

        .cutout-icon {
            width: 44px;
            height: 44px;
            background: #000;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #FDB913;
        }

        .cutout-info {
            flex: 1;
        }

        .cutout-name {
            font-size: 14px;
            font-weight: 600;
            color: #000;
            margin-bottom: 2px;
        }

        .cutout-size {
            font-size: 12px;
            color: #888;
        }

        /* Input fields */
        .input-group {
            margin-bottom: 16px;
        }

        .input-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-field {
            width: 100%;
            padding: 12px 14px;
            background: #f8f8f8;
            border: 2px solid #e8e8e8;
            border-radius: 8px;
            color: #000;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: #FDB913;
            background: #fff;
        }

        .input-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        /* Backsplash Toggle */
        .backsplash-config {
            background: #f8f8f8;
            border-radius: 10px;
            padding: 16px;
            border: 1px solid #e8e8e8;
        }

        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .toggle-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .toggle-switch {
            position: relative;
            width: 52px;
            height: 28px;
            background: #e0e0e0;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .toggle-switch.active {
            background: #000;
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 22px;
            height: 22px;
            background: #fff;
            border-radius: 50%;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .toggle-switch.active::after {
            left: 27px;
            background: #FDB913;
        }

        .backsplash-options.hidden {
            display: none;
        }

        .backsplash-sides {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-top: 8px;
        }

        .side-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px;
            background: #f0f0f0;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .side-checkbox:hover {
            background: #e8e8e8;
        }

        .side-checkbox input {
            display: none;
        }

        .side-checkbox input:checked + .side-label {
            color: #000;
            font-weight: 600;
        }

        .side-checkbox:has(input:checked) {
            background: #fff;
            border-color: #FDB913;
        }

        .side-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #666;
        }

        .side-label i {
            font-size: 14px;
            color: #FDB913;
        }

        /* Shapes List */
        .shapes-list {
            margin-top: 12px;
        }

        .shape-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 14px;
            background: #f8f8f8;
            border-radius: 8px;
            margin-bottom: 8px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .shape-item:hover {
            border-color: #e0e0e0;
        }

        .shape-item.selected {
            border-color: #FDB913;
            background: #fff;
        }

        .shape-item-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .shape-item-icon {
            width: 36px;
            height: 36px;
            background: #000;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FDB913;
            font-size: 16px;
        }

        .shape-item-name {
            font-size: 13px;
            font-weight: 600;
            color: #000;
        }

        .shape-item-dims {
            font-size: 11px;
            color: #888;
        }

        .shape-item-delete {
            background: none;
            border: none;
            color: #ccc;
            cursor: pointer;
            padding: 6px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .shape-item-delete:hover {
            color: #ff4444;
            background: #fff0f0;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.4;
        }

        .empty-state p {
            font-size: 14px;
        }

        /* Instructions Overlay */
        .instructions-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #999;
            pointer-events: none;
        }

        .instructions-overlay i {
            font-size: 56px;
            margin-bottom: 20px;
            opacity: 0.3;
            color: #FDB913;
        }

        .instructions-overlay p {
            font-size: 18px;
            margin-bottom: 8px;
            color: #666;
        }

        .instructions-overlay small {
            font-size: 14px;
            color: #999;
        }

        /* Info Box */
        .info-box {
            margin-top: 24px;
            padding: 18px;
            background: #f8f8f8;
            border-radius: 10px;
            border-left: 4px solid #FDB913;
        }

        .info-box p {
            font-size: 13px;
            color: #666;
            margin: 0;
            line-height: 1.6;
        }

        .info-box strong {
            color: #000;
        }

        /* Estimate Sections */
        .estimate-section {
            background: #f8f8f8;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #e8e8e8;
        }

        .estimate-section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 700;
            color: #000;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 2px solid #FDB913;
        }

        .estimate-section-header i {
            color: #FDB913;
            font-size: 18px;
        }

        .material-notice {
            display: flex;
            gap: 12px;
            padding: 14px;
            background: #fff8e6;
            border-radius: 8px;
            margin-bottom: 16px;
            border: 1px solid #FDB913;
        }

        .material-notice i {
            color: #FDB913;
            font-size: 18px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .material-notice p {
            font-size: 12px;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        .cost-range-box {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            border: 2px solid #e8e8e8;
            margin-bottom: 16px;
        }

        .cost-range-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 8px;
        }

        .cost-range-value {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #000;
            margin-bottom: 6px;
        }

        .cost-range-detail {
            font-size: 12px;
            color: #888;
        }

        .material-breakdown {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .material-item {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 8px 0;
            border-bottom: 1px solid #e8e8e8;
        }

        .material-item:last-child {
            border-bottom: none;
        }

        .material-item span:first-child {
            color: #666;
        }

        .material-item span:last-child {
            color: #000;
            font-weight: 600;
        }

        /* Project Summary Grid */
        .project-summary-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 8px;
        }

        .summary-stat {
            text-align: center;
            padding: 12px 8px;
            background: rgba(253, 185, 19, 0.1);
            border-radius: 8px;
        }

        .summary-value {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #FDB913;
            font-weight: 700;
        }

        .summary-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #999;
            margin-top: 4px;
            display: block;
        }

        /* Estimate Badge */
        .estimate-badge {
            margin-left: auto;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 4px 10px;
            border-radius: 20px;
            background: #f0f0f0;
            color: #666;
            font-weight: 600;
        }

        .estimate-badge.fixed {
            background: #e8f5e9;
            color: #2e7d32;
        }

        /* Material Tiers */
        .material-tiers {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .tier-option {
            padding: 14px;
            background: #fff;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .tier-option:hover {
            border-color: #FDB913;
        }

        .tier-option.selected {
            border-color: #FDB913;
            background: #fff8e6;
        }

        .tier-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .tier-name {
            font-weight: 700;
            font-size: 12px;
            color: #000;
        }

        .tier-price {
            font-size: 10px;
            color: #666;
            background: #f0f0f0;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .tier-option.selected .tier-price {
            background: #FDB913;
            color: #000;
        }

        .tier-desc {
            font-size: 11px;
            color: #888;
            margin-bottom: 8px;
        }

        .tier-estimate {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            color: #000;
            font-weight: 600;
        }

        .selected-tier-summary {
            background: #fff;
            border-radius: 10px;
            padding: 16px;
            border: 2px solid #e8e8e8;
        }

        .selected-tier-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e8e8e8;
        }

        .selected-tier-label strong {
            color: #000;
        }

        .material-total {
            display: flex;
            justify-content: space-between;
            padding-top: 12px;
            margin-top: 12px;
            border-top: 2px solid #FDB913;
            font-size: 14px;
            font-weight: 700;
        }

        .material-total span:last-child {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            color: #000;
        }

        .thickness-note {
            font-style: italic;
            color: #888 !important;
        }

        /* Fab Notice */
        .fab-notice {
            padding: 12px;
            background: #f8f8f8;
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .fab-notice p {
            font-size: 11px;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        /* Enhanced Fab Items */
        .fab-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .fab-item:last-child {
            border-bottom: none;
        }

        .fab-item-main {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .fab-item-name {
            font-size: 13px;
            font-weight: 600;
            color: #000;
        }

        .fab-item-detail {
            font-size: 11px;
            color: #888;
        }

        .fab-item-cost {
            font-size: 14px;
            font-weight: 600;
            color: #000;
        }

        /* Scenario Tabs */
        .estimate-scenarios {
            margin-bottom: 20px;
        }

        .scenario-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
        }

        .scenario-tab {
            flex: 1;
            padding: 10px;
            background: #333;
            border: none;
            border-radius: 8px;
            color: #888;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .scenario-tab:hover {
            background: #444;
            color: #fff;
        }

        .scenario-tab.active {
            background: #FDB913;
            color: #000;
        }

        .scenario-content {
            text-align: center;
            padding: 20px;
            background: rgba(253, 185, 19, 0.1);
            border-radius: 10px;
        }

        .scenario-total {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #FDB913;
            font-weight: 700;
        }

        .scenario-breakdown {
            font-size: 12px;
            color: #999;
            margin-top: 8px;
        }

        /* Info Box Enhanced */
        .info-box-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 13px;
            color: #000;
            margin-bottom: 12px;
        }

        .info-box-header i {
            color: #FDB913;
        }

        .info-list {
            margin: 0;
            padding-left: 20px;
        }

        .info-list li {
            font-size: 12px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .info-list li:last-child {
            margin-bottom: 0;
        }

        .fab-install-box {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #e8e8e8;
        }

        .fab-install-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            background: #000;
            color: #fff;
        }

        .fab-install-total span:first-child {
            font-size: 14px;
            font-weight: 600;
        }

        .fab-install-value {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #FDB913;
        }

        .fab-install-breakdown {
            padding: 16px 20px;
        }

        .fab-item {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .fab-item:last-child {
            border-bottom: none;
        }

        .fab-item span:first-child {
            color: #666;
        }

        .fab-item span:last-child {
            color: #000;
            font-weight: 500;
        }

        .total-estimate-grid {
            margin-top: 16px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #333;
            font-size: 14px;
        }

        .total-row span:first-child {
            color: #888;
        }

        .total-row span:last-child {
            color: #fff;
            font-weight: 500;
        }

        .total-row.total-final {
            border-bottom: none;
            padding-top: 16px;
            margin-top: 8px;
            border-top: 2px solid #FDB913;
        }

        .total-row.total-final span:first-child {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
        }

        .total-row.total-final span:last-child {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #FDB913;
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .design-tool-container {
                grid-template-columns: 260px 1fr 300px;
            }
        }

        @media (max-width: 1200px) {
            .design-tool-container {
                grid-template-columns: 1fr;
            }

            .tool-sidebar,
            .properties-panel {
                max-height: none;
                border: none;
                border-bottom: 1px solid #e0e0e0;
            }

            .canvas-wrapper {
                min-height: 500px;
            }
        }

        @media (max-width: 768px) {
            .tool-hero {
                padding: 60px 20px 40px;
            }

            .tool-hero h1 {
                font-size: 32px;
            }

            .tool-hero p {
                font-size: 16px;
            }

            .tool-features-bar {
                gap: 20px;
            }

            .tool-feature-item {
                font-size: 13px;
            }

            .tool-sidebar,
            .properties-panel {
                padding: 20px;
            }

            .canvas-wrapper {
                padding: 15px;
                min-height: 400px;
            }

            .color-swatches {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Notification */
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .notification {
            animation: slideInRight 0.3s ease;
        }
    </style>
</head>
<body>
<?php $basePath = ''; include 'includes/header.php'; ?>

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
    <div class="design-tool-wrapper">
        <div class="design-tool-container">
            <!-- Left Toolbar -->
            <aside class="tool-sidebar">
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
                </div>

                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-border-style"></i>
                        Edge Profiles
                    </div>
                    <div class="edge-profiles-grid">
                        <div class="edge-profile-card selected" data-edge="eased" onclick="selectEdge('eased')">
                            <svg viewBox="0 0 60 30">
                                <path d="M5 25 L5 8 Q5 5 8 5 L55 5 L55 25 Z" fill="none" stroke="#FDB913" stroke-width="2"/>
                            </svg>
                            <span>Eased</span>
                        </div>
                        <div class="edge-profile-card" data-edge="beveled" onclick="selectEdge('beveled')">
                            <svg viewBox="0 0 60 30">
                                <path d="M5 25 L5 12 L12 5 L55 5 L55 25 Z" fill="none" stroke="#666" stroke-width="2"/>
                            </svg>
                            <span>Beveled</span>
                        </div>
                        <div class="edge-profile-card" data-edge="bullnose" onclick="selectEdge('bullnose')">
                            <svg viewBox="0 0 60 30">
                                <path d="M5 25 L5 15 Q5 5 15 5 L55 5 L55 25 Z" fill="none" stroke="#666" stroke-width="2"/>
                            </svg>
                            <span>Bullnose</span>
                        </div>
                        <div class="edge-profile-card" data-edge="ogee" onclick="selectEdge('ogee')">
                            <svg viewBox="0 0 60 30">
                                <path d="M5 25 L5 18 Q5 14 8 11 Q11 8 11 5 L55 5 L55 25 Z" fill="none" stroke="#666" stroke-width="2"/>
                            </svg>
                            <span>Ogee</span>
                        </div>
                        <div class="edge-profile-card" data-edge="waterfall" onclick="selectEdge('waterfall')">
                            <svg viewBox="0 0 60 30">
                                <path d="M5 5 L55 5 L55 25 L30 25 L30 12 L5 12 Z" fill="none" stroke="#666" stroke-width="2"/>
                            </svg>
                            <span>Waterfall</span>
                        </div>
                        <div class="edge-profile-card" data-edge="mitered" onclick="selectEdge('mitered')">
                            <svg viewBox="0 0 60 30">
                                <path d="M5 25 L5 5 L55 5 L55 25 L50 25 L50 10 L10 10 L10 25 Z" fill="none" stroke="#666" stroke-width="2"/>
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
                        <div class="backsplash-options hidden" id="backsplashOptions">
                            <label class="input-label" style="margin-top: 14px;">Position (select sides)</label>
                            <div class="backsplash-sides">
                                <label class="side-checkbox">
                                    <input type="checkbox" id="bsTop" checked onchange="updateBacksplashSides()">
                                    <span class="side-label"><i class="bi bi-arrow-up"></i> Top</span>
                                </label>
                                <label class="side-checkbox">
                                    <input type="checkbox" id="bsRight" onchange="updateBacksplashSides()">
                                    <span class="side-label"><i class="bi bi-arrow-right"></i> Right</span>
                                </label>
                                <label class="side-checkbox">
                                    <input type="checkbox" id="bsBottom" onchange="updateBacksplashSides()">
                                    <span class="side-label"><i class="bi bi-arrow-down"></i> Bottom</span>
                                </label>
                                <label class="side-checkbox">
                                    <input type="checkbox" id="bsLeft" onchange="updateBacksplashSides()">
                                    <span class="side-label"><i class="bi bi-arrow-left"></i> Left</span>
                                </label>
                            </div>
                            <div class="backsplash-height" style="margin-top: 14px;">
                                <label class="input-label">Height (inches)</label>
                                <input type="number" class="input-field" value="4" min="2" max="24" id="backsplashHeightInput" onchange="updateBacksplashHeight()">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tool-section">
                    <div class="tool-section-title">
                        <i class="bi bi-collection"></i>
                        Your Shapes
                    </div>
                    <div class="shapes-list" id="shapesList">
                        <div class="empty-state">
                            <i class="bi bi-vector-pen"></i>
                            <p>No shapes yet. Start drawing!</p>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Canvas Area -->
            <main class="canvas-area">
                <div class="canvas-toolbar">
                    <div class="canvas-toolbar-left">
                        <button class="toolbar-btn" onclick="undo()" title="Undo (Ctrl+Z)">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </button>
                        <button class="toolbar-btn" onclick="redo()" title="Redo (Ctrl+Y)">
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
                        <button class="toolbar-btn active" onclick="toggleGrid()" title="Toggle Grid" id="gridToggle">
                            <i class="bi bi-grid-3x3"></i>
                        </button>
                        <button class="toolbar-btn active" onclick="toggleSnap()" title="Snap to Grid" id="snapToggle">
                            <i class="bi bi-magnet"></i>
                        </button>
                    </div>
                    <div class="canvas-toolbar-right">
                        <div class="zoom-controls">
                            <button class="toolbar-btn" onclick="zoomOut()" style="width:30px;height:30px;border:none;">
                                <i class="bi bi-dash"></i>
                            </button>
                            <span class="zoom-level" id="zoomLevel">100%</span>
                            <button class="toolbar-btn" onclick="zoomIn()" style="width:30px;height:30px;border:none;">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <button class="toolbar-btn" onclick="fitToScreen()" title="Reset View">
                            <i class="bi bi-fullscreen"></i>
                        </button>
                        <button class="toolbar-btn" onclick="clearCanvas()" title="Clear All">
                            <i class="bi bi-x-circle"></i>
                        </button>
                    </div>
                </div>
                <div class="canvas-wrapper" id="canvasWrapper">
                    <canvas id="blueprint-canvas" width="900" height="600"></canvas>
                    <div class="instructions-overlay" id="canvasInstructions">
                        <i class="bi bi-vector-pen"></i>
                        <p>Select a drawing tool and click & drag to create shapes</p>
                        <small>Use precise measurements in the properties panel</small>
                    </div>
                </div>
            </main>

            <!-- Right Panel -->
            <aside class="properties-panel">
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
                            <i class="bi bi-droplet"></i>
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
                            <div class="empty-state" style="padding: 20px;">
                                <i class="bi bi-cursor" style="font-size: 32px;"></i>
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
                            <!-- Per-shape backsplash edges -->
                            <div id="shapeBacksplashSection" style="display:none; margin-top: 16px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.1);">
                                <label class="input-label" style="margin-bottom: 10px; display: block;">Backsplash Edges</label>
                                <div id="shapeBacksplashEdges" style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                                    <!-- Dynamically populated based on shape type -->
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

                    <!-- Quick Cost Estimate -->
                    <div class="tool-section">
                        <div class="tool-section-title">
                            <i class="bi bi-calculator"></i>
                            Quick Cost Estimate
                        </div>
                        <div class="quick-estimate-box">
                            <div class="quick-estimate-row">
                                <div class="quick-estimate-label">
                                    <span class="label-main">Material Costs</span>
                                    <span class="label-sub">Varies by color & brand</span>
                                </div>
                                <div class="quick-estimate-value range" id="quickMaterialRange">$0 – $0</div>
                            </div>
                            <div class="quick-estimate-row">
                                <div class="quick-estimate-label">
                                    <span class="label-main">Fabrication</span>
                                    <span class="label-sub">Template, cut, polish</span>
                                </div>
                                <div class="quick-estimate-value" id="quickFabCost">$0</div>
                            </div>
                            <div class="quick-estimate-row">
                                <div class="quick-estimate-label">
                                    <span class="label-main">Installation</span>
                                    <span class="label-sub">Delivery & setup</span>
                                </div>
                                <div class="quick-estimate-value" id="quickInstallCost">$0</div>
                            </div>
                            <div class="quick-estimate-row" id="quickEdgeRow" style="display:none;">
                                <div class="quick-estimate-label">
                                    <span class="label-main">Edge Upgrade</span>
                                    <span class="label-sub" id="quickEdgeName">Ogee</span>
                                </div>
                                <div class="quick-estimate-value" id="quickEdgeCost">+$0</div>
                            </div>
                            <div class="quick-estimate-row" id="quickCutoutsRow" style="display:none;">
                                <div class="quick-estimate-label">
                                    <span class="label-main">Cutouts</span>
                                    <span class="label-sub" id="quickCutoutsDetail">Sink & cooktop</span>
                                </div>
                                <div class="quick-estimate-value" id="quickCutoutsCost">$0</div>
                            </div>
                            <div class="quick-estimate-divider"></div>
                            <div class="quick-estimate-row total">
                                <div class="quick-estimate-label">
                                    <span class="label-main">Estimated Total</span>
                                    <span class="label-sub">Boca Raton rates</span>
                                </div>
                                <div class="quick-estimate-value range total" id="quickTotalRange">$0 – $0</div>
                            </div>
                        </div>
                        <div class="quick-estimate-note">
                            <i class="bi bi-info-circle"></i>
                            Material costs range from $40/sf (entry) to $150/sf (designer). See Estimate tab for detailed tier breakdown.
                        </div>
                    </div>
                </div>

                <!-- Estimate Tab -->
                <div class="tab-content" id="estimateTab">
                    <!-- Project Summary -->
                    <div class="estimate-section" style="background: #000; border: none;">
                        <div class="estimate-section-header" style="color: #fff;">
                            <i class="bi bi-clipboard-data" style="color: #FDB913;"></i>
                            <span>Project Summary</span>
                        </div>
                        <div class="project-summary-grid">
                            <div class="summary-stat">
                                <span class="summary-value" id="totalSqFtEst">0</span>
                                <span class="summary-label">Total Sq Ft</span>
                            </div>
                            <div class="summary-stat">
                                <span class="summary-value" id="totalEdgeFtEst">0</span>
                                <span class="summary-label">Linear Ft Edge</span>
                            </div>
                            <div class="summary-stat">
                                <span class="summary-value" id="totalCutoutsEst">0</span>
                                <span class="summary-label">Cutouts</span>
                            </div>
                        </div>
                    </div>

                    <!-- Material Cost Section -->
                    <div class="estimate-section">
                        <div class="estimate-section-header">
                            <i class="bi bi-gem"></i>
                            <span>Material Costs</span>
                            <span class="estimate-badge">Variable</span>
                        </div>
                        <div class="material-notice">
                            <i class="bi bi-info-circle"></i>
                            <p>Material pricing varies by color, pattern, and brand. Estimates shown for Boca Raton market (2025-2026 rates).</p>
                        </div>

                        <!-- Material Tiers -->
                        <div class="material-tiers">
                            <div class="tier-option" data-tier="entry">
                                <div class="tier-header">
                                    <span class="tier-name">Entry Level</span>
                                    <span class="tier-price">$40-55/sq ft</span>
                                </div>
                                <div class="tier-desc">Solid colors, basic patterns</div>
                                <div class="tier-estimate" id="tierEntryEst">$0 – $0</div>
                            </div>
                            <div class="tier-option selected" data-tier="standard">
                                <div class="tier-header">
                                    <span class="tier-name">Standard</span>
                                    <span class="tier-price">$55-75/sq ft</span>
                                </div>
                                <div class="tier-desc">Popular colors, subtle veining</div>
                                <div class="tier-estimate" id="tierStandardEst">$0 – $0</div>
                            </div>
                            <div class="tier-option" data-tier="premium">
                                <div class="tier-header">
                                    <span class="tier-name">Premium</span>
                                    <span class="tier-price">$75-100/sq ft</span>
                                </div>
                                <div class="tier-desc">Designer patterns, marble-look</div>
                                <div class="tier-estimate" id="tierPremiumEst">$0 – $0</div>
                            </div>
                            <div class="tier-option" data-tier="designer">
                                <div class="tier-header">
                                    <span class="tier-name">Designer</span>
                                    <span class="tier-price">$100-150/sq ft</span>
                                </div>
                                <div class="tier-desc">Ultra-premium, exotic looks</div>
                                <div class="tier-estimate" id="tierDesignerEst">$0 – $0</div>
                            </div>
                        </div>

                        <div class="selected-tier-summary">
                            <div class="selected-tier-label">Selected Tier: <strong id="selectedTierName">Standard</strong></div>
                            <div class="material-breakdown">
                                <div class="material-item">
                                    <span>Countertop Material (<span id="counterSqFtLabel">0</span> sq ft)</span>
                                    <span id="counterMaterialRange">$0 – $0</span>
                                </div>
                                <div class="material-item" id="backsplashMaterialRow" style="display:none;">
                                    <span>Backsplash Material (<span id="bsSqFtLabel">0</span> sq ft)</span>
                                    <span id="backsplashMaterialRange">$0 – $0</span>
                                </div>
                                <div class="material-item thickness-note" id="thicknessUpcharge" style="display:none;">
                                    <span>3cm Thickness Upcharge (+20%)</span>
                                    <span>Included above</span>
                                </div>
                            </div>
                            <div class="material-total">
                                <span>Material Subtotal</span>
                                <span id="materialCostRange">$0 – $0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Fabrication & Installation Section -->
                    <div class="estimate-section">
                        <div class="estimate-section-header">
                            <i class="bi bi-tools"></i>
                            <span>Fabrication & Installation</span>
                            <span class="estimate-badge fixed">Fixed Rates</span>
                        </div>
                        <div class="fab-notice">
                            <p>These costs are based on standard Boca Raton fabricator rates and include templating, cutting, polishing, and professional installation.</p>
                        </div>
                        <div class="fab-install-breakdown">
                            <div class="fab-item">
                                <div class="fab-item-main">
                                    <span class="fab-item-name">Fabrication</span>
                                    <span class="fab-item-detail"><span id="fabSqFt">0</span> sq ft × $22/sq ft</span>
                                </div>
                                <span class="fab-item-cost" id="fabCost">$0</span>
                            </div>
                            <div class="fab-item">
                                <div class="fab-item-main">
                                    <span class="fab-item-name">Installation</span>
                                    <span class="fab-item-detail"><span id="installSqFt">0</span> sq ft × $20/sq ft</span>
                                </div>
                                <span class="fab-item-cost" id="installCost">$0</span>
                            </div>
                            <div class="fab-item">
                                <div class="fab-item-main">
                                    <span class="fab-item-name">Edge Profile</span>
                                    <span class="fab-item-detail" id="selectedEdgeName">Eased (Standard)</span>
                                </div>
                                <span class="fab-item-cost" id="edgeCost">Included</span>
                            </div>
                            <div class="fab-item" id="sinkCutoutRow">
                                <div class="fab-item-main">
                                    <span class="fab-item-name">Sink Cutouts</span>
                                    <span class="fab-item-detail" id="sinkDetail">0 cutouts</span>
                                </div>
                                <span class="fab-item-cost" id="sinkCost">$0</span>
                            </div>
                            <div class="fab-item" id="cooktopCutoutRow">
                                <div class="fab-item-main">
                                    <span class="fab-item-name">Cooktop Cutouts</span>
                                    <span class="fab-item-detail" id="cooktopDetail">0 cutouts</span>
                                </div>
                                <span class="fab-item-cost" id="cooktopCost">$0</span>
                            </div>
                            <div class="fab-item" id="backsplashFabRow" style="display:none;">
                                <div class="fab-item-main">
                                    <span class="fab-item-name">Backsplash Fab</span>
                                    <span class="fab-item-detail" id="bsFabDetail">0 sq ft × $25/sq ft</span>
                                </div>
                                <span class="fab-item-cost" id="backsplashFabCost">$0</span>
                            </div>
                        </div>
                        <div class="fab-install-total">
                            <span>Fabrication & Installation Subtotal</span>
                            <span class="fab-install-value" id="fabInstallTotal">$0</span>
                        </div>
                    </div>

                    <!-- Total Estimate -->
                    <div class="cost-estimate-box">
                        <div class="cost-estimate-header">
                            <i class="bi bi-calculator"></i>
                            Total Project Estimate
                        </div>
                        <div class="estimate-scenarios">
                            <div class="scenario-tabs">
                                <button class="scenario-tab" data-scenario="low" onclick="selectScenario('low')">Budget</button>
                                <button class="scenario-tab active" data-scenario="mid" onclick="selectScenario('mid')">Mid-Range</button>
                                <button class="scenario-tab" data-scenario="high" onclick="selectScenario('high')">Premium</button>
                            </div>
                            <div class="scenario-content" id="scenarioContent">
                                <div class="scenario-total" id="scenarioTotal">$0</div>
                                <div class="scenario-breakdown" id="scenarioBreakdown">
                                    <span>Materials: $0</span> + <span>Fab & Install: $0</span>
                                </div>
                            </div>
                        </div>
                        <div class="total-estimate-grid">
                            <div class="total-row">
                                <span>Materials (based on selected tier)</span>
                                <span id="totalMaterialRange">$0 – $0</span>
                            </div>
                            <div class="total-row">
                                <span>Fabrication & Installation</span>
                                <span id="totalFabInstall">$0</span>
                            </div>
                            <div class="total-row total-final">
                                <span>Estimated Project Total</span>
                                <span id="totalEstimate">$0 – $0</span>
                            </div>
                        </div>
                        <div class="cost-estimate-note">
                            <i class="bi bi-geo-alt"></i>
                            Based on Boca Raton, FL market rates (2025-2026). Final pricing requires professional on-site measurement and material selection.
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn-download" onclick="downloadBlueprint()">
                            <i class="bi bi-download"></i>
                            Download Blueprint (PNG)
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

                    <div class="info-box">
                        <div class="info-box-header"><i class="bi bi-lightbulb"></i> Understanding Your Estimate</div>
                        <ul class="info-list">
                            <li><strong>Material costs</strong> vary by color, pattern, and brand (Cambria, Silestone, Caesarstone, LG Viatera). Entry colors start ~$40/sq ft; premium veined patterns reach $150+/sq ft.</li>
                            <li><strong>Fabrication</strong> includes templating, CNC cutting, edge profiling, and polishing at our Boca Raton facility.</li>
                            <li><strong>Installation</strong> includes delivery, seaming, leveling, caulking, and final polish.</li>
                            <li><strong>Edge profiles</strong>: Eased is standard. Upgraded edges (Ogee, Waterfall, Mitered) add $15-50 per linear foot.</li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
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
        backsplash: { enabled: false, height: 4, sides: { top: true, right: false, bottom: false, left: false } },
        zoom: 1,
        gridEnabled: true,
        snapEnabled: true,
        history: [],
        historyIndex: -1,
        isDrawing: false,
        startPoint: null,
        currentShape: null,
        pixelsPerInch: 4,
        // Resize state
        isResizing: false,
        resizeEdge: null, // 'top', 'right', 'bottom', 'left', 'topLeft', 'topRight', 'bottomLeft', 'bottomRight'
        resizeStartPoint: null,
        resizeStartShape: null // Store original shape dimensions
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
        cooktop: { '30': 175, '36': 200 }
    };

    // Initialize
    function init() {
        setupCanvas();
        setupEventListeners();
        drawCanvas();
        updateEstimate();
    }

    function setupCanvas() {
        const wrapper = document.getElementById('canvasWrapper');
        canvas.width = Math.min(900, wrapper.clientWidth - 60);
        canvas.height = Math.min(600, wrapper.clientHeight - 60);
    }

    function setupEventListeners() {
        canvas.addEventListener('mousedown', handleMouseDown);
        canvas.addEventListener('mousemove', handleMouseMove);
        canvas.addEventListener('mouseup', handleMouseUp);
        canvas.addEventListener('mouseleave', handleMouseUp);
        canvas.addEventListener('touchstart', handleTouchStart, { passive: false });
        canvas.addEventListener('touchmove', handleTouchMove, { passive: false });
        canvas.addEventListener('touchend', handleTouchEnd);
        document.addEventListener('keydown', handleKeyDown);
        window.addEventListener('resize', () => { setupCanvas(); drawCanvas(); });
    }

    // Drawing Functions
    function drawCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBackground();
        if (state.gridEnabled) drawGrid();
        state.shapes.forEach(shape => drawShape(shape, shape === state.selectedShape));
        if (state.isDrawing && state.currentShape) {
            drawShape(state.currentShape, false, true);
            drawDimensions(state.currentShape, true); // Show dimensions while drawing
        }
        state.shapes.forEach(shape => drawDimensions(shape));

        const instructions = document.getElementById('canvasInstructions');
        if (instructions) instructions.style.display = state.shapes.length === 0 && !state.isDrawing ? 'block' : 'none';
    }

    function drawBackground() {
        ctx.fillStyle = '#fff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Blueprint border
        ctx.strokeStyle = '#000';
        ctx.lineWidth = 2;
        ctx.strokeRect(1, 1, canvas.width - 2, canvas.height - 2);

        // Title block
        ctx.fillStyle = '#000';
        ctx.fillRect(canvas.width - 180, canvas.height - 50, 178, 48);
        ctx.fillStyle = '#FDB913';
        ctx.font = 'bold 12px Inter';
        ctx.fillText('GRIFFIN QUARTZ', canvas.width - 170, canvas.height - 32);
        ctx.fillStyle = '#fff';
        ctx.font = '9px Inter';
        ctx.fillText('Space Design Blueprint', canvas.width - 170, canvas.height - 18);
        ctx.fillText('Scale: 1" = ' + state.pixelsPerInch + 'px', canvas.width - 170, canvas.height - 8);
    }

    function drawGrid() {
        const gridSize = state.pixelsPerInch * 6;
        const smallGrid = state.pixelsPerInch;

        ctx.strokeStyle = 'rgba(0, 0, 0, 0.06)';
        ctx.lineWidth = 1;
        for (let x = 0; x <= canvas.width; x += smallGrid) {
            ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, canvas.height); ctx.stroke();
        }
        for (let y = 0; y <= canvas.height; y += smallGrid) {
            ctx.beginPath(); ctx.moveTo(0, y); ctx.lineTo(canvas.width, y); ctx.stroke();
        }

        ctx.strokeStyle = 'rgba(0, 0, 0, 0.12)';
        for (let x = 0; x <= canvas.width; x += gridSize) {
            ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, canvas.height); ctx.stroke();
        }
        for (let y = 0; y <= canvas.height; y += gridSize) {
            ctx.beginPath(); ctx.moveTo(0, y); ctx.lineTo(canvas.width, y); ctx.stroke();
        }
    }

    function drawShape(shape, isSelected, isPreview = false) {
        ctx.save();

        let fillColor, strokeColor;
        if (shape.type === 'sink' || shape.type === 'cooktop') {
            fillColor = 'rgba(253, 185, 19, 0.15)';
            strokeColor = '#FDB913';
        } else {
            fillColor = isPreview ? 'rgba(253, 185, 19, 0.1)' : 'rgba(0, 0, 0, 0.08)';
            strokeColor = isPreview ? '#FDB913' : '#000';
        }

        ctx.fillStyle = fillColor;
        ctx.strokeStyle = strokeColor;
        ctx.lineWidth = isSelected ? 3 : 2;
        if (isPreview) ctx.setLineDash([5, 5]);

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
        }

        if (isSelected && !isPreview) drawSelectionHandles(shape);
        if (shape.backsplash && state.backsplash.enabled) drawBacksplash(shape);
        ctx.restore();
    }

    function drawRectangle(shape) {
        ctx.beginPath();
        ctx.rect(shape.x, shape.y, shape.width, shape.height);
        ctx.fill();
        ctx.stroke();

        if (shape.type !== 'sink' && shape.type !== 'cooktop') {
            ctx.save();
            ctx.clip();
            ctx.strokeStyle = 'rgba(0, 0, 0, 0.05)';
            ctx.lineWidth = 1;
            for (let i = -shape.height; i < shape.width; i += 8) {
                ctx.beginPath();
                ctx.moveTo(shape.x + i, shape.y);
                ctx.lineTo(shape.x + i + shape.height, shape.y + shape.height);
                ctx.stroke();
            }
            ctx.restore();
        }

        ctx.fillStyle = '#000';
        ctx.font = 'bold 10px Inter';
        const label = shape.label || shape.type.toUpperCase();
        ctx.fillText(label, shape.x + 6, shape.y + 16);
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

        ctx.fillStyle = '#000';
        ctx.font = 'bold 10px Inter';
        ctx.fillText('L-SHAPE', shape.x + 6, shape.y + 16);
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

        ctx.fillStyle = '#000';
        ctx.font = 'bold 10px Inter';
        ctx.fillText('U-SHAPE', shape.x + 6, shape.y + 16);
    }

    function drawBacksplash(shape) {
        if (shape.type === 'sink' || shape.type === 'cooktop') return;
        if (!shape.backsplashEdges) return;

        const bsHeight = state.backsplash.height * state.pixelsPerInch;
        const gap = 4;
        const edges = getBacksplashEdgeRects(shape, bsHeight, gap);

        ctx.fillStyle = 'rgba(253, 185, 19, 0.2)';
        ctx.strokeStyle = '#FDB913';
        ctx.lineWidth = 1;
        ctx.setLineDash([4, 4]);

        // Draw each enabled edge using per-shape settings
        for (const [edgeName, rect] of Object.entries(edges)) {
            if (shape.backsplashEdges[edgeName]) {
                ctx.beginPath();
                ctx.rect(rect.x, rect.y, rect.w, rect.h);
                ctx.fill();
                ctx.stroke();
            }
        }

        ctx.setLineDash([]);
    }

    function drawDimensions(shape, isDrawing = false) {
        const widthInches = Math.round(shape.width / state.pixelsPerInch);
        const heightInches = Math.round(shape.height / state.pixelsPerInch);

        if (isDrawing) {
            // Large, prominent labels while drawing
            ctx.font = 'bold 14px Inter';
            const widthText = widthInches + '"';
            const heightText = heightInches + '"';
            const sqFt = ((widthInches * heightInches) / 144).toFixed(1);

            // Width label with background (top center)
            const widthLabelX = shape.x + shape.width/2;
            const widthLabelY = shape.y - 15;
            const widthMetrics = ctx.measureText(widthText);
            ctx.fillStyle = '#FDB913';
            ctx.fillRect(widthLabelX - widthMetrics.width/2 - 6, widthLabelY - 12, widthMetrics.width + 12, 18);
            ctx.fillStyle = '#000';
            ctx.fillText(widthText, widthLabelX - widthMetrics.width/2, widthLabelY);

            // Height label with background (right center)
            const heightLabelX = shape.x + shape.width + 20;
            const heightLabelY = shape.y + shape.height/2;
            const heightMetrics = ctx.measureText(heightText);
            ctx.fillStyle = '#FDB913';
            ctx.fillRect(heightLabelX - 4, heightLabelY - 10, heightMetrics.width + 8, 18);
            ctx.fillStyle = '#000';
            ctx.fillText(heightText, heightLabelX, heightLabelY + 4);

            // Square footage label (center of shape)
            ctx.font = 'bold 16px Inter';
            const sqFtText = sqFt + ' sq ft';
            const sqFtMetrics = ctx.measureText(sqFtText);
            const centerX = shape.x + shape.width/2;
            const centerY = shape.y + shape.height/2;
            ctx.fillStyle = 'rgba(0,0,0,0.8)';
            ctx.fillRect(centerX - sqFtMetrics.width/2 - 10, centerY - 12, sqFtMetrics.width + 20, 24);
            ctx.fillStyle = '#FDB913';
            ctx.fillText(sqFtText, centerX - sqFtMetrics.width/2, centerY + 5);

            // Dimension lines
            ctx.strokeStyle = '#FDB913';
            ctx.lineWidth = 2;
            // Top line
            ctx.beginPath();
            ctx.moveTo(shape.x, shape.y - 5);
            ctx.lineTo(shape.x + shape.width, shape.y - 5);
            ctx.stroke();
            // Right line
            ctx.beginPath();
            ctx.moveTo(shape.x + shape.width + 5, shape.y);
            ctx.lineTo(shape.x + shape.width + 5, shape.y + shape.height);
            ctx.stroke();
        } else {
            // Standard dimension display for placed shapes
            ctx.fillStyle = '#000';
            ctx.font = '10px Inter';
            const widthText = widthInches + '"';
            ctx.fillText(widthText, shape.x + shape.width/2 - ctx.measureText(widthText).width/2, shape.y - 6);

            ctx.strokeStyle = '#000';
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.moveTo(shape.x, shape.y - 3);
            ctx.lineTo(shape.x + shape.width, shape.y - 3);
            ctx.stroke();

            ctx.beginPath();
            ctx.moveTo(shape.x, shape.y);
            ctx.lineTo(shape.x, shape.y - 6);
            ctx.moveTo(shape.x + shape.width, shape.y);
            ctx.lineTo(shape.x + shape.width, shape.y - 6);
            ctx.stroke();

            ctx.save();
            ctx.translate(shape.x + shape.width + 12, shape.y + shape.height/2);
            ctx.rotate(-Math.PI/2);
            ctx.fillText(heightInches + '"', -ctx.measureText(heightInches + '"').width/2, 4);
            ctx.restore();

            ctx.beginPath();
            ctx.moveTo(shape.x + shape.width + 3, shape.y);
            ctx.lineTo(shape.x + shape.width + 3, shape.y + shape.height);
            ctx.stroke();
            ctx.beginPath();
            ctx.moveTo(shape.x + shape.width, shape.y);
            ctx.lineTo(shape.x + shape.width + 6, shape.y);
            ctx.moveTo(shape.x + shape.width, shape.y + shape.height);
            ctx.lineTo(shape.x + shape.width + 6, shape.y + shape.height);
            ctx.stroke();
        }
    }

    function drawSelectionHandles(shape) {
        // Corner handles
        const corners = [
            { x: shape.x, y: shape.y, edge: 'topLeft' },
            { x: shape.x + shape.width, y: shape.y, edge: 'topRight' },
            { x: shape.x + shape.width, y: shape.y + shape.height, edge: 'bottomRight' },
            { x: shape.x, y: shape.y + shape.height, edge: 'bottomLeft' }
        ];

        ctx.fillStyle = '#FDB913';
        ctx.strokeStyle = '#000';
        ctx.lineWidth = 1;
        corners.forEach(h => {
            ctx.beginPath();
            ctx.rect(h.x - 5, h.y - 5, 10, 10);
            ctx.fill();
            ctx.stroke();
        });

        // Edge resize handles (midpoints) with arrows
        drawResizeHandles(shape);
    }

    // Get resize handles for a shape (edge midpoints)
    function getResizeHandles(shape) {
        return {
            top: { x: shape.x + shape.width / 2, y: shape.y, cursor: 'ns-resize', direction: 'vertical' },
            right: { x: shape.x + shape.width, y: shape.y + shape.height / 2, cursor: 'ew-resize', direction: 'horizontal' },
            bottom: { x: shape.x + shape.width / 2, y: shape.y + shape.height, cursor: 'ns-resize', direction: 'vertical' },
            left: { x: shape.x, y: shape.y + shape.height / 2, cursor: 'ew-resize', direction: 'horizontal' },
            topLeft: { x: shape.x, y: shape.y, cursor: 'nwse-resize', direction: 'diagonal' },
            topRight: { x: shape.x + shape.width, y: shape.y, cursor: 'nesw-resize', direction: 'diagonal' },
            bottomRight: { x: shape.x + shape.width, y: shape.y + shape.height, cursor: 'nwse-resize', direction: 'diagonal' },
            bottomLeft: { x: shape.x, y: shape.y + shape.height, cursor: 'nesw-resize', direction: 'diagonal' }
        };
    }

    // Draw resize handles with arrows
    function drawResizeHandles(shape) {
        const handles = getResizeHandles(shape);
        const handleSize = 8;
        const arrowSize = 12;

        // Draw edge midpoint handles with arrows
        ['top', 'right', 'bottom', 'left'].forEach(edge => {
            const h = handles[edge];

            // Draw handle circle
            ctx.fillStyle = '#fff';
            ctx.strokeStyle = '#FDB913';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.arc(h.x, h.y, handleSize, 0, Math.PI * 2);
            ctx.fill();
            ctx.stroke();

            // Draw arrow inside
            ctx.fillStyle = '#FDB913';
            ctx.strokeStyle = '#FDB913';
            ctx.lineWidth = 2;
            ctx.beginPath();

            if (edge === 'top' || edge === 'bottom') {
                // Vertical double arrow
                const dir = edge === 'top' ? -1 : 1;
                // Arrow pointing outward
                ctx.moveTo(h.x, h.y + dir * 3);
                ctx.lineTo(h.x - 4, h.y - dir * 2);
                ctx.moveTo(h.x, h.y + dir * 3);
                ctx.lineTo(h.x + 4, h.y - dir * 2);
                // Arrow pointing inward
                ctx.moveTo(h.x, h.y - dir * 3);
                ctx.lineTo(h.x - 4, h.y + dir * 2);
                ctx.moveTo(h.x, h.y - dir * 3);
                ctx.lineTo(h.x + 4, h.y + dir * 2);
            } else {
                // Horizontal double arrow
                const dir = edge === 'left' ? -1 : 1;
                // Arrow pointing outward
                ctx.moveTo(h.x + dir * 3, h.y);
                ctx.lineTo(h.x - dir * 2, h.y - 4);
                ctx.moveTo(h.x + dir * 3, h.y);
                ctx.lineTo(h.x - dir * 2, h.y + 4);
                // Arrow pointing inward
                ctx.moveTo(h.x - dir * 3, h.y);
                ctx.lineTo(h.x + dir * 2, h.y - 4);
                ctx.moveTo(h.x - dir * 3, h.y);
                ctx.lineTo(h.x + dir * 2, h.y + 4);
            }
            ctx.stroke();
        });
    }

    // Find if mouse is over a resize handle
    function findResizeHandleAtPoint(x, y) {
        if (!state.selectedShape) return null;

        const handles = getResizeHandles(state.selectedShape);
        const tolerance = 12; // Click tolerance in pixels

        // Check corners first (they have priority)
        const cornerOrder = ['topLeft', 'topRight', 'bottomRight', 'bottomLeft'];
        for (const edge of cornerOrder) {
            const h = handles[edge];
            const dx = x - h.x;
            const dy = y - h.y;
            if (Math.sqrt(dx * dx + dy * dy) <= tolerance) {
                return { edge, handle: h };
            }
        }

        // Then check edge midpoints
        const edgeOrder = ['top', 'right', 'bottom', 'left'];
        for (const edge of edgeOrder) {
            const h = handles[edge];
            const dx = x - h.x;
            const dy = y - h.y;
            if (Math.sqrt(dx * dx + dy * dy) <= tolerance) {
                return { edge, handle: h };
            }
        }

        return null;
    }

    // Event Handlers
    function handleMouseDown(e) {
        const rect = canvas.getBoundingClientRect();
        const x = (e.clientX - rect.left) / state.zoom;
        const y = (e.clientY - rect.top) / state.zoom;

        if (state.tool === 'select') {
            // First check if clicking on a resize handle
            const resizeHit = findResizeHandleAtPoint(x, y);
            if (resizeHit && state.selectedShape) {
                state.isResizing = true;
                state.resizeEdge = resizeHit.edge;
                state.resizeStartPoint = { x, y };
                state.resizeStartShape = {
                    x: state.selectedShape.x,
                    y: state.selectedShape.y,
                    width: state.selectedShape.width,
                    height: state.selectedShape.height
                };
                return;
            }

            // Then check if clicking on a backsplash edge to toggle it
            const backsplashHit = findBacksplashEdgeAtPoint(x, y);
            if (backsplashHit) {
                // Toggle this specific edge
                backsplashHit.shape.backsplashEdges[backsplashHit.edge] = !backsplashHit.shape.backsplashEdges[backsplashHit.edge];
                saveToHistory();
                drawCanvas();
                updateEstimate();
                return;
            }

            const clickedShape = findShapeAtPoint(x, y);
            if (clickedShape) {
                selectShape(clickedShape);
                state.isDragging = true;
                state.dragOffset = { x: x - clickedShape.x, y: y - clickedShape.y };
            } else {
                selectShape(null);
            }
        } else {
            state.isDrawing = true;
            state.startPoint = snapToGrid({ x, y });
            state.currentShape = createShape(state.tool, state.startPoint.x, state.startPoint.y, 0, 0);
        }
    }

    function handleMouseMove(e) {
        const rect = canvas.getBoundingClientRect();
        const x = (e.clientX - rect.left) / state.zoom;
        const y = (e.clientY - rect.top) / state.zoom;

        // Handle cursor changes when hovering over resize handles
        if (state.tool === 'select' && !state.isResizing && !state.isDragging && !state.isDrawing) {
            const resizeHit = findResizeHandleAtPoint(x, y);
            if (resizeHit) {
                canvas.style.cursor = resizeHit.handle.cursor;
            } else if (state.selectedShape && findShapeAtPoint(x, y) === state.selectedShape) {
                canvas.style.cursor = 'move';
            } else {
                canvas.style.cursor = 'default';
            }
        }

        // Handle resizing
        if (state.isResizing && state.selectedShape && state.resizeStartShape) {
            const shape = state.selectedShape;
            const start = state.resizeStartShape;
            const dx = x - state.resizeStartPoint.x;
            const dy = y - state.resizeStartPoint.y;
            const minSize = state.pixelsPerInch * 6; // Minimum 6 inches

            switch (state.resizeEdge) {
                case 'top':
                    const newHeightTop = start.height - dy;
                    if (newHeightTop >= minSize) {
                        shape.y = snapToGrid({ x: 0, y: start.y + dy }).y;
                        shape.height = start.height - (shape.y - start.y);
                    }
                    break;
                case 'bottom':
                    shape.height = Math.max(minSize, snapToGrid({ x: 0, y: start.height + dy }).y);
                    break;
                case 'left':
                    const newWidthLeft = start.width - dx;
                    if (newWidthLeft >= minSize) {
                        shape.x = snapToGrid({ x: start.x + dx, y: 0 }).x;
                        shape.width = start.width - (shape.x - start.x);
                    }
                    break;
                case 'right':
                    shape.width = Math.max(minSize, snapToGrid({ x: start.width + dx, y: 0 }).x);
                    break;
                case 'topLeft':
                    const newWidthTL = start.width - dx;
                    const newHeightTL = start.height - dy;
                    if (newWidthTL >= minSize) {
                        shape.x = snapToGrid({ x: start.x + dx, y: 0 }).x;
                        shape.width = start.width - (shape.x - start.x);
                    }
                    if (newHeightTL >= minSize) {
                        shape.y = snapToGrid({ x: 0, y: start.y + dy }).y;
                        shape.height = start.height - (shape.y - start.y);
                    }
                    break;
                case 'topRight':
                    shape.width = Math.max(minSize, snapToGrid({ x: start.width + dx, y: 0 }).x);
                    const newHeightTR = start.height - dy;
                    if (newHeightTR >= minSize) {
                        shape.y = snapToGrid({ x: 0, y: start.y + dy }).y;
                        shape.height = start.height - (shape.y - start.y);
                    }
                    break;
                case 'bottomLeft':
                    shape.height = Math.max(minSize, snapToGrid({ x: 0, y: start.height + dy }).y);
                    const newWidthBL = start.width - dx;
                    if (newWidthBL >= minSize) {
                        shape.x = snapToGrid({ x: start.x + dx, y: 0 }).x;
                        shape.width = start.width - (shape.x - start.x);
                    }
                    break;
                case 'bottomRight':
                    shape.width = Math.max(minSize, snapToGrid({ x: start.width + dx, y: 0 }).x);
                    shape.height = Math.max(minSize, snapToGrid({ x: 0, y: start.height + dy }).y);
                    break;
            }

            drawCanvas();
            updateShapesList();
            selectShape(shape); // Update dimension fields
            updateEstimate();
            return;
        }

        if (state.isDrawing && state.startPoint) {
            const snappedPoint = snapToGrid({ x, y });
            state.currentShape.width = snappedPoint.x - state.startPoint.x;
            state.currentShape.height = snappedPoint.y - state.startPoint.y;
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

    function handleMouseUp() {
        // Handle end of resize
        if (state.isResizing) {
            state.isResizing = false;
            state.resizeEdge = null;
            state.resizeStartPoint = null;
            state.resizeStartShape = null;
            saveToHistory();
            canvas.style.cursor = 'default';
        }

        if (state.isDrawing && state.currentShape) {
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

    function handleTouchStart(e) { e.preventDefault(); const t = e.touches[0]; handleMouseDown({ clientX: t.clientX, clientY: t.clientY }); }
    function handleTouchMove(e) { e.preventDefault(); const t = e.touches[0]; handleMouseMove({ clientX: t.clientX, clientY: t.clientY }); }
    function handleTouchEnd() { handleMouseUp(); }

    function handleKeyDown(e) {
        if (e.key === 'Delete' || e.key === 'Backspace') deleteSelected();
        else if (e.key === 'Escape') { selectShape(null); state.isDrawing = false; state.currentShape = null; drawCanvas(); }
        else if ((e.ctrlKey || e.metaKey) && e.key === 'z') { e.preventDefault(); undo(); }
        else if ((e.ctrlKey || e.metaKey) && e.key === 'y') { e.preventDefault(); redo(); }
        else if ((e.ctrlKey || e.metaKey) && e.key === 'd') { e.preventDefault(); duplicateSelected(); }
    }

    // Shape Functions
    function createShape(type, x, y, width, height) {
        const canHaveBacksplash = type !== 'sink' && type !== 'cooktop';
        // Per-shape backsplash edges - each edge can be toggled independently
        // All edges start OFF - user selects which ones they want
        let backsplashEdges = null;
        if (canHaveBacksplash) {
            if (type === 'lshape') {
                // L-shape has 6 edges: top, right, innerTop, innerRight, bottom, left
                backsplashEdges = { top: false, right: false, innerTop: false, innerRight: false, bottom: false, left: false };
            } else if (type === 'ushape') {
                // U-shape has 8 edges
                backsplashEdges = { top: false, right: false, innerTopRight: false, innerRight: false, innerLeft: false, innerTopLeft: false, bottomLeft: false, bottomRight: false, left: false };
            } else {
                // Rectangle/island: standard 4 sides
                backsplashEdges = { top: false, right: false, bottom: false, left: false };
            }
        }
        return {
            id: Date.now(),
            type: type,
            x: x,
            y: y,
            width: width || 100,
            height: height || 60,
            backsplash: canHaveBacksplash,
            backsplashEdges: backsplashEdges,
            armWidth: type === 'lshape' ? 40 : type === 'ushape' ? 30 : undefined,
            armHeight: type === 'lshape' ? 40 : undefined,
            centerDepth: type === 'ushape' ? 50 : undefined
        };
    }

    function findShapeAtPoint(x, y) {
        for (let i = state.shapes.length - 1; i >= 0; i--) {
            const s = state.shapes[i];
            if (x >= s.x && x <= s.x + s.width && y >= s.y && y <= s.y + s.height) return s;
        }
        return null;
    }

    // Find if click is on a backsplash edge and return { shape, edge } or null
    function findBacksplashEdgeAtPoint(x, y) {
        if (!state.backsplash.enabled) return null;
        const bsHeight = state.backsplash.height * state.pixelsPerInch;
        const gap = 4;
        const tolerance = 8; // Click tolerance

        for (let i = state.shapes.length - 1; i >= 0; i--) {
            const s = state.shapes[i];
            if (!s.backsplash || !s.backsplashEdges) continue;

            const edges = getBacksplashEdgeRects(s, bsHeight, gap);
            for (const [edgeName, rect] of Object.entries(edges)) {
                if (s.backsplashEdges[edgeName] &&
                    x >= rect.x - tolerance && x <= rect.x + rect.w + tolerance &&
                    y >= rect.y - tolerance && y <= rect.y + rect.h + tolerance) {
                    return { shape: s, edge: edgeName };
                }
            }
        }
        return null;
    }

    // Get rectangle bounds for each backsplash edge of a shape
    function getBacksplashEdgeRects(shape, bsHeight, gap) {
        const edges = {};

        if (shape.type === 'lshape') {
            const armWidth = shape.armWidth || shape.width * 0.4;
            const armHeight = shape.armHeight || shape.height * 0.4;
            // 6 edges for L-shape:
            // top: full width at top
            edges.top = { x: shape.x, y: shape.y - bsHeight - gap, w: shape.width, h: bsHeight };
            // right: short vertical on right (armHeight tall)
            edges.right = { x: shape.x + shape.width + gap, y: shape.y, w: bsHeight, h: armHeight };
            // innerTop: horizontal edge inside the notch (at armHeight level)
            edges.innerTop = { x: shape.x + armWidth, y: shape.y + armHeight + gap, w: shape.width - armWidth, h: bsHeight };
            // innerRight: vertical edge inside the notch (at armWidth position)
            edges.innerRight = { x: shape.x + armWidth + gap, y: shape.y + armHeight, w: bsHeight, h: shape.height - armHeight };
            // bottom: bottom of left arm
            edges.bottom = { x: shape.x, y: shape.y + shape.height + gap, w: armWidth, h: bsHeight };
            // left: full height
            edges.left = { x: shape.x - bsHeight - gap, y: shape.y, w: bsHeight, h: shape.height };
        } else if (shape.type === 'ushape') {
            const armWidth = shape.armWidth || shape.width * 0.3;
            const centerDepth = shape.centerDepth || shape.height * 0.5;
            edges.top = { x: shape.x, y: shape.y - bsHeight - gap, w: shape.width, h: bsHeight };
            edges.right = { x: shape.x + shape.width + gap, y: shape.y, w: bsHeight, h: shape.height };
            edges.innerTopRight = { x: shape.x + shape.width - armWidth, y: shape.y + centerDepth + gap, w: armWidth, h: bsHeight };
            edges.innerRight = { x: shape.x + shape.width - armWidth - bsHeight - gap, y: shape.y + centerDepth, w: bsHeight, h: shape.height - centerDepth };
            edges.innerLeft = { x: shape.x + armWidth + gap, y: shape.y + centerDepth, w: bsHeight, h: shape.height - centerDepth };
            edges.innerTopLeft = { x: shape.x, y: shape.y + centerDepth + gap, w: armWidth, h: bsHeight };
            edges.bottomLeft = { x: shape.x, y: shape.y + shape.height + gap, w: armWidth, h: bsHeight };
            edges.bottomRight = { x: shape.x + shape.width - armWidth, y: shape.y + shape.height + gap, w: armWidth, h: bsHeight };
            edges.left = { x: shape.x - bsHeight - gap, y: shape.y, w: bsHeight, h: shape.height };
        } else {
            edges.top = { x: shape.x, y: shape.y - bsHeight - gap, w: shape.width, h: bsHeight };
            edges.right = { x: shape.x + shape.width + gap, y: shape.y, w: bsHeight, h: shape.height };
            edges.bottom = { x: shape.x, y: shape.y + shape.height + gap, w: shape.width, h: bsHeight };
            edges.left = { x: shape.x - bsHeight - gap, y: shape.y, w: bsHeight, h: shape.height };
        }
        return edges;
    }

    function selectShape(shape) {
        state.selectedShape = shape;
        const editor = document.getElementById('shapeEditor');
        const info = document.getElementById('selectedShapeInfo');
        const bsSection = document.getElementById('shapeBacksplashSection');
        const bsEdgesContainer = document.getElementById('shapeBacksplashEdges');

        if (shape) {
            editor.style.display = 'block';
            info.style.display = 'none';
            document.getElementById('shapeWidth').value = Math.round(shape.width / state.pixelsPerInch);
            document.getElementById('shapeDepth').value = Math.round(shape.height / state.pixelsPerInch);
            document.getElementById('shapePosX').value = Math.round(shape.x / state.pixelsPerInch);
            document.getElementById('shapePosY').value = Math.round(shape.y / state.pixelsPerInch);

            // Show backsplash edges if shape can have backsplash
            if (shape.backsplash && shape.backsplashEdges && state.backsplash.enabled) {
                bsSection.style.display = 'block';
                bsEdgesContainer.innerHTML = '';

                const edgeLabels = {
                    top: 'Top',
                    right: 'Right',
                    bottom: 'Bottom',
                    left: 'Left',
                    innerTop: 'Inner Top',
                    innerRight: 'Inner Right',
                    innerLeft: 'Inner Left',
                    innerTopRight: 'Inner Top Right',
                    innerTopLeft: 'Inner Top Left',
                    bottomLeft: 'Bottom Left',
                    bottomRight: 'Bottom Right'
                };

                for (const [edge, enabled] of Object.entries(shape.backsplashEdges)) {
                    const label = edgeLabels[edge] || edge;
                    const div = document.createElement('div');
                    div.style.cssText = 'display: flex; align-items: center; gap: 8px; padding: 6px 10px; background: rgba(255,255,255,0.05); border-radius: 6px; cursor: pointer;';
                    div.innerHTML = `
                        <input type="checkbox" id="bsEdge_${edge}" ${enabled ? 'checked' : ''} style="width: 16px; height: 16px; cursor: pointer;">
                        <label for="bsEdge_${edge}" style="cursor: pointer; font-size: 13px;">${label}</label>
                    `;
                    div.onclick = (e) => {
                        if (e.target.tagName !== 'INPUT') {
                            const checkbox = div.querySelector('input');
                            checkbox.checked = !checkbox.checked;
                        }
                        shape.backsplashEdges[edge] = div.querySelector('input').checked;
                        saveToHistory();
                        drawCanvas();
                        updateEstimate();
                    };
                    bsEdgesContainer.appendChild(div);
                }
            } else {
                bsSection.style.display = 'none';
            }
        } else {
            editor.style.display = 'none';
            info.style.display = 'block';
            bsSection.style.display = 'none';
        }
        drawCanvas();
    }

    function snapToGrid(point) {
        if (!state.snapEnabled) return point;
        const grid = state.pixelsPerInch;
        return { x: Math.round(point.x / grid) * grid, y: Math.round(point.y / grid) * grid };
    }

    // Tool Functions
    function setTool(tool) {
        state.tool = tool;
        document.querySelectorAll('.tool-btn').forEach(btn => btn.classList.toggle('active', btn.dataset.tool === tool));
        canvas.style.cursor = tool === 'select' ? 'default' : 'crosshair';
    }

    function selectEdge(edge) {
        state.selectedEdge = edgePrices[edge];
        document.querySelectorAll('.edge-profile-card').forEach(card => {
            const isSelected = card.dataset.edge === edge;
            card.classList.toggle('selected', isSelected);
            card.querySelector('svg path').setAttribute('stroke', isSelected ? '#FDB913' : '#666');
        });
        document.getElementById('selectedEdgeName').textContent = state.selectedEdge.name;
        updateEstimate();
    }

    function selectColor(el) {
        document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('selected'));
        el.classList.add('selected');
        state.selectedColor = { name: el.dataset.color, price: parseInt(el.dataset.price) };
        document.getElementById('selectedColorName').textContent = state.selectedColor.name;
        updateEstimate();
    }

    function selectThickness(el) {
        document.querySelectorAll('[data-thickness]').forEach(e => e.classList.remove('selected'));
        el.classList.add('selected');
        state.selectedThickness = parseInt(el.dataset.thickness);
        updateEstimate();
    }

    function toggleBacksplash() {
        const toggle = document.getElementById('backsplashToggle');
        const options = document.getElementById('backsplashOptions');
        state.backsplash.enabled = !state.backsplash.enabled;
        toggle.classList.toggle('active', state.backsplash.enabled);
        options.classList.toggle('hidden', !state.backsplash.enabled);

        // When enabling, ensure all shapes have their edges initialized (all OFF by default)
        if (state.backsplash.enabled) {
            state.shapes.forEach(s => {
                if (s.backsplash && !s.backsplashEdges) {
                    if (s.type === 'lshape') {
                        s.backsplashEdges = { top: false, right: false, innerTop: false, innerRight: false, bottom: false, left: false };
                    } else if (s.type === 'ushape') {
                        s.backsplashEdges = { top: false, right: false, innerTopRight: false, innerRight: false, innerLeft: false, innerTopLeft: false, bottomLeft: false, bottomRight: false, left: false };
                    } else if (s.type !== 'sink' && s.type !== 'cooktop') {
                        s.backsplashEdges = { top: false, right: false, bottom: false, left: false };
                    }
                }
            });
        }

        // Re-select shape to update UI
        if (state.selectedShape) {
            selectShape(state.selectedShape);
        }

        drawCanvas();
        updateEstimate();
    }

    function updateBacksplashHeight() {
        state.backsplash.height = parseInt(document.getElementById('backsplashHeightInput').value) || 4;
        drawCanvas();
        updateEstimate();
    }

    function updateBacksplashSides() {
        // Bulk toggle: apply checkbox states to outer edges of all shapes
        const top = document.getElementById('bsTop').checked;
        const right = document.getElementById('bsRight').checked;
        const bottom = document.getElementById('bsBottom').checked;
        const left = document.getElementById('bsLeft').checked;

        state.backsplash.sides = { top, right, bottom, left };

        // Apply to outer edges of all shapes (inner edges are per-shape only)
        state.shapes.forEach(s => {
            if (s.backsplash && s.backsplashEdges) {
                if (s.type === 'lshape') {
                    s.backsplashEdges.top = top;
                    s.backsplashEdges.right = right;
                    s.backsplashEdges.bottom = bottom;
                    s.backsplashEdges.left = left;
                    // Inner edges not affected by bulk toggle
                } else if (s.type === 'ushape') {
                    s.backsplashEdges.top = top;
                    s.backsplashEdges.right = right;
                    s.backsplashEdges.bottomLeft = bottom;
                    s.backsplashEdges.bottomRight = bottom;
                    s.backsplashEdges.left = left;
                    // Inner edges not affected by bulk toggle
                } else if (s.backsplashEdges) {
                    s.backsplashEdges.top = top;
                    s.backsplashEdges.right = right;
                    s.backsplashEdges.bottom = bottom;
                    s.backsplashEdges.left = left;
                }
            }
        });

        // Re-select shape to update UI
        if (state.selectedShape) {
            selectShape(state.selectedShape);
        }

        drawCanvas();
        updateEstimate();
    }

    function addSinkCutout(type) {
        const sizes = { single: { w: 88, h: 72, l: 'SINK (Single)' }, double: { w: 132, h: 88, l: 'SINK (Double)' }, farmhouse: { w: 120, h: 80, l: 'SINK (Farmhouse)' } };
        const s = sizes[type];
        const shape = { id: Date.now(), type: 'sink', subtype: type, x: 100, y: 100, width: s.w, height: s.h, label: s.l, backsplash: false };
        state.shapes.push(shape);
        selectShape(shape);
        saveToHistory();
        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    function addCooktopCutout(size) {
        const sizes = { '30': { w: 116, h: 80, l: 'COOKTOP (30")' }, '36': { w: 140, h: 80, l: 'COOKTOP (36")' } };
        const s = sizes[size];
        const shape = { id: Date.now(), type: 'cooktop', subtype: size, x: 200, y: 100, width: s.w, height: s.h, label: s.l, backsplash: false };
        state.shapes.push(shape);
        selectShape(shape);
        saveToHistory();
        updateShapesList();
        updateEstimate();
        drawCanvas();
    }

    // Canvas Controls
    function zoomIn() { state.zoom = Math.min(2, state.zoom + 0.1); document.getElementById('zoomLevel').textContent = Math.round(state.zoom * 100) + '%'; canvas.style.transform = `scale(${state.zoom})`; }
    function zoomOut() { state.zoom = Math.max(0.5, state.zoom - 0.1); document.getElementById('zoomLevel').textContent = Math.round(state.zoom * 100) + '%'; canvas.style.transform = `scale(${state.zoom})`; }
    function fitToScreen() { state.zoom = 1; document.getElementById('zoomLevel').textContent = '100%'; canvas.style.transform = 'scale(1)'; }
    function toggleGrid() { state.gridEnabled = !state.gridEnabled; document.getElementById('gridToggle').classList.toggle('active', state.gridEnabled); drawCanvas(); }
    function toggleSnap() { state.snapEnabled = !state.snapEnabled; document.getElementById('snapToggle').classList.toggle('active', state.snapEnabled); }
    function clearCanvas() { if (confirm('Clear all shapes?')) { state.shapes = []; state.selectedShape = null; saveToHistory(); updateShapesList(); updateEstimate(); drawCanvas(); } }
    function deleteSelected() { if (state.selectedShape) { state.shapes = state.shapes.filter(s => s !== state.selectedShape); state.selectedShape = null; saveToHistory(); updateShapesList(); updateEstimate(); drawCanvas(); } }
    function duplicateSelected() { if (state.selectedShape) { const n = { ...state.selectedShape, id: Date.now(), x: state.selectedShape.x + 20, y: state.selectedShape.y + 20 }; state.shapes.push(n); selectShape(n); saveToHistory(); updateShapesList(); updateEstimate(); drawCanvas(); } }

    // History
    function saveToHistory() { state.historyIndex++; state.history = state.history.slice(0, state.historyIndex); state.history.push(JSON.stringify(state.shapes)); }
    function undo() { if (state.historyIndex > 0) { state.historyIndex--; state.shapes = JSON.parse(state.history[state.historyIndex]); state.selectedShape = null; updateShapesList(); updateEstimate(); drawCanvas(); } }
    function redo() { if (state.historyIndex < state.history.length - 1) { state.historyIndex++; state.shapes = JSON.parse(state.history[state.historyIndex]); state.selectedShape = null; updateShapesList(); updateEstimate(); drawCanvas(); } }

    // Dimension Updates
    function updateShapeDimensions() {
        if (!state.selectedShape) return;
        state.selectedShape.width = parseInt(document.getElementById('shapeWidth').value) * state.pixelsPerInch;
        state.selectedShape.height = parseInt(document.getElementById('shapeDepth').value) * state.pixelsPerInch;
        saveToHistory(); updateShapesList(); updateEstimate(); drawCanvas();
    }

    function updateShapePosition() {
        if (!state.selectedShape) return;
        state.selectedShape.x = parseInt(document.getElementById('shapePosX').value) * state.pixelsPerInch;
        state.selectedShape.y = parseInt(document.getElementById('shapePosY').value) * state.pixelsPerInch;
        drawCanvas();
    }

    // UI Updates
    function updateShapesList() {
        const list = document.getElementById('shapesList');
        if (state.shapes.length === 0) {
            list.innerHTML = '<div class="empty-state"><i class="bi bi-vector-pen"></i><p>No shapes yet. Start drawing!</p></div>';
            return;
        }
        const icons = { rectangle: 'square', lshape: 'box', ushape: 'bounding-box', island: 'square-fill', sink: 'droplet', cooktop: 'fire' };
        list.innerHTML = state.shapes.map(s => {
            const w = Math.round(s.width / state.pixelsPerInch);
            const h = Math.round(s.height / state.pixelsPerInch);
            return `<div class="shape-item ${s === state.selectedShape ? 'selected' : ''}" onclick="selectShapeById(${s.id})">
                <div class="shape-item-info">
                    <div class="shape-item-icon"><i class="bi bi-${icons[s.type] || 'square'}"></i></div>
                    <div><div class="shape-item-name">${s.label || s.type.charAt(0).toUpperCase() + s.type.slice(1)}</div><div class="shape-item-dims">${w}" × ${h}"</div></div>
                </div>
                <button class="shape-item-delete" onclick="event.stopPropagation(); deleteShapeById(${s.id})"><i class="bi bi-trash"></i></button>
            </div>`;
        }).join('');
    }

    function selectShapeById(id) { selectShape(state.shapes.find(s => s.id === id)); }
    function deleteShapeById(id) { state.shapes = state.shapes.filter(s => s.id !== id); if (state.selectedShape?.id === id) state.selectedShape = null; saveToHistory(); updateShapesList(); updateEstimate(); drawCanvas(); }
    function switchTab(tab) { document.querySelectorAll('.panel-tab').forEach(t => t.classList.remove('active')); document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active')); event.target.classList.add('active'); document.getElementById(tab + 'Tab').classList.add('active'); }

    // =========================================================
    // Cost Estimation - Boca Raton, FL Market Rates (2025-2026)
    // =========================================================
    // Material Tiers:
    //   Entry Level: $40-55/sq ft (solid colors, basic patterns)
    //   Standard: $55-75/sq ft (popular colors, subtle veining)
    //   Premium: $75-100/sq ft (designer patterns, marble-look)
    //   Designer: $100-150/sq ft (ultra-premium, exotic looks)
    // Fabrication: $22/sq ft (includes template, CNC, polish)
    // Installation: $20/sq ft (includes delivery, seaming, caulk)
    // Edge upgrades: $12-50/linear ft (above standard eased)
    // Sink cutouts: $175-300 (based on complexity)
    // Cooktop cutouts: $200-275 (based on size)
    // Backsplash fab: $25/sq ft
    // =========================================================

    // Material tier pricing
    const materialTiers = {
        entry: { name: 'Entry Level', low: 40, high: 55 },
        standard: { name: 'Standard', low: 55, high: 75 },
        premium: { name: 'Premium', low: 75, high: 100 },
        designer: { name: 'Designer', low: 100, high: 150 }
    };

    let selectedTier = 'standard';
    let selectedScenario = 'mid';

    // Store calculated values for scenarios
    let estimateData = {};

    function selectTier(tier) {
        selectedTier = tier;
        document.querySelectorAll('.tier-option').forEach(t => {
            t.classList.toggle('selected', t.dataset.tier === tier);
        });
        document.getElementById('selectedTierName').textContent = materialTiers[tier].name;
        updateEstimateDisplay();
    }

    function selectScenario(scenario) {
        selectedScenario = scenario;
        document.querySelectorAll('.scenario-tab').forEach(t => {
            t.classList.toggle('active', t.dataset.scenario === scenario);
        });
        updateScenarioDisplay();
    }

    function updateScenarioDisplay() {
        const fabInstall = estimateData.totalFabInstall || 0;
        let matCost, label;

        if (selectedScenario === 'low') {
            matCost = estimateData.tierCosts?.entry?.low || 0;
            label = 'Entry-level materials';
        } else if (selectedScenario === 'mid') {
            matCost = Math.round((estimateData.tierCosts?.standard?.low + estimateData.tierCosts?.standard?.high) / 2) || 0;
            label = 'Standard materials';
        } else {
            matCost = estimateData.tierCosts?.designer?.high || 0;
            label = 'Designer materials';
        }

        const total = matCost + fabInstall;
        document.getElementById('scenarioTotal').textContent = '$' + total.toLocaleString();
        document.getElementById('scenarioBreakdown').innerHTML =
            '<span>Materials: $' + matCost.toLocaleString() + '</span> + <span>Fab & Install: $' + fabInstall.toLocaleString() + '</span>';
    }

    function updateEstimate() {
        let totalSqInches = 0, totalEdgeInches = 0;
        let sinkCount = { single: 0, double: 0, farmhouse: 0 };
        let cooktopCount = { '30': 0, '36': 0 };

        state.shapes.forEach(s => {
            if (s.type === 'sink') sinkCount[s.subtype]++;
            else if (s.type === 'cooktop') cooktopCount[s.subtype]++;
            else {
                const w = s.width / state.pixelsPerInch, h = s.height / state.pixelsPerInch;
                if (s.type === 'lshape') {
                    const aw = (s.armWidth || s.width * 0.4) / state.pixelsPerInch;
                    const ah = (s.armHeight || s.height * 0.4) / state.pixelsPerInch;
                    totalSqInches += (w * ah) + (aw * (h - ah));
                    totalEdgeInches += w + h + (w - aw) + (h - ah) + aw + ah;
                } else if (s.type === 'ushape') {
                    const aw = (s.armWidth || s.width * 0.3) / state.pixelsPerInch;
                    const cd = (s.centerDepth || s.height * 0.5) / state.pixelsPerInch;
                    totalSqInches += (w * cd) + (aw * (h - cd)) * 2;
                    totalEdgeInches += w * 2 + h * 2 + (w - aw * 2) * 2;
                } else {
                    totalSqInches += w * h;
                    totalEdgeInches += (w + h) * 2;
                }
            }
        });

        const totalSqFt = totalSqInches / 144;
        const totalEdgeFt = totalEdgeInches / 12;
        let backsplashSqFt = 0;

        if (state.backsplash.enabled) {
            const bsHeightIn = state.backsplash.height;
            state.shapes.forEach(s => {
                if (s.backsplash && s.backsplashEdges && s.type !== 'sink' && s.type !== 'cooktop') {
                    const shapeWidthIn = s.width / state.pixelsPerInch;
                    const shapeHeightIn = s.height / state.pixelsPerInch;

                    if (s.type === 'lshape') {
                        const armWidthIn = (s.armWidth || s.width * 0.4) / state.pixelsPerInch;
                        const armHeightIn = (s.armHeight || s.height * 0.4) / state.pixelsPerInch;
                        const innerTopWidthIn = shapeWidthIn - armWidthIn;
                        const innerRightHeightIn = shapeHeightIn - armHeightIn;
                        if (s.backsplashEdges.top) backsplashSqFt += (shapeWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.right) backsplashSqFt += (armHeightIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.innerTop) backsplashSqFt += (innerTopWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.innerRight) backsplashSqFt += (innerRightHeightIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.bottom) backsplashSqFt += (armWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.left) backsplashSqFt += (shapeHeightIn * bsHeightIn) / 144;
                    } else if (s.type === 'ushape') {
                        const armWidthIn = (s.armWidth || s.width * 0.3) / state.pixelsPerInch;
                        if (s.backsplashEdges.top) backsplashSqFt += (shapeWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.right) backsplashSqFt += (shapeHeightIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.bottomLeft) backsplashSqFt += (armWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.bottomRight) backsplashSqFt += (armWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.left) backsplashSqFt += (shapeHeightIn * bsHeightIn) / 144;
                    } else {
                        // Rectangle/island
                        if (s.backsplashEdges.top) backsplashSqFt += (shapeWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.bottom) backsplashSqFt += (shapeWidthIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.left) backsplashSqFt += (shapeHeightIn * bsHeightIn) / 144;
                        if (s.backsplashEdges.right) backsplashSqFt += (shapeHeightIn * bsHeightIn) / 144;
                    }
                }
            });
        }

        const totalMaterialSqFt = totalSqFt + backsplashSqFt;
        const thickMult = state.selectedThickness === 3 ? 1.2 : 1;

        // Calculate tier costs
        const tierCosts = {};
        Object.keys(materialTiers).forEach(tier => {
            const t = materialTiers[tier];
            tierCosts[tier] = {
                low: Math.round(totalMaterialSqFt * t.low * thickMult),
                high: Math.round(totalMaterialSqFt * t.high * thickMult)
            };
        });

        // Fabrication & Installation (Boca Raton 2025-2026 rates)
        const fabPerSqFt = 22;
        const installPerSqFt = 20;

        const fabCost = Math.round(totalSqFt * fabPerSqFt);
        const installCost = Math.round(totalSqFt * installPerSqFt);

        // Edge profile costs (per linear ft)
        const edgeCost = Math.round(totalEdgeFt * state.selectedEdge.price);

        // Cutout costs - Boca Raton rates (2025-2026)
        const sinkCostVal = sinkCount.single * 195 + sinkCount.double * 250 + sinkCount.farmhouse * 300;
        const cooktopCostVal = cooktopCount['30'] * 225 + cooktopCount['36'] * 275;

        // Backsplash fabrication
        let bsFabCost = 0;
        if (state.backsplash.enabled && backsplashSqFt > 0) {
            bsFabCost = Math.round(backsplashSqFt * 25);
        }

        const totalFabInstall = fabCost + installCost + edgeCost + sinkCostVal + cooktopCostVal + bsFabCost;
        const totalCutoutsNum = Object.values(sinkCount).reduce((a, b) => a + b, 0) + Object.values(cooktopCount).reduce((a, b) => a + b, 0);

        // Store for scenarios
        estimateData = {
            totalSqFt,
            totalEdgeFt,
            backsplashSqFt,
            totalMaterialSqFt,
            tierCosts,
            fabCost,
            installCost,
            edgeCost,
            sinkCostVal,
            cooktopCostVal,
            bsFabCost,
            totalFabInstall,
            totalCutoutsNum,
            sinkCount,
            cooktopCount
        };

        // Update Dimensions panel
        document.getElementById('totalSqFt').textContent = totalSqFt.toFixed(1) + ' sq ft';
        document.getElementById('totalEdge').textContent = totalEdgeFt.toFixed(1) + ' linear ft';
        document.getElementById('backsplashArea').textContent = backsplashSqFt.toFixed(1) + ' sq ft';
        document.getElementById('totalCutouts').textContent = totalCutoutsNum;

        updateEstimateDisplay();
    }

    function updateEstimateDisplay() {
        const d = estimateData;
        if (!d.tierCosts) return;

        const thickMult = state.selectedThickness === 3 ? 1.2 : 1;

        // Project Summary
        document.getElementById('totalSqFtEst').textContent = d.totalSqFt.toFixed(1);
        document.getElementById('totalEdgeFtEst').textContent = d.totalEdgeFt.toFixed(1);
        document.getElementById('totalCutoutsEst').textContent = d.totalCutoutsNum;

        // Material Tiers estimates
        Object.keys(materialTiers).forEach(tier => {
            const el = document.getElementById('tier' + tier.charAt(0).toUpperCase() + tier.slice(1) + 'Est');
            if (el) {
                el.textContent = '$' + d.tierCosts[tier].low.toLocaleString() + ' – $' + d.tierCosts[tier].high.toLocaleString();
            }
        });

        // Selected tier breakdown
        const tier = materialTiers[selectedTier];
        const counterMatLow = Math.round(d.totalSqFt * tier.low * thickMult);
        const counterMatHigh = Math.round(d.totalSqFt * tier.high * thickMult);
        let bsMatLow = 0, bsMatHigh = 0;
        if (state.backsplash.enabled && d.backsplashSqFt > 0) {
            bsMatLow = Math.round(d.backsplashSqFt * tier.low * thickMult);
            bsMatHigh = Math.round(d.backsplashSqFt * tier.high * thickMult);
        }

        document.getElementById('counterSqFtLabel').textContent = d.totalSqFt.toFixed(1);
        document.getElementById('counterMaterialRange').textContent = '$' + counterMatLow.toLocaleString() + ' – $' + counterMatHigh.toLocaleString();

        const bsMatRow = document.getElementById('backsplashMaterialRow');
        if (state.backsplash.enabled && d.backsplashSqFt > 0) {
            bsMatRow.style.display = 'flex';
            document.getElementById('bsSqFtLabel').textContent = d.backsplashSqFt.toFixed(1);
            document.getElementById('backsplashMaterialRange').textContent = '$' + bsMatLow.toLocaleString() + ' – $' + bsMatHigh.toLocaleString();
        } else {
            bsMatRow.style.display = 'none';
        }

        const thicknessRow = document.getElementById('thicknessUpcharge');
        thicknessRow.style.display = state.selectedThickness === 3 ? 'flex' : 'none';

        const matTotalLow = d.tierCosts[selectedTier].low;
        const matTotalHigh = d.tierCosts[selectedTier].high;
        document.getElementById('materialCostRange').textContent = '$' + matTotalLow.toLocaleString() + ' – $' + matTotalHigh.toLocaleString();

        // Fabrication & Installation breakdown
        document.getElementById('fabSqFt').textContent = d.totalSqFt.toFixed(1);
        document.getElementById('fabCost').textContent = '$' + d.fabCost.toLocaleString();
        document.getElementById('installSqFt').textContent = d.totalSqFt.toFixed(1);
        document.getElementById('installCost').textContent = '$' + d.installCost.toLocaleString();

        const edgeName = state.selectedEdge.name + (state.selectedEdge.price > 0 ? ' (+$' + state.selectedEdge.price + '/lf)' : ' (Standard)');
        document.getElementById('selectedEdgeName').textContent = edgeName;
        document.getElementById('edgeCost').textContent = d.edgeCost > 0 ? '+$' + d.edgeCost.toLocaleString() : 'Included';

        // Sink details
        const sinkTotal = d.sinkCount.single + d.sinkCount.double + d.sinkCount.farmhouse;
        let sinkDetails = [];
        if (d.sinkCount.single) sinkDetails.push(d.sinkCount.single + ' single');
        if (d.sinkCount.double) sinkDetails.push(d.sinkCount.double + ' double');
        if (d.sinkCount.farmhouse) sinkDetails.push(d.sinkCount.farmhouse + ' farmhouse');
        document.getElementById('sinkDetail').textContent = sinkTotal > 0 ? sinkDetails.join(', ') : '0 cutouts';
        document.getElementById('sinkCost').textContent = d.sinkCostVal > 0 ? '$' + d.sinkCostVal.toLocaleString() : '$0';

        // Cooktop details
        const cooktopTotal = d.cooktopCount['30'] + d.cooktopCount['36'];
        let cooktopDetails = [];
        if (d.cooktopCount['30']) cooktopDetails.push(d.cooktopCount['30'] + '× 30"');
        if (d.cooktopCount['36']) cooktopDetails.push(d.cooktopCount['36'] + '× 36"');
        document.getElementById('cooktopDetail').textContent = cooktopTotal > 0 ? cooktopDetails.join(', ') : '0 cutouts';
        document.getElementById('cooktopCost').textContent = d.cooktopCostVal > 0 ? '$' + d.cooktopCostVal.toLocaleString() : '$0';

        // Backsplash fab
        const bsFabRow = document.getElementById('backsplashFabRow');
        if (state.backsplash.enabled && d.backsplashSqFt > 0) {
            bsFabRow.style.display = 'flex';
            document.getElementById('bsFabDetail').textContent = d.backsplashSqFt.toFixed(1) + ' sq ft × $25/sq ft';
            document.getElementById('backsplashFabCost').textContent = '$' + d.bsFabCost.toLocaleString();
        } else {
            bsFabRow.style.display = 'none';
        }

        document.getElementById('fabInstallTotal').textContent = '$' + d.totalFabInstall.toLocaleString();

        // Totals
        document.getElementById('totalMaterialRange').textContent = '$' + matTotalLow.toLocaleString() + ' – $' + matTotalHigh.toLocaleString();
        document.getElementById('totalFabInstall').textContent = '$' + d.totalFabInstall.toLocaleString();

        const grandTotalLow = matTotalLow + d.totalFabInstall;
        const grandTotalHigh = matTotalHigh + d.totalFabInstall;
        document.getElementById('totalEstimate').textContent = '$' + grandTotalLow.toLocaleString() + ' – $' + grandTotalHigh.toLocaleString();

        // Update scenario display
        updateScenarioDisplay();
    }

    // Initialize tier click handlers
    document.querySelectorAll('.tier-option').forEach(el => {
        el.addEventListener('click', () => selectTier(el.dataset.tier));
    });

    // Export
    function downloadBlueprint() {
        const exp = document.createElement('canvas');
        exp.width = canvas.width * 2;
        exp.height = canvas.height * 2;
        const ectx = exp.getContext('2d');
        ectx.scale(2, 2);
        ectx.fillStyle = '#fff';
        ectx.fillRect(0, 0, canvas.width, canvas.height);
        ectx.drawImage(canvas, 0, 0);

        ectx.fillStyle = '#000';
        ectx.font = 'bold 14px Inter';
        ectx.fillText('COUNTERTOP BLUEPRINT', 16, 24);
        ectx.font = '11px Inter';
        ectx.fillText('Generated by Griffin Quartz', 16, 42);
        ectx.fillText('Color: ' + state.selectedColor.name + ' | Edge: ' + state.selectedEdge.name, 16, 58);
        ectx.fillText('Estimate: ' + document.getElementById('totalEstimate').textContent, 16, 74);

        const link = document.createElement('a');
        link.download = 'countertop-blueprint-' + Date.now() + '.png';
        link.href = exp.toDataURL('image/png');
        link.click();
        showNotification('Blueprint downloaded!', 'success');
    }

    function saveProject() {
        const data = { shapes: state.shapes, color: state.selectedColor, edge: state.selectedEdge, thickness: state.selectedThickness, backsplash: state.backsplash, date: new Date().toISOString() };
        const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
        const link = document.createElement('a');
        link.download = 'countertop-project-' + Date.now() + '.json';
        link.href = URL.createObjectURL(blob);
        link.click();
        showNotification('Project saved!', 'success');
    }

    function requestQuote() {
        const params = new URLSearchParams({ source: 'space-design-tool', sqft: document.getElementById('totalSqFt').textContent, color: state.selectedColor.name, edge: state.selectedEdge.name, estimate: document.getElementById('totalEstimate').textContent });
        window.location.href = 'contact?' + params.toString();
    }

    function showNotification(msg, type) {
        const n = document.createElement('div');
        n.className = 'notification';
        n.innerHTML = `<i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i> ${msg}`;
        n.style.cssText = `position:fixed;top:100px;right:20px;background:${type === 'success' ? '#000' : '#ef4444'};color:${type === 'success' ? '#FDB913' : '#fff'};padding:16px 24px;border-radius:8px;display:flex;align-items:center;gap:10px;z-index:9999;font-weight:600;box-shadow:0 4px 12px rgba(0,0,0,0.2);`;
        document.body.appendChild(n);
        setTimeout(() => n.remove(), 3000);
    }

    document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>
