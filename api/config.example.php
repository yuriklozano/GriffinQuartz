<?php
/**
 * Database Configuration
 * Copy this file to config.php and update with your cPanel database credentials
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');  // e.g., 'Griffin_Quartz_Leads'
define('DB_USER', 'your_database_user');  // e.g., 'Yurikllozano'
define('DB_PASS', 'your_database_password');

/**
 * Site Configuration
 */
define('SITE_NAME', 'Griffin Quartz');
define('ADMIN_EMAIL', 'your@email.com');

/**
 * Security
 */
define('ALLOWED_ORIGINS', [
    'https://soflocountertops.com',
    'https://www.soflocountertops.com',
    'http://localhost'
]);
