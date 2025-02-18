<?php

const BASE_DIR = __DIR__;

require_once BASE_DIR . '/vendor/autoload.php';
//
require_once BASE_DIR . '/src/configs/constants.php';
require_once APP_DIR . 'helpers.php';

try {
    require_once SRC_DIR . 'configs/Database.php';
    \App\configs\Database::connect();

    require_once CONFIG_DIR . 'router.php';
} catch (PDOException $exception) {
    d('PDOException: ');
    dd($exception->getCode() . ' - ' . $exception->getMessage());
} catch (Exception $exception) {
    dd($exception->getCode() . ' - ' . $exception->getMessage());
}