<?php
/**
 * Created by novael media.
 * Date: 13.09.13
 * Time: 12:46
 */

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

/*
 * AUTOLOADER register PREFIXES
 */
require_once 'nCore/Config.php';
/*
 * nCore default loader
 */
require_once 'nCore/Core/Cache/ClassLoader.php';
/*
 * nCore fallback loader
 */
require_once 'nCore/Autoloader.php';
nCore\Autoloader::register(true);
require_once 'nCore/App.php';
require_once 'Library/autoload.php';

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