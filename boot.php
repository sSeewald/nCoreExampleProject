<?php

/*
 * GLOBAL PHP Settings
 */
date_default_timezone_set('Europe/Berlin');
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

/*
 * GLOBAL PATH Definitions
 */
define('_ROOT_', __DIR__);

require_once 'vendor/autoload.php';

$config = array();

/*
 * Include bootstrap.php
 */
require_once 'etc/bootstrap.php';

/*
 * Define Error Handler
 */
define('NCORE_ERROR_EMAIL_SUBJECT_DOMAIN', $_SERVER['SERVER_NAME']);

/*
 * init [n]core
 */
$nCore = new nCore\App($config);

$nCore->render();