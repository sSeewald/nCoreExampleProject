<?php

return array(

    /*
     * Caching is disabled by default if debug is "true".
     *
     * [n]core produces more detailed and visible error reports in debug mode - this will be improved in future releases.
     *
     */
    'debug' => true,

    /*
     * Environment
     *
     * [n]core will try to load a config with the defined prefix.
     *
     * A default config.xml is always required.
     * Prefixed versions [Environment].config.xml are merged into the main config file.
     *
     *
     * Example:
     *
     * "Note: Files in /etc are all lowercase. Other files like module configs are uppercase."
     *
     * wwwRoot -
     *         |- etc
     *         |  |- config.xml
     *         |  |- dev.config.xml
     *         |
     *         |- Modules
     *            |- ExampleModule
     *               |- Config.xml
     *               |- Dev.Config.xml
     */
    'environment' => 'dev',

    /*
     * Cache settings
     *
     * Be aware of when caching is disabled everything is a bit slower. ;)
     * [n]core brings it's own class caching mechanism - it's simple at the moment but effective.
     *
     * "Note: Host and port settings are just defaults please set it to your environment."
     *
     * Examples:
     *
     * 1. Default behavior file cache
     *
     *    If no cache provider is defined [n]core uses the file cache provider.
     *
     * 2. APC
     *
     *    'cache' => array(
     *        'enabled' => true,
     *        'provider' => 'Apc'
     *    )
     *
     * 3. redis server
     *
     *    'cache' => array(
     *        'enabled' => true,
     *        'provider' => 'Redis',
     *        'config' => array('host' => '127.0.0.1', 'port' => 6379)
     *    )
     *
     * 4. memcache server
     *
     *    'cache' => array(
     *        'enabled' => true,
     *        'provider' => 'Memcache',
     *        'config' => array('host' => '127.0.0.1', 'port' => 11211)
     *    )
     *
     * 5. memcached server
     *
     *    'cache' => array(
     *        'enabled' => true,
     *        'provider' => 'Memcached',
     *        'config' => array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 1, 'options' => array())
     *    )
     *
     *    $config['cache']['provider'] = 'Memcached';
     *    $config['cache']['config'] = array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 1, 'options' => array());
     *
     *    - or - use an array to define multiple servers
     *
     *    'cache' => array(
     *        'enabled' => true,
     *        'provider' => 'Memcached',
     *        'config' => array(
     *            'servers' => array (
     *                array('host' => '127.0.0.1', 'port' => 11211, 'weight', 1),
     *                array('host' => '127.0.0.2', 'port' => 11211, 'weight', 2),
     *                array('host' => '127.0.0.3', 'port' => 11211, 'weight', 3)
     *            )
     *        )
     *    )
     *
     */
    'cache' => array(
        'enabled' => false, // This enables or disables the class cache only.
    ),
);
