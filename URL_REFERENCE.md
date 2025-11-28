# URL Reference Guide for MTB Blog

This document explains all URL patterns used in the MVC blog application.

## Base URL
```
http://localhost/mvc/MVC
```

## URL Structure

The MVC framework uses this URL pattern:
```
http://localhost/mvc/MVC/[controller]/[method]/[params]
```

## Available URLs

### Public Pages

#### Homepage
```
URL: http://localhost/mvc/MVC
URL: http://localhost/mvc/MVC/home
URL: http://localhost/mvc/MVC/home/index

Description: Shows latest 3 blog posts and author list
Controller: Home
Method: index
```

#### About Us
```
URL: http://localhost/mvc/MVC/home/aboutUs

Description: About page
Controller: Home
Method: aboutUs
```

#### View Single Post
```
URL: http://localhost/mvc/MVC/posts/viewpost/{post_id}
Example: http://localhost/mvc/MVC/posts/viewpost/1

Description: Display individual blog post with full content
Controller: Posts
Method: viewpost
Params: post_id (integer)
```

#### All Posts
```
URL: http://localhost/mvc/MVC/posts
URL: http://localhost/mvc/MVC/posts/index

Description: List all published posts
Controller: Posts
Method: index
```

#### Posts by Category
```
URL: http://localhost/mvc/MVC/posts/categorie/{category_id}
Example: http://localhost/mvc/MVC/posts/categorie/2

Description: Show posts filtered by category
Controller: Posts
Method: categorie
Params: category_id (integer)
```

#### Posts by Author
```
URL: http://localhost/mvc/MVC/posts/Author/{author_id}
Example: http://localhost/mvc/MVC/posts/Author/2

Description: Show posts by specific author
Controller: Posts
Method: Author
Params: author_id (integer)
```

#### Search
```
URL: http://localhost/mvc/MVC/posts/search?keyword={search_term}
Example: http://localhost/mvc/MVC/posts/search?keyword=php

Description: Search posts by keyword/tags
Controller: Posts
Method: search
Params: keyword (query string)
```

---

### User Authentication

#### Login Page
```
URL: http://localhost/mvc/MVC/users/login

Description: User login form
Controller: Users
Method: login
```

#### Register Page
```
URL: http://localhost/mvc/MVC/users/register

Description: New user registration
Controller: Users
Method: register
```

#### Logout
```
URL: http://localhost/mvc/MVC/users/logout

Description: Logout current user
Controller: Users
Method: logout
```

---

### User Profile

#### View Author Profile
```
URL: http://localhost/mvc/MVC/users/Author/{user_id}
Example: http://localhost/mvc/MVC/users/Author/2

Description: View author profile and their posts
Controller: Users
Method: Author
Params: user_id (integer)
```

#### Edit Profile
```
URL: http://localhost/mvc/MVC/users/edit

Description: Edit current user's profile
Controller: Users  
Method: edit
Auth Required: Yes
```

---

### Admin Panel

#### Admin Dashboard
```
URL: http://localhost/mvc/MVC/admin
URL: http://localhost/mvc/MVC/admin/index

Description: Admin control panel
Controller: Admin
Method: index
Auth Required: Yes (Admin role)
```

#### Manage Posts
```
URL: http://localhost/mvc/MVC/admin/posts

Description: List all posts (admin view)
Controller: Admin
Method: posts
Auth Required: Yes (Admin role)
```

#### Add New Post
```
URL: http://localhost/mvc/MVC/admin/addpost

Description: Create new blog post
Controller: Admin
Method: addpost
Auth Required: Yes (Author/Admin role)
```

#### Edit Post
```
URL: http://localhost/mvc/MVC/admin/editpost/{post_id}
Example: http://localhost/mvc/MVC/admin/editpost/5

Description: Edit existing post
Controller: Admin
Method: editpost
Params: post_id (integer)
Auth Required: Yes (Author/Admin role)
```

#### Delete Post
```
URL: http://localhost/mvc/MVC/admin/deletepost/{post_id}
Example: http://localhost/mvc/MVC/admin/deletepost/5

Description: Delete a post
Controller: Admin
Method: deletepost
Params: post_id (integer)
Auth Required: Yes (Admin role)
```

#### Manage Categories
```
URL: http://localhost/mvc/MVC/admin/categories

Description: List/manage categories
Controller: Admin
Method: categories
Auth Required: Yes (Admin role)
```

#### Add Category
```
URL: http://localhost/mvc/MVC/admin/addcategorie

Description: Add new category
Controller: Admin
Method: addcategorie
Auth Required: Yes (Admin role)
```

#### Edit Category
```
URL: http://localhost/mvc/MVC/admin/editcategorie/{category_id}

Description: Edit category
Controller: Admin
Method: editcategorie
Params: category_id (integer)
Auth Required: Yes (Admin role)
```

#### Delete Category
```
URL: http://localhost/mvc/MVC/admin/deletecategorie/{category_id}

Description: Delete category
Controller: Admin
Method: deletecategorie
Params: category_id (integer)
Auth Required: Yes (Admin role)
```

