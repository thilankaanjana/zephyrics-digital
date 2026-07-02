-- ZephyricsStudio Admin Dashboard Database Schema
-- Run this in phpMyAdmin or via: mysql -u root -p zephyrics < schema.sql

CREATE DATABASE IF NOT EXISTS zephyrics_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE zephyrics_db;

-- Admin users
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(150),
    role ENUM('admin','editor') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login DATETIME NULL
) ENGINE=InnoDB;

-- Contact form leads
CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(40),
    service VARCHAR(120),
    message TEXT,
    status ENUM('new','contacted','converted','archived') DEFAULT 'new',
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_status (status),
    INDEX idx_created (created_at)
) ENGINE=InnoDB;

-- Portfolio projects
CREATE TABLE IF NOT EXISTS portfolio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    slug VARCHAR(220) NOT NULL UNIQUE,
    category VARCHAR(80),
    client_name VARCHAR(150),
    description TEXT,
    cover_image VARCHAR(300),
    project_url VARCHAR(300),
    tags VARCHAR(300),
    is_featured TINYINT(1) DEFAULT 0,
    status ENUM('published','draft') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Blog posts
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(220) NOT NULL,
    slug VARCHAR(240) NOT NULL UNIQUE,
    excerpt VARCHAR(500),
    content LONGTEXT,
    cover_image VARCHAR(300),
    category VARCHAR(80),
    tags VARCHAR(300),
    author_id INT,
    status ENUM('published','draft') DEFAULT 'draft',
    views INT DEFAULT 0,
    meta_title VARCHAR(200),
    meta_description VARCHAR(300),
    published_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES admin_users(id) ON DELETE SET NULL,
    INDEX idx_status (status),
    INDEX idx_slug (slug)
) ENGINE=InnoDB;

-- Page visits (analytics)
CREATE TABLE IF NOT EXISTS page_visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page_url VARCHAR(300) NOT NULL,
    referrer VARCHAR(300),
    user_agent VARCHAR(300),
    ip_address VARCHAR(45),
    visited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_page (page_url),
    INDEX idx_visited (visited_at)
) ENGINE=InnoDB;

-- Default admin user (username: admin  |  password: Admin@123)
-- CHANGE THIS PASSWORD IMMEDIATELY AFTER FIRST LOGIN.
INSERT INTO admin_users (username, email, password_hash, full_name, role)
VALUES ('admin', 'admin@zephyricsstudio.com',
        '$2y$10$3ZbY3Y6zZm.oQ0jL9x2p3.gA9uGZ8VJ1EQqJz1o0J2Q3xN9m6r7Se',
        'Site Administrator', 'admin')
ON DUPLICATE KEY UPDATE username=username;