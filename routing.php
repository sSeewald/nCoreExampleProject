<?php
/**
 * This file is part of the nCore framework
 *
 * Copyright (c) 2014 Sascha Seewald / novael.de
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This is a routing script for php's build in web server to simulate modrewrite.
 *
 * "Note: Don't use the build in webserver in production - this is for development only."
 *
 */

/**
 * Simulate .htaccess language and request separation and set $_GET variables.
 *
 * @param $url
 */
function splitUrl($url)
{
    if (preg_match('/^([A-Z|a-z]{2})$/', $url, $urlSplit)) {
        $_GET['lang'] = $urlSplit[1];
        $_GET['req'] = '';
    } elseif (preg_match('/^([A-Z|a-z]{2})\/([-_0-9a-zA-Z\+\/\s]*)$/', $url, $urlSplit)) {
        $_GET['lang'] = $urlSplit[1];
        $_GET['req'] = $urlSplit[2];
    } elseif (preg_match('/^([A-Z|a-z]{2}[\_|\-][A-Z|a-z]{2})$/', $url, $urlSplit)) {
        $_GET['lang'] = $urlSplit[1];
        $_GET['req'] = '';
    } elseif (preg_match('/^([A-Z|a-z]{2}[\_|\-][A-Z|a-z]{2})\/([-_0-9a-zA-Z\+\/\s]*)$/', $url, $urlSplit)) {
        $_GET['lang'] = $urlSplit[1];
        $_GET['req'] = $urlSplit[2];
    } else {
        $_GET['req'] = $url;
    }
}

/**
 * Log requests to console if status is 200.
 *
 * @param int $status
 */
function logAccess($status = 200)
{
    file_put_contents("php://stdout", sprintf("[%s] %s:%s [%s]: %sn",
        date("D M j H:i:s Y"), $_SERVER["REMOTE_ADDR"],
        $_SERVER["REMOTE_PORT"], $status, $_SERVER["REQUEST_URI"]));
}

/**
 * Prepare the Requested URL
 */
splitUrl(ltrim($_SERVER["REQUEST_URI"], '/'));

/**
 * Changing the Document_ROOT
 */
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
$_SERVER["DOCUMENT_ROOT"] = str_replace("/public", "", $_SERVER["DOCUMENT_ROOT"]);
$_SERVER["ROOT"] = str_replace("/public", "", $_SERVER["DOCUMENT_ROOT"]);

/**
 * The default index file.
 */
define("DIRECTORY_INDEX", "public/index.php");


// if requesting a directory then serve the default index
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$ext = pathinfo($path, PATHINFO_EXTENSION);
if (empty($ext)) {
    //$path = rtrim($path, "/") . "/" . DIRECTORY_INDEX;
}

// If the file exists then return false and let the server handle it
if ((file_exists($DOCUMENT_ROOT . $path) && !is_dir($DOCUMENT_ROOT . $path)) || (file_exists($_SERVER["DOCUMENT_ROOT"] . $path) && !is_dir($_SERVER["DOCUMENT_ROOT"] . $path))) {
    if (file_exists($_SERVER["DOCUMENT_ROOT"] . $path)) {
        readfile($_SERVER["DOCUMENT_ROOT"] . $path);
    } else {
        return false;
    }
} else {
    require __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_INDEX;
}