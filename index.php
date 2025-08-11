<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Database;

$db = new Database();
$connection = $db->getConnection();


