<?php
require __DIR__ . '/vendor/autoload.php';

use route\Router;

try {
    $api = new Router();
    echo $api->run();
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}