-- ========================================
-- MTB Blog Dummy Data
-- Sample data for testing the blog application
-- ========================================

-- USE mvc;

-- ========================================
-- Dummy Users
-- Password for all users: password123
-- Hashed using PHP password_hash('password123', PASSWORD_DEFAULT)
-- Hash: $2y$10$e0MYzXyjpJS7Pd2o.42reOuFkjfESjn8bbF1xN3y8pLbqL6FqLdPW
-- ========================================
INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_image`, `user_bio`, `user_twitter_link`, `user_facebook_link`, `user_youtube_link`, `status`, `user_role`) VALUES
('Admin User', 'admin@mtb.com', '$2y$10$e0MYzXyjpJS7Pd2o.42reOuFkjfESjn8bbF1xN3y8pLbqL6FqLdPW', 'admin-avatar.jpg', 'Chief editor and administrator of MTB. Passionate about technology and sharing knowledge.', 'https://twitter.com/mtbtech', 'https://facebook.com/mtbtech', 'https://youtube.com/mtbtech', 1, 'admin'),
('John Doe', 'john.doe@mtb.com', '$2y$10$e0MYzXyjpJS7Pd2o.42reOuFkjfESjn8bbF1xN3y8pLbqL6FqLdPW', 'john-avatar.jpg', 'Full-stack developer with 10 years of experience. Love writing about PHP, JavaScript, and modern web development.', 'https://twitter.com/johndoe', NULL, NULL, 1, 'author'),
('Jane Smith', 'jane.smith@mtb.com', '$2y$10$e0MYzXyjpJS7Pd2o.42reOuFkjfESjn8bbF1xN3y8pLbqL6FqLdPW', 'jane-avatar.jpg', 'Frontend specialist focusing on React and Vue.js. I believe in clean code and beautiful user experiences.', 'https://twitter.com/janesmith', 'https://facebook.com/janesmith', NULL, 1, 'author'),
('Mike Johnson', 'mike.johnson@mtb.com', '$2y$10$e0MYzXyjpJS7Pd2o.42reOuFkjfESjn8bbF1xN3y8pLbqL6FqLdPW', 'mike-avatar.jpg', 'DevOps engineer and cloud architecture enthusiast. Writing about Docker, Kubernetes, and CI/CD pipelines.', NULL, NULL, 'https://youtube.com/mikejohnson', 1, 'author'),
('Sarah Williams', 'sarah.williams@mtb.com', '$2y$10$e0MYzXyjpJS7Pd2o.42reOuFkjfESjn8bbF1xN3y8pLbqL6FqLdPW', 'sarah-avatar.jpg', 'Database expert and performance optimization specialist. SQL is my love language.', 'https://twitter.com/sarahwilliams', NULL, NULL, 1, 'author');

-- ========================================
-- Dummy Categories
-- ========================================
INSERT INTO `categorie` (`categorie_name`, `categorie_created_by`) VALUES
('Web Development', 1),
('PHP Programming', 1),
('JavaScript', 1),
('Database Design', 1),
('DevOps', 1),
('Security', 1),
('Performance', 1),
('Tutorials', 1),
('Best Practices', 1),
('News & Updates', 1);

-- ========================================
-- Dummy Posts
-- ========================================
INSERT INTO `post` (`post_title`, `post_author`, `post_categorie`, `post_tags`, `post_header_image`, `post_body`, `post_status`, `post_views`) VALUES
('Getting Started with PHP MVC Architecture', 2, 2, 'php,mvc,architecture,beginners', 'php-mvc-header.jpg', 
'<h2>Introduction to MVC Pattern</h2><p>The Model-View-Controller (MVC) pattern is a software architectural pattern that separates an application into three main logical components: the Model, the View, and the Controller.</p><h3>Understanding the Components</h3><p><strong>Model:</strong> The Model represents the data and the business logic. It directly manages the data, logic, and rules of the application.</p><p><strong>View:</strong> The View is responsible for displaying the data. It receives data from the Model and presents it to the user.</p><p><strong>Controller:</strong> The Controller acts as an intermediary between Model and View. It listens to user input, processes it, and updates the Model and View accordingly.</p><h3>Benefits of MVC</h3><ul><li>Separation of concerns</li><li>Easier to maintain and test</li><li>Code reusability</li><li>Parallel development</li></ul><p>In this tutorial, we will build a simple PHP MVC framework from scratch...</p>', 'published', 145),

('10 JavaScript ES6 Features You Should Master', 3, 3, 'javascript,es6,modern-js,tutorial', 'js-es6-header.jpg',
'<h2>Modern JavaScript Features</h2><p>ES6 (ECMAScript 2015) introduced many powerful features that changed how we write JavaScript. Here are the top 10 features every developer should master.</p><h3>1. Arrow Functions</h3><p>Arrow functions provide a shorter syntax and lexically bind the this value.</p><pre><code>const add = (a, b) => a + b;</code></pre><h3>2. Template Literals</h3><p>Template literals make string interpolation much cleaner.</p><pre><code>const name = "World";\nconsole.log(`Hello, ${name}!`);</code></pre><h3>3. Destructuring</h3><p>Extract values from arrays or objects easily.</p><pre><code>const { name, age } = person;</code></pre><p>And many more features to explore...</p>', 'published', 203),

('Database Indexing Best Practices', 5, 4, 'database,mysql,indexing,performance', 'db-index-header.jpg',
'<h2>Understanding Database Indexes</h2><p>Database indexes are crucial for query performance. However, improper use can actually slow down your database.</p><h3>When to Use Indexes</h3><ul><li>Frequently searched columns</li><li>Foreign key columns</li><li>ORDER BY and GROUP BY columns</li><li>JOIN conditions</li></ul><h3>When NOT to Index</h3><ul><li>Small tables</li><li>Frequently updated columns</li><li>Columns with low selectivity</li></ul><h3>Types of Indexes</h3><p><strong>Primary Key:</strong> Unique identifier for each row.</p><p><strong>Unique Index:</strong> Ensures all values in the column are different.</p><p><strong>Composite Index:</strong> Index on multiple columns.</p><p><strong>Full-text Index:</strong> For text search operations.</p>', 'published', 178),

('Docker for PHP Developers', 4, 5, 'docker,php,devops,containers', 'docker-php-header.jpg',
'<h2>Why Docker for PHP?</h2><p>Docker revolutionizes PHP development by providing consistent environments across development, testing, and production.</p><h3>Setting Up Your First PHP Docker Container</h3><p>Create a Dockerfile:</p><pre><code>FROM php:8.1-apache\nRUN docker-php-ext-install mysqli pdo pdo_mysql\nCOPY . /var/www/html/</code></pre><h3>Docker Compose for PHP Stack</h3><p>Use docker-compose.yml to orchestrate multiple containers.</p><pre><code>version: "3.8"\nservices:\n  web:\n    image: php:8.1-apache\n    ports:\n      - "80:80"\n  db:\n    image: mysql:8.0</code></pre><p>This setup gives you a complete LAMP stack in containers!</p>', 'published', 167),

('Securing Your PHP Application', 1, 6, 'security,php,web-security,best-practices', 'php-security-header.jpg',
'<h2>PHP Security Fundamentals</h2><p>Security should be a top priority in any web application. Here are essential practices for securing PHP applications.</p><h3>1. Prevent SQL Injection</h3><p>Always use prepared statements with PDO or MySQLi.</p><pre><code>$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");\n$stmt->execute([$email]);</code></pre><h3>2. Protect Against XSS</h3><p>Escape output using htmlspecialchars().</p><pre><code>echo htmlspecialchars($userInput, ENT_QUOTES, "UTF-8");</code></pre><h3>3. Password Security</h3><p>Use password_hash() and password_verify().</p><h3>4. CSRF Protection</h3><p>Implement CSRF tokens for all forms.</p>', 'published', 234),

('Building RESTful APIs with PHP', 2, 2, 'php,api,rest,backend', 'rest-api-header.jpg',
'<h2>Creating Modern REST APIs</h2><p>RESTful APIs are the backbone of modern web applications. Learn how to build them with PHP.</p><h3>REST Principles</h3><ul><li>Stateless communication</li><li>Resource-based URLs</li><li>Standard HTTP methods</li><li>JSON responses</li></ul><h3>Basic API Structure</h3><pre><code>// GET /api/posts\n// POST /api/posts\n// GET /api/posts/{id}\n// PUT /api/posts/{id}\n// DELETE /api/posts/{id}</code></pre><h3>Implementing Authentication</h3><p>Use JWT (JSON Web Tokens) for secure API authentication.</p>', 'published', 189),

('React Hooks: A Complete Guide', 3, 3, 'react,javascript,hooks,frontend', 'react-hooks-header.jpg',
'<h2>Understanding React Hooks</h2><p>Hooks revolutionized React development by allowing you to use state and lifecycle features in functional components.</p><h3>useState Hook</h3><pre><code>const [count, setCount] = useState(0);</code></pre><h3>useEffect Hook</h3><p>Handle side effects in your components.</p><pre><code>useEffect(() => {\n  document.title = `Count: ${count}`;\n}, [count]);</code></pre><h3>Custom Hooks</h3><p>Create reusable stateful logic.</p><pre><code>function useLocalStorage(key, initialValue) {\n  const [value, setValue] = useState(() => {\n    return localStorage.getItem(key) || initialValue;\n  });\n  // ... implementation\n}</code></pre>', 'published', 211),

('MySQL Performance Tuning Tips', 5, 4, 'mysql,database,performance,optimization', 'mysql-perf-header.jpg',
'<h2>Optimizing MySQL Performance</h2><p>Slow queries can kill your application performance. Here are proven techniques to speed up MySQL.</p><h3>Query Optimization</h3><ul><li>Use EXPLAIN to analyze queries</li><li>Avoid SELECT *</li><li>Limit result sets</li><li>Use appropriate indexes</li></ul><h3>Configuration Tuning</h3><p>Key MySQL configuration parameters:</p><ul><li>innodb_buffer_pool_size</li><li>max_connections</li><li>query_cache_size</li></ul><h3>Monitoring Tools</h3><p>Use tools like MySQL Workbench, Percona Toolkit, and pt-query-digest to monitor performance.</p>', 'published', 156),

('CI/CD Pipeline with GitHub Actions', 4, 5, 'cicd,github,devops,automation', 'github-actions-header.jpg',
'<h2>Automating Your Workflow</h2><p>Continuous Integration and Continuous Deployment (CI/CD) automate your development workflow. GitHub Actions makes this easy.</p><h3>Basic Workflow File</h3><pre><code>name: CI\non: [push, pull_request]\njobs:\n  test:\n    runs-on: ubuntu-latest\n    steps:\n      - uses: actions/checkout@v2\n      - name: Run tests\n        run: npm test</code></pre><h3>Deploying to Production</h3><p>Automate deployments to your server with SSH actions.</p>', 'published', 142),

('Understanding HTTPS and SSL/TLS', 1, 6, 'https,ssl,tls,security,certificates', 'https-ssl-header.jpg',
'<h2>Web Security with HTTPS</h2><p>HTTPS encrypts data between your browser and server, protecting sensitive information.</p><h3>How SSL/TLS Works</h3><ol><li>Client initiates connection</li><li>Server sends SSL certificate</li><li>Client validates certificate</li><li>Secure connection established</li></ol><h3>Getting Free SSL Certificates</h3><p>Use Let\'s Encrypt for free, automated SSL certificates.</p><pre><code>sudo certbot --apache</code></pre><h3>Best Practices</h3><ul><li>Use TLS 1.2 or higher</li><li>Enable HSTS</li><li>Regular certificate renewal</li></ul>', 'published', 198),

('PHP 8.2 New Features Overview', 2, 2, 'php,php8,new-features,update', 'php82-header.jpg',
'<h2>What\'s New in PHP 8.2</h2><p>PHP 8.2 brings exciting new features and improvements. Let\'s explore the highlights.</p><h3>Readonly Classes</h3><pre><code>readonly class User {\n    public function __construct(\n        public string $name,\n        public string $email\n    ) {}\n}</code></pre><h3>Disjunctive Normal Form (DNF) Types</h3><p>More expressive type declarations.</p><pre><code>function process((A&B)|C $param) {}</code></pre><h3>Deprecations and Changes</h3><p>Several functions are deprecated, encouraging modern PHP practices.</p>', 'published', 176),

('CSS Grid vs Flexbox: When to Use Each', 3, 1, 'css,grid,flexbox,layout,frontend', 'css-grid-flex-header.jpg',
'<h2>Modern CSS Layouts</h2><p>Both Grid and Flexbox are powerful layout systems, but when should you use each?</p><h3>Use Flexbox When:</h3><ul><li>One-dimensional layouts</li><li>Content-driven design</li><li>Navigation bars</li><li>Card layouts</li></ul><h3>Use Grid When:</h3><ul><li>Two-dimensional layouts</li><li>Complex page layouts</li><li>Magazine-style designs</li><li>Gallery layouts</li></ul><h3>Combining Both</h3><p>The real power comes from using both together!</p>', 'published', 187),

('MongoDB for PHP Developers', 5, 4, 'mongodb,nosql,php,database', 'mongodb-php-header.jpg',
'<h2>NoSQL with PHP</h2><p>MongoDB offers flexibility for applications that don\'t fit the relational model.</p><h3>Installing MongoDB Extension</h3><pre><code>pecl install mongodb</code></pre><h3>Basic Operations</h3><pre><code>$collection = $client->mydb->users;\n$collection->insertOne([\n    "name" => "John",\n    "email" => "john@example.com"\n]);</code></pre><h3>When to Choose MongoDB</h3><ul><li>Flexible schemas</li><li>Horizontal scalability</li><li>Document-oriented data</li></ul>', 'published', 134),

('Testing PHP Applications with PHPUnit', 2, 2, 'php,testing,phpunit,quality', 'phpunit-header.jpg',
'<h2>Automated Testing in PHP</h2><p>PHPUnit is the de facto standard for unit testing in PHP applications.</p><h3>Writing Your First Test</h3><pre><code>class CalculatorTest extends TestCase {\n    public function testAddition() {\n        $calc = new Calculator();\n        $this->assertEquals(4, $calc->add(2, 2));\n    }\n}</code></pre><h3>Test-Driven Development</h3><p>Write tests before implementation for better code quality.</p><h3>Code Coverage</h3><p>Aim for high test coverage but focus on critical paths.</p>', 'published', 163),

('Webpack 5 Essential Guide', 3, 3, 'webpack,javascript,bundler,build-tools', 'webpack5-header.jpg',
'<h2>Module Bundling with Webpack</h2><p>Webpack 5 brings improved performance and new features for modern JavaScript applications.</p><h3>Basic Configuration</h3><pre><code>module.exports = {\n  entry: "./src/index.js",\n  output: {\n    path: path.resolve(__dirname, "dist"),\n    filename: "bundle.js"\n  }\n};</code></pre><h3>Loaders and Plugins</h3><p>Transform and optimize your code with loaders and plugins.</p><h3>Code Splitting</h3><p>Improve performance with dynamic imports and code splitting.</p>', 'published', 149);

-- ========================================
-- Dummy Comments
-- ========================================
INSERT INTO `comments` (`comment_post_id`, `comment_author`, `comment_body`, `comment_status`) VALUES
(1, 3, 'Great introduction to MVC! This helped me understand the pattern much better.', 'approved'),
(1, 4, 'Very clear explanation. Looking forward to the next part of this tutorial!', 'approved'),
(1, 5, 'I\'ve been using MVC for years but this article gave me new insights. Thanks!', 'approved'),
(2, 2, 'Arrow functions are my favorite ES6 feature. So much cleaner!', 'approved'),
(2, 4, 'Don\'t forget about async/await, that\'s another game-changer!', 'approved'),
(3, 2, 'Excellent guide on indexing. The performance difference is huge!', 'approved'),
(3, 3, 'Question: What about covering indexes? Would love to see that covered.', 'approved'),
(3, 4, 'This saved my slow query. Thank you so much!', 'approved'),
(4, 2, 'Docker changed my development workflow completely. Best decision ever!', 'approved'),
(4, 3, 'The docker-compose example is very helpful. Using it in my project now.', 'approved'),
(5, 3, 'Security is so important. Every developer should read this!', 'approved'),
(5, 4, 'CSRF protection section is particularly useful. Thanks!', 'approved'),
(6, 3, 'Building my first API with this guide. Very helpful!', 'approved'),
(6, 5, 'Would love to see a follow-up on API versioning.', 'approved'),
(7, 2, 'Hooks make React so much easier to work with!', 'approved'),
(7, 4, 'The custom hooks section is gold. Great examples!', 'approved'),
(8, 2, 'My queries are 10x faster now. Thank you!', 'approved'),
(8, 3, 'EXPLAIN is my new best friend after reading this.', 'approved'),
(9, 3, 'GitHub Actions is amazing for CI/CD. This tutorial helped me get started.', 'approved'),
(9, 5, 'Automated deployments save so much time!', 'approved'),
(10, 2, 'Let\'s Encrypt is awesome. Free SSL for everyone!', 'approved'),
(10, 4, 'HTTPS should be mandatory for all websites in 2024.', 'approved'),
(11, 3, 'Readonly classes are so useful! Can\'t wait to use PHP 8.2.', 'approved'),
(12, 2, 'I always get confused between Grid and Flexbox. This clears it up!', 'approved'),
(13, 3, 'MongoDB is perfect for my project\'s flexible data structure.', 'approved');

-- ========================================
-- Dummy Subscribers
-- ========================================
INSERT INTO `subscribers` (`subscriber_email`, `subscriber_status`) VALUES
('subscriber1@example.com', 1),
('subscriber2@example.com', 1),
('subscriber3@example.com', 1),
('subscriber4@example.com', 1),
('subscriber5@example.com', 1),
('subscriber6@example.com', 1),
('subscriber7@example.com', 1),
('subscriber8@example.com', 1),
('subscriber9@example.com', 0),
('subscriber10@example.com', 1);

-- ========================================
-- End of Dummy Data
-- ========================================

-- Verification Queries
-- Uncomment these to verify data insertion:
-- SELECT COUNT(*) as user_count FROM users;
-- SELECT COUNT(*) as category_count FROM categorie;
-- SELECT COUNT(*) as post_count FROM post;
-- SELECT COUNT(*) as comment_count FROM comments;
-- SELECT COUNT(*) as subscriber_count FROM subscribers;
