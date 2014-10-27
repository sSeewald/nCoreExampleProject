<?php

/*
 * GLOBAL PHP Settings
 */

ini_set("suhosin.session.cryptdocroot", "Off");
ini_set("suhosin.cookie.cryptdocroot", "Off");

$config['debug'] = true;

$config['environment'] = 'dev';

$config['cache']['provider'] = 'File';
$config['cache']['enabled'] = true;
$config['cache']['namespace'] = 'nc_de_';