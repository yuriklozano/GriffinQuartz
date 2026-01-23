<?php
/**
 * Database Configuration
 * Update these values with your cPanel database credentials
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');  // e.g., 'username_leads'
define('DB_USER', 'your_database_user');  // e.g., 'username_leadsuser'
define('DB_PASS', 'your_database_password');

/**
 * Site Configuration
 */
define('SITE_NAME', 'Griffin Quartz');
define('ADMIN_EMAIL', 'info@soflocountertops.com');

/**
 * Security
 */
define('ALLOWED_ORIGINS', [
    'https://soflocountertops.com',
    'https://www.soflocountertops.com',
    'http://localhost'
]);
