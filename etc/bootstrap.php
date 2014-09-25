<?php
/**
 * Created by novael media
 * Author: Sascha Seewald
 */

/*
 * GLOBAL PHP Settings
 */

ini_set("suhosin.session.cryptdocroot", "Off");
ini_set("suhosin.cookie.cryptdocroot", "Off");


/*
 *  GLOBAL [n]core instance settings
 *
 */
define('_PUBLIC_ROOT_', _ROOT_ . '/public');
define('_CONTENT_ROOT_', _ROOT_ . '/public/content');
define('_CACHE_ROOT_', _ROOT_ . '/etc/cache');



$config['debug'] = true;

$config['environment'] = 'dev';

$config['cache']['provider'] = 'File';
$config['cache']['enabled'] = true;
$config['cache']['namespace'] = 'nc_de_';