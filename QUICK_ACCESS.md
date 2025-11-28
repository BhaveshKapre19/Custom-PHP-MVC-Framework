# Quick Access URLs - MTB Blog

> [!IMPORTANT]
> **LOGIN FIX REQUIRED!** If you imported the database before this fix, you need to run `fix_passwords.sql` to update password hashes. See `LOGIN_FIX.md` for details.

After importing the database (and running the password fix), use these URLs to access your application:

## 🏠 Main URLs

### Homepage
```
http://localhost/mvc/MVC
```
Shows latest 3 blog posts and author profiles.

### All Posts Page
```
http://localhost/mvc/MVC/posts
```
View all published blog posts.

### Login Page
```
http://localhost/mvc/MVC/users/login
```
**Test Credentials:**
- Email: `admin@mtb.com`
- Password: `password123`

### Admin Dashboard
```
http://localhost/mvc/MVC/admin
```
(Login required)

---

## 📝 Sample Post URLs (After Database Import)

Click these to view individual blog posts:

1. **PHP MVC Architecture**
   ```
   http://localhost/mvc/MVC/posts/viewpost/1
   ```

2. **JavaScript ES6 Features**
   ```
   http://localhost/mvc/MVC/posts/viewpost/2
   ```

3. **Database Indexing**
   ```
   http://localhost/mvc/MVC/posts/viewpost/3
   ```

4. **Docker for PHP**
   ```
   http://localhost/mvc/MVC/posts/viewpost/4
   ```

5. **PHP Security**
   ```
   http://localhost/mvc/MVC/posts/viewpost/5
   ```

---

## 🏷️ Category URLs (By ID)

View posts by category:

1. **Web Development** (ID: 1)
   ```
   http://localhost/mvc/MVC/posts/categorie/1
   ```

2. **PHP Programming** (ID: 2)
   ```
   http://localhost/mvc/MVC/posts/categorie/2
   ```

3. **JavaScript** (ID: 3)
   ```
   http://localhost/mvc/MVC/posts/categorie/3
   ```

---

## 👤 Author URLs (By ID)

View posts by author:

1. **Admin User** (ID: 1)
   ```
   http://localhost/mvc/MVC/posts/Author/1
   ```

2. **John Doe** (ID: 2)
   ```
   http://localhost/mvc/MVC/posts/Author/2
   ```

3. **Jane Smith** (ID: 3)
   ```
   http://localhost/mvc/MVC/posts/Author/3
   ```

---

## 🔍 URL Pattern Reference

All URLs follow this pattern:
```
http://localhost/mvc/MVC/[controller]/[method]/[id]
```

**Examples:**
- Homepage: `/` or `/home/index`
- View Post: `/posts/viewpost/5`
- Category: `/posts/categorie/2`
- Author: `/posts/Author/3`
- Login: `/users/login`
- Admin: `/admin`

---

## ⚡ Quick Test Checklist

After database import, test these URLs in order:

- [ ] 1. Homepage: http://localhost/mvc/MVC
- [ ] 2. All Posts: http://localhost/mvc/MVC/posts
- [ ] 3. View Post #1: http://localhost/mvc/MVC/posts/viewpost/1
- [ ] 4. Login Page: http://localhost/mvc/MVC/users/login
- [ ] 5. Admin (after login): http://localhost/mvc/MVC/admin

✅ All URLs should work without errors after database is imported!

---

For complete URL documentation, see: `URL_REFERENCE.md`
