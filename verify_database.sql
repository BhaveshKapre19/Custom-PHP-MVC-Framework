-- ========================================
-- Database Setup and Verification Script
-- Run this in phpMyAdmin SQL tab
-- ========================================

-- Step 1: Create database
CREATE DATABASE IF NOT EXISTS mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Step 2: Use the database
USE mvc;

-- Step 3: Verify database is selected
SELECT DATABASE() as current_database;

-- ========================================
-- After importing database_schema.sql
-- Run these queries to verify structure:
-- ========================================

-- Check tables were created
SHOW TABLES;

-- Should show:
-- +---------------+
-- | Tables_in_mvc |
-- +---------------+
-- | categorie     |
-- | comments      |
-- | post          |
-- | subscribers   |
-- | users         |
-- +---------------+

-- ========================================
-- After importing dummy_data.sql
-- Run these queries to verify data:
-- ========================================

-- Count users (should be 5)
SELECT COUNT(*) as total_users, 
       SUM(CASE WHEN user_role = 'admin' THEN 1 ELSE 0 END) as admins,
       SUM(CASE WHEN user_role = 'author' THEN 1 ELSE 0 END) as authors
FROM users;

-- Count categories (should be 10)
SELECT COUNT(*) as total_categories FROM categorie;

-- Count posts (should be 15)
SELECT COUNT(*) as total_posts,
       SUM(CASE WHEN post_status = 'published' THEN 1 ELSE 0 END) as published_posts
FROM post;

-- Count comments (should be 25)
SELECT COUNT(*) as total_comments FROM comments;

-- Count subscribers (should be 10)
SELECT COUNT(*) as total_subscribers,
       SUM(CASE WHEN subscriber_status = 1 THEN 1 ELSE 0 END) as active_subscribers
FROM subscribers;

-- ========================================
-- View sample data
-- ========================================

-- View all users
SELECT user_id, user_name, user_email, user_role, status 
FROM users 
ORDER BY user_id;

-- View all categories
SELECT categorie_id, categorie_name 
FROM categorie 
ORDER BY categorie_id;

-- View latest 5 posts
SELECT post_id, post_title, post_author, post_categorie, post_status, post_views, post_created_at
FROM post 
ORDER BY post_created_at DESC 
LIMIT 5;

-- View posts with author names and categories
SELECT 
    p.post_id,
    p.post_title,
    u.user_name as author,
    c.categorie_name as category,
    p.post_status,
    p.post_views,
    p.post_created_at
FROM post p
INNER JOIN users u ON p.post_author = u.user_id
INNER JOIN categorie c ON p.post_categorie = c.categorie_id
ORDER BY p.post_created_at DESC
LIMIT 10;

-- ========================================
-- Test queries (verify joins work)
-- ========================================

-- This query is similar to what the app uses
SELECT *, 
       post.post_id as postId, 
       users.user_id AS user_id, 
       post.post_created_at As postCreated, 
       users.created_at As userCreated 
FROM post 
INNER JOIN users ON post.post_author = users.user_id 
INNER JOIN categorie ON categorie.categorie_id = post.post_categorie 
ORDER BY post.post_created_at DESC 
LIMIT 3;

-- ========================================
-- Cleanup (ONLY IF YOU WANT TO START OVER)
-- ========================================

-- WARNING: This will delete all data!
-- Uncomment only if you need to reset:
-- DROP DATABASE IF EXISTS mvc;