#### Manage Users
```
URL: http://localhost/mvc/MVC/admin/users

Description: List all users
Controller: Admin
Method: users
Auth Required: Yes (Admin role)
```

---

## URL Helper Functions

### In PHP Files (Backend)

#### Generate URL
```php
// Use URLROOT constant
echo URLROOT . '/posts/viewpost/' . $post_id;
// Output: http://localhost/mvc/MVC/posts/viewpost/5
```

#### Redirect Function
```php
// From url_helper.php
redirect('posts/viewpost/5');
// Redirects to: http://localhost/mvc/MVC/posts/viewpost/5
```

#### Get User Image URL
```php
// From url_helper.php
GetImageURLOfUsers($userName, $userId, $imagePath);
// Returns: http://localhost/mvc/MVC/userImages/John_Doe_2/avatar.jpg
```

---

### In HTML/View Files (Frontend)

#### Link to Post
```html
<!-- View single post -->
<a href="<?php echo URLROOT . '/posts/viewpost/' . $post->post_id; ?>">
    Read More
</a>
```

#### Link to Category
```html
<!-- Filter by category -->
<a href="<?php echo URLROOT . '/posts/categorie/' . $category->categorie_id; ?>">
    <?php echo $category->categorie_name; ?>
</a>
```

#### Link to Author Profile
```html
<!-- View author -->
<a href="<?php echo URLROOT . '/users/Author/' . $author->user_id; ?>">
    <?php echo $author->user_name; ?>
</a>
```

#### Image URLs
```html
<!-- Post image -->
<img src="<?php echo URLROOT; ?>/postImages/<?php echo $post->post_header_image; ?>">

<!-- User image -->
<img src="<?php echo GetImageURLOfUsers($user->user_name, $user->user_id, $user->user_image); ?>">
```

#### Forms
```html
<!-- Login form -->
<form action="<?php echo URLROOT; ?>/users/login" method="POST">
    <!-- form fields -->
</form>

<!-- Add post form -->
<form action="<?php echo URLROOT; ?>/admin/addpost" method="POST">
    <!-- form fields -->
</form>
```

---

## Asset URLs

### CSS Files
```html
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
```

### JavaScript Files
```html
<script src="<?php echo URLROOT; ?>/public/js/main.js"></script>
```

### Images Directory Structure
```
public/
  ├── postImages/          # Blog post header images
  ├── userImages/          # User profile images
  │   └── UserName_ID/     # e.g., John_Doe_2/
  └── images/              # General site images
```

---

## Quick Reference Table

| Action | URL Pattern | Example |
|--------|-------------|---------|
| Homepage | `/` | `http://localhost/mvc/MVC` |
| View Post | `/posts/viewpost/{id}` | `.../posts/viewpost/1` |
| Category Posts | `/posts/categorie/{id}` | `.../posts/categorie/2` |
| Author Posts | `/posts/Author/{id}` | `.../posts/Author/3` |
| Login | `/users/login` | `.../users/login` |
| Register | `/users/register` | `.../users/register` |
| Admin Dashboard | `/admin` | `.../admin` |
| Add Post | `/admin/addpost` | `.../admin/addpost` |
| Edit Post | `/admin/editpost/{id}` | `.../admin/editpost/5` |

---

## URL Rewriting

The `.htaccess` files handle URL rewriting:

### Root .htaccess
```apache
# Redirects all requests to public/
RewriteRule ^$ public/ [L]
RewriteRule (.*) public/$1 [L]
```

### Public .htaccess
```apache
# Routes all non-file/directory requests to index.php
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
```

This creates clean URLs without `index.php`:
- ✅ `http://localhost/mvc/MVC/posts/viewpost/1`
- ❌ `http://localhost/mvc/MVC/index.php?url=posts/viewpost/1`

---

## Testing URLs

After importing the database, you can test these URLs directly:

1. **Homepage**: http://localhost/mvc/MVC
2. **First Post**: http://localhost/mvc/MVC/posts/viewpost/1
3. **PHP Category** (ID: 2): http://localhost/mvc/MVC/posts/categorie/2
4. **Admin User Posts**: http://localhost/mvc/MVC/posts/Author/1
5. **Login**: http://localhost/mvc/MVC/users/login

---

## Common Issues & Solutions

### 404 Error on All Pages
**Problem**: Apache mod_rewrite not working  
**Solution**: 
```bash
# Enable mod_rewrite in Laragon
# Usually already enabled, restart Apache
```

### CSS/Images Not Loading
**Problem**: Incorrect URLROOT  
**Solution**: Check `app/config/config.php`:
```php
define('URLROOT', 'http://localhost/mvc/MVC');
```

### Post Links Not Working
**Problem**: Hardcoded URLs in views  
**Solution**: Use URLROOT constant:
```php
<!-- Wrong -->
<a href="post.html">

<!-- Correct -->
<a href="<?php echo URLROOT . '/posts/viewpost/' . $post->post_id; ?>">
```

---

**Last Updated**: 2025-11-28
