-- ========================================
-- MTB Blog Database Schema
-- MySQL Database for PHP MVC Blog Project
-- ========================================

-- Create database (uncomment if needed)
-- CREATE DATABASE IF NOT EXISTS mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE mvc;

-- ========================================
-- Table: users
-- Stores user accounts and profiles
-- ========================================
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL UNIQUE,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT 'default-avatar.png',
  `user_bio` text DEFAULT NULL,
  `user_twitter_link` varchar(255) DEFAULT NULL,
  `user_facebook_link` varchar(255) DEFAULT NULL,
  `user_youtube_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=inactive',
  `user_role` enum('admin','author','subscriber') DEFAULT 'subscriber',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `idx_user_email` (`user_email`),
  KEY `idx_user_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Table: categorie
-- Blog post categories
-- Note: Using 'categorie' to match existing code
-- ========================================
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(255) NOT NULL,
  `categorie_created_by` int(11) NOT NULL,
  `categorie_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categorie_id`),
  KEY `idx_categorie_name` (`categorie_name`),
  KEY `fk_categorie_creator` (`categorie_created_by`),
  CONSTRAINT `fk_categorie_creator` FOREIGN KEY (`categorie_created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Table: post
-- Blog posts
-- ========================================
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(500) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_categorie` int(11) NOT NULL,
  `post_tags` varchar(500) DEFAULT NULL,
  `post_header_image` varchar(255) DEFAULT 'default-post.jpg',
  `post_body` longtext NOT NULL,
  `post_status` enum('draft','published','archived') DEFAULT 'published',
  `post_views` int(11) DEFAULT 0,
  `post_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `idx_post_status` (`post_status`),
  KEY `idx_post_created` (`post_created_at`),
  KEY `fk_post_author` (`post_author`),
  KEY `fk_post_categorie` (`post_categorie`),
  CONSTRAINT `fk_post_author` FOREIGN KEY (`post_author`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_post_categorie` FOREIGN KEY (`post_categorie`) REFERENCES `categorie` (`categorie_id`) ON DELETE CASCADE,
  FULLTEXT KEY `idx_post_search` (`post_title`, `post_body`, `post_tags`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Table: comments
-- Post comments
-- ========================================
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_status` enum('pending','approved','spam') DEFAULT 'approved',
  `comment_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `idx_comment_post` (`comment_post_id`),
  KEY `idx_comment_author` (`comment_author`),
  KEY `idx_comment_status` (`comment_status`),
  CONSTRAINT `fk_comment_post` FOREIGN KEY (`comment_post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_comment_author` FOREIGN KEY (`comment_author`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Table: subscribers
-- Newsletter subscribers
-- ========================================
CREATE TABLE IF NOT EXISTS `subscribers` (
  `subscriber_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_email` varchar(255) NOT NULL UNIQUE,
  `subscriber_status` tinyint(1) DEFAULT 1 COMMENT '1=active, 0=unsubscribed',
  `subscribed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriber_id`),
  KEY `idx_subscriber_email` (`subscriber_email`),
  KEY `idx_subscriber_status` (`subscriber_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- End of Schema
-- ========================================
