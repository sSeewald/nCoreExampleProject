<?php
define('NCORE_START', microtime(true));

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 0);

/*
 * GLOBAL PHP Settings
 *
 * "Note: Because [n]core uses symfony's session implementation "session.auto_start" needs to be disabled."
 */

ini_set("suhosin.session.cryptdocroot", "Off");
ini_set("suhosin.cookie.cryptdocroot", "Off");
ini_set("session.auto_start", "0");


date_default_timezone_set('Europe/Berlin');

/*
 * Register composer auto loader.
 */

require_once 'vendor/autoload.php';

/*
 * init [n]core
 */

$nCore = new nCore\App(include 'etc/bootstrap.php');

$nCore->render();