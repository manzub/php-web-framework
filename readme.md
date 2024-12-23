# MyRouter - Lightweight PHP Web Framework (v1.0)

MyRouter is a minimalistic PHP web framework inspired by CodeIgniter and Laravel. It offers simplicity, speed, and structure for building web applications.

## Table of Contents

- [Features](#features)
- [Folder Structure](#folder-structure)
- [Getting Started](#getting-started)
- [Usage](#usage)
  - [Routing](#routing)
  - [Controllers](#controllers)
  - [Models](#models)
  - [AJAX Requests](#ajax-requests)
- [Configuration](#configuration)
- [Logging](#logging)
- [Public Assets](#public-assets)

## Features

- Simple and lightweight
- MVC architecture
- Routing with parameter support
- AJAX request handling
- Centralized logging
- Organized folder structure

## Folder Structure

```plaintext
/
├── index.php        # Main entry point for all requests
├── ajaxcatcher.php  # Handles AJAX requests
├── /models          # Contains model files
├── /controller      # Contains controller files
├── /public          # Public assets (HTML, CSS, JS, images, etc.)
├── /storage         # Stores data and logs (uploads, error logs, etc.)
├── /config          # Configuration files (router, database, settings)
├── log.txt          # Log file for server activities
```

## Getting Started

1. Clone or download this repository.
2. Place the project in your server's root directory.
3. Configure your server to point all requests to `index.php`.
4. Set up your database connection in `/config/db.php`.

## Usage

### Routing

Define routes in `index.php` using the `add` method of the `Router` class:

```php
$router->add('/home', 2); // Route: /home with 2 expected parameters
```

Run the router to handle incoming requests:

```php
$router->run();
```

Parameters are passed via URL segments, e.g., `/home/1/2`.

### Controllers

Controllers are stored in the `/controller` directory. Each controller corresponds to a route and follows the naming convention `c{RouteName}.php`. 

Example: `/home` calls `/controller/Home.php`:

```php
class cHome {
    public function handlePost($postData) {
        // Handle POST request
    }
}
```

### Models

Models are stored in the `/models` directory. Each model corresponds to a route and follows the naming convention `{RouteName}.php`.

Example: `/home` calls `/models/Home.php`:

```php
class Home {
    public function getData() {
        // Fetch data from the database
    }
}
```

### AJAX Requests

All AJAX requests are handled in `ajaxcatcher.php`. Write code blocks to manage specific requests:

```php
if ($_POST['action'] === 'fetchData') {
    // Handle AJAX fetch request
}
```

## Configuration

Configuration files are stored in `/config`. Key configuration files include:

- **router.php**: Define and manage routes.
- **db.php**: Database connection settings.
- **settings.php**: General application settings.

## Logging

All server activities, including errors, GET, and POST requests, are logged in `log.txt`. Use it to debug and monitor your application.

## Public Assets

Static files (CSS, JS, HTML) are stored in the `/public` directory. Include components like headers and footers here for easy access.

---

With MyRouter, you can create scalable and maintainable PHP applications effortlessly. Start building today!
