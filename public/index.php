<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('_BASE_URL_', $_SERVER['HTTP_HOST'].'/feedon');
$url = $_GET['url'];
$is_API = false;
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');

