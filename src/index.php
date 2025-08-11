<?php

import config\Database;

$db = new Database();
$connection = $db->getConnection();
echo "Database connection established successfully.";
