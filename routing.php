<?php

$url = parse_url($_SERVER["REQUEST_URI"]);

/**
 * Changing the Document_ROOT
 */
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
$_SERVER["DOCUMENT_ROOT"] = str_replace("/public", "", $_SERVER["DOCUMENT_ROOT"]);

$_GET['req'] = substr($url['path'], 1);

// Default index file
define("DIRECTORY_INDEX", "public/index.php");


function logAccess($status = 200) {
    file_put_contents("php://stdout", sprintf("[%s] %s:%s [%s]: %sn",
        date("D M j H:i:s Y"), $_SERVER["REMOTE_ADDR"],
        $_SERVER["REMOTE_PORT"], $status, $_SERVER["REQUEST_URI"]));
}

// if requesting a directory then serve the default index
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$ext = pathinfo($path, PATHINFO_EXTENSION);
if (empty($ext)) {
    $path = rtrim($path, "/") . "/" . DIRECTORY_INDEX;
}

// If the file exists then return false and let the server handle it
if (file_exists($DOCUMENT_ROOT . $path)) {
    return false;
}

require __DIR__ . DIRECTORY_SEPARATOR . DIRECTORY_INDEX;