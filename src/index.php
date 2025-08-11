<?php

require_once __DIR__ . '/vendor/autoload.php';

use Config\Database;

$db = new Database();
$connection = $db->getConnection();
echo "Database connection established successfully.";
