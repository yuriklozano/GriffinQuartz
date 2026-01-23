-- =====================================================
-- Griffin Quartz Blog CMS - Database Migration
-- Run this in cPanel phpMyAdmin
-- =====================================================

-- Blog Posts - Main posts table
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    content LONGTEXT,
    excerpt TEXT,
    featured_image VARCHAR(500),
    featured_image_alt VARCHAR(255),
    status ENUM('draft', 'scheduled', 'published') DEFAULT 'draft',
    publish_date DATETIME,

    -- SEO Fields
    seo_title VARCHAR(255),
    seo_description TEXT,
    seo_keywords VARCHAR(500),
    og_title VARCHAR(255),
    og_description TEXT,
    og_image VARCHAR(500),

    -- Metadata
    author VARCHAR(100) DEFAULT 'Griffin Quartz Team',
    views INT DEFAULT 0,

    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX idx_slug (slug),
    INDEX idx_status (status),
    INDEX idx_publish_date (publish_date),
    INDEX idx_status_date (status, publish_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Categories - with parent support for hierarchy
CREATE TABLE IF NOT EXISTS blog_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    parent_id INT DEFAULT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_slug (slug),
    INDEX idx_parent (parent_id),
    FOREIGN KEY (parent_id) REFERENCES blog_categories(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Tags
CREATE TABLE IF NOT EXISTS blog_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Post Categories - Many-to-many relationship
CREATE TABLE IF NOT EXISTS blog_post_categories (
    post_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (post_id, category_id),
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Post Tags - Many-to-many relationship
CREATE TABLE IF NOT EXISTS blog_post_tags (
    post_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES blog_tags(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog Revisions - Revision history
CREATE TABLE IF NOT EXISTS blog_revisions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT,
    excerpt TEXT,
    revision_note VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_post (post_id),
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Blog FAQs - FAQ items per post for Schema.org
CREATE TABLE IF NOT EXISTS blog_faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_post (post_id),
    FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default categories
INSERT INTO blog_categories (name, slug, description, sort_order) VALUES
('Quartz Countertops', 'quartz-countertops', 'Articles about quartz countertop selection, care, and design', 1),
('Installation Guides', 'installation-guides', 'Step-by-step installation and maintenance guides', 2),
('Cost & Pricing', 'cost-pricing', 'Information about countertop costs and pricing guides', 3),
('Design Inspiration', 'design-inspiration', 'Design ideas and style inspiration for your space', 4),
('Comparisons', 'comparisons', 'Quartz vs granite, marble, and other material comparisons', 5),
('Local Guides', 'local-guides', 'Location-specific guides for Fort Lauderdale and South Florida', 6);

-- Insert common tags
INSERT INTO blog_tags (name, slug) VALUES
('quartz', 'quartz'),
('granite', 'granite'),
('marble', 'marble'),
('kitchen', 'kitchen'),
('bathroom', 'bathroom'),
('fort lauderdale', 'fort-lauderdale'),
('cost guide', 'cost-guide'),
('installation', 'installation'),
('maintenance', 'maintenance'),
('design', 'design'),
('colors', 'colors'),
('brands', 'brands');
