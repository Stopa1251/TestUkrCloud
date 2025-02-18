<?php

const DB_HOST = 'database';
const DB_USER = 'root';
const DB_PASSWORD = 'secret';
const DATABASE = 'test_ukr_cloud';
const DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DATABASE;

define('SRC_DIR', BASE_DIR . '/src/');
define('MIGRATIONS_DIR', BASE_DIR . 'migrations/');
define('CONFIG_DIR', SRC_DIR . 'configs/');
define('APP_DIR', SRC_DIR . 'app/');
