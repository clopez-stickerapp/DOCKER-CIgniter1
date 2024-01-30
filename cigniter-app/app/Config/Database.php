<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     */
    public array $default = [
        'DSN'      => '',
        'hostname' => 'host.docker.internal',
        'username' => 'root',
        'password' => 'root',
        'database' => 'caves',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => 'thecave_',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_unicode_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    // laserCaveGroup

    public array $laser = [
        'DSN'      => '',
        'hostname' => 'host.docker.internal',
        'username' => 'root',
        'password' => 'root',
        'database' => 'caves',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => 'thelasercave_',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_unicode_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    // -------the cave values --------
    
    // $active_group = "default";
    // $active_record = TRUE;

    // $db['default']['hostname'] = "localhost:3307";
    // $db['default']['username'] = "develop";
    // $db['default']['password'] = "stickit23435";
    // $db['default']['database'] = "thecave"; // AND thelasercave
    // $db['default']['dbdriver'] = "mysqli";
    // $db['default']['dbprefix'] = "";
    // $db['default']['pconnect'] = TRUE;
    // $db['default']['db_debug'] = TRUE;
    // $db['default']['cache_on'] = FALSE;
    // $db['default']['cachedir'] = "";
    // $db['default']['char_set'] = "utf8";
    // $db['default']['dbcollat'] = "utf8_unicode_ci";

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
