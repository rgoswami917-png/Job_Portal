<?php
// Define the core paths
// DIRECTORY_SEPARATOR = "\" on Windows, "/" on Linux
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Automatically detect the ERIS project root folder
// dirname(__DIR__) = goes one folder up (from include/ to eris/)
defined('SITE_ROOT') ? null : define('SITE_ROOT', dirname(__DIR__));

// LIB_PATH = eris/include/
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'include');

// Load all required files
require_once(LIB_PATH . DS . "config.php");
require_once(LIB_PATH . DS . "function.php");
require_once(LIB_PATH . DS . "session.php");
require_once(LIB_PATH . DS . "accounts.php");
require_once(LIB_PATH . DS . "autonumbers.php");
require_once(LIB_PATH . DS . "companies.php");
require_once(LIB_PATH . DS . "job.php");
require_once(LIB_PATH . DS . "employees.php");
require_once(LIB_PATH . DS . "categories.php");
require_once(LIB_PATH . DS . "applicant.php");
require_once(LIB_PATH . DS . "jobregistration.php");
require_once(LIB_PATH . DS . "database.php");
?>
