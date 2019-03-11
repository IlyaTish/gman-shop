<?php
// HTTP
define('HTTP_SERVER', 'https://github.com/IlyaTish/gman-shop');

// HTTPS
define('HTTPS_SERVER', 'https://github.com/IlyaTish/gman-shop');

// DIR
define('DIR_APPLICATION', 'https://github.com/IlyaTish/gman-shop/catalog/');
define('DIR_SYSTEM', 'https://github.com/IlyaTish/gman-shop/system/');
define('DIR_IMAGE', 'https://github.com/IlyaTish/gman-shop/image/');
define('DIR_STORAGE', 'https://github.com/IlyaTish/gman-shop/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'opencart-dev');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');